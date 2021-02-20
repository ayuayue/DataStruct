<?php
// 工厂模式
interface Shape
{
    function getArea();
    function getCircumference();
}
// Rectangle 矩形
class Rectangle implements Shape
{
    private $width;
    private $height;
    public function __construct($width,$height){
        $this->width = $width;
        $this->height = $height;
    }
    public function getArea()
    {
        return $this->width * $this->height;
    }
    public function getCircumference()
    {
        return ($this->width + $this->height) * 2;
    }
}
// 圆
class Circle implements Shape
{
    private $radius;
    public function __construct($radius){
        $this->radius = $radius;
    }
    public function getArea()
    {
        return M_PI * pow($this->radius, 2);
    }
    public function getCircumference()
    {
        return 2 * M_PI * $this->radius;
    }
}

class ShapeFactory
{
    public static function create()
    {
        switch (func_num_args()) {
            case 1:
                return new Circle(func_get_arg(0));
            case 2:
                return new Rectangle(func_get_arg(0), func_get_arg(1));
            default:
                echo "not create success";
        }
    }
}

$rect = ShapeFactory::create(5,5);
var_dump($rect);
$cir = ShapeFactory::create(3);
var_dump($cir);