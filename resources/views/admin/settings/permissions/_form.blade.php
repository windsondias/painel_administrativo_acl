<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-text-width"></i>
                    Detalhes
                </h3>
            </div>
            <div class="card-body">
                <dl>
                    <dt>Cadastrar</dt>
                    <dd>Para criar uma nova permissão é necessário informar o administrador do sistema, pois os
                        bloqueios que a
                        mesma realizara tem que ser definidos diretamente no código fonte.
                    </dd>
                    <dt>Editar</dt>
                    <dd>Editar o nome de uma permissão sem avisar o administrador do sistema irá fazer com que a mesma
                        deixe de funcionar.
                    </dd>
                    <dt>Deletar</dt>
                    <dd>Deletar uma permissão desviculará a mesma de todas as funções relacionadas.</dd>
                </dl>
            </div>
        </div>
    </div>
</div>
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
                <div class="form-row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="name">Nome</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                   id="name" name="name" placeholder="Ex: users_create"
                                   maxlength="50" value="{{ $permission->name ?? null }}">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="name">Nome Menu</label>
                            <input type="text" class="form-control @error('menu') is-invalid @enderror"
                                   id="menu" name="menu" placeholder="Ex: settings"
                                   maxlength="50" value="{{ $permission->menu ?? null }}">
                            @error('menu')
                            <span class="invalid-feedback" role="alert">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="name">Nome Visivel</label>
                            <input type="text" class="form-control @error('name_view') is-invalid @enderror"
                                   id="name_view" name="name_view" placeholder="Ex: Cadastrar Usuário"
                                   maxlength="50" value="{{ $permission->name_view ?? null }}">
                            @error('name_view')
                            <span class="invalid-feedback" role="alert">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6 mb-3">
        <a href="{{route('admin.permissions.index')}}">
            <button type="button" class="btn btn-block btn-outline-secondary">Voltar a tela principal</button>
        </a>
    </div>
    <div class="col-md-6 mb-3">
        <button type="submit"
                class="btn btn-block btn-outline-success">@if(request()->is('admin/settings/permissions/create'))
                Cadastrar Permissão  @else  Atualizar Permissão @endif </button>
    </div>
</div>
