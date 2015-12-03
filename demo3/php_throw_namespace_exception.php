<?php
/**
 * 在命名空间抛出异常测试
 * 1.异常类在命名空间中使用也遵循着命名空间原则。使用基础异常类必须定义为绝对限定类
 */

namespace PhpTestProject;

$c = 2;
try {
    if ($c != 1)
        throw new \Exception("Error Processing Request", 1);
        
// } catch (Exception $e) { 这里不能运行，是因为异常类也遵循命名空间的原则。因为上面是已经完全限定类
//     echo $e->getMessage();
// }

} catch (\Exception $e) {
    echo $e->getMessage(), '<br/>';
}
