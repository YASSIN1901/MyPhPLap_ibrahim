<?php

#var_dump تقوم بافراغ المتغير لتعرض نوعه وكم عدد البيانات فيه وماهي

$dump = "Hello, I’m Yassin and I study at the National University";
echo "<h2 style='padding-left: 200px;'>"."var_dump"."</h2>";
echo "the string is : ".$dump."<pre>";
var_dump($dump);
echo "-------------------------------------------------------------------------------------------------------------------------"."<pre>";


#Strlen تقوم بعرض طول النص

$mewriting = "Hello, I’m Yassin and I study at the National University";
echo "<h2 style='padding-left: 200px;'>"."strlen"."</h2>";
echo "the string is : ".$mewriting."<pre>";
echo "<h3 style='color:red;'>the size string is : <span style= 'color:blue;'>".strlen($mewriting)."</span></h3>";
echo "-------------------------------------------------------------------------------------------------------------------------"."<pre>";

#strtolower تقوم بعرض النصوص بالاحرف الصغيرة
echo "<h2 style='padding-left: 200px;'>"."strtolower"."</h2>";
$strtolo = "HELLO, I’M YASSIN AND I STUDY AT THE NATIONAL UNIVERSITY";
echo "the string is : ".$strtolo."<pre>";
echo "<h3 style='color:red;'>the View string is : <span style= 'color:blue;'>".strtolower($strtolo)."</span></h3>";
echo "-------------------------------------------------------------------------------------------------------------------------"."<pre>";

#strtoupper لعرض جميع النصوص باحرف كبيرة
$strupp = "hello i’m yassin and i study at the national university";
echo "<h2 style='padding-left: 200px;'>"."strtoupper"."</h2>";
echo "the string is : ". $strupp;
echo "<h3 style='color:red;'>the View string is : <span style= 'color:blue;'>".strtoupper($strupp)."</span></h3>";
echo "-------------------------------------------------------------------------------------------------------------------------"."<pre>";


#ucfirst تحويل الحرف الاول من الجمله النصيه الى حرف كبير
$ucfir = "hello i’m yassin and i study at the national university";
echo "<h2 style='padding-left: 200px;'>"."ucfirst"."</h2>";
echo "the string is : ". $ucfir;
echo "<h3 style='color:red;'>the View string is : <span style= 'color:blue;'>".ucfirst($ucfir)."</span></h3>";
echo "-------------------------------------------------------------------------------------------------------------------------"."<pre>";

#lcfirst تحويل الحرف الاول من الجمله النصيه الى حرف كبير
$lcfir = "HELLO, I’M YASSIN AND I STUDY AT THE NATIONAL UNIVERSITY";
echo "<h2 style='padding-left: 200px;'>"."lcfirst"."</h2>";
echo "the string is : ". $lcfir;
echo "<h3 style='color:red;'>the View string is : <span style= 'color:blue;'>".lcfirst($lcfir)."</span></h3>";
echo "-------------------------------------------------------------------------------------------------------------------------"."<pre>";


#trim إزالة المسافة من البداية والنهاية
$tri = "     HELLO, I’M YASSIN AND I STUDY AT THE NATIONAL UNIVERSITY      ";
echo "<h2 style='padding-left: 200px;'>"."trim"."</h2>";
echo "the string is : ". $tri;
echo "<h3 style='color:red;'>the View string is : <span style= 'color:blue;'>".trim($tri)."</span></h3>";
echo "-------------------------------------------------------------------------------------------------------------------------"."<pre>";


#str_replace تقوم هذه الداله باستبدال نص بنص اخر
$replace = "Hello, I’m Yassin and I study at the National University";
echo "<h2 style='padding-left: 200px;'>"."str_replace"."</h2>";
echo "the string is : ". $replace;
echo "<h3 style='color:red;'>the View string is : <span style= 'color:blue;'>".str_replace("University","PHP", $replace)."</span></h3>";
echo "-------------------------------------------------------------------------------------------------------------------------"."<pre>";

#strpos تقوم بالبحث عن موقع كلمة بالنص
$pos = "Hello, I’m Yassin and I study at the National University";
echo "<h2 style='padding-left: 200px;'>"."strpos"."</h2>";
echo "the string is : ". $pos;
echo "<h3 style='color:red;'>the View string is : <span style= 'color:blue;'>".strpos($pos,"University")."  University"."</span></h3>";
echo "-------------------------------------------------------------------------------------------------------------------------"."<pre>";


# substr تقوم باستقطاع جزة من النص
$sub = "Hello, I’m Yassin and I study at the National University";
echo "<h2 style='padding-left: 200px;'>"."substr"."</h2>";
echo "the string is : ". $sub;
echo "<h3 style='color:red;'>the View string is : <span style= 'color:blue;'>".substr($pos,0,31)."</span></h3>";
echo "-------------------------------------------------------------------------------------------------------------------------"."<pre>";


#explode تقوم بتحويل النص الى مصفوفة
$plode = "Hello, I’m, Yassin, and, I, study, at, the, National, University";
echo "<h2 style='padding-left: 200px;'>"."explode"."</h2>";
echo "the string is : ". $plode."<pre>";
print_r(explode(",",$plode));
echo "-------------------------------------------------------------------------------------------------------------------------"."<pre>";


#implode تقوم بتحويل المصفوفه الي نص
$mplode = array("Hello", "I’m", "Yassin", "and", "I", "study", "at", "the", "National", "University");
echo "<h2 style='padding-left: 200px;'>"."implode"."</h2>";
print_r($mplode);
print_r(implode(" ",$mplode));

echo "<pre>"."-------------------------------------------------------------------------------------------------------------------------"."<pre>";




# str_repeat تقوم بتكرار النص
$repeat = "Hello, I’m Yassin and I study at the National University   ";
echo "<h2 style='padding-left: 200px;'>"."str_repeat"."</h2>";
echo "the string is : ". $repeat;
echo "<h3 style='color:red;'>the View string is : <span style= 'color:blue;'>".str_repeat($repeat,2)."</span></h3>";
echo "-------------------------------------------------------------------------------------------------------------------------"."<pre>";


# strrev يقوم بعس النص
$rev = "Hello, I’m Yassin and I study at the National University";
echo "<h2 style='padding-left: 200px;'>"."strev"."</h2>";
echo "the string is : ". $rev;
echo "<h3 style='color:red;'>the View string is : <span style= 'color:blue;'>".strrev($rev)."</span></h3>";
echo "-------------------------------------------------------------------------------------------------------------------------"."<pre>";

# wordwrap تقوم بقص النص بعد عدد معين
$wrap = "Hello, I’m Yassin and I study at the National University";
echo "<h2 style='padding-left: 200px;'>"."wordwrap"."</h2>";
echo "the string is : ". $wrap;
echo "<h3 style='color:red;'>the View string is : <span style= 'color:blue;'>".wordwrap($wrap,5)."</span></h3>";
echo "-------------------------------------------------------------------------------------------------------------------------"."<pre>";


?>

