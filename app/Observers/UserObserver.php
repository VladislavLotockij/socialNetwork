<?php

namespace App\Observers;

use App\Models\User;

class UserObserver
{
    /**
     * Handle the User "created" event.
     */
    public function created(User $user): void
    {
        $user->profile()->create([
            'avatar' => 'avatars/default.jpg',
            'bio' => 'Hello, I\'m new here!',
            'location' => null,
            'birthdate' => null,
            'gender' => null,
        ]);
    }
}
