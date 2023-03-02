<?php

namespace Modules\SeoCatalogUrlsModule\Providers;

use Crm\Modules\SeoCatalogUrlsModule\Console\Commands\AddAutoActions;
use Crm\Modules\SeoCatalogUrlsModule\Console\Commands\AddSeoCatalogUrlsMenu;
use Crm\Modules\SeoCatalogUrlsModule\Console\Commands\AddSeoManagersProductCategoryRole;
use Modules\CoreModule\Providers\CoreModuleServiceProvider;

class ModuleServiceProvider extends CoreModuleServiceProvider
{
    public function boot()
    {
        $this->setVersion('');

        parent::boot();

        $this->loadViewsFrom(__DIR__ . '/../Views', 'seoCatalogUrls');
    }

    public function register()
    {
        parent::register();
    }

    public function registerCommands()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                AddAutoActions::class,
                AddSeoCatalogUrlsMenu::class,
                AddSeoManagersProductCategoryRole::class,
            ]);
        }
    }

    protected function getDir()
    {
        return __DIR__;
    }
}