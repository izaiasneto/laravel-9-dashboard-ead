<?php

namespace App\Observers;

use App\Models\Lesson;
use Illuminate\Support\Str;

class LessonObserver
{
    /**
     * Handle the User "creating" event.
     *
     * @param  \App\Models\Lesson $lesson
     * @return void
     */
    public function creating(Lesson $lesson)
    {
        $lesson->id = Str::uuid();
        $lesson->url = Str::slug($lesson->name);
    }

    /**
     * Handle the User "updating" event.
     *
     * @param  \App\Models\Lesson $lesson
     * @return void
     */
    public function updating(Lesson $lesson)
    {
        $lesson->id = Str::uuid();
        $lesson->url = Str::slug($lesson->name);
    }

}