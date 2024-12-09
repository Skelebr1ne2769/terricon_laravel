<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;

use App\Models\User;

class AdminController extends Controller
{
    public function renderUsers ()
    {
        $users = User::all();

        return view('admin.users')->with('users', $users);
    }

    public function deleteUser($id){
        $user = User::find($id);

        if($user) {
            $user->delete();
        }

        return back();
    }

    public function updateUser($id){
        $user = User::where('id', $id)->get();

        if($user){
            return view('updateProfile')->with('user', $user);
        }
    }

    public function updateUserPost(Request $request, $id){
        $users = User::where('id', $id)->get();
        $user = $users[0];

        if($user){
            $user->name = $request->get('name');
            $user->email = $request->get('email');
            $user->role = $request->get('role');
            $user->password = $request->get('password');
            $user->save();

            return redirect('/dashboard');
        }
    }
}
