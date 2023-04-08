<?php

declare(strict_types=1);

namespace App\Repositories;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

abstract class AbstractRepository
{
    protected Model $model;

    protected function newQuery(): Builder
    {
        return $this->model->query();
    }
}
