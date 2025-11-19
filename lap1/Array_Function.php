<?php

#count لحساب عدد المصفوفة
$ina = array("age","tital","username","study is");
echo "<h2 style='padding-left: 200px;'>"."count"."</h2>";

echo "The Array is : ".print_r($ina,true);

echo "<h4 style='color:red'>The count this Arrays : <span style= 'color:blue;'>".count($ina)."</span></h4>";
echo "=============================================================================================================";

#Array_push لاضافة عنصر الى اخر المصفوفة
echo "<h2 style='padding-left: 200px;'>"."array_push"."</h2>";
$push = [1,2,3,4];

echo "<h4 style='color:red'>The Array before the addition is : <span style= 'color:blue;'>".print_r($push,true)."</span></h4>";

array_push($push,5);
echo "<h4 style='color:red'>The Array After the addition is : <span style= 'color:blue;'>".print_r($push,true)."</span></h4>";
echo "=============================================================================================================";

#Array_pop لحذف اخر عنصر من المصفوفة
echo "<h2 style='padding-left: 200px;'>"."array_pop"."</h2>";
$pop = [1,2,3,4];

echo "<h4 style='color:red'>The Array before the Delete is : <span style= 'color:blue;'>".print_r($pop,true)."</span></h4>";

array_pop($pop);
echo "<h4 style='color:red'>The Array After the Delete is : <span style= 'color:blue;'>".print_r($pop,true)."</span></h4>";
echo "=============================================================================================================";

#array_shift لحذف اول عنصر من المصفوفة
echo "<h2 style='padding-left: 200px;'>"."array_shift"."</h2>";
$pop_firset = [2,1,2,3,4];

echo "<h4 style='color:red'>The Array before the Delete from first is : <span style= 'color:blue;'>".print_r($pop_firset,true)."</span></h4>";

array_shift($pop_firset);
echo "<h4 style='color:red'>The Array After the Delete from first is : <span style= 'color:blue;'>".print_r($pop_firset,true)."</span></h4>";
echo "=============================================================================================================";

#array_unshift لاضافة عنصر في البداية من المصفوفة
echo "<h2 style='padding-left: 200px;'>"."array_unshift"."</h2>";
$Add_first = [1,2,3,4];

echo "<h4 style='color:red'>The Array before the Add from first is : <span style= 'color:blue;'>".print_r($Add_first,true)."</span></h4>";

array_unshift($Add_first,2);
echo "<h4 style='color:red'>The Array After the Add from first is : <span style= 'color:blue;'>".print_r($Add_first,true)."</span></h4>";
echo "=============================================================================================================";


#in_array لتحقق من هل يوجد عنر مدخل في المصفوفة او لا اذا كان موجود في المصفوفة يرجع لنا الرقم واحد واذا كان لا يرجع لنا الرقم صفر
echo "<h2 style='padding-left: 200px;'>"."in_array"."</h2>";
$insrray = [1,2,3,4];

echo "<h4 style='color:red'>قبل التحقق من  العناصر : <span style= 'color:blue;'>".print_r($insrray,true)."</span></h4>";


echo "<h4 style='color:red'>بعد التخقق من هل الرقم (2) موجود في المصفوفة اولا : <span style= 'color:blue;'>".in_array(2,$insrray)."</span></h4>";
echo "============================================================================================================="."<pre>";


#array_key_exists هذه الداله للبحث عن المفتاح هل موجود في المصفوفة او لا ويرجع الرقم واحد اذا كان موجود
echo "<h2 style='padding-left: 200px;'>"."array_key_exists"."</h2>";
$myArr["name"] = 10;
$myArr[1] = 12.16;
$myArr[2] = true;
$myArr[3] = "yassin";
$myArr[4] = 'IT';

echo "<h4 style='color:red'>The Array is : <span style= 'color:blue;'>".print_r($myArr,true)."</span></h4>";

array_unshift($Add_first,2);
echo "<h4 style='color:red'>The Return After Search to key [name] : <span style= 'color:blue;'>".array_key_exists("name", $myArr)."</span></h4>";
echo "============================================================================================================="."<pre>";



#ِArray_keys تقوم بارجاع مفاتيح المصفوفة اي تقوم باعادة مفاتيح المصفوفة
echo "<h2 style='padding-left: 200px;'>"."Array_keys"."</h2>";
$myArr["name"] = 10;
$myArr[1] = 12.16;
$myArr[2] = true;
$myArr[3] = "yassin";
$myArr[4] = 'IT';

echo "<h4 style='color:red'>The Array is : <span style= 'color:blue;'>".print_r($myArr,true)."</span></h4>";

echo "<h4 style='color:red'>The Return Keys’s Array : <span style= 'color:blue;'>".print_r(array_keys($myArr),true)."</span></h4>";
echo "============================================================================================================="."<pre>";


#ِarray_values تقوم باعادة القيم فقط ولاتعيد باعادة المفاتيح
echo "<h2 style='padding-left: 200px;'>"."array_values"."</h2>";
$myArr["name"] = 10;
$myArr[1] = 12.16;
$myArr[2] = true;
$myArr[3] = "yassin";
$myArr[4] = 'IT';

echo "<h4 style='color:red'>The Array is : <span style= 'color:blue;'>".print_r($myArr,true)."</span></h4>";

echo "<h4 style='color:red'>The Return vlaues’s Array : <span style= 'color:blue;'>".print_r(array_values($myArr),true)."</span></h4>";
echo "============================================================================================================="."<pre>";



#ِarray_merge تقوم بدمج مصفوفتين مع بعض
echo "<h2 style='padding-left: 200px;'>"."array_merge"."</h2>";
$myArr1["array1"] = 10;
$myArr1[1] = 12.16;
$myArr1[2] = true;
$myArr1[3] = "yassin";
$myArr1[4] = 'IT';

$myArr2["array2"] = 10;
$myArr2[1] = 12.16;
$myArr2[2] = true;
$myArr2[3] = "yassin";
$myArr2[4] = 'IT';

$duble_array = array_merge($myArr1,$myArr2);
echo "<h4 style='color:red'>The Array one is : <span style= 'color:blue;'>".print_r($myArr1,true)."</span></h4>";
echo "<h4 style='color:red'>The Array tow is : <span style= 'color:blue;'>".print_r($myArr2,true)."</span></h4>";

echo "<h4 style='color:red'>The Duble Array is : <span style= 'color:blue;'>".print_r($duble_array,true)."</span></h4>";
echo "============================================================================================================="."<pre>";



#sort تقوم بترتيب المصفوفة تصاعديا
echo "<h2 style='padding-left: 200px;'>"."sort"."</h2>";
$sor = [9,8,7,6,5,4,3,2,1];
echo "<h4 style='color:red'>The Array before sort is : <span style= 'color:blue;'>".print_r($sor,true)."</span></h4>";
sort($sor);

echo "<h4 style='color:red'>The Array after sort is : <span style= 'color:blue;'>".print_r($sor,true)."</span></h4>";
echo "============================================================================================================="."<pre>";


#rsort تقوم بترتيب المصفوفة تنازليا
echo "<h2 style='padding-left: 200px;'>"."rsort"."</h2>";
$rsor = [1,2,3,4,5,6,7,8,9];
echo "<h4 style='color:red'>The Array before sort is : <span style= 'color:blue;'>".print_r($rsor,true)."</span></h4>";
rsort($rsor);

echo "<h4 style='color:red'>The Array after sort is : <span style= 'color:blue;'>".print_r($rsor,true)."</span></h4>";
echo "============================================================================================================="."<pre>";


#array_reverse تقوم بعكس ترتيب المصفوفة
echo "<h2 style='padding-left: 200px;'>"."rsort"."</h2>";
$rsor = [1,2,3,4,5,6,7,8,9];
echo "<h4 style='color:red'>The Array before array_reverse is : <span style= 'color:blue;'>".print_r($rsor,true)."</span></h4>";


echo "<h4 style='color:red'>The Array after array_reverse is : <span style= 'color:blue;'>".print_r(array_reverse($rsor),true)."</span></h4>";
echo "============================================================================================================="."<pre>";




#array_slice تقوم باقتصاص جزء من المصفوفه كيف هذا ؟ كالتالي مثلا عندنا مصفوفها حجمها خمسه ونريد مثلا الاحتفاظ من المكان رقم واحد ومن ثم بعده بثلاثه ارقم واقتصاص الباقي
echo "<h2 style='padding-left: 200px;'>"."array_slice"."</h2>";
$slice = [1,2,3,4,5,6,7,8,9,10,11,12];
echo "<h4 style='color:red'>The Array before cut is : <span style= 'color:blue;'>".print_r($slice,true)."</span></h4>";


echo "<h4 style='color:red'>The Array after cut is : <span style= 'color:blue;'>".print_r(array_slice($slice, 1, 3),true)."</span></h4>";
echo "============================================================================================================="."<pre>";


#array_unique تقوم بازالة القيم المكرره
echo "<h2 style='padding-left: 200px;'>"."array_unique"."</h2>";
$unique = [1,1,2,2,3,3,4,4,5,6,5,6,7,7,8,9,8,9,0,0];
echo "<h4 style='color:red'>The Array before delete is : <span style= 'color:blue;'>".print_r($unique,true)."</span></h4>";


echo "<h4 style='color:red'>The Array after Delete is : <span style= 'color:blue;'>".print_r(array_unique($slice),true)."</span></h4>";
echo "============================================================================================================="."<pre>";






