<?php
/**
* 无命名空间测试类1
* @author LRJ <jade1210914854@gmail.com>
* @version 1.0.1
*/
class classNs1
{
    
    function __construct()
    {
        echo __METHOD__,'<br/>';
    }

    function nsTest1() {
        echo __METHOD__, '<br/>';
    }
}

const PHP_INI = 'I\'m php_ini';
const NS_INI = 'I\'m ns_ini';
