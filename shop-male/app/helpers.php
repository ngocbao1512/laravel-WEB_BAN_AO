<?php
use Carbon\Carbon;

if(!function_exists('arrayTag')) {
    function arrayTag($string_input)
    {
        return explode('|',$string_input);
    }
}

/* use to show image for blog */
if(!function_exists('showBlogImage')) {
    function showBlogImage($url)
    {
        if (strpos($url,'http') !== false ) {
            return "$url";
            
        } else {
            return  asset("storage/blogs/$url");
        }
    }
}

/* use to encode imageinputname to save on data */
if(!function_exists('encodeImage')) {
    function encodeImage($filename_input)
    {
        return Carbon::now('Asia/Ho_Chi_Minh')->toDateString().$filename_input->hashName();
    }
}

if (!function_exists('haveTagInArray')) {
    function haveTagInArray($str,$arr)
    {
       for($i = 0; $i < count($arr); $i++)
       {
           if($str == $arr[$i]['name']){
               return $arr[$i]['id'];
           }
       }
       return false;
    }
}

if (!function_exists('checkTableBlogTag')) {
    function checkTableBlogTag($tag_id,$blog_id,$arr)
    {
       for($i = 0; $i < count($arr); $i++)
       {
           if($arr[$i]['tag_id']==$tag_id && $arr[$i]['blog_id']==$blog_id){
               return true;
           }
       }
       return false;
    }
}

/* use to show image for blog */
if(!function_exists('showImage')) {
    function showImage($url, $str)
    {
        if ($url == null) {
            return "http://beepeers.com/assets/images/commerces/default-image.jpg";
            
        } else {
            return  asset('storage/' . $str . '/' .$url);
        }
    }
}


