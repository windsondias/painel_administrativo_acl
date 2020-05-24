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
                    <dd>Para cadastrar uma nova função apenas defina o nome de facil descrição e vincule as permissões
                        que devem ser fornecidas para a mesma
                    </dd>
                    <dt>Editar</dt>
                    <dd>Para editar uma nova função vincule ou desvincule as permissões relacionadas.
                    </dd>
                    <dt>Deletar</dt>
                    <dd>Deletar uma função desviculará a mesma de todos usuários relacionados.</dd>
                </dl>
            </div>
        </div>
    </div>
</div>
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
                           id="name" name="name" placeholder="Ex: Gestor financeiro"
                           maxlength="50" value="{{ $role->name ?? null }}">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
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
                    @if(isset($permissions) && $permissions->count() > 0)
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="check_all">
                            <label class="custom-control-label" for="check_all">Selecionar Todas</label>
                        </div>
                        <div class="dropdown-divider"></div>
                        <div class="row">
                            <div class="col-4">
                                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                     aria-orientation="vertical">
                                    <a class="nav-link active bg-secondary" id="settings_tab" data-toggle="pill"
                                       href="#settings_tab_content">Configurações</a>
                                    {{-- <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill"
                                        href="#v-pills-profile" role="tab" aria-controls="v-pills-profile"
                                        aria-selected="false">Profile</a>--}}
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="tab-content" id="v-pills-tabContent">
                                    <div class="tab-pane fade show active" id="settings_tab_content">
                                        @foreach($permissions as $permission)
                                            @if($permission->menu == 'settings')
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox"
                                                           class="custom-control-input @error('permissions') is-invalid @enderror permissions"
                                                           id="permissions{{$permission->id}}"
                                                           value="{{$permission->id}}"
                                                           name="permissions[]"
                                                           @if($permission->can) checked @else '' @endif>
                                                    <label class="custom-control-label"
                                                           for="permissions{{$permission->id}}">{{$permission->name_view}}</label>
                                                    @error('permissions')
                                                    <span class="invalid-feedback" role="alert">
                                                        {{ $message }}
                                                    </span>
                                                    @enderror
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                    {{--                                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"--}}
                                    {{--                                         aria-labelledby="v-pills-profile-tab">--}}
                                    {{--                                    </div>--}}
                                </div>
                            </div>
                        </div>

                    @else
                        <p>Para cadastrar ou editar uma função é necessario ter permissões cadastradas.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6 mb-3">
        <a href="{{route('admin.roles.index')}}">
            <button type="button" class="btn btn-block btn-outline-secondary">Voltar a tela principal</button>
        </a>
    </div>
    <div class="col-md-6 mb-3">
        <button type="submit"
                class="btn btn-block btn-outline-success">@if(request()->is('admin/settings/roles/create')) Cadastrar
            Função  @else  Atualizar Função @endif </button>
    </div>
</div>

@section('js')

    <script>

        $(document).ready(function () {
            if ($('.permissions').prop("checked")) {
                $("#check_all").prop("checked", true);
            } else {
                $("#check_all").prop("checked", false);
            }
            $('#check_all').change(function () {
                if ($(this).prop("checked")) {
                    $(".permissions").prop("checked", true);
                } else {
                    $(".permissions").prop("checked", false);
                }
            });
        });

    </script>

@endsection
