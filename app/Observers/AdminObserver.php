<?php

namespace App\Observers;

use App\Models\Admin;
use Illuminate\Support\Str;

class AdminObserver
{
    /**
     * Handle the User "creating" event.
     *
     * @param  \App\Models\Admin  $user
     * @return void
     */
    public function creating(Admin $user)
    {
        $user->id = Str::uuid();
    }

}
