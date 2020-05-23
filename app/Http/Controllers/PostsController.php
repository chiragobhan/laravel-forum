<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Categorie;
use Image;

class PostsController extends Controller
{
    public function index($category, $postId)
    {

        $categorieList = new Categorie;
        $categorieCollection = $categorieList->all();

        $post = new Post();
        $related = $post->where('category', $category)->get();
        $post = $post->where('id', $postId)->get();
        if (!($post)->isEmpty()) {
            $post = $post[0];
            if ($post->flag == 1) {
                $post->flag = '1';
            } else {
                $post->flag = '0';
            }
            $comments = $post::find($postId)->comment;
            return view('post')->with('post', $post)->with('comments', $comments)->with('categories', $related)->with('moreCategories', $categorieCollection);
        } else {
            abort(404);
        }
    }

    public function store(Request $request)
    {
        $post = new Post($request->all());
        if ($request->hasFile('image')) {
            $image = $request->file('image');

            $filename = time() . '.' . $image->getClientOriginalExtension();

            Image::make($image)->resize(200, 200)->save(public_path('/uploads/posts/' . $filename));

            $post->flag = 1;

            $post->image = $filename;
        }
        $post->save();

        return redirect('home');
    }

    public function show($category)
    {
        $categorieList = new Categorie;
        $categorieCollection = $categorieList->where('title', $category)->get();

        $postList = new Post;
        $postCollection = $postList->orderBy('updated_at', 'desc')->where('category', $category)->get();
        return view('posts')->with('categorieRows', $categorieCollection)->with('postRows', $postCollection);
    }

    public function edit($category, $postId)
    {
        $categorieList = new Categorie;
        $categorieCollection = $categorieList->all();

        $post = new Post();
        $post = $post->where('id', $postId)->get();
        $post = $post[0];
        if ($post->flag == '1') {
            $post->flag = 'checked';
        } else {
            $post->flag = '';
        }
        return view('updatePost')->with('categorieRows', $categorieCollection)->with('postData', $post);
    }

    public function update(Request $request)
    {
        $post = new Post();
        $postData = $request->all();
        $post = $post->where('id', $postData['post_id'])->get();
        $post = $post[0];
        if ($request->hasFile('image')) {
            $image = $request->file('image');

            $filename = time() . '.' . $image->getClientOriginalExtension();

            Image::make($image)->resize(200, 200)->save(public_path('/uploads/posts/' . $filename));

            $post->image = $filename;
        }
        $post->title = $request->title;
        $post->content = $request->content;
        $post->category = $request->category;
        $post->flag = $request['flag'] ?: "0";
        $post->save();

        return redirect('home');
    }

    public function destroy($postId)
    {
        $post = new Post();
        $post->destroy($postId);
        return redirect('home');
    }
}
