<?php

namespace App\Http\Controllers;

use App\Models\PersonalDetail;
use App\Models\Post;
use App\Models\PostCategory;
use Doctrine\DBAL\Driver\AbstractDB2Driver;
use Illuminate\Http\Request;

class ArticlesContriller extends Controller
{

    public function search(Request $request)
    {
        $keyword = $request['keyword'];
        $articles = Post::query()->where('title', 'like', '%' . $keyword . '%')->paginate(5);

        return view('resources.articles.search', compact('articles', 'keyword'));
    }

    /**
     * Undocumented function
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|void
     */
    public function showAll()
    {
        $articles = Post::query()->paginate(5);
        $categories = PostCategory::query()->pluck('name');

        return view('resources.articles.show_all', compact('articles', 'categories'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index($category)
    {
        $articles = Post::query()->where('category', $category)->paginate(5);
        $categories = PostCategory::query()->pluck('name');

        return view('resources.articles.index', compact('articles', 'categories', 'category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Post $post
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $name = PersonalDetail::query()->where('userId', $post->poster)->get()[0]->name;
        $categories = PostCategory::query()->pluck('name');

        return view('resources.articles.show', compact('post', 'name', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
