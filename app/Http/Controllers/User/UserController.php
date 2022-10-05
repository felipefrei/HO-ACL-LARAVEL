<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use DB;

class UserController extends Controller
{
    public function keepUser()
    {
        $this->authorize('admin');
        $users = User::with('permissions')->get();
        return view('user.keep_user', ['users' => $users]);
    }

}