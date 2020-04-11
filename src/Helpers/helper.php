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

if (!function_exists('list_of_models')) {
    /**
     * @return array
     */
    function list_of_models()
    {
        return [
            ['name' => 'permission-groups', 'controller' => 'PermissionGroupController', 'except' => null, 'only' => null, 'model' => '\\App\\PermissionGroup'],
            ['name' => 'permissions', 'controller' => 'PermissionController', 'except' => null, 'only' => null, 'model' => '\\App\\Permission'],
            ['name' => 'users', 'controller' => 'UserController', 'except' => null, 'only' => null, 'model' => '\\App\\User'],
            ['name' => 'roles', 'controller' => 'RoleController', 'except' => null, 'only' => null, 'model' => '\\App\\Role'],
            ['name' => 'pages', 'controller' => 'PageController', 'except' => null, 'only' => null, 'model' => '\\App\\Page'],
            ['name' => 'services', 'controller' => 'ServiceController', 'except' => null, 'only' => null, 'model' => '\\App\\Service'],
            ['name' => 'categories', 'controller' => 'CategoryController', 'except' => null, 'only' => null, 'model' => '\\App\\Category'],
            ['name' => 'posts', 'controller' => 'PostController', 'except' => null, 'only' => null, 'model' => '\\App\\Post'],
            ['name' => 'tags', 'controller' => 'TagController', 'except' => null, 'only' => null, 'model' => '\\App\\Tag'],
            ['name' => 'books', 'controller' => 'BookController', 'except' => null, 'only' => null, 'model' => '\\App\\Book'],
            ['name' => 'likes', 'controller' => 'LikeController', 'except' => null, 'only' => null, 'model' => '\\App\\Like'],
            ['name' => 'comments', 'controller' => 'CommentController', 'except' => null, 'only' => null, 'model' => '\\App\\Comment'],
            ['name' => 'faqs', 'controller' => 'FaqController', 'except' => null, 'only' => null, 'model' => '\\App\\Faq'],
            ['name' => 'countries', 'controller' => 'CountryController', 'except' => null, 'only' => null, 'model' => '\\App\\Country'],
            ['name' => 'cities', 'controller' => 'CityController', 'except' => null, 'only' => null, 'model' => '\\App\\City'],
            ['name' => 'towns', 'controller' => 'TownController', 'except' => null, 'only' => null, 'model' => '\\App\\Town'],
            ['name' => 'menus', 'controller' => 'MenuController', 'except' => null, 'only' => null, 'model' => '\\App\\Menu'],
            ['name' => 'menu-items', 'controller' => 'MenuController', 'except' => null, 'only' => null, 'model' => '\\App\\MenuItem'],
            ['name' => 'links', 'controller' => 'LinkController', 'except' => ['create', 'edit'], 'only' => null, 'model' => '\\App\\Link'],
            ['name' => 'subscribers', 'controller' => 'SubscriberController', 'except' => null, 'only' => null, 'model' => '\\App\\Subscriber'],
            ['name' => 'sliders', 'controller' => 'SliderController', 'except' => null, 'only' => null, 'model' => '\\App\\Slider'],
            ['name' => 'banners', 'controller' => 'BannerController', 'except' => null, 'only' => null, 'model' => '\\App\\Banner'],
            ['name' => 'settings', 'controller' => 'SettingController', 'except' => null, 'only' => null, 'model' => '\\App\\Setting'],
            ['name' => 'record301s', 'controller' => 'Record301Controller', 'except' => null, 'only' => null, 'model' => '\\App\\Record301'],
//            ['name' => 'record404s', 'controller' => 'Record404Controller', 'except' => null, 'only' => null, 'model' => '\\App\\Record404'],
//            ['name' => 'record500s', 'controller' => 'Record500Controller', 'except' => null, 'only' => null, 'model' => '\\App\\Record500'],
            //            ['name' => 'favorites', 'controller' => 'FavoriteController', 'except' => null, 'only' => null],
            //            ['name' => 'mails', 'controller' => 'MailController', 'except' => null, 'only' => null],
            //            ['name' => 'notifications', 'controller' => 'NotificationController', 'except' => null, 'only' => null],
            //            ['name' => 'notes', 'controller' => 'NoteController', 'except' => null, 'only' => null],
        ];
    }
}
/*----------------------------------------------------------------------------------*/
