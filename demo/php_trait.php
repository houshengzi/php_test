<?php
/**
 * Traits 代码复用
 * 1.Trait代码的优先级：当前类的会覆盖trait的方法，trait的方法会覆盖基类的方法
 * 2.同时使用多个trait，trait不能有重名的方法，否则会报语法错误。但是可以使用insteadof来指定使用哪个冲突方法
 * 3.as 可以修改方法的访问控制，也可以起一个别名方法。同时使用也可以生效
 * 4.trait中可以使用trait
 */
trait ClassTraitsInterface { 
    public function fun() {
        echo __METHOD__, '<br/>';
    }

    public function fun1() {
        echo __METHOD__, '<br/>';       
    }

    public function fun2() {
        echo __METHOD__, '<br/>';
    }
}

trait ClassTraitsInterface1 {
    //const sssss = 'sssssssssss';这里会报错是因为trait不能定义常量

    public function fun1() {
        echo __METHOD__, '<br/>';
    }

}

class BaseTraits
{
    
    public function fun1() {
        echo __METHOD__, '<br/>';
    }
}

class ClassTraits extends BaseTraits
{
    //use ClassTraitsInterface;
    use ClassTraitsInterface, ClassTraitsInterface1 {
        ClassTraitsInterface::fun1 insteadof ClassTraitsInterface1;//用ClassTraitsInterface的fun1的方法取代ClassTraitsInterface1的
        ClassTraitsInterface1::fun1 as funn;//并且ClassTraitsInterface1的fun1起了一个别名叫funn
        //其实这里的意思就是用了0的方法取代1的重名方法，但是1的方法又起了一个别名，你取代不了我。其实是开辟了一个新变量指向旧的方法
    }

    function __construct()
    {
        echo '1111', '<br/>';
    }

    public function fun1()
    {
        echo __METHOD__, '<br/>';//这里运行的优先级最高。另外ClassTraitsInterface1的fun1起了一个别名，不会被覆盖
    }

}
/*
$ct = new ClassTraits();
$ct->fun1();
$ct->funn();
$ct->fun2();*/

/**
* 测试trait 的 as 用法
*/
trait ClassTraitsInterface2//含有抽象方法，这里不必像抽象类要使用abstract关键字
{
    public function fun1()
    {
        echo __METHOD__, '<br/>';
    }

    abstract function funAbstract();//抽象方法，限定使用的类必须要重定义
}

class ClassTraits2
{
    use ClassTraitsInterface2 { fun1 as private funn; }//没有funn,只是单纯修改访问控制。若有，则是建立一个别名方法指向原方法
    
    /*function fun1() {
        echo __METHOD__, '<br>';
    }*/

    function funAbstract() {
        echo __METHOD__, '<br/>';
    }
}

$ct2 = new ClassTraits2();
$ct2->fun1();
//$ct2->funn();
$ct2->funAbstract();