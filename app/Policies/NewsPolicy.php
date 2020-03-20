<?php

namespace App\Policies;

use App\Models\User;
use App\Models\News;

class NewsPolicy
{

    public function update(User $user, News $news){


        return $user->id === $news->user_id;
    }
 
}
