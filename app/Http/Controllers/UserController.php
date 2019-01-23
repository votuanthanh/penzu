<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateUserRequest;
use Auth;
use File;

class UserController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        
        return view('user.edit', ['user' => $user]);
    }

    public function deleteAvatar($user)
    {
        $path = public_path('/images/avatarImages');
        
        if(File::exists($path.'/'.$user->avatar)) {
            
            return true;
        }

        return false;
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
            return redirect()
                ->route('user.edit')
                ->with('level', 'success')
                ->with('message', 'Your information was successfully updated');
        }
    }

    
}
