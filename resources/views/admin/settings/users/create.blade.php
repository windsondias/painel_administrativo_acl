@extends('admin.template.base')

@section('title', 'Cadastro de usuário')


@section('content')
    <div class="container pt-3">
        <div class="col-md-12">
            <section class="content">
                <form action="{{route('admin.users.store')}}" method="POST">
                    @csrf
                    @method('POST')
                    @include('admin.settings.users._form')
                </form>
            </section>
        </div>
    </div>

@endsection
