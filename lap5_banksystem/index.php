<?php
require 'db.php'; // استدعاء ملف الاتصال

$messages = [];

try {
    $pdo = getPdo($dbHost, $dbUser, $dbPass, $dbName);

    // إنشاء الجداول إذا لم تكن موجودة
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS accounts (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(100) NOT NULL,
            balance DECIMAL(12,2) NOT NULL DEFAULT 0.00,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=InnoDB;
    ");
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS transactions (
            id INT AUTO_INCREMENT PRIMARY KEY,
            from_account INT NULL,
            to_account INT NULL,
            amount DECIMAL(12,2) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (from_account) REFERENCES accounts(id) ON DELETE SET NULL,
            FOREIGN KEY (to_account) REFERENCES accounts(id) ON DELETE SET NULL
        ) ENGINE=InnoDB;
    ");

    // دوال مساعدة
    function cleanStr($v) { return trim((string)$v); }
    function flash($type, $msg) { return ['type' => $type, 'msg' => $msg]; }

    // معالجة النماذج
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        if (isset($_POST['action']) && $_POST['action'] === 'add_account') {
            $name = cleanStr($_POST['name'] ?? '');
            $balance = (float)($_POST['balance'] ?? 0);

            if ($name === '') $messages[] = flash('danger','الاسم مطلوب.');
            elseif ($balance < 0) $messages[] = flash('danger','الرصيد لا يمكن أن يكون سالبًا.');
            else {
                $stmt = $pdo->prepare("INSERT INTO accounts (name, balance) VALUES (?, ?)");
                $stmt->execute([$name, $balance]);
                $messages[] = flash('success','تم إضافة الحساب بنجاح.');
            }
        }

        if (isset($_POST['action']) && $_POST['action'] === 'transfer') {
            $fromId = (int)($_POST['from_id'] ?? 0);
            $toId = (int)($_POST['to_id'] ?? 0);
            $amount = (float)($_POST['amount'] ?? 0);

            if ($fromId <= 0 || $toId <= 0) $messages[] = flash('danger','يجب اختيار حسابي التحويل.');
            elseif ($fromId === $toId) $messages[] = flash('danger','لا يمكن التحويل لنفس الحساب.');
            elseif ($amount <= 0) $messages[] = flash('danger','المبلغ يجب أن يكون أكبر من صفر.');
            else {
                $pdo->beginTransaction();
                try {
                    $fromAcc = $pdo->prepare("SELECT id, balance FROM accounts WHERE id = ?");
                    $fromAcc->execute([$fromId]);
                    $fromAcc = $fromAcc->fetch();

                    $toAcc = $pdo->prepare("SELECT id, balance FROM accounts WHERE id = ?");
                    $toAcc->execute([$toId]);
                    $toAcc = $toAcc->fetch();

                    if (!$fromAcc || !$toAcc) throw new Exception('أحد الحسابات غير موجود.');
                    if ($fromAcc['balance'] < $amount) throw new Exception('رصيد الحساب المحوِّل غير كافٍ.');

                    $pdo->prepare("UPDATE accounts SET balance = balance - ? WHERE id = ?")->execute([$amount, $fromId]);
                    $pdo->prepare("UPDATE accounts SET balance = balance + ? WHERE id = ?")->execute([$amount, $toId]);
                    $pdo->prepare("INSERT INTO transactions (from_account, to_account, amount) VALUES (?, ?, ?)")->execute([$fromId, $toId, $amount]);

                    $pdo->commit();
                    $messages[] = flash('success','تمت عملية التحويل بنجاح.');
                } catch (Exception $e) {
                    $pdo->rollBack();
                    $messages[] = flash('danger','فشلت عملية التحويل: '.$e->getMessage());
                }
            }
        }
    }

    $accounts = $pdo->query("SELECT * FROM accounts ORDER BY id DESC")->fetchAll();
    $transactions = $pdo->query("
        SELECT t.id, t.amount, t.created_at,
               fa.name AS from_name, ta.name AS to_name
        FROM transactions t
        LEFT JOIN accounts fa ON fa.id = t.from_account
        LEFT JOIN accounts ta ON ta.id = t.to_account
        ORDER BY t.id DESC
        LIMIT 10
    ")->fetchAll();

} catch (Throwable $ex) {
    $messages[] = flash('danger','خطأ اتصال بقاعدة البيانات: '.$ex->getMessage());
}
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="utf-8">
<title>نظام بنكي تجريبي</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Bootstrap 5 CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css" rel="stylesheet">

<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-dark text-light">

<div class="container my-5">
    <header class="mb-4">
        <h1 class="mb-1"><i class="bi-bank2 me-2"></i>نظام بنكي تجريبي</h1>
        <p class="text-secondary">إضافة حساب، تحويل الأموال، عرض الحسابات، وتسجيل العمليات — كل ذلك في صفحة واحدة.</p>
    </header>

    <?php foreach($messages as $m): ?>
        <div class="alert alert-<?= $m['type'] ?>"><?= htmlspecialchars($m['msg']) ?></div>
    <?php endforeach; ?>

    <div class="row g-4">
        <div class="col-md-6">
            <div class="card bg-secondary text-light">
                <div class="card-header"><i class="bi-plus-circle me-2"></i>إضافة حساب جديد</div>
                <div class="card-body">
                    <form method="post">
                        <input type="hidden" name="action" value="add_account">
                        <div class="mb-3">
                            <label>اسم الحساب</label>
                            <input type="text" name="name" class="form-control" placeholder="مثال: حساب ياسين" required>
                        </div>
                        <div class="mb-3">
                            <label>رصيد ابتدائي</label>
                            <input type="number" name="balance" class="form-control" min="0" step="0.01" value="0.00">
                        </div>
                        <button class="btn btn-success"><i class="bi-check-circle me-1"></i>إضافة الحساب</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card bg-secondary text-light">
                <div class="card-header"><i class="bi-arrow-left-right me-2"></i>تحويل الأموال</div>
                <div class="card-body">
                    <form method="post" onsubmit="return confirm('تأكيد: هل تريد تنفيذ عملية التحويل؟');">
                        <input type="hidden" name="action" value="transfer">
                        <div class="mb-3">
                            <label>من الحساب</label>
                            <select name="from_id" class="form-select" required>
                                <option value="">اختر الحساب</option>
                                <?php foreach($accounts as $acc): ?>
                                    <option value="<?= (int)$acc['id'] ?>"><?= htmlspecialchars($acc['name']) ?> — <?= number_format((float)$acc['balance'],2) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>إلى الحساب</label>
                            <select name="to_id" class="form-select" required>
                                <option value="">اختر الحساب</option>
                                <?php foreach($accounts as $acc): ?>
                                    <option value="<?= (int)$acc['id'] ?>"><?= htmlspecialchars($acc['name']) ?> — <?= number_format((float)$acc['balance'],2) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label>المبلغ</label>
                            <input type="number" name="amount" class="form-control" min="0.01" step="0.01" placeholder="0.00" required>
                        </div>
                        <button class="btn btn-primary"><i class="bi-currency-exchange me-1"></i>تنفيذ التحويل</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- قائمة الحسابات -->
    <div class="card bg-secondary text-light mt-4">
        <div class="card-header"><i class="bi-people me-2"></i>قائمة الحسابات الحالية</div>
        <div class="card-body table-responsive">
            <table class="table table-dark table-striped mb-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>الاسم</th>
                        <th>الرصيد</th>
                        <th>تاريخ الإنشاء</th>
                    </tr>
                </thead>
                <tbody>
                <?php if($accounts): ?>
                    <?php foreach($accounts as $acc): ?>
                        <tr>
                            <td><?= (int)$acc['id'] ?></td>
                            <td><?= htmlspecialchars($acc['name']) ?></td>
                            <td><?= number_format((float)$acc['balance'],2) ?></td>
                            <td><?= htmlspecialchars($acc['created_at']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="4" class="text-secondary">لا توجد حسابات بعد.</td></tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- آخر العمليات -->
    <div class="card bg-secondary text-light mt-4 mb-4">
        <div class="card-header"><i class="bi-clock-history me-2"></i>آخر العمليات</div>
        <div class="card-body table-responsive">
            <table class="table table-dark table-striped mb-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>من</th>
                        <th>إلى</th>
                        <th>المبلغ</th>
                        <th>التاريخ</th>
                    </tr>
                </thead>
                <tbody>
                <?php if($transactions): ?>
                    <?php foreach($transactions as $t): ?>
                        <tr>
                            <td><?= (int)$t['id'] ?></td>
                            <td><?= htmlspecialchars($t['from_name'] ?? '—') ?></td>
                            <td><?= htmlspecialchars($t['to_name'] ?? '—') ?></td>
                            <td><?= number_format((float)$t['amount'],2) ?></td>
                            <td><?= htmlspecialchars($t['created_at']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="5" class="text-secondary">لا توجد عمليات حتى الآن.</td></tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <footer class="text-center text-secondary mb-4">
        تم البناء بملف واحد باستخدام PHP وPDO وInnoDB لضمان الاتساق في التحويلات.
    </footer>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
