@extends('admin.template.base')

@section('title', 'Cadastro de permissão')

@section('content')
    <div class="container pt-3">
        <div class="col-md-12">
            <section class="content">
                <form action="{{route('admin.permissions.store')}}" method="POST">
                    @csrf
                    @method('POST')
                    @include('admin.settings.permissions._form')
                </form>
            </section>
        </div>
    </div>

@endsection
