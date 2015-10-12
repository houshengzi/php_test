<?php
/**
* 抽象类和抽象方法
* 1.该类至少有一个方法被定义为抽象，则该类必须被定义为抽象方法。抽象类不能被实例化
* 2.抽象方法只是定义调用方式和参数，不能定义为具体的功能实现(即不能有花括号{})
* 3.继承抽象类，子类必须全部继承父类抽象方法，且访问控制必须一致或更宽松
* 4.调用方式必须匹配，必须参数必须全部一致，子类可以定义可选参数？
*/
abstract class ClassAbstract
{
	
	function __construct()
	{
		echo 'I\'m in ', __CLASS__, '<br/>';
	}

	//普通方法
	public function noAbstract()
	{
		echo 'I\'m noAbstract', '<br/>';
	}

	//定义了一个或以上的抽象方法，则这个类必须定义为抽象类
	abstract public function isAbstract($param);
}

/*
$ca = new ClassAbstract();//当定义为抽象类后不能实例化
$ca->noAbstract();
*/

/**
* 继承抽象类,必须继承它的抽象方法
*/
class ClassNoAbstract extends ClassAbstract
{
	
	function __construct()
	{
		echo 'I\'m in ', __CLASS__, '<br/>';
	}

	/*protected function isAbstract($param)
	{
		echo 111;//会报E_SCRICT错误，不能运行是因为protected的访问权限比public小
	}*/

	/*public function isAbstract()
	{
		echo 111;//会报E_SCRICT错误，不能运行是因为少了$param参数
	}*/

	public function isAbstract($val, $val2 = 'hello')
	{
		echo $val2, ',', $val;
	}
}

$cna = new ClassNoAbstract();
$cna->isAbstract(111);
$cna->noAbstract();