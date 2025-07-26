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

    public function handleSelectGenresForm(Request $request) {
        dd($request->all());
    }
}
