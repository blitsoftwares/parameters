@extends(config('parameter.layout_extend'))

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-uppercase align-middle">
                        <span>Categorias dos parâmetros</span>
                        <a href="{{ route('parametercategories.create') }}" class="btn btn-sm btn-success float-right"> Novo registro </a>
                    </div>

                    <div class="card-body">
                        @include('parameter::categories.table')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection