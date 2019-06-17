<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.index', [
            'users' => User::paginate(25)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'role_id' => 'required|min:0|max:1',
            'avatar' => 'nullable|file',
        ]);

        $data = $request->only(['name', 'email', 'role_id']);
        $data['password'] = Hash::make($request->password);

        if ($request->hasFile('avatar')) {
            $uploaded_file = $request->file('avatar');
            $uploaded_file->move('img/users', $uploaded_file->getClientOriginalName());

            $data['avatar'] = 'img/users/' . $uploaded_file->getClientOriginalName();
        }

        User::create($data);

        return redirect()->route('admin.users.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable',
            'role_id' => 'required|min:0|max:1',
            'avatar' => 'nullable|file',
        ]);

        $data = $request->only(['name', 'email', 'role_id']);
        if ($request->has('password')) {
            $data['password'] = Hash::make($request->password);
        }

        if ($request->hasFile('avatar')) {
            $uploaded_file = $request->file('avatar');
            $uploaded_file->move('img/users', $uploaded_file->getClientOriginalName());

            $data['avatar'] = 'img/users/' . $uploaded_file->getClientOriginalName();
        }

        $user->update($data);

        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return back();
    }
}
