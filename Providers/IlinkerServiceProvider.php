<?php

namespace Modules\Ilinker\Providers;

use Illuminate\Database\Eloquent\Factory as EloquentFactory;
use Illuminate\Support\ServiceProvider;
use Modules\Core\Traits\CanPublishConfiguration;
use Modules\Core\Events\BuildingSidebar;
use Modules\Core\Events\LoadingBackendTranslations;
use Modules\Ilinker\Listeners\RegisterIlinkerSidebar;

class IlinkerServiceProvider extends ServiceProvider
{
    use CanPublishConfiguration;
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerBindings();
        $this->app['events']->listen(BuildingSidebar::class, RegisterIlinkerSidebar::class);

        $this->app['events']->listen(LoadingBackendTranslations::class, function (LoadingBackendTranslations $event) {
            // append translations
        });


    }

    public function boot()
    {
       
        $this->publishConfig('ilinker', 'config');
        $this->publishConfig('ilinker', 'crud-fields');

        $this->mergeConfigFrom($this->getModuleConfigFilePath('ilinker', 'settings'), "asgard.ilinker.settings");
        $this->mergeConfigFrom($this->getModuleConfigFilePath('ilinker', 'settings-fields'), "asgard.ilinker.settings-fields");
        $this->mergeConfigFrom($this->getModuleConfigFilePath('ilinker', 'permissions'), "asgard.ilinker.permissions");

        //$this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }

    private function registerBindings()
    {
        $this->app->bind(
            'Modules\Ilinker\Repositories\ExternalObjectMappingRepository',
            function () {
                $repository = new \Modules\Ilinker\Repositories\Eloquent\EloquentExternalObjectMappingRepository(new \Modules\Ilinker\Entities\ExternalObjectMapping());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Ilinker\Repositories\Cache\CacheExternalObjectMappingDecorator($repository);
            }
        );
        $this->app->bind(
            'Modules\Ilinker\Repositories\ExternalObjectRepository',
            function () {
                $repository = new \Modules\Ilinker\Repositories\Eloquent\EloquentExternalObjectRepository(new \Modules\Ilinker\Entities\ExternalObject());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Ilinker\Repositories\Cache\CacheExternalObjectDecorator($repository);
            }
        );
// add bindings


    }


}
