<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoryParent1 = Category::factory()->create();
        $categoryChild1 = Category::factory()
            ->count(2)
            ->for($categoryParent1, 'parent')
            ->create();
        $categoryParent2 = Category::factory()->for($categoryParent1, 'parent')->create();
        $categoryChild2 = Category::factory()
            ->count(3)
            ->for($categoryParent2, 'parent')
            ->create();
        $categories = Category::factory()->count(2)->create();
    }
}
