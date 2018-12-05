<?php

namespace Blit\Parameters\Http\Controllers;

use App\Http\Controllers\Controller;
use Blit\Parameters\Http\Requests\ParameterRequest;
use Blit\Parameters\Models\Parameter;
use Blit\Parameters\Models\ParameterCategory;
use Blit\Parameters\Models\ParameterValue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ParameterController extends Controller
{

    public function index()
    {
        $registers = Parameter::paginate(config('parameter.per_page'));
        return view('parameter::parameters.index', compact('registers'));
    }

    public function adjust()
    {
        $categories = ParameterCategory::get();
        return view('parameter::parameters.parameters', compact('categories'));
    }

    public function create()
    {
        $categories = ParameterCategory::pluck('name','id')->prepend('Selecione',0);
        return view('parameter::parameters.create', compact('categories'));
    }

    public function store(ParameterRequest $request)
    {
        Parameter::create($request->all());
        return redirect(route('parameters.index'));
    }

    public function show(Parameter $parameter)
    {
        // not used
    }

    public function edit(Parameter $parameter)
    {
        $categories = ParameterCategory::pluck('name','id')->prepend('Selecione',0);
        return view('parameter::parameters.edit', compact('parameter','categories'));
    }

    public function update(Parameter $parameter, ParameterRequest $request)
    {
        $parameter->update($request->all());
        return redirect(route('parameters.index'));
    }

    public function destroy(Parameter $parameter)
    {
        $parameter->delete();
        return redirect(route('parameters.index'));
    }

    public function updateParameter(Request $request)
    {
        $input = $request->all();
        $tenancy_id = isset(Auth::user()->tenancy_id) ? Auth::user()->tenancy_id : null;
        $param = ParameterValue::firstOrCreate([
            'parameter_id' => $input['paramenter_id'],
            'tenancy_id' => $tenancy_id
        ]);

        if($param){
            $param->value = $input['value'];
            $param->save();
        }

        return json_encode($param);


    }
}
