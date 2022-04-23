<?php

namespace App\Repository\Eloquent;

use App\Models\Category;
use App\Repository\Eloquent\BaseRepository;
use App\Repository\CategoryRepositoryInterface;

class CategoryRepository  implements CategoryRepositoryInterface
{

    /**
     * UserRepository constructor.
     *
     * @param Category $model
     */
    private $model;
    public function __construct(Category $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model;
    }
    /**
     * @param array $attributes
     *
     * @return Category
     */
    public function create(array $attributes): Category
    {
        return $this->model->create($attributes);
    }

    public function find(Category $category)
    {
        return $category;
    }
    /**
     * @param array $attributes
     *
     * @return Category
     */
    public function update(array $attributes, Category $category): Category
    {
        $category->update($attributes);
        return $category;
    }

    public function destroy(Category $category)
    {
        return $category->delete();
    }
}
