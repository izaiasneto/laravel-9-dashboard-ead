<?php

namespace App\Observers;

use App\Models\ReplySupport;
use Illuminate\Support\Str;

class ReplySupportObserver
{
    /**
     * Handle the User "creating" event.
     *
     * @param  \App\Models\Admin  $replySupport
     * @return void
     */
    public function creating(ReplySupport $reply)
    {
        $reply->admin_id = auth()->user()->id;
        $reply->id = Str::uuid();
    }

}
