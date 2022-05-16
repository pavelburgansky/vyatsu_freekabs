<!doctype html>
<html lang="ru">
<meta charset="utf-8">
<head>

    <title>qwe3</title>
    <link href="css/cascad.css" rel="stylesheet">
</head>

<body topmargin="50px"
      leftmargin="100px" bottommargin="100px" rightmargin="100px" >
<header>
    <h1 align="center" style="color:green" face="Arial"> Поиск свободных аудиторий Вятгу</h1>
</header>
<main>
    <form action="KAB.php" method="post" >
        <table  border="0" cellpadding="5" cellspacing="0" align="center" width="100%">
            <tr>
                <td valign="top" width="300px;">
                    <table  border="0" cellpadding="0" cellspacing="0" align="center" width="100%" style="border:#000000 1px solid;">
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
                                    <option>22
                                    <option>23
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Выберите дату: <input type="date" name="calendar">
                            </td>
                        </tr>
                        <tr>
                            <td valign="top">
                                <input type="checkbox" value="1" onclick="addday(this);" /> Проектор<br />
                                <input type="checkbox" value="2" onclick="addday(this);" /> Компьютерный класс <br />
                            </td>
                        </tr>
                        <tr>
                        </tr>
                        <tr>
                            <td colspan="2" align="center" style="height:40px;" valign="bottom"><input type="button" value="Найти!"></td>
                        </tr>
                    </table>
                </td>
                <td valign="top">
                    <table border="0" width="100%">
                        <tr>
                            <th style="height:20px;"  align="center">Свободные аудитории </th>
                        </tr>
                        <tr>
                            <td id="rezulttd" valign="top">&nbsp; </td>
                        </tr>
                    </table>
                </td></tr>
        </table>
    </form>

</main>
<footer align="center">
    &copy; Бурганский Павел Алексеевич<br>
    Киров<br>
    2022
</footer>

</body>
</html>
