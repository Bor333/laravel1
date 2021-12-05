<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        return view('admin.profile', [
            'profiles' => User::all()
        ]);
    }
    public function changeIsAdmin ($user_id)
    {
        /*
         * Auth::user()->id
        $user->is_admin = (!$user->is_admin);
        $user->
        $user->fill($user->is_admin)->save();
*/

        if ($user_id != Auth::user()->id) {
            $data = User::find($user_id);
            if ($data->is_admin == 1) $data->is_admin = 0;
            else $data->is_admin = 1;
            $data->save();
            return redirect()->route('admin.profile')->with('success', 'Профиль изменен');
        } else {
            return redirect()->route('admin.profile')->with('error', 'Нельзя снять с себя роль админа!');
        }
    }

}
