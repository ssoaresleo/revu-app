<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountCreationController extends Controller
{
    public function showAccountForm()
    {
        return view('register.account');
    }

    public function showSelectGenresForm()
    {
        return view('register.select-genres');
    }

    public function showProfileSettingsForm()
    {
        return view('register.profile-settings');
    }

    public function handleAccountForm(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:2|max:200',
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        session(['form_data_account' => $validated]);
        return redirect()->route('register.select-genres');
    }

    public function handleSelectGenresForm(Request $request)
    {
        $validated = $request->validate([
            'genres' => 'required|array|min:1',
            'genres.*' => 'integer',
        ]);

        session(['form_data_genres' => $validated['genres']]);
        return redirect()->route('register.profile-settings');
    }

    public function handleProfileSettingsForm(Request $request)
    {
        $validated = $request->validate([
            'profile_picture' => 'nullable|image|max:2048|mimes:png,jpg',
            'username' => 'required|string|max:255',
            'bio' => 'nullable|string|max:1000',
        ]);
        $image_file = $request->file('profile_picture');
        if ($image_file) {
            $path = $image_file->store('uploads', 'public');
            $validated['profile_picture'] = $path;
        }
        return redirect()->route('register.profile-settings');
    }
}
