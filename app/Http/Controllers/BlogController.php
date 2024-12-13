<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class BlogController extends Controller
{
    public function addComment(){
        $data = request()->all();

        if(isset($data['post_id']) && isset($data['author']) && isset($data['description'])) {
            Comment::create($data);
        }

        return back();
    }

    public function deleteComment ($id)
    {
        $comment = Comment::find($id);
        if($comment) {
            $comment->delete();
        }
        return back();
    }
    
    public function editComment ($id)
    {
        $comment = Comment::find($id);
        if($comment) {
            $data = request()->all();
            if(isset($data['author']) || isset($data['description'])) {
                $comment->author = $data['author'];
                $comment->description = $data['description'];
                $comment->save();
            }
        } 
        return back();
    }
}
