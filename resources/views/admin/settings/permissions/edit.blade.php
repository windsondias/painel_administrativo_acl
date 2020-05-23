@extends('admin.template.base')

@section('title', 'Atualização de permissões')

@section('content')
    <div class="container pt-3">
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
            <div class="alert alert-success alert-dismissible fade show">
                <strong>{{ $message }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @enderror
            <section class="content">
                <form action="{{route('admin.permissions.update', ['permission' => $permission->id])}}" method="POST">
                    @csrf
                    @method('PUT')
                    @include('admin.settings.permissions._form')
                </form>
            </section>
        </div>
    </div>

@endsection
