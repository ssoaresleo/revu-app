<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AccountCreationController extends Controller
{
    public function showAccountForm()
    {
        return view('register.account');
    }

    public function showSelectGenresForm()
    {
        $genres = Genre::all();
        return view('register.select-genres', compact('genres'));
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
            'username' => 'required|string|max:255',
            'bio' => 'nullable|string|max:1000',
            'profile_picture' => 'nullable|image|max:2048|mimes:png,jpg,jpeg',
        ]);
        $image_file = $request->file('profile_picture');
        if ($image_file) {
            $path = $image_file->store('uploads', 'public');
            $validated['profile_picture'] = $path;
        }

        session(['form_data_profile' => $validated]);

        return redirect()->route('register.finalize');
    }

    public function finalizeAccountCreation(Request $request, User $user)
    {
        $accountData = session('form_data_account', []);
        $selectedGenres = session('form_data_genres', []);
        $profileData = session('form_data_profile', []);

        $userData = array_merge($accountData, $profileData);

        $user = $user->fill($userData);
        $user->password = Hash::make($userData['password']);
        $user->save();

        $user->genres()->sync($selectedGenres);

        session()->forget(['form_data_account', 'form_data_profile', 'form_data_genres']);
        return redirect()->route('register.success');
    }
}
