<?php
//定义类
Class fruit
{
    public $name;
    public $color;
    protected $weight;
    function set_name($name) {
        $this ->name = $name;
    }
    function get_name(){
        return $this->name;
    }
    function __construct($color) {
        $this ->color = $color;
    }
    //构造函数
    function get_color(){
        return $this->color;
    }
    //析构函数
    function __debugInfo()
    {
        // TODO: Implement __debugInfo() method.
        echo "this fruit is {$this->color}.";
    }
    //与构造函数一起起效

}
//调用类

$apple = new fruit("red");
$apple->set_name('apple');
echo $apple->get_name();
echo $apple->get_name();

//类的继承与与多态


Class Banana extends fruit
{
    private $size;
    //private 变量限于本类之间使用

    function set_weight($weight){
        $this->weight=$weight;
    }
    //protected 可被用于子类中
    function __construct($size)
    {
        parent::__construct($size);
    }
    function get_size(){
        echo $this->size;
    }

}
$banana = new Banana('big');
$banana ->set_name("banana");
echo $banana->get_name();
$banana ->get_size();

