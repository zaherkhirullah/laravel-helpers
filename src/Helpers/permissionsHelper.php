<?php
/**
 * Author: Zahir Hayrullah
 * create date :  10/04/2020  07:00 AM
 * Last Modified Date: 10/04/2020  07:00 AM.
 */
if (!function_exists('available_permission_middleware')) {
    /**
     * @return array
     */
    function available_permission_middleware()
    {
        return [
            'web',
            'admin',
            'api',
        ];
    }
}
/*---------------------------------- </> ----------------------------------*/

if (!function_exists('check_user_authorize')) {
    /**
     * @param $permissionName
     * @param $trash
     *
     * @return bool
     */
    function check_user_authorize($permissionName = null, $trash = null)
    {
        if ($trash and !is_can_restore($permissionName) and !is_can_force_delete($permissionName)) {
            return false;
        }
        if (!is_can_show($permissionName) and !is_can_show_all($permissionName)) {
            return false;
        }

        return true;
    }
}
/*---------------------------------- </> ----------------------------------*/

if (!function_exists('is_can_create')) {
    /**
     * @param $permissionName
     *
     * @return bool
     */
    function is_can_create($permissionName = null)
    {
        return $permissionName ? is_can("create-{$permissionName}") : true;
    }
}
/*---------------------------------- </> ----------------------------------*/

if (!function_exists('is_can_edit')) {
    /**
     * @param $permissionName
     *
     * @return bool
     */
    function is_can_edit($permissionName = null)
    {
        return $permissionName ? is_can("edit-{$permissionName}") : true;
    }
}
/*---------------------------------- </> ----------------------------------*/

if (!function_exists('is_can_delete')) {
    /**
     * @param $permissionName
     *
     * @return bool
     */
    function is_can_delete($permissionName = null)
    {
        return $permissionName ? is_can("delete-{$permissionName}") : true;
    }
}
/*---------------------------------- </> ----------------------------------*/

if (!function_exists('is_can_restore')) {
    /**
     * @param $permissionName
     *
     * @return bool
     */
    function is_can_restore($permissionName = null)
    {
        return $permissionName ? is_can("restore-{$permissionName}") : true;
    }
}
/*---------------------------------- </> ----------------------------------*/

if (!function_exists('is_can_force_delete')) {
    /**
     * @param $permissionName
     *
     * @return bool
     */
    function is_can_force_delete($permissionName = null)
    {
        return $permissionName ? is_can("force-delete-{$permissionName}") : true;
    }
}
/*---------------------------------- </> ----------------------------------*/

if (!function_exists('is_can_show')) {
    /**
     * @param $permissionName
     *
     * @return bool
     */
    function is_can_show($permissionName = null)
    {
        return $permissionName ? is_can("show-{$permissionName}") : true;
    }
}
/*---------------------------------- </> ----------------------------------*/

if (!function_exists('is_can_show_all')) {
    /**
     * @param $permissionName
     *
     * @return bool
     */
    function is_can_show_all($permissionName = null)
    {
        return $permissionName ? is_can("show-all-{$permissionName}") : true;
    }
}
/*---------------------------------- </> ----------------------------------*/

if (!function_exists('is_can_activate')) {
    /**
     * @param $permissionName
     *
     * @return bool
     */
    function is_can_activate($permissionName = null)
    {
        return $permissionName ? is_can("activate-$permissionName") : true;
    }
}
/*---------------------------------- </> ----------------------------------*/

if (!function_exists('is_can')) {
    /**
     * @param $permissionName
     *
     * @return bool
     */
    function is_can($permissionName = null)
    {
//        $last = substr($permissionName, -1);
//        if ($last == '-') {
//            return true;
//        }
        $user = get_auth_user();
        if ($user and $user->can($permissionName)) {
            return true;
        }

        return false;
    }
}
/*---------------------------------- </> ----------------------------------*/
