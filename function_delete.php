<?php 
function array_delete(array $array, array $symbols = array(''))
{
    return array_diff($array, $symbols);
}