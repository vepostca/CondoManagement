<?php

namespace InnovaCondomi\Providers;

use Illuminate\Support\ServiceProvider;

class RbacServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerBladeExtensions();
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
     * Register Blade extensions.
     *
     * @return void
     */
    protected function registerBladeExtensions()
    {
        $blade = $this->app['view']->getEngineResolver()->resolve('blade')->getCompiler();
        $blade->directive('role', function ($expression) {
            return "<?php if (Auth::check() && Auth::user()->is{$expression}): ?>";
        });
        $blade->directive('endrole', function () {
            return "<?php endif; ?>";
        });
        $blade->directive('permission', function ($expression) {
            return "<?php if (Auth::check() && Auth::user()->can{$expression}): ?>";
        });
        $blade->directive('endpermission', function () {
            return "<?php endif; ?>";
        });
        $blade->directive('level', function ($expression) {
            $level = trim($expression, '()');
            return "<?php if (Auth::check() && Auth::user()->level() >= {$level}): ?>";
        });
        $blade->directive('endlevel', function () {
            return "<?php endif; ?>";
        });
        $blade->directive('allowed', function ($expression) {
            return "<?php if (Auth::check() && Auth::user()->allowed{$expression}): ?>";
        });
        $blade->directive('endallowed', function () {
            return "<?php endif; ?>";
        });
    }
}
