<?php
$temp = [];
function fibonacci(int $n)
{
    global $temp;
    if (!empty($n)) {
        if($n <= 0 || $n >= 50){
            return 'Not supported';
        }elseif($n == 1 || $n ==2){
            return 1;
        }else{
            if(array_key_exists($n,$temp)){
                return $temp[$n];
            }
            $result = fibonacci($n - 1) + fibonacci($n - 2);
            $temp[$n] = $result;
            return $result;
        }
    } else {
        return "param is empty";
    }
}
