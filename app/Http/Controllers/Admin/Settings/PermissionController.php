<?php

namespace App\Http\Controllers\Admin\Settings;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    private $permission;

    public function __construct(Permission $permission)
    {
        $this->permission = $permission;

    }

    public function index()
    {
        if(!auth()->user()->hasPermissionTo('permissions_view')){
            return redirect()->route('admin.errors.403');
        }
        $permissions = $this->permission::orderBy('name_view')->paginate(20);
        return view('admin.settings.permissions.index', compact('permissions'));
    }

    public function create()
    {
        if(!auth()->user()->hasPermissionTo('permissions_create')){
            return redirect()->route('admin.errors.403');
        }
        return view('admin.settings.permissions.create');
    }

    public function store(Request $request)
    {
        if(!auth()->user()->hasPermissionTo('permissions_create')){
            return redirect()->route('admin.errors.403');
        }
        $validatedData = $request->validate([
            'name' => 'required|max:50',
        ]);

        try {
            $permission = $this->permission;
            $permission->name = $request->name;
            $permission->name_view = $request->name_view;
            $permission->guard_name = 'web';
            $permission->save();

            return redirect()->route('admin.permissions.index')->withErrors([
                'success' => 'Permissão cadastrada com sucesso'
            ]);
        } catch (\Exception $exception) {

            return redirect()->route('admin.permissions.index')->withErrors([
                'error' => 'Ocorreu um erro ao cadastrar a permissão, tente novamente'
            ]);
        }

    }

    public function edit($id)
    {
        if(!auth()->user()->hasPermissionTo('permissions_edit')){
            return redirect()->route('admin.errors.403');
        }
        $permission = $this->permission::find($id);
        return view('admin.settings.permissions.edit', compact( 'permission'));
    }

    public function update(Request $request, $id)
    {
        if(!auth()->user()->hasPermissionTo('permissions_edit')){
            return redirect()->route('admin.errors.403');
        }
        $validatedData = $request->validate([
            'name' => 'required|max:50',
        ]);

        try {
            $permission = $this->permission::find($id);
            $permission->name = $request->name;
            $permission->name_view = $request->name_view;
            $permission->save();

            return redirect()->route('admin.permissions.index')->withErrors([
                'success' => 'Permissão atualizada com sucesso'
            ]);
        } catch (\Exception $exception) {
            return redirect()->route('admin.permissions.index')->withErrors([
                'error' => 'Ocorreu um erro ao atualizar a permissão, tente novamente'
            ]);
        }
    }

    public function destroy($id)
    {
        if(!auth()->user()->hasPermissionTo('permissions_destroy')){
            return redirect()->route('admin.errors.403');
        }
        try {
            $permission = $this->permission::find($id);
            $permission->delete();

            return redirect()->route('admin.permissions.index')->withErrors([
                'success' => 'Permissão excluida com sucesso'
            ]);
        }catch (\Exception $exception){
            return redirect()->route('admin.permissions.index')->withErrors([
                'error' => 'Ocorreu um erro ao excluir a permissão, tente novamente'
            ]);
        }

    }

    public function search(Request $request)
    {
        if(!auth()->user()->hasPermissionTo('permissions_view')){
            return redirect()->route('admin.errors.403');
        }
        $permission = $this->permission::where('name', 'like', '%'.$request->permission.'%')
            ->get();

        return response()->json($permission);
    }

}
