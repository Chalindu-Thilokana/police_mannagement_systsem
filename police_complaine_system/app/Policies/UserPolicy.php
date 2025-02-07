<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    /**
     * Create a new policy instance.
     */
    public function manageUsers(User $user)
    {
        return $user->userType === 'SuperAdmin';
    }

    public function manageBranch(User $user)
    {
        return $user->userType === 'BranchAdmin';
    }

    public function manageComplaints(User $user)
    {
        return in_array($user->userType, ['BranchSubAdmin', 'BranchAdmin']);
    }
}
