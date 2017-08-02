<?php

/*
 * This file is part of Laravel Presenter Registrar.
 *
 * (c) Brian Faust <hello@brianfaust.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BrianFaust\PresenterRegistrar;

use Illuminate\Support\ServiceProvider;

class PresenterRegistrarServiceProvider extends ServiceProvider
{
    /**
     * Register any presenters for your application.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPresenters();
    }

    /**
     * Register any application services.
     */
    public function register()
    {
        $this->app->singleton('presenter-registrar', function ($app) {
            return new PresenterRegistrar();
        });
    }

    /**
     * Register the application's presenters.
     *
     * @return void
     */
    public function registerPresenters()
    {
        $registrar = $this->app['presenter-registrar'];

        foreach ($this->presenters as $model => $presenter) {
            $registrar->register($model, $presenter);
        }
    }
}
