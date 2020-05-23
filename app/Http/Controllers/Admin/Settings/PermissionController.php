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
        $permissions = $this->permission::paginate(20);
        return view('admin.settings.permissions.index', compact('permissions'));
    }

    public function create()
    {
        return view('admin.settings.permissions.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:50',
        ]);

        try {
            $permission = $this->permission;
            $permission->name = $request->name;
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
        $permission = $this->permission::find($id);
        return view('admin.settings.permissions.edit', compact( 'permission'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:50',
        ]);

        try {
            $permission = $this->permission::find($id);
            $permission->name = $request->name;
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
        $permission = $this->permission::where('name', 'like', '%'.$request->permission.'%')
            ->get();

        return response()->json($permission);
    }

}
