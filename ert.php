<?php
$url = "ert1.html";
$table =file_get_contents($url);

$table = strstr($table, '<table>');//убирам всё что выше table

$table = strstr($table, '</table>', true);//убираем всё что /table и ниже

$rows = explode('</tr>', $table, -1);//разбиваем наш html код на массив после каждого /tr кроме последнего
unset($rows[0]);//убираем первую строку где (написано обновление 19.05.2022)
$rows = array_values($rows);
$HTMLzaprosData='2022-05-11';
$cells = array();
$days = array();
$cab='11-30';
foreach ($rows as $n => $datas) {
    $datas = str_replace("<br>", " *br*", $datas);
    $cells[$n] = explode('</td>', $datas, -1);// разбивает массив на подмассивы из столбцов

}


unset($cells[0][0]);
$cells[0] = array_values($cells[0]);

foreach ($cells as $i => $row) {
    if (strpos($cells[$i][0], 'rowspan=') === false) {  //если в массиве cells[0][0] найдётся "rowspan"
    } else {
        $days[] = trim(strip_tags($cells[$i][0]));            //то в массив days записать день недели trim(удаляет пробелы и другие символы) strip_tags(удаляет html  и php теги)
        unset($cells[$i][0]); // убрать из массива cells( этот день недели)
        $cells[$i] = array_values($cells[$i]);
    }
    array_walk($cells[$i], function (&$n) { // применят функцию function(&$n)
        $n = trim(strip_tags($n));
    });
}
 //print_r($days);
$cabss= array();
$id = $show = 0;
$day = $date = '';
$cabss=$cells[0];
foreach ($cells[0] as $prepId => $prepName) {
    if ($prepName == $cab) {
        $id = $prepId;
        //print_r($id);//выводит номер кабинета
        break;
    }
}
/*print_r($i);*/
$dayyy=array ();
//print_r($cabss);
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
//print_r($dayyy);
echo('</br>');
//$start_one = array_combine(range(1, count($dayyy)), array_values($dayyy));
//print_r($start_one);
//$k=array_search($HTMLzaprosData,$dayyy);
//print_r($dayyy[$k]);
$g=0;
echo '<br>';
echo '<br>';
//print_r($cells);
echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>';

/* поиск свободных кабинетов*/
foreach ($cells as $k=>$emptyroom) {
    if ($k % 7 ==0){
                echo "<h3>$dayyy[$g]</h3>";
                $g++;
            }
    foreach ($emptyroom as $b=>$freeaud) {

        if ($emptyroom[$b]==''){
            print_r(' '.'<b>'.$cells[$k][0].'</b>'. ' __'.'корпус:'.$cabss[$b].' ');        
        }
    }
}

