@extends('admin.template.base')

@section('title', 'Cadastro de funções')

@section('content')
    <div class="container pt-3">
        <div class="col-md-12">
            <section class="content">
                <form action="{{route('admin.roles.store')}}" method="POST">
                    @csrf
                    @include('admin.settings.roles._form')
                </form>
            </section>
        </div>
    </div>

@endsection
