<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = 'Course';
        $courses = Course::when($request->search, function($query) use($request){
            $query->where('title', 'like', '%'.$request->search.'%');
                // ->orWhere('description', 'like', '%'.$request->search.'%');
        // })->whereUserId(Auth::user()->id)->paginate(5)->withQueryString();
        })->paginate(5)->withQueryString();

         return view('pages.courses.indexCourse', compact('courses', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Create Course";
        $categories = Category::all();

        return view('pages.courses.createCourse', compact('title','categories'));
    }

    /**
     * Store a newly created resource in storage.
     */


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3',
            'description' => 'required',
        ]);

        $userId = Auth::user()->id;

        //upload cover
        if($request->coverImage){
            $request->validate([
                'coverImage' => 'image|mimes:jpeg,png,jpg,svg|max:5000',
            ]);

            $imageName = time().'.'.$request->file('coverImage')->extension();
            $request->coverImage->storeAs('public/courses/'.$userId, $imageName);
        }

        $course = Course::create([
            'title' =>  $request->title,
            'slug' =>  Str::slug($request->title),
            'description' => $request->description,
            'total_section' => $request->total_section,
            'type' => $request->type,
            'level' => $request->level,
            'duration' => $request->level,
            'cover_image' => $imageName,
            'user_id' => $userId,
            'category_id' => $request->category
        ]);


        // return $course->id;

        return redirect()->route('courses.index')->with('success', 'Course Saved!');

    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        // $title = "Edit Course";
        // $course = Course::find($id);

        // return view('pages.courses.editCourse', compact('course', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {

        if($course->cover_image != ""){
            $userId = Auth::user()->id;
            //delete cover image
            $path = storage_path('app/public/images/'.$userId, $course->cover_image);
            if(File::exists($path)) {
                File::delete($path);
            }
        }

        $course->deleteOrFail();

        return redirect()->back()->with('success', 'Course deleted!');
    }
}
