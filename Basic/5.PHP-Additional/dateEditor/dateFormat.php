<?php
date_default_timezone_set("Europe/Sofia");



function prepare_short_date($date , $hour = 0){

    if($date == '' || $date == '0000-00-00' || $date == '0000-00-00 00:00:00'){
        $new_date = '';
    }else{
        $new_date = setlocale(strftime ("%d %b", strtotime($date)), NULL);
    }
    return $new_date;
}