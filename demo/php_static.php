<?php

/**
* 测试static静态化
*/
class ClassStatic
{
	
	static $static = 'static';
	public $nostatic = 'nostatic';

	function __construct()
	{
		echo self::$static;
	}

	static function getStatic() {
		echo '<br/>', __METHOD__, '<br/>';

	}

	function notStatic()
	{
		echo '<br/>', __METHOD__, '<br/>';
		echo $this->nostatic;
	}
}

$cs = new ClassStatic();
echo $cs->getStatic();
//echo $cs->static;这里会报E_SCRICT错误
//ClassStatic::notStatic();//会报错，因为notStatic已经变成了静态方法，不能用$this->调用
