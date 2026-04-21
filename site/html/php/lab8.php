<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab8 | замыкания и стрелочки :3</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- НАВИГАЦИЯ ВСТАВИТСЯ СКРИПТОМ -->
    <script src="js/navigation.js"></script>
    <div class="my-content">

        <!-- Задание 1 -->
        <div class="fieldset-card" style="justify-content: space-around; display: flex; flex-direction: column;">
            <?php
                echo "<h1>1. Функция умножения </h1>";

                function mul($a, $b) {
                    return $a * $b;
                } 

                $x = 2;
                $y = 13;
                echo "<p>
                    \$x = $x <br>
                    \$y = $y <br>" . 
                    "mul(\$x, \$y) = " . mul($x, $y) . "</p>";
            ?>
        </div>

        <!-- Задание 2 -->
        <div class="fieldset-card" style="justify-content: space-around; display: flex; flex-direction: column;">
            <?php
                echo "<h1>2. Передача параметров в функцию и в замыкание с use</h1>";
                
                // Вариант 1: обычная передача параметров
                function m_v1($a, $b) {
                    return mul($a, $b);
                }

                // Вариант 2: замыкание с use
                $mul = function($a, $b) { return $a * $b; };
                $m_v2 = function($a, $b) use ($mul) {
                    return $mul($a, $b);
                };

                $x = 4;
                $y = 5;
                echo "<p>
                    \$x = $x <br>
                    \$y = $y <br>" . 
                    "m_v1(\$x, \$y) = " . m_v1($x, $y) . "<br>" .
                    "\$m_v2(\$x, \$y) = " . $m_v2($x, $y) . "</p>";
            ?>
        </div>
        
        <!-- Задание 3 -->
        <div class="fieldset-card" style="justify-content: space-around; display: flex; flex-direction: column;">
            <?php
                echo "<h1>3. <code>Callable</code> как параметр функции</h1>";

                function operation($m, $n, callable $o) {
                    return $o($m, $n);
                }

                $a = 2;
                $b = 3;
                $res = operation($a, $b, $mul);

                echo "<p>
                \$a = $a <br> 
                \$b = $b <br>
                operation(\$a, \$b, \$mul) = " . operation($a, $b, $mul) . "</p>";
            ?>
        </div>
        
        <!-- Задание 4 -->
        <div class="fieldset-card" style="justify-content: space-around; display: flex; flex-direction: column;">
            <?php
                echo "<h1>4. Кастомный <code>array_map</code> с удвояющей функцией</h1>";

                function array_map_custom(callable $fn, array $arr) {
                    $result = [];
                    foreach ($arr as $value) {
                        $result[] = $fn($value);
                    }
                    return $result;
                }

                $testArray = [1, 2, 3, 4, 5];

                $mappedArray = array_map_custom(function($n) {
                    return $n * 2;
                }, $testArray);
                
                for ($i = 0; $i < count($testArray); $i++) {
                    echo "<p>" . $testArray[$i] . " -> " . $mappedArray[$i] . "</p>";
                }
            ?>
        </div>
        
        <!-- Задание 5 -->
        <div class="fieldset-card" style="justify-content: space-around; display: flex; flex-direction: column;">
            <?php
                echo "<h1>5. Пароль от 5 до 10 символов?</h1>";

                function func1($pwd) {
                    if (strlen($pwd) > 5 && strlen($pwd) < 10) {
                        echo "Пароль подходит";
                    } else {
                        echo "Нужно придумать другой пароль";
                    }
                }

                $password = "secret123";
                echo "<p>$password -> ";
                echo func1($password) . "</p>";

                $password = "12345";
                echo "<p>$password -> ";
                echo func1($password) . "</p>";

                $password = "0123456789";
                echo "<p>$password -> ";
                echo func1($password) . "</p>";

            ?>
        </div>
        
        <!-- Задание 6 -->
        <div class="fieldset-card" style="justify-content: space-around; display: flex; flex-direction: column;">
            <?php
                echo "<h1>6. Начинается с \"https://\" или \"http://\"?</h1>";

                function func2($u) {
                    if (strpos($u, "http://") === 0 || strpos($u, "https://") === 0) {
                        echo "да";
                    } else {
                        echo "нет";
                    }
                }

                $url = "https://example.com";
                echo "<p>$url -> ";
                echo func2($url) . "</p>";

                $url = "http://foo.ru";
                echo "<p>$url -> ";
                echo func2($url) . "</p>";

                $url = "ftp://boo.ru";
                echo "<p>$url -> ";
                echo func2($url) . "</p>";
            ?>
        </div>
        
        <!-- Задание 7 -->
        <div class="fieldset-card" style="justify-content: space-around; display: flex; flex-direction: column;">
            <?php
                echo "<h1>7. Это картинка .png или .jpg?</h1>";
                
                function func3($f) {
                    if (str_ends_with($f, ".png") || str_ends_with($f, ".jpg")) {
                        echo "да";
                    } else {
                        echo "нет";
                    }
                }

                $filename = "image.jpg";
                echo "<p>$filename -> ";
                echo func3($filename) . "</p>";

                $filename = "pic.png";
                echo "<p>$filename -> ";
                echo func3($filename) . "</p>";
                
                $filename = "video.mp4";
                echo "<p>$filename -> ";
                echo func3($filename) . "</p>";
            ?>
        </div>
        
        <!-- Задание 8 -->
        <div class="fieldset-card" style="justify-content: space-around; display: flex; flex-direction: column;">
            <?php
                echo "<h1>8. Замена точек на тире</h1>";

                $date = "16.04.2021";

                $newDate = function($d) {
                    return str_replace(".", "-", $d);
                };
                
                echo "<p>$date -> " . $newDate($date) . "</p>";
            ?>
        </div>
        
        <!-- Задание 9 -->
        <div class="fieldset-card" style="justify-content: space-around; display: flex; flex-direction: column;">
            <?php
                echo "<h1>9. Разделение строки на слова строки</h1>";

                $str = "html css php";
                $exploded = function($s) { 
                    return explode(" ", $s);
                };

                foreach ($exploded($str) as $key => $value) {
                    echo "<p> $key -> $value </p>";
                }
            ?>
        </div>
        
        <!-- Задание 10 -->
        <div class="fieldset-card" style="justify-content: space-around; display: flex; flex-direction: column;">
            <?php
                echo "<h1>10. Соединение массива через запятую</h1>";

                $array = ["html", "css", "php"];
                $imploded = function($a) {
                    return implode(", ", $a);
                };

                echo "<p>\"" . $imploded($array) . "\"</p>";
            ?>
        </div>
        
        
    </div>
</body>
</html>