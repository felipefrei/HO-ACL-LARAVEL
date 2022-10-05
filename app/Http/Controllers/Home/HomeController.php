<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use DB;

class HomeController extends Controller
{
    public function Home()
    {
       $loggedUser    = Auth::user();

       $permission = DB::table("model_has_permissions")
                        ->where("model_has_permissions.model_id",$loggedUser->id)
                        ->select("model_has_permissions.permission_id")
                        ->get();

        if ($permission[0]->permission_id == 1) {
            $users = User::with('permissions')->get();
            return view('user.keep_user', ['users' => $users]);
        }

        if ($permission[0]->permission_id == 2) {
            return view('course.keep_course');
        } 
    }


}