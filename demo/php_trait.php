<?php
/**
 * Traits 代码复用
 * 1.Trait代码的优先级：当前类的会覆盖trait的方法，trait的方法会覆盖基类的方法
 * 2.同时使用多个trait，trait不能有重名的方法，否则会报语法错误。但是可以使用insteadof来指定使用哪个冲突方法
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

class ClassTraits
{
    //use ClassTraitsInterface;
    use ClassTraitsInterface, ClassTraitsInterface1 {
        //ClassTraitsInterface1::fun1 insteadof ClassTraitsInterface;//用ClassTraitsInterface1的fun1的方法取代ClassTraitsInterface的
        ClassTraitsInterface1::fun1 as funn;
    }

    function __construct()
    {
        echo '1111', '<br/>';
    }

    /*public function fun1()
    {
        echo __METHOD__, '<br/>';
    }*/

}

$ct = new ClassTraits();
$ct->fun1();
//$ct->funn();
$ct->fun2();