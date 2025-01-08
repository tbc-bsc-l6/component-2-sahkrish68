<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        // Validate the input data
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'max:15', 'regex:/^[0-9]+$/'],  // Ensure phone is a string and numeric
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        // Create and return the user
        try {
            return User::create([
                'name' => $input['name'],
                'email' => $input['email'],
                'phone' => $input['phone'], // Store the phone number
                'password' => Hash::make($input['password']),
            ]);
        } catch (\Exception $e) {
            // Log the error or handle it as necessary
            throw new \Exception("Error creating user: " . $e->getMessage());
        }
    }
}
