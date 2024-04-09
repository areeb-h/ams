<?php

namespace App\Policies;

use App\Models\StudySession;
use App\Models\User;
use App\Traits\AdminAuthorization;
use Illuminate\Auth\Access\Response;

class StudySessionPolicy
{
    use AdminAuthorization;
//    /**
//     * Determine whether the user can view any models.
//     */
//    public function viewAny(User $user): bool
//    {
//        //
//    }
//
//    /**
//     * Determine whether the user can view the model.
//     */
//    public function view(User $user, StudySession $studySession): bool
//    {
//        //
//    }
//
//    /**
//     * Determine whether the user can create models.
//     */
//    public function create(User $user): bool
//    {
//        //
//    }
//
//    /**
//     * Determine whether the user can update the model.
//     */
//    public function update(User $user, StudySession $studySession): bool
//    {
//        //
//    }
//
//    /**
//     * Determine whether the user can delete the model.
//     */
//    public function delete(User $user, StudySession $studySession): bool
//    {
//        //
//    }
//
//    /**
//     * Determine whether the user can restore the model.
//     */
//    public function restore(User $user, StudySession $studySession): bool
//    {
//        //
//    }
//
//    /**
//     * Determine whether the user can permanently delete the model.
//     */
//    public function forceDelete(User $user, StudySession $studySession): bool
//    {
//        //
//    }

    public function markAttendance(User $user, StudySession $studySession)
    {
        if (self::isAdmin()) {
            return true;
        }

        return $studySession->teachers->contains($user->teacher->id);
    }
}
