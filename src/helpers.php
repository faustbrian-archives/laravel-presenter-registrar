<?php

/*
 * This file is part of Laravel Presenter Registrar.
 *
 * (c) Brian Faust <hello@brianfaust.me>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

function present($model)
{
    return app('presenter-registrar')->get($model);
}
