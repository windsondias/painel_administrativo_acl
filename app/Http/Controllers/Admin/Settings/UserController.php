<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        if(!auth()->user()->hasPermissionTo('users_view')){
            return redirect()->route('admin.errors.403');
        }
        $users = $this->user::where('id', '<>', auth()->user()->id)->paginate(20);
        return view('admin.settings.users.index', compact('users'));
    }

    public function create()
    {
        if(!auth()->user()->hasPermissionTo('users_create')){
            return redirect()->route('admin.errors.403');
        }
        $roles = Role::orderBy('name')->get();
        return view('admin.settings.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        if(!auth()->user()->hasPermissionTo('users_create')){
            return redirect()->route('admin.errors.403');
        }
        $validatedData = $request->validate([
            'name' => 'required|max:50',
            'lastname' => 'required|max:100',
            'username' => 'unique:App\Models\User|required|max:20',
            'email' => 'unique:App\Models\User|email:rfc|required|max:100',
            'password' => 'min:8|same:password_confirmation|required|max:15',
            'password_confirmation' => 'required|max:15',
            'roles' => 'required',
        ]);

        try {
            $user = new $this->user;
            $user->status = 1;
            $user->name = $request->name;
            $user->lastname = $request->lastname;
            $user->email = $request->email;
            $user->username = $request->username;
            $user->password = bcrypt($request->password);
            $user->save();

            foreach ($request->roles as $role){
                $userRoles[] = Role::where('id', $role)->first();
            }

            $user = User::where('id', $user->id)->first();

            if(!empty($userRoles)){
                $user->syncRoles($userRoles);
            }else{
                $user->syncRoles(null);
            }

            return redirect()->route('admin.users.index')->withErrors([
                'success' => 'Usuário cadastrado com sucesso'
            ]);
        } catch (\Exception $exception) {
            return redirect()->route('admin.users.index')->withErrors([
                'error' => 'Ocorreu um erro ao cadastrar o usuário, tente novamente'
            ]);
        }
    }

    public function edit($id)
    {
        if(!auth()->user()->hasPermissionTo('users_edit')){
            return redirect()->route('admin.errors.403');
        }
        $user = $this->user::find($id);
        $roles = Role::orderBy('name')->get();
        foreach ($roles as $role){
            if($user->hasRole($role->name)){
                $role->can = true;
            }else{
                $role->can = false;
            }
        }
        return view('admin.settings.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, $id)
    {
        if(!auth()->user()->hasPermissionTo('users_edit')){
            return redirect()->route('admin.errors.403');
        }
        $validatedData = $request->validate([
            'name' => 'required|max:50',
            'lastname' => 'required|max:100',
            'username' => 'required|max:20|unique:users,username,' . $id,
            'email' => 'email:rfc|required|max:100|unique:users,email,' . $id,
            'password' => 'nullable|min:8|same:password_confirmation|max:15',
            'password_confirmation' => 'nullable|max:15',
            'roles' => 'required',
        ]);

        try {
            $user = $this->user::find($id);
            $user->status = isset($request->status) ? 1 : 0;
            $user->name = $request->name;
            $user->lastname = $request->lastname;
            $user->email = $request->email;
            $user->username = $request->username;
            !empty($request->password) ? $user->password = bcrypt($request->password) : null;
            $user->save();

            foreach ($request->roles as $role){
                $userRoles[] = Role::where('id', $role)->first();
            }

            $user = User::where('id', $user->id)->first();

            if(!empty($userRoles)){
                $user->syncRoles($userRoles);
            }else{
                $user->syncRoles(null);
            }

            return redirect()->route('admin.users.index')->withErrors([
                'success' => 'Usuário atualizado com sucesso'
            ]);
        } catch (\Exception $exception) {
            return redirect()->route('admin.users.index')->withErrors([
                'error' => 'Ocorreu um erro ao atualizar o usuário, tente novamente'
            ]);
        }
    }

    public function destroy($id)
    {
        if(!auth()->user()->hasPermissionTo('users_destroy')){
            return redirect()->route('admin.errors.403');
        }
        try {
            $user = $this->user::find($id);
            $user->delete();

            return redirect()->route('admin.users.index')->withErrors([
                'success' => 'Usuário excluido com sucesso'
            ]);
        }catch (\Exception $exception){
            return redirect()->route('admin.users.index')->withErrors([
                'error' => 'Ocorreu um erro ao deletar o usuário, tente novamente'
            ]);
        }
    }

    public function search(Request $request)
    {
        if(!auth()->user()->hasPermissionTo('users_view')){
            return redirect()->route('admin.errors.403');
        }
        $user = $this->user::where('id', '<>', auth()->user()->id)
            ->where('name', 'like', '%'.$request->user.'%')
            ->get();

        return response()->json($user);
    }
}
