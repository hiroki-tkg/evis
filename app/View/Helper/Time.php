<?php

class TimeHelper extends Helper{

     function createdTime($created){
		$now = time();
		$created = $created;
		$time = $now - $created;

		if ($time < 60 ){
			$var = $time . "秒"; 
		}elseif ($time < 3600) {
			$time = floor($time / 60);
			$var = $time . "分"; 
		}elseif ($time < 216000) {
			$time = floor($time / 3600);
			$var = $time . "時間"; 
		}
        return $var;
     }

     function test($a){
     	$answer = $a * 3;
     	return $answer;
     }
}