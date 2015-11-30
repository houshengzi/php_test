<?php
/**
 * 1.抛出异常的代码块一定要在try{}里面才可以被PHP捕捉
 * 2.抛出的异常如果在try{}里面，一定要有catch或finally
 * 3.finally里的代码一定会被执行
 */
error_reporting(0);
function inverse($x) {
    if ($x == 0 )
        throw new Exception("除数不能为0", 1);
    return 1 / $x;
}

//echo inverse(0);//这里不会进入throw去抛异常
try {
    echo inverse(0), '<br/>';
    echo inverse(3), '<br/>';
}//这里若没有catch或finally，所以会抛语法错误
catch ( Exception $e){
    echo $e->getMessage() , '<br/>';
}
finally {
    echo '我这里一定会执行', '<br/>';
}

/**
 * 1.PHP的基础异常类可以被扩展，只需继承即可
 * 2.如果一个try中又两个都抛出异常，只会抛出第一个就终止try的代码执行
 * 3.基础异常类被扩展后，每次抛出应该优先使用该扩展异常类
 * 4.基础异常类被扩展后，抛出的异常若没有找到这个扩展异常类的捕捉，依旧会寻找基础异常类的捕捉
 */

class MyException extends Exception
{

}

function is_even($x) {
    if ($x == 0)
        throw new MyException("0是一个特别的数，它是偶数和奇数的分水岭", 1);//会优先寻找对应的异常类的catch捕捉，寻找基础异常类的捕捉或finally
    if ($x % 2 == 0) {
        return true;
    } else {
        return true;
    }
}

try {
    
    echo is_even(0), '<br/>';//这里已经抛出异常了
    echo inverse(0), '<br/>';

 } catch (MyException $e) {
    
     echo 'into MyException', '<br/>';
     echo $e->getMessage(), '<br/>';
} catch (Exception $e) {

    echo 'into Exception', '<br/>';
    echo $e->getMessage(), '<br/>';
}


