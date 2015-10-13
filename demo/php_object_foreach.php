<?php
/**
 * 遍历对象
 * 1.foreach可以遍历数组，也可以遍历对象的可见属性
 */

class ClassForeach
{
	
	public $var1 = 'var1';
	public $var2 = 'var2';
	public $var3 = 'var3';

	protected $var4 = 'var4';
	private $var5 = 'var5';

	function __construct()
	{
		echo __METHOD__, '<br/>';
	}

	public function fun1()
	{
		echo __METHOD__, '<br/>';
	}

	public function fun2()
	{
		echo __METHOD__, '<br/>';
	}

	public function interForeach()
	{
		echo __METHOD__, '<br/>';
		foreach ($this as $key => $value) {
			echo $key, '---', $value, '<br/>';
		}
	}
}

$cf = new ClassForeach();

//遍历对象
foreach ($cf as $key => $value) {
	echo $key, '---', $value, '<br/>';
}

$cf->interForeach();