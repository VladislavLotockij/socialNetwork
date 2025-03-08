<?php

namespace App\Observers;

use App\Models\Comment;

class CommentObserver
{
    /**
     * Handle the Comment "created" event.
     */
    public function created(Comment $comment): void
    {
        $comment->post->increment('comments_count');
    }
    /**
     * Handle the Comment "deleted" event.
     */
    public function deleted(Comment $comment): void
    {
        $comment->post->decrement('comments_count');
    }
    //TODO: добавить нотификейшин фоловерам
}
