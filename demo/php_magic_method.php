<?php
/**
* Magic Methods 魔术方法demo
* __construct()， __destruct()， __call()， __callStatic()， __get()， __set()， __isset()， __unset()， __sleep()，
*  __wakeup()， __toString()， __invoke()， __set_state()， __clone()  __debugInfo() 
*/
class ClassMagicMethod
{
	
	function __construct()
	{
		echo __METHOD__, '<br/>';
	}
	
	//只要不是双下划线__,都认定为普通对象
	public function _get(){
		echo __METHOD__, '<br/>';
	}
}

$cmm = new ClassMagicMethod();
$cmm->_get();
