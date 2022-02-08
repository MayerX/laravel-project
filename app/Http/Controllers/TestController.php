<?php

namespace App\Http\Controllers;

use Hamcrest\FeatureMatcher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function demo()
    {
        $tags = DB::table('post_category')
            ->take(6)
            ->get();

        return view('test', compact('tags'));
    }
}
