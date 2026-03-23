<?php
$content = '<h1 style="text-align: center;">Привет :P</h1><p style="text-align: center;">Я пыха</p>';
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab1 | HTTP Тест</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- СКРИПТ ВСТАВИТ СЮДА НАВИГАЦИЮ -->
    <script src="js/navigation.js"></script>
    
    <!-- ВАШ КОНТЕНТ (ПИШЕТЕ САМИ В DIV) -->
    <div class="my-content">
        <?php echo $content; ?>
    </div>
    <!-- КОНЕЦ ВАШЕГО КОНТЕНТА -->
</body>
</html>