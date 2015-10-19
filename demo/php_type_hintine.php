<?php
/**
* 类型约束
* 1.方法可以是对象、接口、数组、callable回调进行类型约束
* 2.标量类型约束不行
* 3.进行类型约束的，子类或实现都要实现
*/
class ClassTypeHinting
{
    
    function __construct()
    {
        echo __METHOD__, '<br/>';
    }

    public function typeArray(array $params)
    {
        echo '<pre>';
        print_r($params);
        echo '</pre><br/>';
    }
}

$cth = new ClassTypeHinting();
$cth->typeArray(1);