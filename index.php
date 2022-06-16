<!doctype html>
<html lang="ru">
<meta charset="utf-8">
<head>
    <title>qwe3</title>
    <link href="css/cascad.css" rel="stylesheet">
</head>

<body topmargin="50px"
      leftmargin="100px" bottommargin="100px" rightmargin="100px" bgcolor="#00FFFF">
<header>
    <img src="logo.jpg" width="100px" align="left">
    <h1 align="center" style="color:green" face="Arial"> Поиск свободных аудиторий Вятгу</h1>
</header>
<main>
    <form action="index1.php" method="post">
        <table  border="0" cellpadding="5" cellspacing="0" align="right" width="60%">
            <tr>
                <td valign="top" width="300px;">
                    <table  border="0" cellpadding="0" cellspacing="0" align="center" width="150%" >
                        <tr>
                            <th>Корпус</th>
                        </tr>
                        <tr>
                            <td valign="left">
                                <select name="корпус" maxlength="5" Value="день"multiple size="25">
                                    <option>1
                                    <option>2
                                    <option>3
                                    <option>4
                                    <option>5
                                    <option>6
                                    <option>7
                                    <option>8
                                    <option>9
                                    <option>10
                                    <option>11
                                    <option>12
                                    <option>13
                                    <option>14
                                    <option>15
                                    <option>16
                                    <option>17
                                    <option>18
                                    <option>19
                                    <option>20
                                    <option>21
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Выберите дату: <input type="date" name="calendar">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Мест в аудитории от: <input type="number" id="date" name ="number_of_seats" style="width:40px" min="0" max="99">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Выберете номер пары:<br>
                                <input type="checkbox" name="para[0]" value="1 пара" /> 1 пара<br />
                                <input type="checkbox" name="para[1]" value="2 пара" /> 2 пара<br />
                                <input type="checkbox" name="para[2]" value="3 пара" /> 3 пара<br />
                                <input type="checkbox" name="para[3]" value="4 пара" /> 4 пара<br />
                                <input type="checkbox" name="para[4]" value="5 пара" /> 5 пара<br />
                                <input type="checkbox" name="para[5]" value="6 пара" /> 6 пара<br />
                                <input type="checkbox" name="para[6]" value="7 пара" /> 7 пара<br />
                            </td>
                        </tr>
                        <tr>
                            <td valign="top">
                                <input type="checkbox" name="projector" value="1" /> Проектор<br />
                                <input type="checkbox" name="komp_class" value="2" /> Компьютерный класс <br />
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center" style="height:40px;" valign="bottom"><input type="submit" id="reg_button" value="Найти!"></td>
                        </tr>
                </table>
                </td>
                <td valign="top">
                    <table border="0" width="100%">
                        <tr>
                            <th style="height:20px;"  align="center">Полезные ссылки </th>
                        </tr>
                        <tr>
                            <td id="rezulttd" valign="top">&nbsp;
                                <p><a href="https://www.vyatsu.ru/">Сайт Вятгу</a></p>
                                
                             </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </form>

</main>
</body>
</html>
