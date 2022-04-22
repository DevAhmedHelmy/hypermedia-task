<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductResource;
use App\Repository\ProductRepositoryInterface;

class ProductController extends Controller
{
    private $productRepository;

   public function __construct(ProductRepositoryInterface $productRepository)
   {
       $this->productRepository = $productRepository;
   }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = $this->productRepository->all($request->all());
        return ProductResource::collection($products);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $product = $this->productRepository->create($request->all());
        return  response()->json(['data' => new ProductResource($product), 'message' => 'Created Successfully']);
    }

}
