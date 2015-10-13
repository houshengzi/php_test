<?php
/**
 * 测试PHP重载方法demo
 * 1.调用未定义或不可访问的类属性和方法时候，会被调用重载方法
 * 2.所有的重载方法必须为public，不然会报错误警告
 * 3.所有的重载方法不能设定义为static
 */

class ClassOverLoad
{

	function __construct() {
		echo __METHOD__, '<br/>';
	}

	public function __call($funName, $value)
	{
		//传进来的value是一个数组
		echo $funName, '<br/>';
		var_dump($value);
	}

	public static function __callStatic($funName, $value)//这个必须设为静态static，否则会报错
	{
		echo $funName, '<br/>';
		var_dump($value);
	}
}

$col = new ClassOverLoad();
$col->testOverLoad(array(0,1,2,3),'fskldjflkjaslkfj');//若没有魔术方法__call，会报错
$col->testtest(new stdClass());

ClassOverLoad::testtest(array('kfjalsjf', 'fksadjflja'));