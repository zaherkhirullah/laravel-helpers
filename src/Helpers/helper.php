<?php
/**
 * Author: Zahir Hayrullah
 * create date :  10/04/2020  07:00 AM
 * Last Modified Date: 10/04/2020  07:00 AM.
 */
if (!function_exists('get_class_name')) {
    function get_class_name($name)
    {
        if (strpos($name, 'App')) {
            return $name;
        }

        return '\\App\\'.$name;
    }
}
/*---------------------------------- </> ----------------------------------*/

if (!function_exists('get_item_if_exists')) {
    /**
     * @param $collection
     * @param $item
     *
     * @return mixed|null
     */
    function get_item_if_exists($collection, $item)
    {
        return $collection->$item ?? null;
    }
}
/*---------------------------------- </> --------------------------------*/
