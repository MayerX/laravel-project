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
        $name = PersonalDetail::query()->where('userId', $post->poster)->get()[0]->name;
        return view('resources.articles.show', compact('post', 'name'));
    }
}
