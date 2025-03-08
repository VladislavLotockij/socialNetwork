<?php

namespace App\Observers;

use App\Models\Like;

class LikeObserver
{
    /**
     * Handle the Like "created" event.
     */
    public function created(Like $like): void
    {
        if ($like->likeable_type === \App\Models\Post::class) {
            $like->likeable->increment('likes_count');
        }
        //TODO: Добавить нотификейшн юзеру когда ему поставили лайк
    }
    /**
     * Handle the Like "deleted" event.
     */
    public function deleted(Like $like): void
    {
        if ($like->likeable_type === \App\Models\Post::class) {
            $like->likeable->decrement('likes_count');
        }
    }
    //TODO: добавить метод для нотификейшина
}
