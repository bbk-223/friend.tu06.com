<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  array<string, string>  $input
     */
    public function update(User $user, array $input): void
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],

            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user->id),
            ],
            'gender' => ['nullable', 'string', 'max:255'],
            'age' => ['nullable', 'integer', 'max:255'],
            'relationship' => ['nullable', 'string', 'max:255'],
            'country' => ['nullable', 'string', 'max:255'],
            'state' => ['nullable', 'string', 'max:255'],
            'city' => ['nullable', 'string', 'max:255'],
            'favorites' => ['nullable', 'string', 'max:500'],
            'profile_picture' => ['nullable', 'image'],
        ])->validate();

        $this->uploadProfilePicture($input);

        if (
            $input['email'] !== $user->email &&
            $user instanceof MustVerifyEmail
        ) {
            $this->updateVerifiedUser($user, $input);
        } else {
            $user->forceFill([
                'name' => $input['name'],
                'email' => $input['email'],
                'gender' => $input['gender'],
                'age' => $input['age'],
                'relationship' => $input['relationship'],
                'country' => $input['country'],
                'state' => $input['state'],
                'city' => $input['city'],
                'favorites' => $input['favorites'],
                'profile_picture' => $input['profile_picture'],
            ])->save();
        }
    }
    protected function uploadProfilePicture(&$input)
    {
        if (request()->hasFile('profile_picture')) {
            $id = request()->user()->id;
            if ($the_user = User::find($id)->profile_picture){
                Storage::delete('profiles-images/' . $the_user);
            }
            $uploadedFile = $input['profile_picture'];
            $fileName = $uploadedFile->storeAs(
                'profiles-images',
                'profile-user-' . $id .
                    '.' .
                    $uploadedFile->getClientOriginalExtension()
            );
            $input['profile_picture'] = $fileName;
        }
    }
    /**
     * Update the given verified user's profile information.
     *
     * @param  array<string, string>  $input
     */
    protected function updateVerifiedUser(User $user, array $input): void
    {
        $user->forceFill([
            'name' => $input['name'],
            'email' => $input['email'],
            'gender' => $input['gender'],
            'age' => $input['age'],
            'relationship' => $input['relationship'],
            'country' => $input['country'],
            'state' => $input['state'],
            'city' => $input['city'],
            'favorites' => $input['favorites'],
            'profile_picture' => $input['profile_picture'],
            'email_verified_at' => null,
        ])->save();

        $user->sendEmailVerificationNotification();
    }
}
