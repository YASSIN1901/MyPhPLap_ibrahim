<?php
// إعدادات الاتصال
$dbHost = 'localhost';
$dbUser = 'root';
$dbPass = '';           // عدّل كلمة المرور إذا لزم
$dbName = 'bank_system_foryassin';

/**
 * إنشاء اتصال PDO بقاعدة البيانات
 */
function getPdo($dbHost, $dbUser, $dbPass, $dbName)
{
    $pdo = new PDO("mysql:host={$dbHost};charset=utf8mb4", $dbUser, $dbPass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);

    // إنشاء قاعدة البيانات إذا لم تكن موجودة
    $pdo->exec("CREATE DATABASE IF NOT EXISTS `{$dbName}` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");

    // الاتصال بالقاعدة المطلوبة
    $pdo = new PDO("mysql:host={$dbHost};dbname={$dbName};charset=utf8mb4", $dbUser, $dbPass, [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);

    return $pdo;
}
?>
