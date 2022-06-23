<?php

namespace App\Http\Controllers;

use App\Models\PersonalDetail;
use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/**
 * @OA\Get(
 *     path="/pages",
 *     description="首页",
 *     operationId="IndexController",
 *     @OA\Response(response="200", description="展示首页")
 * )
 */
class IndexController extends Controller
{
    public function index(Request $request)
    {
        // 连接目录数据库
        $categories = PostCategory::query()->get();
        // 列表变量
        $articlesList = [];


        foreach ($categories as $key => $value) {
            // 查询

            $articles = Post::query()->where('category', '=', $key)
                ->orderByDesc('posted')
                ->take(5)
                ->get();

            $articlesList[$key] = $articles;
        }

        $user = null;
        $auth = Auth::user();

        if ($auth != null) {
            $user = PersonalDetail::query()
                ->where('userId', '=', $auth['userId'])
                ->first();
            session()->put('username', $user['name']);
        }

        return view('pages.index', compact('articlesList', 'categories'));
    }
}
