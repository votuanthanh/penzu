<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class UserController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        
        return view('user.edit', ['user' => $user]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        if (Auth::check())
        {
            $user->update($request->all());

            return redirect()
                ->route('user.edit')
                ->with('level', 'success')
                ->with('message', 'Your information was successfully updated');
        }
    }
}
