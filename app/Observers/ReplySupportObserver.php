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
        $reply->user_id = '6ffc1b8c-535a-4184-be29-e6f2a3e95ea6'; //temporário
        $reply->id = Str::uuid();
    }

}
