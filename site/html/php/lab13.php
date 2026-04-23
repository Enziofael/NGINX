<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab13 | Объекты и классы</title>
    <link rel="stylesheet" href="/style.css">
</head>
<body>
    <script src="/js/navigation.js"></script>

    <div class="my-content">
        <?php
        class Worker
        {
            // ---------- п1 ----------        
            public $name;
            private $age; // п2
            public $salary;


            public function __construct($name, $age, $salary)
            {
                $this->name = $name;
                $this->age = $age;
                $this->salary = $salary;
            }

            // ---------- п3 ---------- 
            public function getName()
            {
                return $this->name;
            }

            // ---------- п4 ---------- 
            public function getAge()
            {
                return $this->age;
            }

            // ---------- п5 ---------- 
            public function getSalary()
            {
                return $this->salary;
            }

            // ---------- п6 ---------- 
            // Можно сделать через параметры, а также нестатичным. Но это как по мне лучше
            public static function getSalarySum(Worker ...$workers){
                $sum = 0;
                foreach ($workers as $key => $value) {
                    $sum += $value->getSalary();
                }
                return $sum;
            }

            // ---------- п8-10 ---------- 
            private function checkAge($age)
            {
                return $age >= 18;
            }

            public function setAge($newAge)
            {
                if ($this->checkAge($newAge)) {
                    $this->age = $newAge;
                    echo "Возраст изменён на $newAge.<br>";
                    //для демонастрации успешности проверки и изменения в п10
                    return true;
                } else {
                    echo "Вам работать в нашей компании еще рано (возраст $newAge меньше 18).<br>";
                    //для демонастрации успешности проверки и изменения в п10
                    return false;
                }
            }
        }

        // ---------- п1 ----------
        $worker1 = new Worker("Алексей", 25, 50000);
        $worker2 = new Worker("Мария", 30, 65000);

        // ---------- п1 ----------
        echo "<div class=\"fieldset-card\" style=\"justify-content: space-around; display: flex; flex-direction: column;\"><h1>1. Два объекта</h1>";
        echo "<p><b>Работник 1:</b> {$worker1->name}, возраст {$worker1->getAge()}, зарплата {$worker1->getSalary()}</p>";
        echo "<p><b>Работник 2:</b> {$worker2->name}, возраст {$worker2->getAge()}, зарплата {$worker2->getSalary()}</p>";
        echo "</div>";

        // ---------- п2 ----------
        echo "<div class=\"fieldset-card\" style=\"justify-content: space-around; display: flex; flex-direction: column;\"><h1>2. Сумма ЗП и возраста</h1>";
        $totalSalary = $worker1->getSalary() + $worker2->getSalary();
        $totalAge = $worker1->getAge() + $worker2->getAge();
        echo "<p>Сумма зарплат: $totalSalary, сумма возрастов: $totalAge</p>";
        echo "</div>";

        // ---------- п3-5 ----------
        echo "<div class=\"fieldset-card\" style=\"justify-content: space-around; display: flex; flex-direction: column;\"><h1>3,4,5. Геттеры</h1>";
        echo '<p>Вызов методов:<br>';
        echo 'getName() для worker1: ' . $worker1->getName() . ';<br>';
        echo 'getAge() для worker2: ' . $worker2->getAge() . ';<br>';
        echo 'getSalary() для worker1: ' . $worker1->getSalary() . '<br></p>';
        echo "</div>";

        // ---------- п6 ----------
        echo "<div class=\"fieldset-card\" style=\"justify-content: space-around; display: flex; flex-direction: column;\"><h1>6. Сумма зп</h1>";
        echo "<p>Сумма зарплат через getSalary():" . Worker::getSalarySum($worker1, $worker2) . "</p>"; //отдельный метод на деле, чтобы не ломалась демонстрация выше (см класс)
        echo "</div>";

        // ---------- п7-8 ----------
        echo "<div class=\"fieldset-card\" style=\"justify-content: space-around; display: flex; flex-direction: column;\"><h1>7,8. setAge()</h1><p>";
        echo 'Попытка установить возраст 17 для worker1:<br>&emsp;> <i>';
        $worker1->setAge(17);   // должно вывести предупреждение
        echo '</i>Текущий возраст worker1: ' . $worker1->getAge() . '<br><br>';
        echo 'Попытка установить возраст 26 для worker1:<br>&emsp;> <i>';
        $worker1->setAge(26);
        echo '</i>Текущий возраст worker1: ' . $worker1->getAge() . '</p>';
        echo "</p></div>";

        // ---------- п9-10 ----------
        echo "<div class=\"fieldset-card\" style=\"justify-content: space-around; display: flex; flex-direction: column;\"><h1>9,10. checkAge()</h1>";
        $worker3 = new Worker("Вася", 16, 0);
        echo "<p><b>\"Работник\" 3:</b> {$worker3->getName()}, возраст {$worker3->getAge()}, зарплата {$worker3->getSalary()}<br>";
        //проверка checkAge() под капотом setAge(), берем текущее значение чтобы не менять
        $res1 = $worker3->setAge($worker3->getAge());
        echo "&emsp;> \$worker3->checkAge() = " . ($res1 ? 'true' : 'false');

        echo "<p><b>Работник 2:</b> {$worker2->getName()}, возраст {$worker2->getAge()}, зарплата {$worker2->getSalary()}<br>";
        $res2 = $worker2->setAge($worker2->getAge());
        echo "&emsp;> \$worker2->checkAge() = " . ($res2 ? 'true' : 'false');
        echo "</div>";

        ?>
    </div>
</body>
</html>