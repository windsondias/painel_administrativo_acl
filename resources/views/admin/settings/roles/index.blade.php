@extends('admin.template.base')

@section('title', 'Funções')

@section('content')

    <div class="container pt-3">
        <div class="row">
            <div class="col-md-6 mb-3">
                <a href="{{route('admin.roles.create')}}">
                    <button class="btn btn-outline-secondary">Adicionar Função</button>
                </a>
            </div>
            <div class="col-md-6 mb-3">
                <div class="input-group">
                    <input type="text" class="form-control" id="search_role" placeholder="Pesquisar Função">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit" id="btn_search_role"><i
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
                            <th colspan="2" scope="col"></th>
                        </tr>
                        </thead>
                        <tbody id="body_table_roles">
                        @if($roles->count() == 0)
                            <tr class="text-center">
                                <td colspan="3"> Nenhuma função encontrada!</td>
                            </tr>
                        @else
                            @foreach($roles as $role)
                                <tr>
                                    <th scope="row">{{$role->id}}</th>
                                    <td>{{$role->name}}</td>
                                    <td width="10">
                                        <a href="{{route('admin.roles.edit', ['role' => $role->id])}}">
                                            <button class="btn btn-warning" title="Editar">
                                                <i class="fas fa-pencil-alt"></i>
                                            </button>
                                        </a>
                                    </td>
                                    <td width="10">
                                        <button class="btn btn-danger" id="btn_delete_role" role="{{$role->id}}"
                                                title="Excluir" data-toggle="modal"
                                                data-target="#modal_delete_role">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                    {{ $roles->onEachSide(5)->links() }}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">

            </div>
        </div>
    </div>

    <div class="modal fade" id="modal_delete_role" data-backdrop="static" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Deseja excluir está função?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Ao excluir a função, todos usuários que utilizam perderão as permissões da mesma.
                </div>
                <div class="modal-footer">
                    <form id="destroy" action="" method="POST">
                        @csrf
                        @method('DELETE')
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
        $(document).on('click', '#btn_delete_role', function () {
            var role = $(this).attr('role');
            var url = '{{ route("admin.roles.destroy", ":role") }}';
            url = url.replace(':role', role);
            $("#destroy").attr('action', url);
        });

        $(document).ready(function () {
            $('#search_role').keyup(function () {
                var role = $(this).val();
                $.ajax({
                    type: "POST",
                    url: "{{route('admin.roles.search')}}",
                    dataType: "json",
                    data: {'role': role},
                    headers: {
                        "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")
                    },
                    success: function (data) {
                        var tr = '';
                        if (data == '') {
                            tr += '<tr>' +
                                '<td colspan="5" class="text-center">Nenhuma função encontrada!</td>' +
                                '</tr>';
                        } else {
                            for (var i = 0; i < data.length; i++) {
                                var route = '{{route("admin.roles.edit", ":role")}}';
                                route = route.replace(':role', data[i].id);
                                tr += '<tr>' +
                                    '<td>' + data[i].id + '</td>' +
                                    '<td>' + data[i].name + '</td>' +
                                    '<td width="10">' +
                                    '    <a href="' + route + '"> <button class="btn btn-warning" title="Editar"><i class="fas fa-pencil-alt"></i></button></a>' +
                                    '</td>' +
                                    '<td width="10">' +
                                    '    <button class="btn btn-danger" id="btn_delete_role" role="' + data[i].id + '" title="Excluir" data-toggle="modal" data-target="#modal_delete_role"> <i class="fas fa-trash"></i></button>' +
                                    '</td></tr>';
                            }
                        }
                        $('#body_table_roles').html(tr).show();
                    }
                });
            });
        });
    </script>
@endsection
