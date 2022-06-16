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
foreach ($_POST['para'] as $us=>$para){
     $users1 = R::find('freecabinets','datee=? AND korpus=? AND para=?',[$_POST['calendar'],$_POST['корпус'],$para]);
     foreach($users1 as $num){
    echo 'Аудитория:'.$num->audience.' '.$num->para;
    echo '<br>';
}
}
