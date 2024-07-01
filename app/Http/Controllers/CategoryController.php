<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "List Categories";
        $categories = Category::all();                  //Select * from categories
        //$categories = Category::where('id', 2)->get();  //Select * from categories where id=2


        //Menggunakan Array
        // return view('categories.listCategories',[
        //     'judul' => $title
        // ]);

        return view('categories.listCategories', compact('title','categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.createCategories');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        //VALIDASI
        $request->validate([
            'name' => 'required|min:3'
        ]);

        Category::create([
            'name'=> $request->name,
            'slug'=> Str::slug($request->name)

        ]);

        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
       return view('categories.showCategories', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::find($id);  //select * from category where id=$id
        return view('categories.editCategories', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $category = Category::find($id);  //select * from category where id=$id

        $category->name = $request->name;
        $category->slug = Str::slug($request->name);

        $category->update();

        return redirect()->route('categories.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);
        $category->delete();

        return redirect()->route('categories.index');
    }
}
