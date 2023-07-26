<?php
  // Подключение к базе данных
  $servername = "localhost";
  $username = "root";
  $password = "root";
  $dbname = "project";

  $conn = new mysqli($servername, $username, $password, $dbname);

  // Проверка подключения
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

  // Выборка названий проектов из таблицы project
  $sql = "SELECT id, name FROM list";
  $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/styles.css" />
  <title>Тестовое задание</title>
</head>
<body>
<div class="container">
  <div
      class="slide"
      style="background-image: url('https://s0.rbk.ru/v6_top_pics/media/img/3/44/756581541627443.png');"
  >
  <a href='information.php?id=6'><h3>Кактус-базар</h3></a>
  </div>
  <div
      class="slide"
      style="
          background-image: url('https://www.glambox.ru/images/blog/2019/07/05/mixit700.jpg');
        "
  >
  <a href='information.php?id=7'><h3>Косметика 'Mixit'</h3></a>
  </div>
  <div
      class="slide"
      style="
          background-image: url('https://imgtest.mir24.tv/uploaded/images/crops/2018/August/870x489_10x21_detail_crop_bce1500316dfb0f29b050ce03beaa9a34168786e51f873a35e2d725683c65a3d.jpg');
        "
  >
  <a href='information.php?id=9'><h3>КотоКафе</h3></a>
  </div>
  <div
      class="slide"
      style="
          background-image: url('https://biznesprost.com/wp-content/uploads/2016/07/kak-otkryt-chajnyj-magazin.jpg');
        "
  >
  <a href='information.php?id=10'><h3>Чайный магазин</h3></a>
  </div>
  <div
      class="slide"
      style="background-image: url('https://media.istockphoto.com/id/1145179413/vector/red-ribbon-with-the-inscription-new-vector-illustration.jpg?s=612x612&w=0&k=20&c=2PHF1pw-BFu8NEHnPQFYYrPWtSXzDO9zWd8z2nQCm0w=');"
  >
  <a href='createProject.php'><h3>Предложить свой проект</h3></a>
  </div>
</div>
<script src="js/app.js"></script>
</body>
</html>
