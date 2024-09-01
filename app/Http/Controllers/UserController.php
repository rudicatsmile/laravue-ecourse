<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = 'User';
        $users = User::when($request->search, function($query) use($request){
            $query->where('name', 'like', '%'.$request->search.'%')
                ->orWhere('email', 'like', '%'.$request->search.'%');
        })->paginate(10)->withQueryString();

         return view('pages.users.indexUser2', compact('users', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Create User";
        return view('pages.users.createUser', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:6'
        ]);

        $imageName = null;

        if($request->photo){

            $request->validate([
                'photo' => 'image|mimes:jpeg,png,jpg,svg|max:5000',
            ]);

            $imageName = time().'.'.$request->file('photo')->extension();
            $request->photo->storeAs('public/images', $imageName);
        }

        User::create([
            'name' =>  $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'address' => $request->address,
            'photo_profile' => $imageName
        ]);

        return redirect()->route('users.index')->with('success', 'User created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        $title = "Edit User";
        $user = User::find($id);
        $roles = Role::all();

        return view('pages.users.editUser', compact('user', 'title', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id)
    {
        $user = User::find($id);

        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|unique:users,email,'.$user->id,
        ]);

        if($request->photo){
            $imageName = time().'.'.$request->file('photo')->extension();
            $request->photo->storeAs('public/images', $imageName);

            //delete old photo
            $path = storage_path('app/public/images/'.$user->photo_profile);
            if(File::exists($path)) {
                File::delete($path);
            }
            $user->photo_profile = $imageName;
        }

        $user->name = $request->name;
        $user->email = $request->email;
        if($request->password != "") {
            $user->password = Hash::make($request->password);
        }
        $user->address = $request->address;

        $user->update();

        $user->assignrole($request->role);


        return redirect()->route('users.index')->with('success', 'User updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        $user = User::find($id);

        $user->deleteOrFail();

        return redirect()->back()->with('success', 'User deleted!');

    }

    public function destroyWithChecklist(Request $request)
    {
        $userIds = $request->input('user_ids');

        if ($userIds) {
            User::whereIn('id', $userIds)->delete();
        }

        return redirect()->back()->with('success', 'User deleted!');

        //return redirect()->route('users.index')->with('success', 'User berhasil dihapus.');
    }
}
