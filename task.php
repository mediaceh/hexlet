<?php

$intervals = ['1-5','2-4','7-9'];
$new_intervals = $arr = [];
foreach($intervals as $v) {
    $_v = explode('-',$v);
    if(count($_v) == 2 && ($_v[1] >= $_v[0])) {
        $arr[$_v[0]] = [$_v[0], $_v[1]];
    }
}
if(count($arr)) {
    ksort($arr);
    list($start,$end) = array_shift($arr);
    foreach($arr as $v) {
        if($v[0] <= $end && $v[1] > $end) {
            $end = $v[1];
        } elseif($v[0] > $end) {
            $new_intervals[] = $start.'-'.$end;
            $start = $v[0];
            $end = $v[1];
            
        }
    }
    $new_intervals[] = $start.'-'.$end;
}
var_dump($new_intervals);
