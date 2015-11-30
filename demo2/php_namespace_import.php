<?php
namespace PhpTestProject;
use PhpTestProject\basic;

include('php_ns_test1.php');

class classNs1 {
    function __construct() {
        echo __METHOD__, '<br/>';
    }
}

const NS_INI = '一次就好，我带你去看天荒地老';
$cns = new classNs1();
//$cns->nsTest1(); 当new的对象是classNs1时候，会以当前命名空间进行解析。nsTest1不存在，所以会报错

echo NS_INI, '<br/>';//会解析成PhpTestProject\NS_INI
echo PHP_INI;//当前命名空间不存在，会回退到全局当中去寻找进行解析

