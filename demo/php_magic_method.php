<?php
/**
* Magic Methods 魔术方法demo
* __construct()， __destruct()， 构造函数和析构函数
* __call()， __callStatic()， __get()， __set()， __isset()， __unset()， 重载时会被调用
* __sleep()，  __wakeup()， 对类进行序列化和反序列化时被调用
* __toString()， 把对象当做字符串处理时会被调用
* __invoke()， 把对象当做函数被调用的时候会被调用
* __set_state()， 
* __clone()  
* __debugInfo() 
*/
class ClassMagicMethod
{
	public $magicArr = array('1','2','3','4','5');
	public $var1 = 'var1';
	protected $var2 = 'var2';
	private $var3 = 'var3';

	function __construct()
	{
		echo __METHOD__, '<br/>';
	}
	
	//只要不是双下划线__,都认定为普通对象
	public function _get() {
		echo __METHOD__, '<br/>';
	}

	public function __sleep() {
		echo __METHOD__, '<br/>';
		return array('var1', 'var2', 'var3');//必须返回一个包含类属性的数组
	}

	public function __wakeup() {
		echo __METHOD__, '<br/>';
	}

	public function __toString()
	{
		echo __METHOD__, '<br/>';
		return 'wohehe';//必须返回一个字符串，否则报错 Must return a string
	}

	public function __invoke($param)
	{
		echo __METHOD__, '<br/>';
		var_dump($param);//这里传参不会当做数组处理
	}

	public static function __set_state()
	{
		echo __METHOD__, '<br/>';
		$obj = new ClassMagicMethod;
		return $obj;
	}

	public function __debugInfo()
	{
		echo __METHOD__, '<br/>';
	}
}

$cmm = new ClassMagicMethod();
$cmm->_get();
/*
$str = serialize($cmm);//序列化一个类成字符串，调用__sleep
echo $str, '<br/>';
print_r(unserialize($str));//反序列化调用__wake
echo $cmm;//当做字符串输出，调用__toString
*/
//$cmm(3, 8);//对象被用作了函数，会调用__invoke
var_dump(var_export($cmm, true));
var_dump($cmm);
