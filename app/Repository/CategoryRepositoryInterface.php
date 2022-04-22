<?php

namespace App\Repository;

use App\Models\Category;

interface CategoryRepositoryInterface
{
    public function all();
    public function create(array $attributes): Category;
    public function find(Category $category);
    public function update(array $attributes, Category $category);
    public function destroy(Category $category);
}
