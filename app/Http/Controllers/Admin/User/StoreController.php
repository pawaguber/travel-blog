<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Requests\Admin\User\StoreRequest;
use App\Mail\User\PasswordMail;
use App\Service\UserService;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
            $data = $request->validated();
            $password = Str::random(10);
            $data['password'] = Hash::make($password);

            $user = $this->service->store($data);
            event(new Registered($user));
            Mail::to($data['email'])->send(new PasswordMail($password));
    }
}
