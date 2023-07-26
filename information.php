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

  // Получение идентификатора проекта из параметра URL
    if (isset($_GET['id'])) {
        $project_id = $_GET['id'];

        // Выборка детальной информации о проекте из таблицы project по идентификатору
        $sql = "SELECT name, description, img FROM list WHERE id = $project_id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $name = $row['name'];
            $description = $row['description'];
            $img = $row['img'];
        } else {
            $name = "Проект не найден";
            $description = "Детальная информация о проекте не доступна";
        }
    } else {
        $name = "Проект не выбран";
        $description = "Выберите проект из списка";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="css/edit.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400">  
    <link rel="stylesheet" href="css/bootstrap.min.css">                                      
    <link rel="stylesheet" href="css/magnific-popup.css">                               
    <link rel="stylesheet" href="css/templatemo-style.css"> 
    <title>Информация</title>
</head>
<body>
    <div class="container">
            <div class="row">
                <div class="tm-left-right-container">
                    <div class="tm-right-column"></div>
                        <section id="about" class="tm-section">
                            <div class="row">                                                                
                                <div class="col-lg-8 col-md-7 col-sm-12 col-xs-12 push-lg-4 push-md-5">
                                    <header>
                                        <h2 class="tm-blue-text tm-section-title tm-margin-b-45"><?php echo $name; ?></h2>
                                    </header>
                                    <p><?php echo $description; ?></p>
                                    <a href="edit.php?id=<?php echo $project_id; ?>" class="tm-button tm-button-wide">Редактировать</a>  
                                </div>

                                <div class="col-lg-4 col-md-5 col-sm-12 col-xs-12 pull-lg-8 pull-md-7 tm-about-img-container">
                                    <img src="<?php echo $img; ?>" alt="Image" class="img-fluid">    
                                </div>  
                            </div>                            
                        </section> 
                    </div> 
                    <nav class="tm-main-nav">
                        <ul class="tm-main-nav-ul">
                            <li class="tm-nav-item">
                                <a href="index.php" class="tm-nav-item-link">Вернуться к галерее проектов</a>
                            </li>
                        </ul>
                    </nav>
                </div> 
            </div> 
        </div> 
</body>
</html>