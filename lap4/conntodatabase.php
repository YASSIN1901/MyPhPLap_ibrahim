<?php
try {
    $dsn = "mysql:host=localhost;dbname=encryption_system;charset=utf8";
    $username = "root";
    $password = "";

    $conn = new PDO($dsn, $username, $password);

    // تفعيل عرض الأخطاء
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "تم الاتصال بقاعدة البيانات بنجاح";
}
catch (PDOException $e) {
    echo "فشل الاتصال: " . $e->getMessage();
}
?>