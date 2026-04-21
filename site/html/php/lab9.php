<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab9 | Работа с массивами</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- НАВИГАЦИЯ ВСТАВИТСЯ СКРИПТОМ -->
    <script src="js/navigation.js"></script>
    
    <div class="my-content">

        <?php 
            function print_arr(array $arr) {
                echo "[";
                echo implode(", ", $arr);
                echo "]";
            }
            function print_karr(array $arr) {
                $res = [];
                foreach ($arr as $key => $value) {
                    $res[] = "$key -> $value";
                }
                echo "[";
                echo implode(", ", $res);
                echo "]";
            }
        ?>

        <!-- Задание 1 -->
        <div class="fieldset-card" style="justify-content: space-around; display: flex; flex-direction: column;">
            <?php
                echo "<h1>1. Приведение в верхний регистр</h1><p>";

                $arr = ['a', 'b', 'c', 'd', 'e'];
                $result = array_map('strtoupper', $arr);
                
                print_arr($arr);
                echo " -> ";
                print_arr($result);
                echo "</p>";
                
            ?>
        </div>

        <!-- Задание 2 -->
        <div class="fieldset-card" style="justify-content: space-around; display: flex; flex-direction: column;">
            <?php
                echo "<h1>2. Последний элемент массива</h1>";

                $arr = [10, 20, 30, 40, 50];
                $lastIndex = count($arr) - 1;

                echo "<p>";
                print_arr($arr);
                echo "<br> last = " . $arr[$lastIndex] . "</p>";
            ?>
        </div>

        <!-- Задание 3 -->
        <div class="fieldset-card" style="justify-content: space-around; display: flex; flex-direction: column;">
            <?php
                echo "<h1>3. Проверка наличия числа 3</h1><p>";
                
                $arr = [1, 2, 3, 4, 5];
                print_arr($arr);

                if (in_array(3, $arr)) {
                    echo "<br>Элемент 3 найден</p>";
                } else {
                    echo "<br>Элемент 3 не найден</p>";
                }
            ?>
        </div>

        <!-- Задание 4 -->
        <div class="fieldset-card" style="justify-content: space-around; display: flex; flex-direction: column;">
            <?php
                echo "<h1>4. Слияние массивов</h1><p>";

                $arr1 = [1, 2, 3];
                $arr2 = ['a', 'b', 'c'];
                $result = array_merge($arr1, $arr2);
                
                print_arr($arr1);
                echo " + ";
                print_arr($arr2);
                echo " = ";
                print_arr($result);
                
            ?>
        </div>

        <!-- Задание 5 -->
        <div class="fieldset-card" style="justify-content: space-around; display: flex; flex-direction: column;">
            <?php
                echo "<h1>5. Срез массива</h1>";

                $arr = [1, 2, 3, 4, 5];
                $result = array_slice($arr, 1, 3);
                
                echo "<p>\$arr = ";
                print_arr($arr);
                echo "<br>\$result = array_slice(\$arr, 1, 3) = ";
                print_arr($result);
                echo "</p>";

            ?>
        </div>

        <!-- Задание 6 -->
        <div class="fieldset-card" style="justify-content: space-around; display: flex; flex-direction: column;">
            <?php
                echo "<h1>6. Получение ключей и значений</h1><p>";

                $arr = ['a' => 1, 'b' => 2, 'c' => 3];
                $keys = array_keys($arr);
                $values = array_values($arr);

                echo "Ключи: ";
                print_arr($keys);
                echo "<br>Значения: ";
                print_arr($values);
                echo "</p>";
            ?>
        </div>

        <!-- Задание 7 -->
        <div class="fieldset-card" style="justify-content: space-around; display: flex; flex-direction: column;">
            <?php
                echo "<h1>7. Присвоение значений к ключам</h1>";

                $keys = ['a', 'b', 'c'];
                $values = [1, 2, 3];
                $result = array_combine($keys, $values);
                echo "<p>Ключи: ";                
                print_arr($keys);
                echo "<br>Значения: ";
                print_arr($values);
                echo "<br>Результат: ";
                print_karr($result);
                echo "</p>";
            ?>
        </div>

        <!-- Задание 8 -->
        <div class="fieldset-card" style="justify-content: space-around; display: flex; flex-direction: column;">
            <?php
                echo "<h1>8. Позиция первого элемента</h1>";

                $arr = ['a', '-', 'b', '-', 'c', '-', 'd'];
                $pos = array_search('-', $arr);
                echo "<p>Массив: ";
                print_arr($arr);
                echo "<br>Позиция первого '-': $pos</p>";
            ?>
        </div>

        <!-- Задание 9 -->
        <div class="fieldset-card" style="justify-content: space-around; display: flex; flex-direction: column;">
            <?php
                echo "<h1>9. Сортировка</h1><p>";

                $arr = [3 => 3, 1 => 2, 2 => 4];
                echo "Массив: ";
                print_arr($arr);

                // asort - по значениям, сохраняя ключи
                asort($arr);
                echo "<br>asort (по возрастанию значений): ";
                print_arr($arr);

                // arsort - по значениям в обратном порядке
                $arr = [3 => 3, 1 => 2, 2 => 4];
                arsort($arr);
                echo "<br>arsort (по убыванию значений): ";
                print_arr($arr);

                // ksort - по ключам в возрастающем порядке
                $arr = [3 => 3, 1 => 2, 2 => 4];
                ksort($arr);
                echo "<br>ksort (по возрастанию ключей): ";
                print_arr($arr);

                // krsort - по ключам в убывающем порядке
                $arr = [3 => 3, 1 => 2, 2 => 4];
                krsort($arr);
                echo "<br>krsort (по убыванию ключей): ";
                print_arr($arr);

                echo "</p>"
            ?>
        </div>

        <!-- Задание 10 -->
        <div class="fieldset-card" style="justify-content: space-around; display: flex; flex-direction: column;">
            <?php
                echo "<h1>10. Сумма цифр в строке</h1>";

                $str = '1234567890';
                echo "<p>Строка: $str<br>";
                $digits = str_split($str);
                $sum = array_sum($digits);
                echo "Сумма цифр: $sum</p>";
            ?>
        </div>
        
        <!-- Задание 11 -->
        <div class="fieldset-card" style="justify-content: space-around; display: flex; flex-direction: column;">
            <?php
                echo "<h1>11. Заполнение массива символом</h1><p>";

                $arr = array_fill(0, 10, 'x');
                print_arr($arr);
                echo "</p>";
            ?>
        </div>

        <!-- Задание 12 -->
        <div class="fieldset-card" style="justify-content: space-around; display: flex; flex-direction: column;">
            <?php
                echo "<h1>12. Пересечение множеств</h1>";
                
                $arr1 = [1, 2, 3, 4, 5];
                $arr2 = [3, 4, 5, 6, 7];
                $result = array_intersect($arr1, $arr2);
                echo "<p>Массив 1: ";
                print_arr($arr1);
                echo "<br>Массив 2: ";
                print_arr($arr2);
                echo "<br>Пересечение: ";
                print_arr($result);
                echo "</p>";
            ?>
        </div>

    </div>
</body>
</html>