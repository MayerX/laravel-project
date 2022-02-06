<?php

namespace App\Http\Controllers;

use Hamcrest\FeatureMatcher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function demo()
    {
        $categories = DB::table('post_category')->get();
        // 数组变量
        $articlesList = [];

        foreach ($categories as $key => $value) {
            $articles = DB::table('posts')
                ->where('category', '=', $key)
                ->orderByDesc('posted')
                ->take(5)
                ->get();
            $articlesList[$key] = $articles;

//            echo 'category: ' . $key . ' ' . $value->name . '<br>';
//
//            foreach ($list as $key1 => $value1) {
//                echo $value1->title;
//                echo '<br>';
//            }

//            echo '<br><br>';
        }

        return view('test', compact('articlesList', 'categories'));
    }
}
