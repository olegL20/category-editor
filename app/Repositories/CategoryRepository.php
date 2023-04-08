<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\Category;
use App\Repositories\Contracts\CategoryReadRepositoryInterface;
use App\Repositories\Contracts\CategoryWriteRepositoryInterface;
use Illuminate\Support\Facades\App;

class CategoryRepository extends AbstractRepository implements
    CategoryReadRepositoryInterface,
    CategoryWriteRepositoryInterface
{
   public function __construct(Category $model)
   {
       $this->model = $model;
   }

    public function getCategories(): array
    {
       return $this->newQuery()->get()->all();
    }

    public function updateCategories(array $data): void
    {
        $locale = App::currentLocale();
        foreach($data['category_titles'] as $id => $value) {
            $cat = $this->newQuery()->find($id);
            $title = json_decode($cat->title, true);
            $title[$locale] = $value;

            $cat->title = json_encode($title);
            $cat->save();
        }
    }
}
