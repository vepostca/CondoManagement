<?php

namespace InnovaCondomi\Providers;

use Illuminate\Support\ServiceProvider;
use InnovaCondomi\Directives\PageHeaderDirective;
use InnovaCondomi\Directives\PageFormActionsDirective;

class CoreServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->bootCustomBladeDirectives();
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Boot custom blade directives.
     */
    protected function bootCustomBladeDirectives()
    {
        /** @var BladeCompiler $blade */
        $blade = $this->app['blade.compiler'];
        $blade->directive('pageHeader', function ($expression) {
            return "<?php echo app('InnovaCondomi\\Directives\\PageHeaderDirective')->handle{$expression}; ?>";
        });
        $blade->directive('pageFormActions', function ($expression) {
            return "<?php echo app('InnovaCondomi\\Directives\\PageFormActionsDirective')->handle{$expression}; ?>";
        });
    }

    /**
     * Register IOC bindings.
     */
    protected function registerBindings()
    {
        $this->app->singleton(PageHeaderDirective::class, PageHeaderDirective::class);
        $this->app->singleton(PageFormActionsDirective::class, PageFormActionsDirective::class);
    }
}