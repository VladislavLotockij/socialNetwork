<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StoreRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class CreateControler extends Controller
{
    public function create()
    {
        return Inertia::render('post/Create');
    }
    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('posts', 'public');
        }

        $post = Post::create([
            'user_id' => Auth::id(),
            'title' => $data['title'],
            'content' => $data['content'],
            'image' => $imagePath,
        ]);

        return redirect()->back()->with('success', 'Пост успешно создан');
    }
}
