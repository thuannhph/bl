<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Blog;
use App\Http\Requests\BlogRequest;

class Blogs extends Controller
{
    public function index(){
        $category = Category::all();
        $blogs = Blog::all();
        return view('client.blog', compact('blogs', 'category'));
    }
    public function cateSearch($id){
        $category = Category::all();
        $blogs = Blog::all()->where('cate_id', $id);
        return view('client.blog', compact('blogs', 'category'));
    }
    public function formAdd(){
        $category = Category::all();
        return view('admin.blog.add-blog', compact('category'));
    }
    public function formEdit($id){
        $category = Category::all();
        $blog = Blog::find($id);
        return view('admin.blog.edit-blog', compact('category', 'blog'));
    }
    public function saveAdd(BlogRequest $request){
        $model = new Blog();
        if($request->has('image')){
            $newImage = uniqid(). '-' . $request->image->getClientOriginalName();
            $path = $request->image->storeAs('public/uploads/blogs', $newImage);
            $model->image = str_replace('public/', '', $path);
        }
        $model->fill($request->all());
        $model->save();
        return redirect(route('blog.list'));
    }
    public function saveEdit(Request $request, $id){
        $blog = Blog::find($id);
        $img = $blog->image;

        if($request->has('image')){
            $newImage = uniqid(). '-' . $request->image->getClientOriginalName();
            $path = $request->image->storeAs('public/uploads/blogs', $newImage);
            $blog->image = str_replace('public/', '', $path);
        }else{
            $blog->image = $img;
        }
        $blog->fill($request->all());
        $blog->save();
        return redirect(route('blog.list'));
    }
    public function delete($id){
        Blog::destroy($id);
        return redirect(route('blog.list'));
    }
}
