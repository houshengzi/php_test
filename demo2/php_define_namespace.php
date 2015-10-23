<?php
//define('ROOT_PATH', __DIR__);报错，是因为命名空间必须要在第一行没有输出，哪怕是html标签也不行.当然,declare关键字除外
// namespace PhpTestProject;
// echo 1111;

// namespace PhpTestProject\demo2;//定义子命名空间，类似于目录结构.
// echo 2222;

//不建议在同一个文件定义多个命名空间。如果非要使用，应该使用如下方式
namespace PhpTestProject\demo3 {
    echo 3333;
}

namespace PhpTestProject\demo4 {
    echo 44444;
}
//echo 2222; 如果有命名空间的括号，括号外不能有其他代码（declare除外），要使用其他代码必须按照如下方式使用
namespace {
    echo 555555;//当非命名空间和命名空间组合在一起时候，这里非命名空间的必须用一个不带名称namespace包裹着
}