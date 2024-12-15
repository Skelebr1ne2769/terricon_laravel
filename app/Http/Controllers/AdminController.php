<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;

use App\Models\User;
use App\Models\Skill;
use App\Models\Category;
use App\Models\Post;
use App\Models\Comments;
use App\Models\Portfolio;
use App\Models\Lead;
use App\Models\Slider;
use App\Models\Gallery;

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



    public function renderWelcomePage () 
    {
        $skills = Skill::all();
        $sliders = Slider::all();
        $gallery = Gallery::all();

        return view('welcome')->with('skills', $skills)->with('sliders', $sliders)->with('gallery', $gallery);
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
                $countPosts = request()->get('count_posts', 10);
                $data['categories'] = Category::all();

                if($category_id) {
                    $data['posts'] = Post::where('category_id', $category_id)->paginate($countPosts); 
                } else {
                    $data['posts'] = Post::paginate($countPosts);
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

    public function renderPosts(){
        return view('admin.posts')
            ->with('posts', Post::all())
            ->with('users', User::all());
    }

    public function deletePost($id){
        $post = Post::find($id);

        if($post) {
            $imagePath = $post->preview;
            $post->delete();
            Storage::disk('public')->delete($imagePath);
        }

        return back();
    }

    public function renderUpdatePost($id){
        $post = Post::where('id', $id)->get();
        $adminUsers = User::where('role', 'admin')->get();

        if($post){
            return view('updatePost')
                ->with('post', $post[0])
                ->with('adminUsers', $adminUsers)
                ->with('categories', Category::all());
        }
    }

    public function updatePost(Request $request, $id){
        $posts = Post::where('id', $id)->get();
        $post = $posts[0];
        $preview = $request->file('preview');

        if($post){
            $post->name = $request->get('name');
            $post->user_id = $request->get('user_id');
            $post->description = $request->get('description');
            $post->created_at = $request->get('created_at');
            
            if($preview){
                // delete old file
                Storage::disk('public')->delete($post->preview);

                // download new file
                $fileName = time() . '_' . $preview->getClientOriginalName();
                $fileName = $preview->storeAs('uploads', $fileName, 'public');

                $post->preview = $fileName;
            }

            $post->save();

            return redirect('admin/posts');
        }else{
            return abort(404);
        }
    }

    public function renderAddPost(){
        return view('addPost')
            ->with('adminUsers', User::where('role', 'admin')->get())
            ->with('categories', Category::all());
    }

    public function addPost(Request $request){
        $name = $request->get('name', '');
        $user_id = $request->get('user_id', 1);
        $category_id = $request->get('category_id', 1);
        $description = $request->get('description', '');
        $created_at = $request->get('created_at', '');

        $preview = $request->file('preview');

        if(isset($name)){
            if($preview) {
                $fileName = time() . '_' . $preview->getClientOriginalName();
                $fileName = $preview->storeAs('uploads', $fileName, 'public');
            }

            $post = Post::create([
                'name' => $name,
                'user_id' => $user_id,
                'category_id' => $category_id,
                'description' => $description,
                'created_at' => $created_at,

                'preview' => $fileName
            ]);
        }

        if($post){
            return redirect('admin/posts');
        }else{
            return abort(400);
        }
    }

    public function renderLeads(){
        return view('admin.leads')
            ->with('leads', Lead::all());
    }

    public function deleteLead($id){
        $lead = Lead::find($id);

        if($lead) {
            $lead->delete();
        }

        return back();
    }

    public function addLead(){
        $data = request()->all();

        if(isset($data['name']) && isset($data['email'])) {
            Lead::create($data);

            return redirect( route('pages', 
                ['name' => 'contacts', 'createdLead' => 1]) );
        }
        return redirect( route('pages', 
                ['name' => 'contacts']) );
    }

    public function renderSlidersPage () 
    {
        return view('admin.sliders')
            ->with('sliders', Slider::all());
    }

    public function renderAddSliderPage () 
    {
        return view('admin.slider.add');
    }

    public function addSlider (Request $request) 
    {
        $title = request()->get('title', 'Заголовок');
        $image = $request->file('image');   
        $description = request()->get('description', '');
        $btn_name = request()->get('btn_name', 'Подробнее');
        $btn_link = request()->get('btn_link', '');

        $fileName = '';

        if($image) {
            $fileName = time() . '_' . $image->getClientOriginalName();
            $fileName = $image->storeAs('uploads', $fileName, 'public');
        }

        Slider::create([
            'title' => $title,
            'description' => $description,
            'image' => $fileName,
            'btn_name' => $btn_name,
            'btn_link' => $btn_link
        ]);
        
        return redirect('admin/sliders');
    }

    public function deleteSlider($id){
        $slider = Slider::find($id);

        if($slider) {
            $imagePath = $slider->image;
            $slider->delete();
        }

        Storage::disk('public')->delete($imagePath);

        return back();
    }

    public function renderEditSliderPage ($id) 
    {
        $slider = Slider::find($id);

        if($slider){
            return view('admin.slider.edit')
                ->with('slider', $slider);
        }else{
            return abort(404);
        }
        
    }

    public function editSlider (Request $request) 
    {
        $id = $request->id;
        $slide = Slider::find($id);
        if($slide) {
            $slide->title = request()->get('title', $slide->title);   
            $slide->description = request()->get('description', '');
            $slide->btn_name = request()->get('btn_name', $slide->btn_name);
            $slide->btn_link = request()->get('btn_link', '');
            $image = $request->file('image');
            if($image) {
                Storage::disk('public')->delete($slide->image);
                // Создаем уникальное имя для файла + поставляем его оригинальное имя и расширение
                $fileName = time() . '_' . $image->getClientOriginalName();
                // Получаем итоговый путь к файлу (в данном случае будет uploads/1125151_файл.расширение)
                $fileName = $image->storeAs('uploads', $fileName, 'public');
                $slide->image = $fileName;
            }
            $slide->save();
            return redirect( route('renderSlidersPage') );
        }
        
        return abort(404);
    }

    public function renderGalleryPage ()
    {
        $gallery = Gallery::all();
        return view('admin.gallery')->with('gallery', $gallery);
    }
    public function addGallery (Request $request)
    {
        $images = $request->file('image');

        foreach($images as $image) {
            // Создаем уникальное имя для файла + поставляем его оригинальное имя и расширение
            $fileName = time() . '_' . $image->getClientOriginalName();
            // Получаем итоговый путь к файлу (в данном случае будет uploads/1125151_файл.расширение)
            $fileName = $image->storeAs('gallery', $fileName, 'public');
            
            Gallery::create([ 'image' => $fileName ]);
        }
        return redirect( route('renderGalleryPage') );
    }
    public function deleteGallery ($id)
    {
        $gallery = Gallery::find($id);

        if($gallery) {
            $image = $gallery->image;
            $gallery->delete();
            Storage::disk('public')->delete($gallery->image);
            return redirect( route('renderGalleryPage') );
        }
        return abort(404);
    }
}
