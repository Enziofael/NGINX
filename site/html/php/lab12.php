<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab12 | Исключения и даты</title>
    <link rel="stylesheet" href="/style.css">
</head>
<body>
    <script src="/js/navigation.js"></script>

    <div class="my-content">


        <div class="fieldset-card" style="justify-content: space-around; display: flex; flex-direction: column;">
            <?php
            echo "<h1>Другашев</h1>";
            echo "<p><b>Путь к <code>log.txt</code> в контейнере:</b> <code>" . realpath("log.txt") . "</code></p>";
            echo "<p><b>Путь к <code>log.txt</code> в хосте:</b> <code>NGINX/site/html/php/log.txt</code></p>";
            ?>
        </div>
            
        <!-- Часть 1. Обработка исключений -->
        <div class="fieldset-card" style="justify-content: space-around; display: flex; flex-direction: column;">
            <?php
                echo '<h1>Часть 1. Обработка исключений</h1>';

                // 1. Обработчик для ошибки открытия несуществующего файла
                echo '<p><b>1.</b> Попытка открыть несуществующий файл:<br>';
                try {
                    $handle = @fopen('this_file_does_not_exist.txt', 'r');
                    if (!$handle) {
                        throw new Exception('Не удалось открыть файл');
                    }
                    fclose($handle);
                } catch (Exception $ex) {
                    echo 'Ошибка: ' . $ex->getMessage();
                }
                echo '</p>';

                // 2. Обработчик исключения для деления на ноль + запись в log.txt
                echo '<p><b>2.</b> Деление на ноль и запись в log.txt:<br>';
                try {
                    $a = 10;
                    $b = 0;
                    if ($b == 0) {
                        throw new Exception('Деление на ноль');
                    }
                    $c = $a / $b;
                } catch (Exception $ex) {
                    $logMessage = date('Y-m-d H:i:s') . ' | Ошибка: ' . $ex->getMessage() . PHP_EOL;
                    file_put_contents(__DIR__ . '/log.txt', $logMessage, FILE_APPEND);
                    echo 'Произошла ошибка, запись добавлена в log.txt';
                }
                echo '</p>';

                // 3. Обработчик исключения для доступа к несуществующему элементу массива
                echo '<p><b>3.</b> Доступ к несуществующему ключу массива:<br>';
                $countries = ['Spain' => 'Madrid', 'Russia' => 'Moscow'];
                try {
                    $country = 'Germany';
                    if (!array_key_exists($country, $countries)) {
                        throw new Exception("Ключ '$country' не найден в массиве");
                    }
                    echo $countries[$country];
                } catch (Exception $ex) {
                    echo 'Исключение: ' . $ex->getMessage();
                }
                echo '</p>';
            ?>
        </div>

        <!-- Часть 2. Работа с датами -->
        <div class="fieldset-card" style="justify-content: space-around; display: flex; flex-direction: column;">
            <?php
                echo '<h1>Часть 2. Работа с датами</h1>';

                // 1. 15 марта 2025, 10:25:00 в timestamp
                $ts1 = mktime(10, 25, 0, 3, 15, 2025);
                echo "<p><b>1.</b> 15.03.2025 10:25:00 в timestamp: $ts1</p>";

                // 2. Разница между 2 октября 1990, 08:05:59 и текущим моментом
                $past = mktime(8, 5, 59, 10, 2, 1990);
                $diff = time() - $past;
                echo "<p><b>2.</b> Разница в секундах между 02.10.1990 08:05:59 и сейчас: $diff</p>";

                // 3. Текущая дата-время в формате 'Год.месяц.день Час:Минута:Секунда'
                $nowFormatted = date('Y.m.d H:i:s');
                echo "<p><b>3.</b> Текущая дата и время: $nowFormatted</p>";

                // 4. 1 сентября текущего года
                $sept1 = date('Y.m.d', mktime(0, 0, 0, 9, 1));
                echo "<p><b>4.</b> 1 сентября текущего года: $sept1</p>";

                // 5. День недели 2 февраля 2000 года (словом)
                $tsFeb2 = mktime(0, 0, 0, 2, 2, 2000);
                $days = ['воскресенье', 'понедельник', 'вторник', 'среда', 'четверг', 'пятница', 'суббота'];
                $wday = date('w', $tsFeb2);
                echo "<p><b>5.</b> 2 февраля 2000 года был(а): {$days[$wday]}</p>";

                // 6. Текущий день недели и день недели для 12.06.2016, а также день рождения
                $week = ['воскресенье', 'понедельник', 'вторник', 'среда', 'четверг', 'пятница', 'суббота'];
                $todayW = $week[date('w')];
                $birthday = '12.06.2016'; // пример
                $tsBd = mktime(0, 0, 0, 6, 12, 2016);
                $bdW = $week[date('w', $tsBd)];
                echo "<p><b>6.</b> Сегодня: $todayW. 12.06.2016 был(а): $bdW. В свой день рождения (укажите свою дату) был(а): ... (замените дату в коде)</p>";

                // 7. Сравнение двух дат (без формы, демонстрация с переменными)
                $date1 = '2025-12-31';
                $date2 = '2024-01-01';
                $ts1 = strtotime($date1);
                $ts2 = strtotime($date2);
                $greater = ($ts1 > $ts2) ? $date1 : $date2;
                echo "<p><b>7.</b> Сравнение дат '$date1' и '$date2': больше — $greater</p>";

                // 8. Преобразование даты из 'Год-месяц-день' в 'день-месяц-год'
                $inputDate = '2026-04-21';
                $converted = date('d-m-Y', strtotime($inputDate));
                echo "<p><b>8.</b> '$inputDate' → '$converted'</p>";

                // 9. Прибавление и вычитание из даты '2000.02.03'
                $baseDate = '2000.02.03';
                $dateObj = date_create(str_replace('.', '-', $baseDate));
                echo "<p><b>9.</b> Исходная дата: $baseDate<br>";
                date_modify($dateObj, '+2 days +1 month +3 days +1 year');
                echo 'После прибавления 2 дня, 1 месяц, 3 дня, 1 год: ' . date_format($dateObj, 'd.m.Y') . '<br>';
                // Сбросим объект
                $dateObj = date_create(str_replace('.', '-', $baseDate));
                date_modify($dateObj, '-3 days');
                echo 'После вычитания 3 дня: ' . date_format($dateObj, 'd.m.Y') . '</p>';

                // 10. Сколько дней осталось до Нового Года
                $now = time();
                $newYear = mktime(0, 0, 0, 1, 1, date('Y') + 1);
                $daysLeft = ceil(($newYear - $now) / 86400);
                echo "<p><b>10.</b> До Нового Года осталось примерно $daysLeft дней.</p>";
            ?>
        </div>
    </div>
</body>
</html>