@extends('admin.template.base')

@section('title', 'Usuários')


@section('content')

    <div class="container pt-3">
        <div class="row mb-3">
            <div class="col-md-6">
                <a href="{{route('admin.users.create')}}">
                    <button class="btn btn-outline-secondary">Adicionar Usuário</button>
                </a>
            </div>
            <div class="col-md-6">
                <div class="input-group">
                    <input type="text" class="form-control" id="search_user" placeholder="Pesquisar Usuário">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit" id="btn_search_user"><i
                                class="fas fa-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row my-1">
            <div class="col-md-12">
                @error('success')
                <div class="alert alert-success alert-dismissible fade show">
                    <strong>{{ $message }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @enderror
                @error('error')
                <div class="alert alert-danger alert-dismissible fade show">
                    <strong>{{ $message }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @enderror
                <div class="table-responsive">
                    <table class="table table-sm table-bordered table-striped table-hover">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Sobrenome</th>
                            <th scope="col">E-mail</th>
                            <th colspan="2" scope="col">Ações</th>
                        </tr>
                        </thead>
                        <tbody id="body_table_users">
                        @if($users->count() == 0)
                            <tr class="text-center">
                                <td colspan="5"> Nenhum usuário encontrado!</td>
                            </tr>
                        @else
                            @foreach($users as $user)
                                <tr>
                                    <th scope="row">{{$user->id}}</th>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->lastname}}</td>
                                    <td>{{$user->email}}</td>
                                    <td width="10">
                                        <a href="{{route('admin.users.edit', ['user' => $user->id])}}">
                                            <button class="btn btn-warning" title="Editar">
                                                <i class="fas fa-pencil-alt"></i>
                                            </button>
                                        </a>
                                    </td>
                                    <td width="10">
                                        @if(auth()->user()->id != $user->id)
                                            <button class="btn btn-danger" id="btn_delete_user" user="{{$user->id}}"
                                                    title="Excluir" data-toggle="modal"
                                                    data-target="#modal_delete_user">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                    {{ $users->onEachSide(5)->links() }}
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal_delete_user" data-backdrop="static" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Deseja excluir este usuário?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Está ação não pode ser revertida
                </div>
                <div class="modal-footer">
                    <form id="destroy" action="" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-danger">Excluir</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script>
        $(document).on('click', '#btn_delete_user', function () {
            var user = $(this).attr('user');
            var url = '{{ route("admin.users.destroy", ":user") }}';
            url = url.replace(':user', user);
            $("#destroy").attr('action', url);
        });

        $(document).ready(function () {
            $('#search_user').keyup(function () {
                var user = $(this).val();
                $.ajax({
                    type: "POST",
                    url: "{{route('admin.users.search')}}",
                    dataType: "json",
                    data: {'user': user},
                    headers: {
                        "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")
                    },
                    success: function (data) {
                        var tr = '';
                        if (data == '') {
                            tr += '<tr>' +
                                '<td colspan="5" class="text-center">Nenhum usuário encontrado!</td>' +
                                '</tr>';
                        } else {
                            for (var i = 0; i < data.length; i++) {
                                var route = '{{route("admin.users.edit", ":user")}}';
                                route = route.replace(':user', data[i].id);
                                var userId = '{{auth()->user()->id}}';
                                var userDelete;
                                if (userId != data[i].id) {
                                    userDelete = '<button class="btn btn-danger" id="btn_delete_user" user="' + data[i].id + '" title="Excluir" data-toggle="modal" data-target="#modal_delete_user"> <i class="fas fa-trash"></i></button> ';
                                } else {
                                    userDelete = '';
                                }
                                tr += '<tr>' +
                                    '<td>' + data[i].id + '</td>' +
                                    '<td>' + data[i].name + '</td>' +
                                    '<td>' + data[i].lastname + '</td>' +
                                    '<td>' + data[i].email + '</td>' +
                                    '<td width="10">' +
                                    '    <a href="' + route + '"> <button class="btn btn-warning" title="Editar"><i class="fas fa-pencil-alt"></i></button></a>' +
                                    '</td>' +
                                    '<td width="10"> ' + userDelete + ' </td></tr>';
                            }
                        }
                        $('#body_table_users').html(tr).show();
                    }
                });
            });
        });
    </script>
@endsection
