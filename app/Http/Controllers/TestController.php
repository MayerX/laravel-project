<?php

namespace App\Http\Controllers;

use App\Models\PersonalDetail;
use App\Models\Post;
use App\Models\PostCategory;
use Hamcrest\FeatureMatcher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function demo(Post $post)
    {
        $articles = Post::query()->paginate(5);
        $categories = PostCategory::query()->pluck('name');

        return view('test', compact('articles', 'categories'));
    }
}
