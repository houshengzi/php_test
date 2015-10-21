<?php
/**
* 后期静态绑定（延迟静态绑定)
* 1.static::不会被解析为被定义的类，而是实际运行计算时候执行
* 2.self:: 和 parent:: 都会进行转发
*/
class ClassStatic
{
    
    function __construct( ) {
        echo __METHOD__, '<br/>';
    }

    public static function funStatic() {
        echo __METHOD__, '<br/>';
    }

    public static function who() {
        echo __METHOD__, '<br/>';//这里正常输出ClassStatic
        //self::funStatic();//这里会输出ClassStatic
        //static::funStatic();//这里是静态绑定，会输出A
        
    }

    private function foo() {
        echo __METHOD__, '<br/>';
    }

    public function getFoo() {
        $this->foo();
        static::foo();
    }
}

class A extends ClassStatic
{
    public static function funStatic() {
        echo __METHOD__, '<br/>';
    }
}

class B extends ClassStatic
{
    protected function foo() {
        echo __METHOD__, '<br/>';
    }
}
//ClassStatic::who();
//A::who();
$a = new A();
$a->getFoo();//foo被A继承了，所以能调用
$b = new B();
$b->getFoo();//B重定义了方法foo，但是如果是私有的不可调用
