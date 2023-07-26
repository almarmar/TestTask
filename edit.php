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

        // Если форма была отправлена, обновляем данные в базе данных
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $name = $_POST["name"];
            $description = $_POST["description"];
            $img = $_POST["img"];

            // Подготовка и выполнение SQL запроса на обновление 
            $sql = "UPDATE list SET name='$name', description='$description', img='$img' WHERE id='$project_id'";
            if ($conn->query($sql) === TRUE) {
                echo "Данные успешно обновлены.";
            } else {
                echo "Ошибка при обновлении данных: " . $conn->error;
            }
        }

        // Выборка детальной информации о проекте из таблицы 
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
            $img = "Ссылка на изображение не найдена";
        }
    } else {
        $name = "Проект не выбран";
        $description = "Выберите проект из списка";
        $img = "Выберите проект из списка";
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
                <div class="tm-right-column">
                    <div class="tm-content-div">
                        <section id="contact" class="tm-section">
                            <a href="information.php?id=<?php echo $project_id; ?>" class="tm-nav-item-link">Вернуться</a>
                            <header><h2 class="tm-blue-text tm-section-title tm-margin-b-30">Редактировать</h2></header>
                            <div class="row">
                                <div class="col-lg-6">
                                    <form action="edit.php?id=<?php echo $project_id; ?>" method="post" class="contact-form">
                                        <div class="form-group">
                                            <input type="text" id="name" name="name" value="<?php echo $name; ?>" class="form-control" required/>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" id="img" name="img" value="<?php echo $img; ?>" class="form-control" required/>
                                        </div>
                                        <div class="form-group">
                                            <textarea id="contact_message" name="description" id="description" class="form-control" rows="9" placeholder="Описание"><?php echo $description; ?></textarea>
                                        </div>                                            
                                        <button type="submit" class="float-right tm-button">Изменить</button>
                                    </form>    
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>