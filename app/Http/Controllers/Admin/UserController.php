<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware("permission:create user")->only(["create", "store"]);
        $this->middleware("permission:read user")->only(["index"]);
        $this->middleware("permission:update user")->only(["edit", "update"]);
        $this->middleware("permission:delete user")->only(["destroy"]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.user.index', [
            'title' => 'User | Techpolitan',
            "type" => "admin"
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexEmployee()
    {
        return view('admin.user.index', [
            'title' => 'User | Techpolitan',
            "type" => "user"
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $type = request("type");
        return view('admin.user.create', [
            'title' => 'User | Techpolitan',
            "role_id" => $type == "admin" ? 1 : 2
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "name" => "required|min:3|max:15",
            "email" => ['required', Rule::unique('users')],
            "password" => "min:6|required",
            "confirm_password" => "min:6|required_with:password|same:password",
            "role_id" => "required|numeric"
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'email_verified_at' => now(),
            'role_id' => $request->role_id
        ]);

        $user->assignRole($request->role_id == 1 ? 'admin' : 'user');

        return redirect()->route("admin.user.index")->with("success", "Berhasil Menambahkan User");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::Find($id);

        return view('admin.user.edit', [
            'title' => 'Edit User | Techpolitan',
            "user" => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            "name" => "required|min:3|max:15",
            "email" => ['required', Rule::unique('users')->ignore($id)],
            "password" => "min:6|required_with:confirm_password|same:confirm_password",
            "confirm_password" => "min:6"
        ]);

        User::Find($id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'email_verified_at' => now()
        ]);

        return redirect()->route("admin.user.index")->with("success", "Berhasil Mengupdate User");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::Find($id)->delete();

        return redirect()->route("admin.user.index")->with("success", "Berhasil Menghapus User");
    }
}
