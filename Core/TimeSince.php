<?php
/**
 * Created by PhpStorm.
 * User: James
 * Date: 12/03/2018
 * Time: 15:34
 */

class TimeSince
{

    static public function calcTimeSince(string $datetime){

        //calc seconds since data was uploaded
        $datetime = new DateTime($datetime);
        $timestamp = $datetime->getTimestamp();
        $dateDiff = time() - $timestamp;

        if ($dateDiff <= 59){
            //seconds
            return date("s", $dateDiff) . " sec ago";
        }elseif ($dateDiff <= 3599){
            //mins
            return date("i", $dateDiff) . " min ago";
        }elseif ($dateDiff <= 86399){
            //hours
            return date("G", $dateDiff) . " hours ago";
        }else{
            //days
            return date("j", $dateDiff) . " days ago";
        }
    }

}