<?php
/**
* 对象比较
* 1.当判断==时，同一个类的实例，且属性和属性值相等时即可
* 2.当判断===时，某个类的同一个实例。
*/
class ClassCompare
{
    public $arg;

    function __construct($arg)
    {
        $this->arg = $arg;
        echo $this->arg, '<br/>';
    }
}

function compareClass($arg1, $arg2)
{
    echo 'arg1 == arg2 :', compareFun($arg1 == $arg2), '<br/>';
    echo 'arg1 === arg2 :', compareFun($arg1 === $arg2), '<br/><br/>';
}

function compareFun($bool)
{
    if ($bool === false) {
        return 'FALSE';
    } else {
        return 'TRUE';
    }
}

$object1 = new ClassCompare(1);
$object2 = new ClassCompare(2);

$object3 = new ClassCompare(1);

$object4 = $object2;

compareClass($object1, $object2);//因为是属性值不等，所以两个都不相等
compareClass($object1, $object3);//因为属性和属性值都相等，所以==成立
compareClass($object2, $object4);//因为object4是指向object2的，所以属性和属性值都相等，并指向同一地址，是同一个类的同一实例
