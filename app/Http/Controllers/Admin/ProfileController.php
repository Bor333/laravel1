<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function update(Request $request)
    {

        $user = Auth::user();

      //  $user = User::find(1);

        if ($request->isMethod('post')) {

               $this->validate($request, $this->validateRules(), [], $this->attributeNames());
         if (Hash::check($request->post('password'), $user->password)) {

                $user->fill([
                    'name' => $request->post('name'),
                    'password' => Hash::make($request->post('newPassword')),
                    'email' => $request->post('email')
                ])->save();

                return redirect()->route('admin.updateProfile')->withSucces('Профиль успешно изменен!');
        } else {
                return redirect()->route('admin.updateProfile')->withError('Ошибка!');
            }
        }

        return view('admin.profle', [
            'user' => $user
        ]);
    }

    public function validateRules()
    {
        return [
            'name' => 'required|string|max:15',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'password' => 'required',
            'newPassword' => 'required|string|min:3',
        ];
    }

    protected function attributeNames()
    {
        return [
            'newPassword' => 'Новый пароль'
        ];
    }
}
