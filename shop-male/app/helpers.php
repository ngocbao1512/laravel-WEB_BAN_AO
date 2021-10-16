<?php

if(!function_exists('getTag')) {
    function getTag($string_input)
    {
        return str_split($string_input,'|');
    }
}