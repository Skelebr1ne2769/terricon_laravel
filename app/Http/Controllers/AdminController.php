<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;

use App\Models\User;
use App\Models\Skill;
use App\Models\Category;
use App\Models\Post;
use App\Models\Comments;
use App\Models\Portfolio;

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

            return redirect('admin/users');
        }else{
            return abort(404);
        }
    }


    public function renderAddUser(){
        return view('addUser');
    }

    public function addUserPost(Request $request){
        $data = $request->all();

        if(isset($data['name']) && isset($data['email']) && isset($data['password'])){
            $user = User::create($data);
        }

        if($user){
            return redirect('admin/users');
        }else{
            return abort(400);
        }
    }



    public function renderWelcomePage() {
        $skills = Skill::all();

        return view('welcome')->with('skills', $skills);
    }

    public function renderPublicPages($name) {
        $data = [];

        switch(strtoupper($name)){
            case 'WORKS':
                $data['portfolioJobs'] = Portfolio::all();
                break;


            case 'POST':
                $post_id = request()->get('post_id', '');
                if($post_id) {
                    $data['post'] = Post::find($post_id);
                    if(!$data['post']) {
                        return abort(404);
                    }
                } else {
                    return abort(404);
                }
                break;


            case 'BLOG':
                $category_id = request()->get('category_id', '');
                $data['categories'] = Category::all();

                if($category_id) {
                    $data['posts'] = Post::where('category_id', $category_id)->get(); 
                } else {
                    $data['posts'] = Post::all();
                }
                
                break;
        }

        return view("pages.$name", $data);
    }



    public function renderCategories(){
        $categories = Category::all();

        return view('admin.postCategories')->with('categories', $categories);
    }

    public function deleteCategory($id){
        $category = Category::find($id);

        if($category) {
            $category->delete();
        }

        return back();
    }

    public function updateCategory($id){
        $category = Category::where('id', $id)->get();

        if($category){
            return view('updateCategory')->with('category', $category);
        }
    }

    public function updateCategoryPost(Request $request, $id){
        $categories = Category::where('id', $id)->get();
        $category = $categories[0];

        if($category){
            $category->name = $request->get('name');
            $category->save();

            return redirect('admin/postCategories');
        }else{
            return abort(404);
        }
    }

    public function addCategory(){
        return view('addCategory');
    }

    public function addCategoryPost(Request $request){
        $data = $request->all();

        if(isset($data['name'])){
            $category = Category::create($data);
        }

        if($category){
            return redirect('admin/postCategories');
        }else{
            return abort(400);
        }
    }
}
