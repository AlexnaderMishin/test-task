<?php

class Triangle{
    protected $width; // w
    protected $height; // h

    public function setWidth($width)
    {
        $this->width = $width;
    }

    public function setHeight($height)
    {
        $this->height = $height;
    }

    public function getSquare()
    {
        return ($this->width * $this->height)/2;
    }

    function __construct($width = 10, $height = 10)
    {
        $this->setWidth($width);
        $this->setHeight($height);
        echo "Создан объект треугольник ($this->width * $this->height) / 2<br>";
    }

    public static function random()
    {
        $w = random_int(1, 10);
        $h = random_int(1, 10);
        return new static($w, $h);
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
$r1 = new Triangle(20, 15);
echo 'Площадь: '.$r1->getSquare().'<br>';
$r1->saveAsFile('first');

//дефолтные значения
$r2 = new Triangle();
echo 'Площадь: '.$r2->getSquare().'<br>';
$r2->saveAsFile();

//рандомные значения
$r3 = Triangle::random();
echo 'Площадь: '.$r3->getSquare().'<br>';
$r3->saveAsFile('second');

//просмотр объекта из файла "first"
$r4 = Triangle::loadFromFile('first');
//вывод 
echo '<pre>';
var_dump($r4);
echo '</pre>';
//генерация трёх объектов
$arr = [];
for($i = 0; $i < 3; $i++){
    $arr[] = Triangle::random();
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