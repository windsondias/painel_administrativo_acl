@extends('admin.template.base')

@section('title', 'Page Title')


@section('content')

    <div class="container pt-3">

        <section class="content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Title</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                            <i class="fas fa-times"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    Start creating your amazing application!
                </div>
                <div class="card-footer">
                    Footer
                </div>
            </div>
        </section>
    </div>

@endsection
