<?php

declare(strict_types=1);

/*
 * This file is part of Laravel Presenter Registrar.
 *
 * (c) Brian Faust <hello@brianfaust.me>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BrianFaust\PresenterRegistrar;

use Illuminate\Database\Eloquent\Model;

class PresenterRegistrar
{
    /**
     * The presenter mappings for the application.
     *
     * @var array
     */
    private $presenters = [];

    /**
     * Define a presenter class for a given model type.
     *
     * @param string $model
     * @param string $presenter
     */
    public function register(string $model, string $presenter)
    {
        $this->presenters[$model] = $presenter;
    }

    /**
     * Get a presenter class for a given model type.
     *
     * @param \Illuminate\Database\Eloquent\Model $model
     *
     * @return object
     */
    public function get(Model $model)
    {
        $class = $this->presenters[get_class($model)];

        return new $class($model);
    }
}
