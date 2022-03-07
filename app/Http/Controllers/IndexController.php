<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Http\Request;
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
    public function index()
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

        return view('pages.index', compact('articlesList', 'categories'));
    }
}
