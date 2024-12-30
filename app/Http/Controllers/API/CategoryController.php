<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    

    public function index()
    {
        $categories = Category::all();

        return CategoryResource::collection($categories);
        // return $categories;
        // $data = [
        //     'models' => $categories,
        //     'message' => 'success'
        // ];

        // return response()->json($data);
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required']);

        $category = Category::create($request->all());

        $data = [
            'model' => $category,
            'message' => 'success'
        ];

        return response()-> json($data);
    }

    public function show(Category $category)
    {

        $data = [
            'model' => $category,
            'message' => 'success'
        ];

        return response()-> json($data);
    }

    public function update(Request $request, Category $category)
    {
        $request->validate(['name' => 'required']);

        $category->update($request->all());

        $data = [
            'model' => $category,
            'message' => 'success'
        ];

        return response()-> json($data);
    }

    public function destroy(Category $category)
    {
        $category->delete();

        $data = [
            'message' => 'success'
        ];

        return response()-> json($data);
    }
}
