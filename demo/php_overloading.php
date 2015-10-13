<?php
/**
 * 测试PHP重载属性demo
 * 1.调用未定义或不可访问的类属性和方法时候，会被调用重载方法
 * 2.所有的重载方法必须为public，不然会报错误警告
 * 3.抛一个问题，PHP可以通过__set,__get等这些魔术方法对未定义或不可见的属性进行访问和操作，那么它的public,private这些访问控制还有意义吗？(有，方法的内容是由开发人员自己设计的)
 * 所有的重载方法不能定义为static
 */
error_reporting(0);
class ClassOverLoad
{
	public $ol = 'overload';
	private $oll = 'ClassOverLoad';

	function __construct() {
		echo __METHOD__, '<br/>';
	}

	public function __set($name, $val) {
		//给不可访问或不可见的属性赋值的时候会被调用
		echo 'Set ', $name ,'\'s value is ', $val, '<br/>';
		$this->$name = $val;
	}

	public function __get($name) {
		//读取不可访问或不可见的属性时候会被调用
		return $this->$name;
	}

	public function __isset($name) {
		//调用isset或empty的时候会被调用
		echo '调用isset或empty的时候会被调用<br/>';
		return isset($this->$name);
	}

	public function __unset($name) {
		//调用unset时候会被调用
		echo '调用unset时候会被调用<br/>';
		if (isset($this->$name)) {
			unset($this->$name);
		}
	}
}

/*$col = new ClassOverLoad();
echo $col->ol, '<br/>';
//echo $col->ol1;//因为ol1没有被定义，也没有定义重载方法，所以不可被访问。
echo $col->oll, '<br/>';//因为定义了魔术方法__get，所以可以被访问
$col->ol1 = 3;//定义了魔术方法__set，可以被操作
echo $col->ol1, '<br/>';//因为定义了魔术方法__get，所以可以被访问
var_dump(isset($col->oll));//因为定义了魔术方法__isset，所以可以被访问
unset($col->oll);//因为定义了魔术方法__unset，所以可以被访问
*/

class ClassOverLoadChild extends ClassOverLoad
{
	
	function __construct()
	{
		echo __METHOD__, '<br/>';
		echo $this->oll;//在父类这是私有的，但是由于有__get方法，所以还是可以访问得到。但是__get设成private还是可以获取
	}
}

new ClassOverLoadChild();