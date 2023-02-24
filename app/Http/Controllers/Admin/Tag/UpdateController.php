<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tag\StoreRequest;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(StoreRequest $request, Tag $tag)
    {
        $data = $request->validated();
        $tag->update([
            'title' => $data['tagName']
        ]);
        return redirect()->route('admin.tag.index');
    }
}
