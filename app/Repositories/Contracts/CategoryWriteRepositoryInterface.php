<?php

declare(strict_types=1);

namespace App\Repositories\Contracts;

interface CategoryWriteRepositoryInterface
{
    public function updateCategories(array $data): void;
}
