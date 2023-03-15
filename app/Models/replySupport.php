<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class replySupport extends Model
{
    use HasFactory;

     /**
     * Indicates if the model's ID is auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    public $fillable = [
        'user_id', 'admin_id', 'support_id', 'description'
    ];
}
