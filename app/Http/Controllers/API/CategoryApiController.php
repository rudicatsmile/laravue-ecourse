<?php

namespace App\Http\Controllers\API;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;


class CategoryApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        //$categories = Category::with('course')->get();


		// return response()->json([
		// 	'status' 	=> true,
		// 	'data' 		=> $categories,
		// 	'message' 	=> 'Get Category Success'
		// ]);

        // Kirim data patent semua field

        $resource = CategoryResource::collection($categories);

        return $this->sendResponse(
            $resource, 'Get Category Success!'
        );

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3'
        ]);

        $category = Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ]);

        return response()->json([
			'status' 	=> true,
			'data' 		=> null,
			// 'data' 		=> $category,
			'message' 	=> 'Save Category Success'
		]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::find($id);

        $resource = new CategoryResource($category);

        return $this->sendResponse($resource, 'Success');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::find($id);

        $category->name = $request->name;
        $category->slug = Str::slug($request->name);

        $category->update();

        return response()->json([
			'status' 	=> true,
			'data' 		=> $category,
			'message' 	=> 'Update Category Success'
		]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);

        $category->delete();

        return response()->noContent();
    }
}
