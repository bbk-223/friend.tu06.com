<?php

function age($user_birth){
    if(isset($user_birth)){
        $birth = strtotime($user_birth);
        $now = strtotime(now());
        $age = date('Y',$now) - date('Y',$birth);
        return $age;
    }
}