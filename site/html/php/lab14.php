<?php
    // 1. Класс Page
    class Page
    {
        private string $name;
        private string $template;

        public function __construct(string $name = 'page', string $template = '<div><p>It is a default page</p></div>')
        {
            $this->name = $name;
            $this->template = $template;
        }

        // 2. Метод render
        public function render(): void
        {
            echo $this->template;
        }

        public function getName(): string
        {
            return $this->name;
        }
    }

    // 3. Класс BlogPage
    class BlogPage extends Page
    {
        public function __construct()
        {
            parent::__construct(
                'blog',
                '
                <div class="blog-card">
                    <h2>Бла бла бла бла бла</h2>
                    <p>Бла бла бла арасака бла бла бла зачем это читать вообще</p>
                    <div class="blog-meta">
                        <span>Не знаю</span>
                        <span>foo bar</span>
                    </div>
                </div>
                <div class="blog-card">
                    <h2>Очень интересная статья</h2>
                    <p>Убей на мое прочтение пару часов и ничего не пойми дельного</p>
                    <div class="blog-meta">
                        <span>Оч классно!</span>
                        <span>#ЧестноЧестно!</span>
                    </div>
                </div>
                <div class="blog-card">
                    <h2>Третья карточка</h2>
                    <p>Потому что <b>бог любит троицу</b></p>
                    <div class="blog-meta">
                        <span>две не оч</span>
                        <span>может и оч</span>
                    </div>
                </div>
                '
            );
        }
    }

    // Класс номер tre (c испанским акцентом)
    class SleepPage extends Page
    {
        public function __construct()
        {
            parent::__construct(
                'sleep',
                '<div class="sleep-timer">
                    <h2>Таймер сна</h2>
                    <p>Установите количество минут:</p>
                    <input type="number" id="minutes" min="1" max="120" value="0" step="1">
                    <button onclick="startTimer()">Спать!</button>
                    <p id="timerDisplay" style="font-size: 2em; margin-top: 20px;"></p>
                </div>
                <script>
                    let timerInterval;
                    function startTimer() {
                        clearInterval(timerInterval);
                        let minutes = parseInt(document.getElementById("minutes").value);
                        let seconds = minutes * 60;
                        const display = document.getElementById("timerDisplay");
                        function updateDisplay() {
                            const mins = Math.floor(seconds / 60);
                            const secs = seconds % 60;
                            display.textContent = `${mins.toString().padStart(2, "0")}:${secs.toString().padStart(2, "0")}`;
                            seconds--;
                            if (seconds <= 0) {
                                clearInterval(timerInterval);
                                display.textContent += " — Подъём! Время вышло!";
                                seconds = 0;
                                minutes = 0;
                                updateDisplay();
                                timerInterval = setInterval(updateDisplay, 1000);
                            }

                        }
                        updateDisplay();
                        timerInterval = setInterval(updateDisplay, 1000);
                    }
                </script>'
            );
        }
    }
?>

<!-- Сама страница ну и стиль -->
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab14 | GET и наследование</title>
    <link rel="stylesheet" href="/style.css">
    <style>
        .blog-card {
            border: 2px solid #444;
            border-radius: 8px;
            padding: 16px;
            margin-bottom: 16px;
            background: #333;
        }
        .blog-card h2 {
            margin-top: 0;
            color: #EEE;
        }
        .blog-meta {
            display: flex;
            gap: 20px;
            color: #777;
            font-size: 0.9em;
        }

        .sleep-timer {
            border: 2px solid #444;
            border-radius: 8px;
            padding: 16px;
            margin-bottom: 16px;
            background: #333;
            text-align: center;
        }
        .sleep-timer input {
            border: 2px solid #444;
            border-radius: 8px;
            background: #777;
            color: #EEE;
            padding: 8px;
            font-size: 1.2em;
            width: 80px;
        }
        .sleep-timer button {
            border: 2px solid #444;
            border-radius: 8px;
            background: #777;
            color: #EEE;
            padding: 8px 20px;
            font-size: 1.1em;
            margin-left: 10px;
            cursor: pointer;
        }

        .extended {
            width: 30%;
        }
    </style>
</head>
<body>
    <!-- как обычно для кнопок не меняю уже -->
    <script src="/js/navigation.js"></script>

    <div class="my-content">
        <?php
        //кнопки
        //можно ещё сделать выделение текущей страницы... но в тз не было
        echo '<div class="nav-links">';
        echo '<a href="?page=page" class="nav-link extended">Главная</a>';
        echo '<a href="?page=blog" class="nav-link extended">Блог</a>';
        echo '<a href="?page=sleep" class="nav-link extended">Таймер сна</a>';
        echo '</div>'; 

        $pageParam = $_GET['page'] ?? ''; //получачем параметр
        switch ($pageParam) { //тута создаем
            case 'blog':
                $page = new BlogPage();
                break;
            case 'sleep':
                $page = new SleepPage();
                break;
            default:
                $page = new Page();
                break;
        }

        //рендерим страницу
        echo '<br><hr><br>';
        echo '<h1>Содержимое страницы "' . htmlspecialchars($page->getName()) . '"</h1><br>';
        $page->render();
        ?>
    </div>
</body>
</html>