<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Category;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function mypage()
    {
        return view('users.mypage');
    }
    public function showCategoryEditForm()
    {
        $categories = Category::where('user_id', Auth::id())->get();
        return view('users.categoryedit', ['categories' => $categories]);
        
    }
    public function CategoryEdit(int $user_id, Request $request)
    {

        $category = Category::where('user_id', $user_id)
            ->where('category_num', 0)
            ->first();
        $category->category_name = $request->category_name0;
        if ($category->category_name == Null) {
            $category->category_name = "";
        }
        $category->save();

        $category = Category::where('user_id', $user_id)
            ->where('category_num', 1)
            ->first();
        $category->category_name = $request->category_name1;
        if ($category->category_name == Null) {
            $category->category_name = "";
        }
        $category->save();


        $category = Category::where('user_id', $user_id)
            ->where('category_num', 2)
            ->first();
        $category->category_name = $request->category_name2;
        if ($category->category_name == Null) {
            $category->category_name = "";
        }
        $category->save();


        $category = Category::where('user_id', $user_id)
            ->where('category_num', 3)
            ->first();
        $category->category_name = $request->category_name3;
        if ($category->category_name == Null) {
            $category->category_name = "";
        }
        $category->save();

        $category = Category::where('user_id', $user_id)
            ->where('category_num', 4)
            ->first();
        $category->category_name = $request->category_name4;
        if ($category->category_name == Null) {
            $category->category_name = "";
        }
        $category->save();


        return redirect()->route('top');
    }
    //
}
