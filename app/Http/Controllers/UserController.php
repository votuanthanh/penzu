<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateUserRequest;
use Auth;
use File;
Use Alert;

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
        // dd($request->all());
        if (Auth::check())
        {
            if($request->avatar)
            {
                $path = public_path('/images/avatarImages');
                $oldAva = $user->avatar;

                $fileUpload = $request->avatar;
                $nameFileUpload = uniqid() . '.' . $fileUpload->getClientOriginalExtension();
                $fileUpload->move($path, $nameFileUpload);
                $user->avatar = $nameFileUpload;
                if($user->update($request->all()))
                    if(File::exists($path.'/'.$oldAva))
                        File::delete($path.'/'.$oldAva);
            }
           

            $user->update($request->all());
            Alert::success('Congratulations!', 'Your information has been successfully updated.');

            return redirect()->route('user.edit');
        }
    }

    
}
