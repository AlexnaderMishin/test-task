<?php

class Rectangle{
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
        return $this->width * $this->height;
    }

    function __construct($width = 10, $height = 10)
    {
        $this->setWidth($width);
        $this->setHeight($height);
        echo "Создан объект прямоугольника $this->width * $this->height<br>";
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
        // $handle = fopen($fileName)
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


$r1 = new Rectangle(20, 15);
echo 'Площадь: '.$r1->getSquare().'<br>';
$r1->saveAsFile('hz1');

$r2 = new Rectangle();
echo 'Площадь: '.$r2->getSquare().'<br>';
$r2->saveAsFile();

$r3 = Rectangle::random();
echo 'Площадь: '.$r3->getSquare().'<br>';
$r3->saveAsFile('sdf');

$r4 = Rectangle::loadFromFile('hz1');

var_dump($r4);

$arr = [];
for($i = 0; $i < 5; $i++){
    $arr[] = Rectangle::random();
}
echo '<pre>';
var_dump($arr, true);
echo '</pre>';

//сортировка
echo "Сортировка";
rsort($arr);
echo '<pre>';
var_dump($arr);
echo '</pre>';