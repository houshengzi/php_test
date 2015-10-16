<?php
/**
* PHP final关键字
* 1.final关键字只能在类和方法当中使用，无法使用在属性上
* 2.被final定义的类，无法被继承
* 3.被final定义的方法，无法被覆盖
*/
class ClassFinal
{
    
    function __construct()
    {
        echo __METHOD__, '<br/>';
    }

    public function notFinal()
    {
        echo __METHOD__, '<br/>';
    }

    final public function isFinal()
    {
        echo __METHOD__, '<br/>';
    }
}

class ClassFinalExt extends ClassFinal
{
    function __construct()
    {
        echo __METHOD__, '<br/>';
    }

    /*public function isFinal()
    {
        echo 1;//这里会报错
    }*/
}

$cf = new ClassFinalExt();
$cf->notFinal();
$cf->isFinal();

