<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
public function index()
{
    $postsFromDB=Post::all();
    return view('posts.index',['posts'=>$postsFromDB]);
}
public function show(Post $post)
{
//    $singlePost = Post::findOrFail($postId);
//    if (is_null($singlePost)){
//        return to_route('posts.index');
//    }
    return view('posts.show',['post' => $post]);
}
public function create()
{
    $users=User::all();
   return view('posts.create',['users'=>$users]);
}
public function store()
{
    request()->validate([
        'title'=>['required', 'min:2'],
        'description'=>['required','min:3'],
        'postCreator'=>['required','exists:users,id']
    ]);
//    $request=request();
//    $data=request()->all();
//    $post=new Post;
//    $post->title = request()->title;
//    $post->description=request()->description;
//    $post->save();
    Post::create([
        'title'=>request()->title,
        'description'=>request()->description,
        'user_id'=>request()->postCreator
    ]);
    return to_route('posts.index');
}
public function edit(Post $post)
{
    $users=User::all();
return view('posts.edit',['users'=>$users,'post'=>$post]);
}
public function update($postId)
{
    $singlePost = Post::find($postId);
    $singlePost->update([
        'title'=>request()->title,
        'description'=>request()->description,
        'user_id'=>request()->postCreator
    ]);
    return to_route('posts.show',$postId);
}
public function destroy($postId)
{
    $singlePost = Post::find($postId);
    $singlePost->delete();
    return to_route('posts.index');
}
}


