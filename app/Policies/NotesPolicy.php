<?php

namespace App\Policies;

use App\Models\Notes;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Auth;

class NotesPolicy
{




    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Notes $notes)
    {

        return $user->id === $notes->user_id;
    }



    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Notes $notes): bool
    {
        return $user->id === $notes->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Notes $notes): bool
    {
        return $user->id === $notes->user_id;
    }

}
