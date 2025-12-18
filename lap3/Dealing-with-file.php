<?php

// دوال التعامل مع الملفات تُستخدم لإنشاء الملفات، قراءتها، الكتابة فيها، وحذفها
// سوف نقدم بعض الدوال التي تتعامل مع الملفات وهي كالتالي


//  فتح ملف اي بمعنى انشاء ملف

$file = fopen("text.txt", "w");

//  الكتابة في ملف

fwrite($file, "Hello PHP");

//  إغلاق الملف

fclose($file);

//  قراءة ملف

echo file_get_contents("text.txt")."<pre>";



//  قراءة سطر سطر

$file = fopen("text.txt", "r");
while (!feof($file)) {
    echo fgets($file)."<pre>";
}
fclose($file);


//  حذف ملف

//unlink("text.txt");

//  التحقق من وجود ملف

if (file_exists("text.txt")) {
    echo "الملف موجود";
}
else
{
    echo "الملف غير موجود";
}
?>