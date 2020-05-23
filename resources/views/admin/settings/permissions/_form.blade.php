<div class="row">
    <div class="col-md-12">
        <div class="card card-danger">
            <div class="card-header">
                <h3 class="card-title">Permissão</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                            data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Nome</label>
                    <input type="name" class="form-control @error('name') is-invalid @enderror"
                           id="name" name="name" required placeholder="Ex: Cadastrar Usuário"
                           maxlength="50" value="{{ $permission->name ?? null }}">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <a href="{{route('admin.permissions.index')}}">
            <button type="button" class="btn btn-outline-secondary">Voltar a tela principal</button>
        </a>
        <button type="submit" class="btn btn-outline-success float-right">@if(request()->is('admin/settings/permissions/create')) Cadastrar Permissão  @else  Atualizar Permissão @endif </button>
    </div>
</div>
