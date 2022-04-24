<?php

namespace App\Repository\Eloquent;

use App\Models\Product;
use App\Repository\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface
{

    /**
     * UserRepository constructor.
     *
     * @param Product $model
     */
    private $model;
    public function __construct(Product $model)
    {
        $this->model = $model;
    }

    public function all(array $params = [])
    {
        $query = $this->model->newQuery();
        $query->when(array_key_exists('search', $params), function ($q) use ($params) {
            return $q->where('name', 'like', '%' . $params['search'] . '%');
        });
        $query->when(array_key_exists('categories', $params), function ($q) use ($params) {
            return $q->whereIn('category_id', $params['categories']);
        });

        return $query->with('category')->paginate();
    }
    /**
     * @param array $attributes
     *
     * @return Product
     */
    public function create(array $attributes): Product
    {
        return $this->model->create($attributes);
    }
}
