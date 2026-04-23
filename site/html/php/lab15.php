<?php
// П1
abstract class Figure {
    protected $area; // П1
    protected $color; // П1
    protected $sidesCount; // П1

    // П2
    abstract public function infoAbout();

    // Геттеры/сеттеры для цвета (не обязательны, но для полноты)
    public function getColor() { return $this->color; }
    public function setColor($color) { $this->color = $color; }
}

// П4
interface AreaCalculable {
    public function getArea();
}

// П3
class Rectangle extends Figure implements AreaCalculable /*П4*/  {
    private $len; // П4(5)
    private $wid; // П4(5)

    private const SIDES_COUNT = 4; // П7(8)

    public function __construct($len, $wid) { // П8(9)
        $this->len = $len;
        $this->wid = $wid;
        $this->sidesCount = self::SIDES_COUNT;
    }

    public function getArea() { // П9(10)
        $this->area = $this->len * $this->wid;
        return $this->area;
    }

    public function infoAbout() { // П10(11)
        return "Это класс прямоугольника. У него {$this->sidesCount} стороны равных попарно";
    }
}

// П3
class Square extends Figure implements AreaCalculable /*П4*/  {
    private $a; // П5(6)
    private const SIDES_COUNT = 4; // П7(8)

    public function __construct($a) { // П8(9)
        $this->a = $a;
        $this->sidesCount = self::SIDES_COUNT;
    }

    public function getArea() { // П9(10)
        $this->area = $this->a * $this->a;
        return $this->area;
    }

    public function infoAbout() { // П10(11)
        return "Это класс квадрата. У него {$this->sidesCount} равных стороны";
    }
}

// П3
class Triangle extends Figure implements AreaCalculable /*П4*/  {
    private $a, $b, $c; // П6(7)
    private const SIDES_COUNT = 3; // П7(8)

    public function __construct($a, $b, $c) {  // П8(9)
        $this->a = $a;
        $this->b = $b;
        $this->c = $c;
        $this->sidesCount = self::SIDES_COUNT;
    }

    // Площадь по формуле Герона
    public function getArea() { // П9(10)
        $p = ($this->a + $this->b + $this->c) / 2;
        $this->area = sqrt($p * ($p - $this->a) * ($p - $this->b) * ($p - $this->c));
        return $this->area;
    }

    public function infoAbout() { // П10(11)
        return "Это класс треугольника. У него {$this->sidesCount} стороны.";
    }
}

// П11(12)
$rect1 = new Rectangle(5, 10);
$rect2 = new Rectangle(3, 7);

$square1 = new Square(4);
$square2 = new Square(6);

$tri1 = new Triangle(3, 4, 5);
$tri2 = new Triangle(5, 5, 6);

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Lab15 | Абстрактные классы и интерфейсы</title>
    <link rel="stylesheet" href="/style.css">
</head>
<body>
    <script src="/js/navigation.js"></script>
    <div class="my-content">

    <div class="fieldset-card">
        <h1>Демонстрация infoAbout() для каждого класса</h1>
        <div class="result"><?= $rect1->infoAbout() ?></div>
        <div class="result"><?= $square1->infoAbout() ?></div>
        <div class="result"><?= $tri1->infoAbout() ?></div>
    </div>

    <div class="fieldset-card">
        <h1>Создание объектов (по 2 на каждый класс)</h1>
        <div class="result">
            <strong>Прямоугольники:</strong> rect1(5,10), rect2(3,7)<br>
            <strong>Квадраты:</strong> square1(4), square2(6)<br>
            <strong>Треугольники:</strong> tri1(3,4,5), tri2(5,5,6)
        </div>
    </div>

    <div class="fieldset-card">
        <h1>5. Вычисление площадей (getArea) и вывод результатов</h1>
        <?php
        // П12(13)
        $results = [
            'Прямоугольник 1 (5×10)' => $rect1->getArea(),
            'Прямоугольник 2 (3×7)'  => $rect2->getArea(),
            'Квадрат 1 (4×4)'        => $square1->getArea(),
            'Квадрат 2 (6×6)'        => $square2->getArea(),
            'Треугольник 1 (3,4,5)'  => $tri1->getArea(),
            'Треугольник 2 (5,5,6)'  => $tri2->getArea(),
        ];
        ?>
        <table cellpadding="8" style="border-collapse: collapse; width: 100%;">
            <tr style="background: #456; color: white;">
                <th>Фигура</th>
                <th>Площадь</th>
            </tr>
            <?php foreach ($results as $name => $area): // П12(13) ?>
            <tr>
                <td><?= $name ?></td>
                <td><?= round($area, 2) ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>
</body>
</html>