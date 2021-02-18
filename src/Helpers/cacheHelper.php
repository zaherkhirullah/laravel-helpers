<?php

use Illuminate\Support\Str;

if (!function_exists('forget_cache')) {
    /**
     * @param $key
     *
     * @throws Exception
     */
    function forget_cache($key)
    {
        // delete this query from cache
        cache()->forget($key);
    }
}
/*--------------------------------------{</>}----------------------------------------*/

if (!function_exists('get_cache')) {
    /**
     * @param $key
     *
     * @throws Exception
     * @return mixed
     */
    function get_cache($key)
    {
        return cache()->get($key);
    }
}
/*--------------------------------------{</>}----------------------------------------*/

if (!function_exists('refresh_cache')) {
    /**
     * @param $key
     * @param $query
     *
     * @throws Exception
     * @return bool
     */
    function refresh_cache($key, $query)
    {
        // delete this query from cache
        cache()->forget($key);

        // caching again
        cache()->rememberForever($key, function () use ($query) {
            return $query;
        });

        return true;
    }
}
/*--------------------------------------{</>}----------------------------------------*/

if (!function_exists('get_from_cache_by_slug')) {
    /**
     * @param        $slug
     * @param string $model
     *
     * @throws \Psr\SimpleCache\InvalidArgumentException
     * @return mixed
     */
    function get_from_cache_by_slug($slug, $model = "App\\Page")
    {

        $key = get_cache_key($slug, $model);
        // caching project if not existing
        if (!cache()->has($key)) {
            cache()->rememberForever($key, function () use ($model, $slug) {
                return $model::active()->where('slug', $slug)->firstOrFail();
            });
        }

        // get page from cache
        return get_cache($key);
    }
}
/*--------------------------------------{</>}----------------------------------------*/

if (!function_exists('get_cache_key')) {
    /**
     * @param $slug
     * @param $className
     *
     * @return mixed
     */
    function get_cache_key($slug, $className = null)
    {
        $name = get_model_name_by_class($className);

        return "{$name}_{$slug}"; // page_slug
    }
}
/*--------------------------------------{</>}----------------------------------------*/

if (!function_exists('get_model_name_by_class')) {
    /**
     * @param        $className
     * @param string $namespace
     *
     * @return mixed
     */
    function get_model_name_by_class($className = null, $namespace = 'App\\')
    {
        $name = str_replace($namespace, '', $className);
        $name = Str::lower($name);

        return $name;
    }
}
/*--------------------------------------{</>}----------------------------------------*/
