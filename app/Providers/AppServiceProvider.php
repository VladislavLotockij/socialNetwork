<?php

namespace App\Providers;

use App\Models\Comment;
use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use App\Observers\CommentObserver;
use App\Observers\LikeObserver;
use App\Observers\PostObserver;
use App\Observers\UserObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        User::observe(UserObserver::class);
        Post::observe(PostObserver::class);
        Comment::observe(CommentObserver::class);
        Like::observe(LikeObserver::class);
    }
}
