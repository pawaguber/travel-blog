<?php

namespace App\Service;


use App\Models\User;

class UserService
{
    public function store($data)
    {
        $user = User::firstOrCreate($data);
        return $user;
    }

    public function update($data, $user){
        $user->update($data);
    }

}
