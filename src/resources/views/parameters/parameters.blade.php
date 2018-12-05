@extends(config('parameter.layout_extend'))

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-uppercase">
                        Parâmetros
                        {{--<a href="{{ route('parameters.index') }}" class="btn btn-sm btn-secondary float-right">Voltar</a>--}}
                    </div>

                    <div class="card-body">

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    @foreach($categories as $key => $category)
                    <li class="nav-item">
                        <a class="nav-link @if($key == 0) active @endif" id="home-tab" data-toggle="tab" href="#{{$category->slug}}" role="tab" aria-controls="home" aria-selected="true">{{$category->name}}</a>
                    </li>
                    @endforeach
                </ul>
                <div class="tab-content" id="myTabContent">
                    @foreach($categories as $key => $category)
                        @if($key == 0)
                            <div class="tab-pane fade show active" id="{{$category->slug}}" role="tabpanel" aria-labelledby="home-tab" style="margin-top: 15px;">
                                <div class="container-fluid">
                                    <div class="row justify-content-center">
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row">
                                                    @foreach($category->parameters as $parameter)
                                                        <div class="col-3">
                                                            <label for="">  {{$parameter->name}} </label>
                                                            @if($parameter->type == 't')
                                                                <input type="text" class="form-control"
                                                                       onblur="text_value(this)"
                                                                       name="value"
                                                                       id="value_{{$parameter->id}}"
                                                                       value="{{$parameter->parameterValue ? $parameter->parameterValue->value : null }}"
                                                                       data-id="{{$parameter->id}}">
                                                            @else
                                                                <input type="checkbox" class="form-control"
                                                                       onclick="checkbox_value(this)"
                                                                       name="value"
                                                                       id="value_{{$parameter->id}}"
                                                                       @if($parameter->parameterValue->value == 'true') checked @endif
                                                                       data-id="{{$parameter->id}}">
                                                            @endif
                                                        </div>
                                                    @endforeach
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="tab-pane fade" id="{{$category->slug}}" role="tabpanel" aria-labelledby="profile-tab" style="margin-top: 15px;">
                                <div class="container-fluid">
                                    <div class="row justify-content-center">
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    @foreach($category->parameters as $parameter)
                                                        <label for="" >  {{$parameter->name}} </label>
                                                        @if($parameter->type == 't')
                                                            <input type="text" class="form-control"
                                                                   onblur="text_value(this)"
                                                                   name="value"
                                                                   id="value_{{$parameter->id}}"
                                                                   value="{{isset($parameter->parameterValue) ? $parameter->parameterValue->value : null }}"
                                                                   data-id="{{$parameter->id}}">
                                                        @else
                                                            <input type="checkbox"
                                                                   onclick="checkbox_value(this)"
                                                                   name="value"
                                                                   id="value_{{$parameter->id}}"
                                                                   @if(isset($parameter->parameterValue->value) && $parameter->parameterValue->value == 'true') checked @endif
                                                                   data-id="{{$parameter->id}}">
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <script>
        var text_value = function (elem) {
            data = {
                paramenter_id: $(elem).attr('data-id'),
                value: $(elem).val(),
                _token: '{{csrf_token()}}'
            }

            updateParameter(data);
        }

        var checkbox_value = function (elem) {


            data = {
                paramenter_id: $(elem).attr('data-id'),
                value: $(elem).is(":checked"),
                _token: '{{csrf_token()}}'
            }

            updateParameter(data);


        }

        var updateParameter = function (data) {
            url = '/config/adjust/parameters/update';

            $.ajax({
                url: url,
                data: data,
                method: 'POST',
                success: function (res) {

                }
            })
        }
    </script>
@endsection
