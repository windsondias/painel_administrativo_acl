<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    private $role;

    public function __construct(Role $role)
    {
        $this->role = $role;
    }

    public function index()
    {
        if(!auth()->user()->hasPermissionTo('roles_view')){
            return redirect()->route('admin.errors.403');
        }
        $roles = $this->role::orderBy('name')->paginate(20);
        return view('admin.settings.roles.index', compact('roles'));
    }

    public function create()
    {
        if(!auth()->user()->hasPermissionTo('roles_create')){
            return redirect()->route('admin.errors.403');
        }
        $permissions = Permission::orderBy('name')->get();
        return view('admin.settings.roles.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        if(!auth()->user()->hasPermissionTo('roles_create')){
            return redirect()->route('admin.errors.403');
        }
        $validatedData = $request->validate([
            'name' => 'required|max:50',
            'permissions' => 'required',
        ]);

        try {
            $role = new $this->role;
            $role->name = $request->name;
            $role->guard_name = 'web';
            $role->save();

            foreach ($request->permissions as $permission){
                $rolePermissions[] = Permission::where('id', $permission)->first();
            }

            $role = Role::where('id', $role->id)->first();

           if(!empty($rolePermissions)){
               $role->syncPermissions($rolePermissions);
           }else{
               $role->syncPermissions(null);
           }

            return redirect()->route('admin.roles.index')->withErrors([
                'success' => 'Função cadastrada com sucesso'
            ]);
        } catch (\Exception $exception) {

            return redirect()->route('admin.roles.index')->withErrors([
                'error' => $exception->getMessage() //'Ocorreu um erro ao cadastrar a função, tente novamente'
            ]);
        }
    }

    public function edit($id)
    {
        if(!auth()->user()->hasPermissionTo('roles_edit')){
            return redirect()->route('admin.errors.403');
        }
        $role = $this->role::find($id);
        $permissions = Permission::orderBy('name')->get();
        foreach ($permissions as $permission){
            if($role->hasPermissionTo($permission->name)){
                $permission->can = true;
            }else{
                $permission->can = false;
            }
        }
        return view('admin.settings.roles.edit', compact('role', 'permissions'));
    }

    public function update(Request $request, $id)
    {
        if(!auth()->user()->hasPermissionTo('roles_edit')){
            return redirect()->route('admin.errors.403');
        }
        $validatedData = $request->validate([
            'name' => 'required|max:50',
            'permissions' => 'required',
        ]);

        try {
            $role = $this->role::find($id);
            $role->name = $request->name;
            $role->save();

            foreach ($request->permissions as $permission){
                $rolePermissions[] = Permission::where('id', $permission)->first();
            }

            $role = Role::where('id', $role->id)->first();

            if(!empty($rolePermissions)){
                $role->syncPermissions($rolePermissions);
            }else{
                $role->syncPermissions(null);
            }

            return redirect()->route('admin.roles.index')->withErrors([
                'success' => 'Função atualizada com sucesso'
            ]);
        } catch (\Exception $exception) {
            return redirect()->route('admin.roles.index')->withErrors([
                'error' => 'Ocorreu um erro ao atualizar a função, tente novamente'
            ]);
        }
    }

    public function destroy($id)
    {
        if(!auth()->user()->hasPermissionTo('roles_destroy')){
            return redirect()->route('admin.errors.403');
        }
        try {
            $role = $this->role::find($id);
            $role->delete();

            return redirect()->route('admin.roles.index')->withErrors([
                'success' => 'Função excluida com sucesso'
            ]);
        }catch (\Exception $exception){
            return redirect()->route('admin.roles.index')->withErrors([
                'error' => 'Ocorreu um erro ao excluir a função, tente novamente'
            ]);
        }
    }

    public function search(Request $request)
    {
        if(!auth()->user()->hasPermissionTo('roles_view')){
            return redirect()->route('admin.errors.403');
        }
        $role = $this->role::where('name', 'like', '%'.$request->role.'%')
            ->get();

        return response()->json($role);
    }
}
