@extends('admin.template.base')

@section('title', 'Atualização de usuário')


@section('content')
    <div class="container pt-3">
        <div class="col-md-12">
            <section class="content">
                <form action="{{route('admin.users.update', ['user' => $user->id])}}" method="POST">
                    @csrf
                    @method('PUT')
                    @include('admin.settings.users._form')
                </form>
            </section>
        </div>
    </div>

@endsection
