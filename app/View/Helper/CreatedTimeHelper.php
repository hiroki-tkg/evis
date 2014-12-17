<?php

App::uses('AppHelper', 'View/Helper');

class CreatedTimeHelper extends Helper {

	public function Time($created){

        $now = time();
        $created = strtotime($created);                                    
        $time = $now - $created;

        if ($time < 60 ){
              $var = $time . "秒"; 
        }elseif ($time < 3600) {
              $time = floor($time / 60);
              $var = $time . "分"; 
        }elseif ($time < 86400) {
              $time = floor($time / 3600);
              $var = $time . "時間"; 
        }elseif ($time < 2592000) {
              $time = floor($time / 86400);
              $var = $time . "日"; 
        }elseif ($time < 31536000) {
              $time = floor($time / 2592000);
              $var = $time . "ヶ月"; 
        }else{
              $time = floor($time / 31104000);
              $var = $time . "年"; 
        }
        return $var;
            
      }

}
