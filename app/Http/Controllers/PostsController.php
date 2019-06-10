<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    public function index(){
        //$posts = Post::orderBy('created_at', 'desc')->paginate(5);
        $posts = Post::where('user_id', Auth::id())->orderBy('created_at', 'desc')->paginate(5);
        //$posts = Post::where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();
        $categories = Category::where('user_id', Auth::id())->get();


        return view('posts.index', ['posts' => $posts, 'categories' => $categories]);
    }


    //カテゴリ検索
    public function search(Request $request)
    {
        
        $posts = Post::where('user_id', Auth::id())
            ->where('category_id', $request->category_id)
            ->orderBy('tag_num', 'asc')
            ->orderBy('created_at', 'desc')->paginate(5);
       

        $categories = Category::where('user_id', Auth::id())->get();
        return view('posts.index', ['posts' => $posts, 'categories' => $categories]);

    }
    //タグ検索
    public function search2(Request $request)
    {
        
        $posts = Post::where('user_id', Auth::id())
            ->where('tag_num', $request->tag_num)
            ->orderBy('category_id', 'asc')
            ->orderBy('created_at', 'desc')->paginate(5);

      

        $categories = Category::where('user_id', Auth::id())->get();
        return view('posts.index', ['posts' => $posts, 'categories' => $categories]);

    }

    public function showCreateForm()
    {
        $categories = Category::where('user_id', Auth::id())->get();
        return view('posts.create', ['categories' => $categories]);
    }

    public function create(Request $request)
    {

        $validate_rule = [
            'user_id' => 'required',
            'category_id' => 'required',
            'tag_num' => 'required',
            'body' => 'required',
        ];
        $this->validate($request, $validate_rule);
        $params = $request->all();
        Post::create($params);

        return redirect()->route('top');
    }


    public function showEditForm($post_id)
    {
        $post = Post::find($post_id);
        $categories = Category::where('user_id', Auth::id())->get();

        
        return view('posts.edit', ['post' => $post, 'categories' => $categories]);
        
    }

    public function edit(int $post_id, Request $request)
    {
        $validate_rule = [
            'body' => 'required',
        ];
        $this->validate($request, $validate_rule);
        $params = $request->all();

        $post = Post::find($post_id);
        $post->category_id = $request->category_id;
        $post->tag_num = $request->tag_num;
        $post->body = $request->body;

        $post->fill($params)->save();

        return redirect()->route('top');

    }
    public function destroy(int $post_id)
    {
       
        $post = Post::find($post_id);
        
        $post->delete();

        return redirect()->route('top');
    }
    // 
}
