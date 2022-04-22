<?php

namespace App\Repository;

use App\Models\Product;

interface ProductRepositoryInterface
{
    public function all();
    public function create(array $attributes): Product;
}
