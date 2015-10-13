<?php
/**
 * trait代码复用demo2 
 * 1.trait 中也可以使用trait。但是某个被使用trait中有抽象方法，那么使用的trait中是否要重复定义？（见下面）
 * 2.trait 可以定义属性变量，但是不可以定义常量
 * 3.trait 可以使用静态变量和静态方法
 */

trait ClassTraitsInterface
{
	public $trait = 'trait';//可以定义变量

	public static $trait_static = 'trait_static';//可以定义常量

    public function fun1()
    {
        echo __METHOD__, '<br/>';
    }

    abstract public function fun2();

    static function fun3() {
    	echo __METHOD__, '<br/>';
    }
}

trait ClassTraitsInterface1
{
    use ClassTraitsInterface;//在这一环节不需要实现父trait的抽象方法，但是下面的类需要实现

    abstract public function fun2();//在这里重新定义fun2也不会报错,但是访问权限不能定义比父类小
}

class ClassTraits
{
	use ClassTraitsInterface1;
	
	//public $trait ;//这里运行不了，是因为trait已经定义了。除非这个变量的值和trait的变量值一样

	function __construct()
	{
		echo __METHOD__, '<br/>';
	}

	public function fun2()
	{
		echo __METHOD__, '<br/>';
	}

	static function fun4() {
		echo __METHOD__, '<br/>';
	}
}

$ct = new ClassTraits();
echo $ct->trait, '<br/>';
$ct->fun3();
$ct->fun4();