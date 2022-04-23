<?php

namespace App\Http\Controllers\User;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\ProductRepositoryInterface;
use App\Repository\CategoryRepositoryInterface;

class ProductController extends Controller
{
    private $productRepository, $categoryRepository;

    public function __construct(ProductRepositoryInterface $productRepository, CategoryRepositoryInterface $categoryRepository)
    {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
    }
    public function index(Request $request)
    {
        $products = $this->productRepository->all($request->all());
        $categories = ($this->categoryRepository->all())->all();
        return view('user.products', compact('products', 'categories'));
    }
}
