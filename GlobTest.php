<?php 

function foo(array $lst){
    
    $n = count($lst);
    $result = array();
    
    if ($n == 0) {
        return $result;
    }
    
    usort($lst, function($a, $b) {
        return $a[0] - $b[0];
    });
    
    $start = $lst[0][0];
    $end = $lst[0][1];
    
    for ($i = 1; $i < $n; $i++) {
        if ($lst[$i][0] <= $end) {
            $end = max($end, $lst[$i][1]);
        } else {
            $result[] = array($start, $end);
            $start = $lst[$i][0];
            $end = $lst[$i][1];
        }
    }
    
    $result[] = array($start, $end);
    
    return $result;
    
}

$res = foo([[3, 6], [3, 4], [15, 20], [17, 32], [16, 17], [1, 4], [6, 10], [3, 6]]);

print_r($res);

?>