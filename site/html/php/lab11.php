<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Lab11 | Файловые операции в PHP</title>
    <link rel="stylesheet" href="/style.css">
</head>
<body>
    <script src="/js/navigation.js"></script>
    <div class="my-content">

        <div class="fieldset-card" style="justify-content: space-around; display: flex; flex-direction: column;">
            <?php
                $workDir = __DIR__ . '/lab11_workdir';
                if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cleanup'])) {
                    // Рекурсивное удаление директории
                    function deleteDir($dir) {
                        if (!is_dir($dir)) return false;
                        $items = array_diff(scandir($dir), ['.', '..']);
                        foreach ($items as $item) {
                            $path = $dir . DIRECTORY_SEPARATOR . $item;
                            is_dir($path) ? deleteDir($path) : unlink($path);
                        }
                        return rmdir($dir);
                    }

                    if (deleteDir($workDir)) {
                        $message = '<p style="color: green;">✅ Рабочая папка успешно удалена.</p>';
                    } else {
                        $message = '<p style="color: red;">❌ Не удалось удалить рабочую папку.</p>';
                    }

                    // Выводим сообщение и кнопку возврата
                    echo '<!DOCTYPE html><html><head><meta charset="UTF-8"><title>Очистка</title></head><body style="text-align: center; line-height: 2.5rem;">';
                    echo $message;
                    echo '<p><a href="lab11.php" class="nav-link">← Вернуться к заданию</a></p>';
                    echo '</body></html>';
                    exit;
                }
            ?>

            <h1>Другашев</h1>

            <?php
                // Устанавливаем рабочую директорию для всех операций
                if (!is_dir($workDir)) {
                    mkdir($workDir, 0777, true);
                }
                chdir($workDir);
                echo "<p><b>Рабочая директория контейнера:</b> <code>" . realpath($workDir) . "</code></p>";
                echo "<p><b>Рабочая директория хоста:</b> <code>" . "NGINX/site/html/php/lab11_workdir" . "</code></p>";
            ?>
        </div>

        <!-- Часть 1 -->
        <div class="fieldset-card" style="justify-content: space-around; display: flex; flex-direction: column;">
            <?php
                echo "<h1>Часть 1. Файлы</h1>";

                // 1. Создать test.txt и записать 'Привет, мир!'
                $filename = 'test.txt';
                file_put_contents($filename, 'Привет, мир!');
                echo "<p>1. Файл '$filename' создан с содержимым: " . file_get_contents($filename) . "</p>";

                // 2. Считать данные и вывести
                $content = file_get_contents($filename);
                echo "<p>2. Содержимое '$filename': $content</p>";

                // 3. Переименовать test.txt в mir.txt
                $newName = 'mir.txt';
                rename($filename, $newName);
                echo "<p>3. Файл '$filename' переименован в '$newName'</p>";
                $filename = $newName; // обновляем имя

                // 4. Создать папку folder и переместить туда mir.txt
                $folder = 'folder';
                if (!is_dir($folder)) mkdir($folder);
                $movedPath = $folder . '/' . $filename;
                rename($filename, $movedPath);
                echo "<p>4. Файл '$filename' перемещён в папку '$folder'</p>";

                // 5. Копия mir.txt -> world.txt
                $copyName = 'world.txt';
                copy($movedPath, $folder . '/' . $copyName);
                echo "<p>5. Создана копия '$copyName' в папке '$folder'</p>";

                // 6. Размер файла world.txt в разных единицах
                $sizeBytes = filesize($folder . '/' . $copyName);
                $sizeKB = round($sizeBytes / 1024, 2);
                $sizeMB = round($sizeBytes / (1024 * 1024), 4);
                $sizeGB = round($sizeBytes / (1024 * 1024 * 1024), 8);
                echo "<p>6. Размер '$copyName': $sizeBytes байт = $sizeKB КБ = $sizeMB МБ = $sizeGB ГБ</p>";

                // 7. Удалить world.txt
                unlink($folder . '/' . $copyName);
                echo "<p>7. Файл '$copyName' удалён</p>";

                // 8. Проверить существование world.txt и mir.txt
                $worldExists = file_exists($folder . '/world.txt') ? 'существует' : 'не существует';
                $mirExists = file_exists($folder . '/mir.txt') ? 'существует' : 'не существует';
                echo "<p>8. world.txt $worldExists, mir.txt $mirExists</p>";
            ?>
        </div>


        <!-- Часть 2 -->
        <div class="fieldset-card" style="justify-content: space-around; display: flex; flex-direction: column;">
            <?php
                echo "<h1>Часть 2. Папки и файлы</h1>";

                // 1. Создать папку test
                $testDir = 'test';
                mkdir($testDir);
                echo "<p>1. Папка '$testDir' создана</p>";

                // 2. Переименовать test в www
                $wwwDir = 'www';
                rename($testDir, $wwwDir);
                echo "<p>2. Папка '$testDir' переименована в '$wwwDir'</p>";

                // 3. Удалить папку www
                rmdir($wwwDir);
                echo "<p>3. Папка '$wwwDir' удалена</p>";

                // 4. Создать папки по массиву строк
                $folders = ['images', 'css', 'js', 'uploads'];
                mkdir('test'); // воссоздаём test для выполнения пункта
                foreach ($folders as $f) {
                    mkdir('test/' . $f);
                }
                echo "<p>4. В папке 'test' созданы подпапки: " . implode(', ', $folders) . "</p>";

                // 5. Вывести все jpg файлы из текущей папки
                file_put_contents('test/image1.jpg', '');
                file_put_contents('test/image2.jpg', '');
                file_put_contents('test/readme.txt', '');
                $jpgFiles = glob('test/*.jpg');
                echo "<p>5. Найдены jpg-файлы в папке 'test':<br>";
                if (empty($jpgFiles)) {
                    echo "Нет jpg-файлов.";
                } else {
                    foreach ($jpgFiles as $jpg) {
                        echo basename($jpg) . "<br>";
                    }
                }
                echo "</p>";
            ?>
        </div>
        
        <!-- Кнопка чистки папки -->
        <form method="post" class="temp">
                <input type="hidden" name="cleanup" value="1">
                <button type="submit" class="nav-link" style="background-color: #220000; width: 20rem; height: 2.5rem;">Удалить рабочую папку</button>
        </form>

    </div>
</body>
</html>