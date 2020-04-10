<?php

namespace Hayrullah\Helpers;

use Hayrullah\Helper\Commands;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class LemProvider extends ServiceProvider
{
    protected $HELPERS_PATH = 'Helpers/';
    protected $RESOURCE_PATH = 'resources/';
    protected $CONFIG_PATH = 'config/';

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerHelpers();
    }

    /**
     * Register helpers.
     *
     * @return void
     */
    public function registerHelpers()
    {
        $helpers = glob($this->packagePath('/Helpers/*.php'));
        foreach ($helpers as $helper) {
            if (file_exists($helper)) {
                require_once $helper;
            }
        }
    }


    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
//        $this->loadTranslations();
        // load config files
        $this->loadConfig();

        // load command files
        $this->registerCommands();

        // load publisher files
        $this->registerResources();
    }

    private function loadTranslations()
    {
        $translationsPath = $this->packagePath($this->RESOURCE_PATH.'lang');
        $this->loadTranslationsFrom($translationsPath, 'lem');
    }

    private function loadConfig()
    {
        $configPath = $this->packagePath($this->CONFIG_PATH.'lem.php');
        $this->mergeConfigFrom($configPath, 'lem');
        $configPath = $this->packagePath($this->CONFIG_PATH.'adminlte.php');
        $this->mergeConfigFrom($configPath, 'adminlte');
    }

    /**
     * Register commands.
     *
     * @return void
     */
    private function registerCommands()
    {
        $this->commands(Commands\ClearCommand::class);
        $this->commands(Commands\CacheCommand::class);
    }

    /**
     * Register resources.
     *
     * @return void
     */
    public function registerResources()
    {
        if ($this->isLumen() === false and function_exists('config_path')) {
            // function not available and 'publish' not relevant in Lumen

            $this->publishes(
                [
                    $this->packagePath($this->HELPERS_PATH) => app_path('Helpers/vendor/hyr-helpers'),
                ],
                'hyr-helpers'
            );
        }
    }

    /**
     * @param $path
     *
     * @return string
     */
    private function packagePath($path)
    {
        return __DIR__."/$path";
    }

    /**
     * Check if package is running under Lumen app.
     *
     * @return bool
     */
    protected function isLumen()
    {
        return Str::contains($this->app->version(), 'Lumen') === true;
    }
}
