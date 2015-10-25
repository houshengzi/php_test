<?php

namespace PhpTestProject;

/**
* 命名空间基础
*/
class ClassNamespaceBasic
{
	
	function __construct()
	{
		echo __METHOD__, '<br/>';
	}
}

$cnb = new ClassNamespaceBasic;
echo '<pre>';
print_r($cnb);