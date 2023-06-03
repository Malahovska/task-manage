<?php
use App\Models\User;

class UserPolicy
{
    public function manageUsers(User $currentUser, User $user)
    {
        return $currentUser->role->name === 'Administrator';
    }

    public function updateProfile(User $currentUser, User $user)
    {
        return $currentUser->id === $user->id;
    }
}
