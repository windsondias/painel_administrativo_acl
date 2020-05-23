<div class="row">
    <div class="col-md-7">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Geral</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                            data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                </div>
            </div>
            <div class="card-body">
                @if(request()->is('admin/settings/users/create')) @else
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="status" name="status"
                               @isset($user->status) @if($user->status == 1) checked @endif @endisset>
                        <label class="custom-control-label" for="status">Ativo?</label>
                    </div>
                @endif
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="name">Nome</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                               name="name"
                               maxlength="50" value="{{old('name', $user->name ?? null)}}">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-8">
                        <label for="lastname">Sobrenome</label>
                        <input type="text" class="form-control @error('lastname') is-invalid @enderror" id="lastname"
                               name="lastname"
                               maxlength="100" value="{{old('lastname', $user->lastname ?? null)}}">
                        @error('lastname')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                           name="email"
                           maxlength="100" value="{{old('email', $user->email ?? null)}}">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                       {{ $message }}
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="username">Usuário</label>
                    <input type="username" class="form-control @error('username') is-invalid @enderror" id="username"
                           name="username"
                           maxlength="20" value="{{old('username', $user->username ?? null)}}">
                    @error('username')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                    @enderror
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="password">Senha</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                               id="password" name="password"
                               maxlength="15">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="confirm_password">Confirme a senha</label>
                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                               id="password_confirmation"
                               name="password_confirmation" maxlength="15">
                        @error('password_confirmation')
                        <span class="invalid-feedback" role="alert">
                           {{ $message }}
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <div class="card card-secondary">
            <div class="card-header">
                <h3 class="card-title">Funções</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"
                            data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group">
                    @isset($roles)
                        @foreach($roles as $role)
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input @error('roles') is-invalid @enderror"
                                       id="role{{$role->id}}" value="{{$role->id}}"
                                       name="roles[]" @if($role->can) checked @else '' @endif>
                                <label class="custom-control-label" for="role{{$role->id}}">{{$role->name}}</label>
                                @error('roles')
                                <span class="invalid-feedback" role="alert">
                                   {{ $message }}
                                </span>
                                @enderror
                            </div>
                        @endforeach
                    @endisset
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6 mb-3">
        <a href="{{route('admin.users.index')}}">
            <button type="button" class="btn btn-block btn-outline-secondary">Voltar a tela principal</button>
        </a>
    </div>
    <div class="col-md-6 mb-3">
        <button type="submit"
                class="btn btn-block btn-outline-success">@if(request()->is('admin/settings/users/create')) Cadastrar
            Usuário  @else  Atualizar Usuário @endif </button>
    </div>
</div>
