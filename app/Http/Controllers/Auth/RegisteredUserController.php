<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Spatie\Permission\Models\Permission;
use DB;


class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    public function createNew()
    {
        return view('user.register_new');
    }

    public function edit($id)
    {
        $this->authorize('admin');
        $user_find = User::findOrFail($id);

        $user = User::with('permissions')->where('id', $user_find->id)->get();
        return view('user.edit', ['user' => $user]);
      
    }


    public function editUser(Request $request)
    {
        $data = $request->all();

        User::findOrFail($request->id)->update($data);
        $user = User::with('permissions')->where('id', $request->id)->get();

        $permission = [
            'permission_id' => $data['permission'],
        ];

        DB::table("model_has_permissions")
        ->where("model_has_permissions.model_id",$user[0]->id)
        ->update($permission);

        return redirect(RouteServiceProvider::USER); 
    }


    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        //Verifico se na request está sendo passado a permissão, caso não significa que o login está vindo da pagina de cadstro
        if ($request->permission == '') {

                //Faço uma busca pelo primeiro resultado da tabela Users
                $usersDb = User::get();
                            
                //Conto o resultado da busca
                $countUsers = count($usersDb);

                //valido os dados vindos da Request
                $request->validate([
                    'name' => ['required', 'string', 'max:255'],
                    'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                    'password' => ['required', 'confirmed', Rules\Password::defaults()],
                ]);

                //Uso a contagem de usuario para saber se a tabela users já tem alguem cadastrado, caso não o primeiro usuário a se cadastrar no sistema será cadastrado como Administrador do sistema
                if ($countUsers == 0) {
                    $user = User::create([
                                'name' => $request->name,
                                'email' => $request->email,
                                'password' => Hash::make($request->password),
                            ])->givePermissionTo('admin');
                }

                //Uso a contagem de usuario para saber se a tabela users já tem alguem cadastrado, caso sim o usuário será cadastrado como um usuário comum 
                if ($countUsers > 0) {
                    $user = User::create([
                                'name' => $request->name,
                                'email' => $request->email,
                                'password' => Hash::make($request->password),
                            ])->givePermissionTo('user');
                }

                event(new Registered($user));

                Auth::login($user);

                return redirect(RouteServiceProvider::HOME);
        }else{
            //O sistema cai nesse laço se na request estiver sendo passada a permissão do usuário, significa que o cadastro esta sendo feito por um usuario administrador

            //verifico se o usuario tem permissões de admin
            $this->authorize('admin');
                $request->validate([
                    'name' => ['required', 'string', 'max:255'],
                    'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                    'permission' =>['required', 'string', 'max:13'],
                    'password' => ['required', 'confirmed', Rules\Password::defaults()],
                ]);

                $permission = $request->permission;

                $user = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                ])->givePermissionTo($permission);

                return redirect(RouteServiceProvider::USER); 
        }   
    }
}
