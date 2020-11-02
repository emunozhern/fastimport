<?php

namespace App\Actions\Fortify;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserDniInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    public function update($user, array $input)
    {
        Validator::make($input, [
            'photo_1' => ['nullable', 'image', 'max:10000'],
            'photo_2' => ['nullable', 'image', 'max:10000'],
        ])->validateWithBag('updateProfileInformation');
        
        if (isset($input['photo_1']) && isset($input['photo_2'])) {
            $user->updateDniPhoto($input['photo_1'], $input['photo_2']);
        }
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    // protected function updateVerifiedUser($user, array $input)
    // {
    //     $user->forceFill([
    //         'name' => $input['name'],
    //         'email' => $input['email'],
    //         'email_verified_at' => null,
    //     ])->save();

    //     $user->sendEmailVerificationNotification();
    // }
}