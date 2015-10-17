<?php
/**
* PHP对象的复制，克隆
* clone可以进行一个浅复制，当被复制对象有引用时，复制对象进行修改时候，依然会对复制对象有影响
* 
*/
class ClassClone
{
    public $arg;
    public $arg1;

    public function setArg($arg)
    {
        $this->arg = $arg;
    }

    public function getArg()
    {
        return $this->arg;
    }

    public function setArg1($arg1)
    {
        $this->arg1 = $arg1;
    }

    public function getArg1()
    {
        return $this->arg1;
    }

    public function __clone()
    {
        echo __METHOD__, '<br/>';
        $this->arg1 = '麻辣隔壁';
    }
}

$cc = new ClassClone();
$cc->setArg('ARG');
$cc->setArg1('ARG1');

$ccs = clone $cc;
$ccs->setArg1('ARG2');

echo $cc->getArg(), '<br/>';
echo $cc->getArg1(), '<br/>';
echo $ccs->getArg(), '<br/>';
echo $ccs->getArg1(), '<br/>';

