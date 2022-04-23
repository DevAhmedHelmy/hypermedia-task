<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use App\Traits\HttpResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Repository\CategoryRepositoryInterface;

class CategoryController extends Controller
{
    use HttpResponse;
    private $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('is_paginate')) {
            // to display with paginate will receive is_paginate
            $categories = ($this->categoryRepository->all())->paginate(10);
        } else {
            // to display in select will return all data
            $categories = ($this->categoryRepository->all())->all();
        }

        return CategoryResource::collection($categories);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $category = $this->categoryRepository->create($request->all());
        return  response()->json(['data' => new CategoryResource($category), 'message' => 'Created Successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $category = $this->categoryRepository->find($category);
        return new CategoryResource($category);
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $this->categoryRepository->update($request->all(), $category);
        return  response()->json(['data' => new CategoryResource($category), 'message' => 'Updated Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $this->categoryRepository->destroy($category);
        return response()->json(['message' => 'Delete Successfully']);
    }
}
