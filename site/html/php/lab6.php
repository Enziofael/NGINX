<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab6 | Переменные в PHP</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- НАВИГАЦИЯ ВСТАВИТСЯ СКРИПТОМ -->
    <script src="js/navigation.js"></script>
    <div class="my-content">

        <div class="fieldset-card" style="justify-content: space-around; display: flex; flex-direction: column;">
            <?php
                // Задание 1
                echo "<h1>1. Типы переменных</h1>";

                $str = "Привет, мир!";
                $num = 68;
                $bool = true;
                $empty = null;

                
                echo "<p>\$str = " . var_export($str, true) . " (" . gettype($str) . ")</p>";
                echo "<p>\$num = " . var_export($num, true) . " (" . gettype($num) . ")</p>";
                echo "<p>\$bool = " . var_export($bool, true) . " (" . gettype($bool) . ")</p>";
                echo "<p>\$empty = " . var_export($empty, true) . " (" . gettype($empty) . ")</p>";
                echo "</ul>";
            ?>
        </div>

        <div class="fieldset-card" style="justify-content: space-around; display: flex; flex-direction: column;">
            <?php
                // Задание 2    
                echo "<h1>2. Вывод заголовка</h1>";

                $surname = 'Другашев';
                echo "<h2>$surname</h2>"; //заменил на h2 т.к. h1 использую для нумерации
            ?>
        </div>

        <div class="fieldset-card" style="justify-content: space-around; display: flex; flex-direction: column;">
            <?php
                // Задание 3

                echo "<h1>3. Ветвления</h1>";
                
                $condition = true;
                echo "<h2>\$condition = " . var_export($condition, true) . " (" . gettype($condition) . "):</h2>";

                if ($condition) {
                    echo "<p>Это длинный текст из трёх-пяти предложений. PHP широко используется для веб-разработки. Он позволяет создавать динамические страницы. Изначально PHP расшифровывался как Personal Home Page.</p>";
                } else {
                    echo '<img src="/image/cat-ultrakill.gif" alt="Гифка" style="max-width:100%;">';
                }

                $condition = false;
                echo "<h2>\$condition = " . var_export($condition, true) . " (" . gettype($condition) . "):</h2>";

                if ($condition) {
                    echo "<p>Это длинный текст из трёх-пяти предложений. PHP широко используется для веб-разработки. Он позволяет создавать динамические страницы. Изначально PHP расшифровывался как Personal Home Page.</p>";
                } else {
                    echo '<img src="/image/cat-ultrakill.gif" alt="Гифка" style="max-width:20%; max-height:20%; height: auto">';
                }
            ?>
        </div>

        <div class="fieldset-card" style="justify-content: space-around; display: flex; flex-direction: column;">
            <?php
                // Задание 4
                echo "<h1>4. Вычисление площади квадрата</h1>";

                $a = 5;
                $s = $a * $a;
                echo "<p>Площадь квадрата со стороной $a равна $s</p>";
            ?>
        </div>

        <div class="fieldset-card" style="justify-content: space-around; display: flex; flex-direction: column;">
            <?php
                // Задание 5
            ?>
        </div>

        <div class="fieldset-card" style="justify-content: space-around; display: flex; flex-direction: column;">
            <?php
                // Задание 6
            ?>
        </div>

        <div class="fieldset-card" style="justify-content: space-around; display: flex; flex-direction: column;">
            <?php
                // Задание 7
            ?>
        </div>

        <div class="fieldset-card" style="justify-content: space-around; display: flex; flex-direction: column;">
            <?php
                // Задание 8
            ?>
        </div>

        <div class="fieldset-card" style="justify-content: space-around; display: flex; flex-direction: column;">
            <?php
                // Задание 9
            ?>
        </div>

        <div class="fieldset-card" style="justify-content: space-around; display: flex; flex-direction: column;">
            <?php
                // Задание 10
            ?>
        </div>
            <?php




        



        // Задание 5: Периметр прямоугольника
        $a_rect = 6;
        $b_rect = 8;
        $p = 2 * ($a_rect + $b_rect);
        echo "<p>Периметр прямоугольника со сторонами $a_rect и $b_rect равен $p</p>";

        // Задание 6: Курсивный текст
        echo "<i>Этот текст написан курсивом с помощью тега i.</i><br>";

        // Задание 7: Столбец чисел от 1 до 9
        echo "Числа от 1 до 9:<br>";
        for ($i = 1; $i <= 9; $i++) {
            echo $i . "<br>";
        }

        // Задание 8: Последний символ строки
        $string = "Hello, world!";
        $lastChar = $string[strlen($string) - 1];
        echo "<p>Последний символ строки '$string' — '$lastChar'</p>";

        // Задание 9: Сокращённые операции
        $num = 47;
        $num += 7;
        $num -= 18;
        $num *= 10;
        $num /= 15;
        echo "<p>Результат сокращённых операций: $num</p>";

        // Задание 10: Количество секунд в сутках
        $secondsInDay = 24 * 60 * 60;
        echo "<p>В сутках $secondsInDay секунд.</p>";
        ?>
    </div>
    <!-- КОНЕЦ КОНТЕНТА -->
</body>
</html>