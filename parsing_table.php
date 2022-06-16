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
$cab='11-30';
foreach ($rows as $n => $datas) {
    $cells[$n] = explode('</TD>', $datas, -1);// разбивает массив на подмассивы из ячеек

}
//print_r($cells[0]);
//print_r($cells[0][0]);

unset($cells[0][0]);
$cells[0] = array_values($cells[0]);
//print_r($cells[1]);

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
$rty =array();

echo "<br>";
//print_r($days);
echo "<br>";
//echo "<br>";
$cabss= array();
$id = $show = 0;
$day = $date = '';
$cabss=$cells[0];

foreach ($cells[0] as $prepId => $prepName) {
    //print_r($id);
    if ($prepName == $cab) {
        $id = $prepId;
        //print_r($id);//выводит номер кабинета
        break;
    }
}

$id=1;

include_once 'function_delete.php';
$cabss=array_delete($cabss);
//print_r($cabss);
echo "<br>";
echo "<br>";
$content = '<b>' . $cab . '</b><br>';
if ($id>0)
    foreach ($cells as $i => $row){
        //print($i.' ');
        if ($i>12*7) break;
        if ($i % 7 ==1){
            $day = $days[$i / 7];
            //print_r($day);
                $arDay=explode(' ',$day);
                $arDay = explode('.', $arDay[1]);
                //print_r($arDay);
                $date = '20' . $arDay[2] . '-' . $arDay[1] . '-' . $arDay[0]. ' ';
                //print_r($date);
                $dayyy[]=trim($date);
        }
    }

$g=0;
/* поиск свободных кабинетов*/
//print_r($cells[1][0]);
foreach ($cells as $k=>$emptyroom) {
    if ($k % 7 ==1){
                //print_r($k);
                //print_r($g);
                if ($g>=12) break;
                echo "<h3>$dayyy[$g]</h3>";
                $g++;
                //print_r($cells[$k]);
                echo '<br>';              
            }
    foreach ($emptyroom as $b=>$freeaud) {
        //print_r($emptyroom[$b]);
        if ($freeaud==''){
                if (isset($cabss[$b])){

                /*if ( !R::testConnection() )
                {
                exit ('Нет соединения с базой данных');
                }
                if  (!R::testConnection()){
                die('no con db');
                }*/
                $parra=trim(str_replace(chr(194).chr(160), ' ', html_entity_decode($cells[$k][0])));
                $post = R::dispense('freecabinets');
                $post->para = $parra;
                $post->audience = $cabss[$b];
                $post->datee= $dayyy[$g-1];
                $post->korpus=$corp;
                $post->semestr=$semestr;
                R::store($post); // сохраняем объект в таблице  
                //print_r('<b>'.$parra.'</b>'.'_'.$cabss[$b].' '.$dayyy[$g-1].' '.$semestr);                            
            echo '<br>';                   
            }
        }
    }
}
}
//R::wipe('freecabinets');
$datee1= explode(',','30082021,13092021,27092021,11102021,25102021,08112021,22112021,06122021,20122021');
$datee2= explode(',','12092021,26092021,10102021,24102021,07112021,21112021,05122021,19122021,02012022');
//print_r($datee1);echo "<br>";
//print_r($datee2);
$datee3= explode(',','31012022,14022022,28022022,14032022,28032022,11042022,25042022,09052022,23052022,06062022,20062022,04072022,18072022');
$datee4= explode(',','13022022,27022022,13032022,27032022,10042022,24042022,08052022,22052022,05062022,19062022,03072022,17072022,31072022');
for ($i=1;$i<=1;$i++){
    $g=1;
    $dd1=0;
    $dd2=0;
    for ($g;$g<=2;$g++){
    if ($g==1){
    for ($dd1;$dd1<=8;$dd1++){     
    kab($i,$g,$datee1[$dd1],$datee2[$dd1]); 
    }
    }
    elseif($g==2){
    for ($dd2;$dd2<=12;$dd2++){  
    kab($i,$g,$datee3[$dd2],$datee4[$dd2]);
    }
    }
}
}
