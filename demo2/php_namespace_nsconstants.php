<?php
namespace PhpTestProject\nsconstants;

/**
* 命名空间魔术方法__NAMESPANCE__和常量
*/
class ClassNamespaceconst
{
    
    function __construct()
    {
        echo __NAMESPACE__, '<br/>';//返回当前命名空间名称的字符串，若没有命名空间，则返回空字符串
    }

    function get($classname) {
        if (!class_exists($classname)) {
            $a =  __NAMESPACE__ . '\\' . $classname;
            return new $a;
        }
    }
}

class Test {
    function __construct() {
        echo __METHOD__, '<br/>';
    }
}

function fun() {
    echo __FUNCTION__, '<br/>';
}


$cnp = new ClassNamespaceconst();
$cnp->get('Test');

namespace\fun();//使用namespace操作符，调用当前命名空间下的fun();
