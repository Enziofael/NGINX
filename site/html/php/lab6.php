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
                echo "<h1>5. Вычисление периметра прямоугольника</h1>";

                $a = 6;
                $b = 8;
                $p = 2 * ($a + $b);
                echo "<p>Периметр прямоугольника со сторонами $a и $b равен $p</p>";
            ?>
        </div>

        <div class="fieldset-card" style="justify-content: space-around; display: flex; flex-direction: column;">
            <?php
                // Задание 6
                echo "<h1>6. Курсив</h1>";

                echo "<p>" . "<i>Этот текст написан курсивом с помощью тега i.</i><br>" . "</p>";

            ?>
        </div>

        <div class="fieldset-card" style="justify-content: space-around; display: flex; flex-direction: column;">
            <?php
                // Задание 7
                echo "<h1>7. Цикл <code>for</code> и <code>&ltbr&gt</code></h1>";

                echo "<h2>" . "Числа от 1 до 9:" . "</h2>";
                for ($i = 1; $i <= 9; $i++) {
                    echo $i . "<br>";
                }
                echo "</p>";
            ?>
        </div>

        <div class="fieldset-card" style="justify-content: space-around; display: flex; flex-direction: column;">
            <?php
                // Задание 8
                echo "<h1>8. Последний символ строки</h1>";

                $string = "Hello, world!";
                $lastChar = $string[strlen($string) - 1];
                echo "<p>" . "Последний символ строки '$string' — '$lastChar'" . "</p>";
            ?>
        </div>

        <div class="fieldset-card" style="justify-content: space-around; display: flex; flex-direction: column;">
            <?php
                // Задание 9
                echo "<h1>9. Сокращенные операции</h1>";
                
                $num = 47;
                $num += 7;
                $num -= 18;
                $num *= 10;
                $num /= 15;
                echo "<p>Результат сокращённых операций: $num</p>";


            ?>
        </div>

        <div class="fieldset-card" style="justify-content: space-around; display: flex; flex-direction: column;">
            <?php
                // Задание 10
                echo "<h1>10. Вычиcление секунд в сутках</h1>";

                $secondsInDay = 24 * 60 * 60;
                echo "<p>В сутках $secondsInDay секунд.</p>";

                /* или: 
                $secondsInMinute = 60;
                $minutesInHour = 60;
                $hoursInDay = 24;
                
                $secondsInDay = $hoursInDay * $minutesInHour * $secondsInMinute;
                echo "<p>В сутках $secondsInDay секунд.</p>";
                */
            ?>
        </div>
            <?php




        



        // Задание 5: Периметр прямоугольника


        // Задание 6: Курсивный текст

        // Задание 7: Столбец чисел от 1 до 9


        // Задание 8: Последний символ строки


        // Задание 10: Количество секунд в сутках

        ?>
    </div>
    <!-- КОНЕЦ КОНТЕНТА -->
</body>
</html>