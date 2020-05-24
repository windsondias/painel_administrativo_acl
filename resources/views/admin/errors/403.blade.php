@extends('admin.template.base')

@section('title', 'Page Title')


@section('content')

    <div class="container pt-3">

        <section class="content">
            <div class="error-page">
                <h2 class="headline text-warning"> 403</h2>

                <div class="error-content">
                    <h3><i class="fas fa-exclamation-triangle text-warning"></i> Oops! Você não tem permissão para acessar essa pagina.</h3>
                    <p>
                        Verifique suas permissões com o administrador do sistema.
                    </p>

                </div>
            </div>
        </section>
    </div>

@endsection
