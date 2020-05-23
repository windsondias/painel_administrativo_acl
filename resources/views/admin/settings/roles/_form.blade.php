<div class="row">
    <div class="col-md-6">
        <div class="card card-secondary">
            <div class="card-header">
                <h3 class="card-title">Função</h3>
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
                           id="name" name="name" required placeholder="Ex: Gestor financeiro"
                           maxlength="50" value="{{ $role->name ?? null }}">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card card-danger">
            <div class="card-header">
                <h3 class="card-title">Permissões</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                            data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="permissions">Selecione as permissões que está função pode
                        ter</label>
                    @foreach($permissions as $permission)
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox"
                                   class="custom-control-input @error('permissions') is-invalid @enderror"
                                   id="permissions{{$permission->id}}" value="{{$permission->id}}"
                                   name="permissions[]" @if($permission->can) checked @else '' @endif>
                            <label class="custom-control-label"
                                   for="permissions{{$permission->id}}">{{$permission->name}}</label>
                            @error('permissions')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <a href="{{route('admin.roles.index')}}">
            <button type="button" class="btn btn-outline-secondary">Voltar a tela principal</button>
        </a>
        <button type="submit"
                class="btn btn-outline-success float-right">@if(request()->is('admin/settings/roles/create')) Cadastrar
            Função  @else  Atualizar Função @endif </button>
    </div>
</div>
