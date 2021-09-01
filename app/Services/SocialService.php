<?php

namespace App\Services;

use App\Contracts\Social;
use App\Models\User as ModelsUser;
use Laravel\Socialite\Contracts\User;

class SocialService implements Social
{
    public function saveUser(User $user): string
    {
        $currentUser = ModelsUser::where('email', $user->getEmail())->first();
        if ($currentUser) {
            $currentUser->name = $user->getName();
            $currentUser->save();
            \Auth::loginUsingId($currentUser->id);
            route('account');
        } else {
            //registration
        }
        throw new \Exception('User not found');
    }
}
