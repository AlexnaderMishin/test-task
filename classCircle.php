<?php

class Circle{
    protected $radius; // w
    

    public function setRadius($radius)
    {
        $this->radius = $radius;
    }

    

    public function getSquare()
    {
        return pi() * ($this->radius ** 2);
    }

    function __construct($radius = 5)
    {
        $this->setRadius($radius);
        
        echo "Создан объект Круг (3.14 * ($this->radius^2))<br>";
    }

    public static function random()
    {
        $r = random_int(1, 5);
        
        return new static($r);
    }

    public function saveAsFile($fileName = '')
    {
        if($fileName == ''){
            $fileName = md5(time());
        }
        $fileName = __DIR__.'/'.$fileName;
        
        echo 'В файл '.$fileName.'<br>';
        echo serialize($this);
        echo '<br>';
        file_put_contents($fileName, serialize($this));
    }

    public static function loadFromFile($fileName)
    {
        echo 'Читаем из файла '. $fileName. '<br>';
        $str = file_get_contents($fileName);
        echo $str;
        return unserialize($str);
    }

}

// передаваемые значения 
$r1 = new Circle(6);
echo 'Площадь: '.$r1->getSquare().'<br>';
$r1->saveAsFile('first');

//дефолтные значения
$r2 = new Circle();
echo 'Площадь: '.$r2->getSquare().'<br>';
$r2->saveAsFile();

//рандомные значения
$r3 = Circle::random();
echo 'Площадь: '.$r3->getSquare().'<br>';
$r3->saveAsFile('second');


//просмотр объекта из файла "first"
$r4 = Circle::loadFromFile('first');

//вывод 
echo '<pre>';
var_dump($r4);
echo '</pre>';

//генерация трёх объектов
$arr = [];
for($i = 0; $i < 3; $i++){
    $arr[] = Circle::random();
}

//вывод созданных обхектов
echo '<pre>';
var_dump($arr, true);
echo '</pre>';

//сортировка
echo "Сортировка";
rsort($arr);
echo '<pre>';
var_dump($arr);
echo '</pre>';