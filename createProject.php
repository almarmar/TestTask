<?php
    $name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
    $description = filter_var(trim($_POST['description']), FILTER_SANITIZE_STRING);
    $img = filter_var(trim($_POST['img']), FILTER_SANITIZE_STRING);

    $mysql = new mysqli('localhost','root','root','project');
    $mysql->query("INSERT INTO `list` (`Name`, `Description`, `Img`) 
    VALUES ('$name', '$description', '$img')");

    $mysql->close();
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
    <title>Предложите свой проект!</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="tm-left-right-container">
                <div class="tm-right-column">
                    <div class="tm-content-div">
                        <section id="contact" class="tm-section">
                            <header><h2 class="tm-blue-text tm-section-title tm-margin-b-30">Создать</h2></header>
                            <div class="row">
                                <div class="col-lg-6">
                                <a href="index.php" class="tm-nav-item-link">Вернуться к галерее проектов</a>
                                    <form action="#contact" method="post" class="contact-form">
                                        <div class="form-group">
                                            <input type="text" id="name" name="name" class="form-control" placeholder="Название"  required/>
                                        </div>
                                        <div class="form-group">
                                            <textarea id="description" name="description" class="form-control" rows="9" placeholder="Описание" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" id="img" name="img" class="form-control" placeholder="Ссылка на картинку"  required/>
                                        </div>                                            
                                        <button type="submit" class="float-right tm-button">Отправить</button>
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