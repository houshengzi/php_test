<?php
namespace PhpTestProject\basic;

/**
* 属于basic的类
*/
class ClassNamespaceBasic
{
    
    function __construct()
    {
        echo __METHOD__, '<br/>';
    }
}

function fun()
{
    echo __METHOD__, '<br/>';
}