<?php

namespace App\Http\Controllers\Category\Posts;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;

class IndexController extends Controller
{
    public function __invoke(Category $category)
    {
        $posts = $category->posts()->paginate(3);
        return view('category.post.index', compact('posts'));
    }
}
