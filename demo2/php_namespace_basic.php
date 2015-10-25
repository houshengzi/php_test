<?php

namespace PhpTestProject;
include('php_namespace_basic2.php');

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

function fun()
{
    echo __METHOD__, '<br/>';
}

fun();//非限定名称，直接是以当前命名空间进行解析
new ClassNamespaceBasic();

basic\fun();//限定名称，会以当前文件的所在的命名空间进行解析
new basic\ClassNamespaceBasic();

\PhpTestProject\basic\fun();//完全限定名称，必须最前需要用反斜杠
new \PhpTestProject\basic\ClassNamespaceBasic();
