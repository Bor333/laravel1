<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(Request $request, User $user)
    {

        if ($request->isMethod('post')) {
            $user->is_admin = 0;
            $user->save();
            //  $user->fill($request->all())->save();


            return redirect()->route('admin.profile')->with('success');
        }
        return view('admin.profile', [
            'profiles' => User::all()
        ]);
    }

    public function changeIsAdmin($user)
    {
        /*
        $user->is_admin = (!$user->is_admin);
        $user->
        $user->fill($user->is_admin)->save();
*/

        $data = User::find($user);

        $data->is_admin = 1;
        $data->save();
        return redirect()->route('admin.profile')->with('success', 'Профиль изменен');
    }

}
