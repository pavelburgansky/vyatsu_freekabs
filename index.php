<!doctype html>
<html lang="ru">
<meta charset="utf-8">
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> 
 <style>
    body {
    background-color: #D4E6B3;
    font-family: Verdana;
    font-style: normal;
    font-weight: bold;
    text-align: center;
}
html {
    height: 100%;
}
footer {
    position: absolute;
    left: 0;
    right: 0;
    bottom: 0;
    height: 70px;
    color: white;
    background-color: #007196;
    text-align: center;
    vertical-align: center;
}
select {
    width: 120px; /* Ширина списка в пикселах */
}

 </style>
 <title> freecabs</title>
</head>

<body topmargin="50px"
      leftmargin="100px" bottommargin="100px" rightmargin="100px" bgcolor="#00FFFF">
<header>
    <!-- <img src="pictures/logo.jpg" width="100px" align="left"> -->
    <h1 align="center" style="color:green" face="Arial"> Поиск свободных аудиторий Вятгу</h1>
</header>
<main>
<div class="col-md-7 offset-md-4">
<form action="index1.php" method="post">
  <div class="form-group row">
    <label for="inputPassword" class="col-sm-3 col-form-label">Корпус</label>
    <select name="корпус" class="form-control" id="exampleFormControlSelect1" style="width:60px">
    <option>1</option>
    <option>2</option>
    <option>3</option>
    <option>4</option>
    <option>5</option>
    <option>6</option>
    </select>
    </div>
   <div class="form-group row">
    <label for="inputPassword" class="col-sm-3 col-form-label">Дата</label>
    <label for="date" class="control-label col-xs-2"></label>
     <div class="col-xs-10">
     <input type="date" class="form-control" id="date" name="calendar" placeholder="введите дату" style="width:150px">
    </div>
  </div>
   <div class="form-group row">
    <label for="inputPassword" class="col-sm-3 col-form-label">Мест в аудитории от</label>
    <label for="date" class="control-label col-xs-2"></label>
     <div class="col-xs-10">
     <input type="number" name ="number_of_seats" min="1" max="180" step="1" class="form-control"/>
    </div>
  </div>
   <div class="form-group row">
    <label for="inputPassword" class="col-sm-3 col-form-label">Выберете пары</label>
  <div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" name="para[0]" value="1 пара">
  <label class="form-check-label" for="inlineCheckbox1">1</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" name="para[1]" value="2 пара">
  <label class="form-check-label" for="inlineCheckbox2">2</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" name="para[2]" value="3 пара">
  <label class="form-check-label" for="inlineCheckbox1">3</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" name="para[3]" value="4 пара">
  <label class="form-check-label" for="inlineCheckbox2">4</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" name="para[4]" value="5 пара">
  <label class="form-check-label" for="inlineCheckbox1">5</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" name="para[5]" value="6 пара">
  <label class="form-check-label" for="inlineCheckbox2">6</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" name="para[6]" value="7 пара">
  <label class="form-check-label" for="inlineCheckbox1">7</label>
</div>
</div>

<div class="form-group row">
    <label for="inputPassword" class="col-sm-3 col-form-label">Проектор</label>
    <div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
  <label class="form-check-label" for="inlineCheckbox1"></label>
</div>
  </div>

<div class="form-group row">
    <label for="inputPassword" class="col-sm-3 col-form-label">Компьютерный класс</label>
    <div class="form-check form-check-inline">
  <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
  <label class="form-check-label" for="inlineCheckbox1"></label>
</div>
  </div>
  <div class="form-group row">
    <label for="inputPassword" class="col-sm-3 col-form-label"></label>
<button type="submit" class="btn btn-primary">Найти!</button>   
</form>
</div>
</main>
</body>
</html>
