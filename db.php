<?php
// Параметры подключения к базе данных
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "project";

// Подключение к базе данных
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка соединения
if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}

// SQL-запрос для добавления данных в таблицу "list"
$sql = "INSERT INTO list (id, name, description, img) VALUES
    ('6', Кактус-базар', 'У нас собраны лучшие экземпляры кактусов и суккулентов из Италии, Голландии, Дании и Тайланда. Наличие отмечено на фото, все растения обработаны и готовы к продаже.', 'https://s0.rbk.ru/v6_top_pics/media/img/3/44/756581541627443.png'),
    ('7', 'Косметика Mixit', 'MIXIT – российский бренд инновационной косметики с безопасными составами и их доказанной эффективностью', 'https://www.glambox.ru/images/blog/2019/07/05/mixit700.jpg'),
    ('9', 'КотоКафе', 'Тёплые места в столице - котокафе Котики и Люди. Мы занимаемся бесплатным пристройством временно бездомных кошек', 'https://imgtest.mir24.tv/uploaded/images/crops/2018/August/870x489_10x21_detail_crop_bce1500316dfb0f29b050ce03beaa9a34168786e51f873a35e2d725683c65a3d.jpg'),
    ('10', 'Чайный магазин', 'Китайский чай напрямую с плантаций. Сами закупаем свежий чай и обрабатываем на производстве в Китае', 'https://biznesprost.com/wp-content/uploads/2016/07/kak-otkryt-chajnyj-magazin.jpg')";

if ($conn->query($sql) === TRUE) {
    echo "Данные успешно добавлены в таблицу 'list'!";
} else {
    echo "Ошибка при добавлении данных: " . $conn->error;
}

// Закрытие соединения
$conn->close();
?>