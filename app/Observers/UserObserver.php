<?php

namespace App\Observers;

use App\Models\User;
use Carbon\Carbon;

class UserObserver
{
    /**
     * Handle the shop product category "created" event.
     *
     * @param User $user
     * @return void
     */
    public function created(User $user)
    {
        // Все зарегистрированные получают роль User
        $now = Carbon::now();
        $user->roles()->attach(3, ['created_at' => $now, 'updated_at' => $now]);
    }
}
