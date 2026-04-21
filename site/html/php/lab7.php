<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab7 | условия и функции</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- НАВИГАЦИЯ ВСТАВИТСЯ СКРИПТОМ -->
    <script src="js/navigation.js"></script>
    <div class="my-content">

        <!-- Задание 1 -->
        <div class="fieldset-card" style="justify-content: space-around; display: flex; flex-direction: column;">
            <?php
                echo "<h1>1. Проценты от числа</h1>";

                function someFun($a, $b) {
                    return 0.4 * $a + 0.84 * $b;
                }

                $num1 = 100;
                $num2 = 50;
                echo "<p>40% от $num1 + 84% от $num2 = " . someFun($num1, $num2) . "</p>";
            ?>
        </div>

        <!-- Задание 2 -->
        <div class="fieldset-card" style="justify-content: space-around; display: flex; flex-direction: column;">
            <?php
                echo "<h1>2. Ветвление: увеличить и уменьшить</h1>";

                function someFun2($a) {
                    $res = $a;
                    if ($res > 10) {
                    $res += 100;
                    } else {
                        $res -= 30;
                    }
                    return $res;
                }

                $number = 15;
                echo "<code>\$number = " . var_export($number, true) . " (" . gettype($number) . "):</code>";
                echo "<p>Число " . $number . " -> результат: " . someFun2($number) . "</p>";

                $number = 5;
                echo "<code>\$number = " . var_export($number, true) . " (" . gettype($number) . "):</code>";
                echo "<p>Число " . $number . " -> результат: " . someFun2($number) . "</p>";
            ?>
        </div>

        <!-- Задание 3 -->
        <div class="fieldset-card" style="justify-content: space-around; display: flex; flex-direction: column;">
            <?php
                echo "<h1>3. Ветвление: четное/нечетное</h1>";

                function someFun3($a) {
                    $res = $a;
                    if ($res % 2 == 0) {
                        $res /= 2;
                    } else {
                        $res *= 3;
                    }
                    return $res;
                }

                $number = 7;
                echo "<code>\$number = " . var_export($number, true) . " (" . gettype($number) . "):</code>";
                echo "<p>$number -> " . someFun3($number) . "</p>";

                $number = 6;
                echo "<code>\$number = " . var_export($number, true) . " (" . gettype($number) . "):</code>";
                echo "<p>$number -> " . someFun3($number) . "</p>";
            ?>
        </div>

        <!-- Задание 4 -->
        <div class="fieldset-card" style="justify-content: space-around; display: flex; flex-direction: column;">
            <?php
                echo "<h1>4. </h1>";

                function someFun4($a) {
                    if ($a >= 0 && $a < 15) {
                        $quarter = "первая";
                    } elseif ($a < 30) {
                        $quarter = "вторая";
                    } elseif ($a < 45) {
                        $quarter = "третья";
                    } else {
                        $quarter = "четвёртая";
                    }
                    return $quarter;
                }

                $min = 3;
                echo "<code>\$min = " . var_export($min, true) . " (" . gettype($min) . "):</code>";
                echo "<p>$min минут — " . someFun4($min) . " четверть часа.</p>";
                
                $min = 17;
                echo "<code>\$min = " . var_export($min, true) . " (" . gettype($min) . "):</code>";
                echo "<p>$min минут — " . someFun4($min) . " четверть часа.</p>";

                $min = 31;
                echo "<code>\$min = " . var_export($min, true) . " (" . gettype($min) . "):</code>";
                echo "<p>$min минут — " . someFun4($min) . " четверть часа.</p>";

                $min = 59;
                echo "<code>\$min = " . var_export($min, true) . " (" . gettype($min) . "):</code>";
                echo "<p>$min минут — " . someFun4($min) . " четверть часа.</p>";
            ?>
        </div>

        <!-- Задание 5 -->
        <div class="fieldset-card" style="justify-content: space-around; display: flex; flex-direction: column;">
            <?php
                echo "<h1>5. Ветвление: Время года месяца</h1>";

                function someFun5($a) {
                    switch ($a) {
                        case 12:
                        case 1:
                        case 2:
                            $season = "зима";
                            break;
                        case 3:
                        case 4:
                        case 5:
                            $season = "весна";
                            break;
                        case 6:
                        case 7:
                        case 8:
                            $season = "лето";
                            break;
                        case 9:
                        case 10:
                        case 11:
                            $season = "осень";
                            break;
                        default:
                            $season = "некорректный месяц";
                    }
                    return $season;
                }

                $month = 13;
                echo "<code>\$month = " . var_export($month, true) . " (" . gettype($month) . "):</code>";
                echo "<p>Месяц $month - " . someFun5($month) , "</p>";

                $month = 1;
                echo "<code>\$month = " . var_export($month, true) . " (" . gettype($month) . "):</code>";
                echo "<p>Месяц $month - " . someFun5($month) , "</p>";

                $month = 5;
                echo "<code>\$month = " . var_export($month, true) . " (" . gettype($month) . "):</code>";
                echo "<p>Месяц $month - " . someFun5($month) , "</p>";

                $month = 6;
                echo "<code>\$month = " . var_export($month, true) . " (" . gettype($month) . "):</code>";
                echo "<p>Месяц $month - " . someFun5($month) , "</p>";

                $month = 10;
                echo "<code>\$month = " . var_export($month, true) . " (" . gettype($month) . "):</code>";
                echo "<p>Месяц $month - " . someFun5($month) , "</p>";
            ?>

        </div>

        <!-- Задание 6 -->
        <div class="fieldset-card" style="justify-content: space-around; display: flex; flex-direction: column;">
            <?php
                echo "<h1>6. Ветвление: Проверка переменной \$a</h1>";
                
                function someFun6($arr) {
                    foreach ($arr as $a) {
                        $original_a = $a;
                        if ($a == 0 || $a == 2) {
                            $a += 7;
                        } else {
                            $a /= 10;
                        }
                        echo "<p>\$a = $original_a -> результат: $a</p>";
                    }
                }

                $testValues = [5, 0, -3, 2];
                someFun6($testValues);
            ?>
        </div>

        <!-- Задание 7 -->
        <div class="fieldset-card" style="justify-content: space-around; display: flex; flex-direction: column;">
            <?php
                echo "<h1>7. Секунды -> дни, часы, минуты, секунды</h1>";
                
                $totalSeconds = 100000;
                
                $secondsInMinute = 60;
                $minutesInHour = 60;
                $hoursInDay = 24;

                $secondsInHour = $secondsInMinute * $minutesInHour;
                $minutesInDay = $minutesInHour * $hoursInDay;

                $secondsInDay = $secondsInMinute * $minutesInDay;

                $days = floor($totalSeconds / $secondsInDay);
                $hours = floor($totalSeconds % $secondsInDay / $secondsInHour);
                $minutes = floor($totalSeconds % $secondsInDay % $secondsInHour / $secondsInMinute);
                $seconds = $totalSeconds % $secondsInDay % $secondsInHour % $secondsInMinute;
                echo "<p>$totalSeconds секунд = $days дн. $hours ч. $minutes мин. $seconds сек.</p>";

                /* или
                
                echo "<h1>7. Секунды -> дни и время</h1>";

                $totalSeconds = 100000;
                $days = floor($totalSeconds / 86400);
                $hours = floor(($totalSeconds % 86400) / 3600);
                $minutes = floor(($totalSeconds % 3600) / 60);
                $seconds = $totalSeconds % 60;
                echo "<p>$totalSeconds секунд = $days дн. $hours ч. $minutes мин. $seconds сек.</p>";

                */
            ?>
        </div>

        <!-- Задание 8 -->
        <div class="fieldset-card" style="justify-content: space-around; display: flex; flex-direction: column;">
            <?php
                echo "<h1>8. Ветвление: я уже фиг знает как это назвать</h1>";
                
                function someFun8($a) {
                    if ($a >= 50) {
                        $res = $a * $a;
                    } elseif ($a > 10 && $a < 30) {
                        $res = 0;
                    } else {
                        $res = "Ошибка";
                    }
                    return $res;
                }

                $number = 25;
                echo "<p>Число $number -> " . someFun8($number) . "</p>";

                $number = 51;
                echo "<p>Число $number -> " . someFun8($number) . "</p>";

                $number = 31;
                echo "<p>Число $number -> " . someFun8($number) . "</p>";
                
            ?>
        </div>

        <!-- Задание 9 -->
        <div class="fieldset-card" style="justify-content: space-around; display: flex; flex-direction: column;">
            <?php
                echo "<h1>9. Функция возведения в квадрат</h1>";

                function square($x) {
                    return $x * $x;
                }

                $sq = square(9);
                echo "<p>square(9) = $sq</p>";
            ?>
        </div>

        <!-- Задание 10 -->
        <div class="fieldset-card" style="justify-content: space-around; display: flex; flex-direction: column;">
            <?php
                echo "<h1>10. Функция суммы</h1>";

                function sum($x, $y) {
                    return $x + $y;
                }
                $s = sum(12, 7);
                echo "<p>sum(12, 7) = $s</p>";
            ?>
        </div>

        <!-- Задание 11 -->
        <div class="fieldset-card" style="justify-content: space-around; display: flex; flex-direction: column;">
            <?php
                echo "<h1>11. Функция вычесть (налоги) поделить (платежи за кредит)</h1>";

                function subtractAndDivide($a, $b, $c) {
                    if ($c == 0) return "деление на ноль";
                    return ($a - $b) / $c;
                }
                $res11 = subtractAndDivide(20, 5, 3);
                echo "<p>(20 - 5) / 3 = $res11</p>";
            ?>
        </div>

        <!-- Задание 12 -->
        <div class="fieldset-card" style="justify-content: space-around; display: flex; flex-direction: column;">
            <?php
                echo "<h1>12. Функция Дай день недели</h1>";

                function getDayOfWeek($num) {
                    $days = [
                        1 => "понедельник",
                        2 => "вторник",
                        3 => "среда",
                        4 => "четверг",
                        5 => "пятница",
                        6 => "суббота",
                        7 => "воскресенье"
                    ];
                    return $days[$num] ?? "неверный номер";
                }
                $dayNum = 3;
                $dayName = getDayOfWeek($dayNum);
                echo "<p>День недели номер $dayNum — $dayName.</p>";
            ?>
        </div>

        
    </div>
</body>
</html>