<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class ShowController extends Controller
{
    public function show(User $user)
    {
        if (!$user) {
            $user = Auth::user();
        }

        $profile = $user->profile;
        $posts = $user->posts;

        $isOwner = Auth::check() && Auth::user()->id === $user->id;

        $isFollowing = !$isOwner && Auth::check() ? Auth::user()->isFollowing : false;


        return Inertia::render('profile/Show', [
            'user' => $user,
            'profile' => $profile,
            'posts' => $posts,
            'isOwner' => $isOwner,
            'isFollowing' => $isFollowing
        ]);
    }
}
