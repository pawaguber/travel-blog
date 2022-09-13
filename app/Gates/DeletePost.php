<?php

namespace App\Gates;

use App\Models\User;

class DeletePost {
    public function deletePost($user) {
        return $user->getRoles->role_id == User::ROLE_ADMIN;
    }
}
