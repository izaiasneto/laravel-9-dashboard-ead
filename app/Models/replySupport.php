<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class replySupport extends Model
{
    use HasFactory;

    public $fillable = [
        'user_id', 'admin_id', 'support_id', 'description'
    ];
}
