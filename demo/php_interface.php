<?php

interface ClassInterface1
{
    const clls = 'fklsjf';
    public function fun1();
    //protected function fun2();//这里不能运行，是因为接口的所有方法都是要public
}

interface ClassInterface2 extends ClassInterface1
{
    //const clls = 'faskjflj';//这里会出错，以为常量不能被覆盖
    public function fun1();//继承的时候会将父接口覆盖，不会报错
    public function fun2();
}

interface ClassInterface3
{
    public function fun1();
    public function fun2();
}

/**
* 接口
* 1.使用interface关键字来定义一个接口，不能被实例化
* 2.接口的所定义的方法必须是public，也不能有定义内容
* 3.接口能被类用implements实现接口
* 4.类必须要实现接口所有的方法
* 5.接口可以定义常量，但是不能被子接口和类给覆盖
*/
class ClassInterface implements ClassInterface2, ClassInterface3
{
    
    function __construct()
    {
        echo 1111, '<br/>';
    }

    public function fun1() {
        echo 2222, '<br/>';
    }

    /*public function fun2($val) {
        echo $val;//这里不能运行，是因为这里有了一个参数
    }*/

    public function fun2()
    {
        echo __METHOD__, '<br/>';
    }
}

$ci = new ClassInterface();
$ci->fun1(333);
$ci->fun2();
