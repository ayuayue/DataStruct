<?php
class quequ {
    public function queue(){
        $stack = [];

        // 获取 10 个随机数，压入栈
        for ($i=0; $i < 10; $i++) {
            $random  = rand(0,100);      // 随机数
            $stack[] = $random;          // 等同于 array_push($stack, $random);
        }

        print_r($stack);                 // 输出数组

        while (!empty($stack)) {
            $pop = array_shift($stack);  // 先入先出，弹出队列首
            echo $pop .PHP_EOL;
        }
    }
}
$quequ = new quequ();
$quequ->queue();
