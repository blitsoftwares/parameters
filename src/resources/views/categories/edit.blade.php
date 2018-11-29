@extends(config('parameter.layout_extend'))

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-uppercase">
                        Nova categoria des parâmetro
                        <a href="{{ route('parametercategories.index') }}" class="btn btn-sm btn-secondary float-right">Voltar</a>
                    </div>

                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-md-12">
                                {!! Form::model($parametercategory, ['route' => ['parametercategories.update',$parametercategory->id],'files'=>true, 'method' => 'patch']) !!}
                                @include('parameter::categories.fields')
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection