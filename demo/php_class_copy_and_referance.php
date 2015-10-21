<?php
/**
* 对象的引用和复制
*/
class ClassCopyAndReferance
{
    
    public $param = 1;

    function __construct()
    {
        echo __METHOD__, '<br/>';
    }

}

$a = new ClassCopyAndReferance();
$b = $a;
$b->param = 2;
echo $a->param, '<br/>';

echo '<br/>';
$c = new ClassCopyAndReferance();
$d = &$c;
$d->param = 3;
echo $c->param;