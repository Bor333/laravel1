<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $users = User::query()->where('id', '!=', Auth::id())->get();
        return view('admin.users', ['users' => $users]);
    }

    public function toggleAdmin(Request $request, User $user)
    {
        $request->flash();
        $id = $request->except('_token');

        if ($id != Auth::id()) {
            $user = User::query()->where('id', $id)->first();

            $user->is_admin = !$user->is_admin;
            $user->save();
            return redirect()->route('admin.updateUsers')->withSuccess('Админ назначен/снят');
        } else {
            return redirect()->route('admin.updateUsers')->withError('Нельзя снимать админа с себя');
        }
    }
}
