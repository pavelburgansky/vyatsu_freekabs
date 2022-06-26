<?php
set_time_limit(20000);
require_once 'rb.php';
R::setup( 'mysql:host=127.0.0.1;dbname=schedulefree','root', '' );
if ( !R::testConnection() )
                {
                exit ('Нет соединения с базой данных');
                }
                if  (!R::testConnection()){
                die('no con db');
                }
function kab($corp,$semestr,$date1,$date2){
$url = 'https://www.vyatsu.ru/reports/schedule/room/'.$corp.'_'.$semestr.'_'.$date1.'_'.$date2.'.html';
if (@fopen($url, 'r')){
    $table =file_get_contents($url);
}
else{
    print_r('файл не найден');
    return;
}
$table = strstr($table, '<TABLE style="width:100%; height:0px; " CELLSPACING=0>');//убирам всё что выше table
$table = strstr($table, '</TABLE>', true);//убираем всё что /table и ниже
//print_r($table);
$rows = explode('</TR>', $table, -1);//разбиваем наш html код на массив после каждого /tr кроме последнего
unset($rows[0]);//убираем первую строку где (написано обновление 19.05.2022)
$rows = array_values($rows);

$cells = array();
$days = array();
foreach ($rows as $n => $datas) {
    $cells[$n] = explode('</TD>', $datas, -1);// разбивает массив на подмассивы из ячеек
}

unset($cells[0][0]);
$cells[0] = array_values($cells[0]);

foreach ($cells as $i => $row) {
    if (strpos($cells[$i][0], 'ROWSPAN=') === false) {  //если в массиве найдётся "rowspan="
    } else {
        //print_r($cells[$i][0]);
        $days[] = trim(strip_tags($cells[$i][0]));            //то в массив days записать день недели trim(удаляет пробелы и другие символы) strip_tags(удаляет html  и php теги)
        unset($cells[$i][0]); // убрать из массива cells( этот день недели)
        $cells[$i] = array_values($cells[$i]);
    }
    array_walk($cells[$i], function (&$n) { // применят функцию function(&$n)
        $n = trim(strip_tags($n));
    });
}
$cabss= array();
$id = $show = 0;
$day = $date = '';
$cabss=$cells[0];

include_once 'function_delete.php';
$cabss=array_delete($cabss);

$content = '<b>' . $cab . '</b><br>';

    foreach ($cells as $i => $row){

        if ($i>12*7) break;
        if ($i % 7 ==1){
            $day = $days[$i / 7];
                $arDay=explode(' ',$day);
                $arDay = explode('.', $arDay[1]);
                //print_r($arDay);
                $date = '20' . $arDay[2] . '-' . $arDay[1] . '-' . $arDay[0]. ' ';
                $dayyy[]=trim($date);
        }
    }
$g=0;
/* поиск свободных кабинетов*/

foreach ($cells as $k=>$emptyroom) {
    if ($k % 7 ==1){
                if ($g>=12) break;
                //echo "<h3>$dayyy[$g]</h3>";
                $g++;              
            }
    foreach ($emptyroom as $b=>$freeaud) {
        //print_r($emptyroom[$b]);
        if ($freeaud==''){
                if (isset($cabss[$b])){
                $parra=trim(str_replace(chr(194).chr(160), ' ', html_entity_decode($cells[$k][0])));
                $post = R::dispense('freecabinets');
                $post->para = $parra;
                $post->audience = $cabss[$b];
                $post->datee= $dayyy[$g-1];
                $post->korpus=$corp;
                $post->semestr=$semestr;
                $post->url=$url;
                R::store($post); // сохраняем объект в таблице  
                //print_r('<b>'.$parra.'</b>'.'_'.$cabss[$b].' '.$dayyy[$g-1].' '.$semestr);                            
            echo '<br>';                   
            }
        }
    }
}
}
R::wipe('freecabinets');

$datee1= explode(',','3008,1309,2709,1110,2510,0811,2211,0612,2012');
$datee2= explode(',','1209,2609,1010,2410,0711,2111,0512,1912,0201');
//print_r($datee1);echo "<br>";
//print_r($datee2);
$datee3= explode(',','3101,1402,2802,1403,2803,1104,2504,0905,2305,0606,2006,0407,1807');
$datee4= explode(',','1302,2702,1303,2703,1004,2404,0805,2205,0506,1906,0307,1707,3107');
$date = date('Y');
$date1= date('Y',strtotime('+1 year'));
print_r($date1);
    $dd1=0;
    $dd2=0;
    for ($dd1;$dd1<=8;$dd1++){    
    if ($dd1!=8){
        $datee1[$dd1]=$datee1[$dd1].$date;    
        $datee2[$dd1]=$datee2[$dd1].$date;
    }
    elseif($dd1=8){
        $datee1[$dd1]=$datee1[$dd1].$date;
        $datee2[$dd1]=$datee2[$dd1].$date1;
    }
    }
for ($dd2;$dd2<=12;$dd2++){
    $datee3[$dd2]=$datee3[$dd2].$date;    
    $datee4[$dd2]=$datee4[$dd2].$date;
} 
print_r($datee1);
echo "<br>";
print_r($datee2);
echo "<br>";
print_r($datee3);
echo "<br>";
print_r($datee4);    
//-------------------------------------------//
//        поиск недели по текущей дате       //
//-------------------------------------------//

$date = date('Y-m-d');
print_r($date);
echo "<br>";
for ($i=1;$i<=21;$i++){
    $g=1;
    $dd1=0;
    $dd2=0;
    for ($g;$g<=2;$g++){
    if ($g==1){
    for ($dd1;$dd1<=8;$dd1++){
    $contractDateBegin=$datee1[$dd1];
    $contractDateEnd=$datee2[$dd1];
    $y=mb_substr($contractDateBegin, 4, 4);
    $m=mb_substr($contractDateBegin, 2, 2);
    $d=mb_substr($contractDateBegin, 0, 2);
    $y1=mb_substr($contractDateEnd, 4, 4);
    $m1=mb_substr($contractDateEnd, 2, 2);
    $d1=mb_substr($contractDateEnd, 0, 2);
    $contractDateBegin1=date($y.'-'.$m.'-'.$d);
    $contractDateEnd1=date($y1.'-'.$m1.'-'.$d1);
    if (($date >= $contractDateBegin1) && ($date <= $contractDateEnd1)) {
    kab($i,$g,$datee1[$dd1],$datee2[$dd1]);
    } 
    }
    }
    elseif($g==2){
    for ($dd2;$dd2<=12;$dd2++){
    $contractDateBegin=$datee3[$dd2];
    $contractDateEnd=$datee4[$dd2];
    $y=mb_substr($contractDateBegin, 4, 4);
    $m=mb_substr($contractDateBegin, 2, 2);
    $d=mb_substr($contractDateBegin, 0, 2);
    $y1=mb_substr($contractDateEnd, 4, 4);
    $m1=mb_substr($contractDateEnd, 2, 2);
    $d1=mb_substr($contractDateEnd, 0, 2);
    $contractDateBegin2=date($y.'-'.$m.'-'.$d);
    $contractDateEnd2=date($y1.'-'.$m1.'-'.$d1);    
    if (($date >= $contractDateBegin2) && ($date <= $contractDateEnd2)) {
    //echo $i.'<br>';    
    //echo $g.'<br>';
    //echo $datee3[$dd2].'<br>';
    //echo $datee4[$dd2].'<br>';
    kab($i,$g,$datee3[$dd2],$datee4[$dd2]);
    }
    }
    }
}
}
