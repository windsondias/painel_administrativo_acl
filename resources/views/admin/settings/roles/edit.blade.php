@extends('admin.template.base')

@section('title', 'Edição de funções')

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
                <form action="{{route('admin.roles.update', ['role' => $role->id])}}" method="POST">
                    @csrf
                    @method('PUT')
                    @include('admin.settings.roles._form')
                </form>
            </section>
        </div>
    </div>

@endsection
