@extends('admin.template.base')

@section('title', 'Permissões')

@section('content')

    <div class="container pt-3">
        <div class="row">
            <div class="col-md-6 mb-3">
                @can('permissions_create')
                <a href="{{route('admin.permissions.create')}}">
                    <button class="btn btn-outline-secondary">Adicionar Permissão</button>
                </a>
                @endcan
            </div>
            <div class="col-md-6 mb-3">
                <div class="input-group">
                    <input type="text" class="form-control" id="search_permission" placeholder="Pesquisar Permissão">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit" id="btn_search_permission"><i
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
                            <th scope="col">Nome Visivel</th>
                            <th colspan="2" scope="col"></th>
                        </tr>
                        </thead>
                        <tbody id="body_table_permissons">
                        @if($permissions->count() == 0)
                            <tr class="text-center">
                                <td colspan="3"> Nenhuma permissão encontrada!</td>
                            </tr>
                        @else
                            @foreach($permissions as $permission)
                                <tr>
                                    <th scope="row">{{$permission->id}}</th>
                                    <td>{{$permission->name}}</td>
                                    <td>{{$permission->name_view}}</td>
                                    <td width="10">
                                        @can('permissions_edit')
                                        <a href="{{route('admin.permissions.edit', ['permission' => $permission->id])}}">
                                            <button class="btn btn-warning" title="Editar">
                                                <i class="fas fa-pencil-alt"></i>
                                            </button>
                                        </a>
                                        @endcan
                                    </td>
                                    <td width="10">
                                        @can('permissions_destroy')
                                        <button class="btn btn-danger" id="btn_delete_permission"
                                                permission="{{$permission->id}}"
                                                title="Excluir" data-toggle="modal"
                                                data-target="#modal_delete_permission">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                    {{ $permissions->onEachSide(5)->links() }}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">

            </div>
        </div>
    </div>

    <div class="modal fade" id="modal_delete_permission" data-backdrop="static" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Deseja excluir está permissão?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Está ação não pode ser desfeita.
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
        $(document).on('click', '#btn_delete_permission', function () {
            var permission = $(this).attr('permission');
            var url = '{{ route("admin.permissions.destroy", ":permission") }}';
            url = url.replace(':permission', permission);
            $("#destroy").attr('action', url);
        });

        $(document).ready(function () {
            $('#search_permission').keyup(function () {
                var permission = $(this).val();
                $.ajax({
                    type: "POST",
                    url: "{{route('admin.permissions.search')}}",
                    dataType: "json",
                    data: {'permission': permission},
                    headers: {
                        "X-CSRF-TOKEN": $("meta[name='csrf-token']").attr("content")
                    },
                    success: function (data) {
                        var tr = '';
                        if (data == '') {
                            tr += '<tr>' +
                                '<td colspan="5" class="text-center">Nenhuma permissão encontrada!</td>' +
                                '</tr>';
                        } else {
                            for (var i = 0; i < data.length; i++) {
                                var route = '{{route("admin.permissions.edit", ":permission")}}';
                                route = route.replace(':permission', data[i].id);
                                tr += '<tr>' +
                                    '<td>' + data[i].id + '</td>' +
                                    '<td>' + data[i].name + '</td>' +
                                    '<td>' + data[i].name_view + '</td>' +
                                    '<td width="10"> @can('permissions_edit')' +
                                    '    <a href="' + route + '"> <button class="btn btn-warning" title="Editar"><i class="fas fa-pencil-alt"></i></button></a>' +
                                    ' @endcan</td>' +
                                    '<td width="10"> @can('permissions_destroy')' +
                                    '    <button class="btn btn-danger" id="btn_delete_permission" permission="' + data[i].id + '" title="Excluir" data-toggle="modal" data-target="#modal_delete_permission"> <i class="fas fa-trash"></i></button>' +
                                    '@endcan</td> </tr>';
                            }
                        }
                        $('#body_table_permissons').html(tr).show();
                    }
                });
            });
        });
    </script>
@endsection
