<?php

namespace App\Observers;

use App\Models\Admin;
use Illuminate\Support\Str;

class AdminObserver
{
    /**
     * Handle the User "creating" event.
     *
     * @param  \App\Models\Admin  $admin
     * @return void
     */
    public function creating(Admin $admin)
    {
        $admin->id = Str::uuid();
    }

}
