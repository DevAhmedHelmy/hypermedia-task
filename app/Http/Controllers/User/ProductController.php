<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Repository\ProductRepositoryInterface;

class ProductController extends Controller
{
    private $productRepository;

   public function __construct(ProductRepositoryInterface $productRepository)
   {
       $this->productRepository = $productRepository;
   }
    public function index(Request $request)
    {
        $products = $this->productRepository->all($request->all());
        $categories = Category::all();
        return view('user.products',compact('products','categories'));
    }


}
