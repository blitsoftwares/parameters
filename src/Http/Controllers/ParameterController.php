<?php

namespace Blit\Parameters\Http\Controllers;

use App\Http\Controllers\Controller;
use Blit\Parameters\Models\Parameter;
use Blit\Parameters\Models\ParameterCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ParameterController extends Controller
{
    protected $data;

    public function index()
    {
        $registers = Parameter::paginate(config('parameter.per_page'));
        return view('parameter::parameters.index', compact('registers'));
    }

    public function create()
    {
        $categories = ParameterCategory::pluck('name','id')->prepend('Selecione',0);
        return view('parameter::parameters.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $input['slug'] = $input['parameter_category_id'] . "-" . str_slug($input['name']);

        $messages = [
            'parameter_category_id.required' => 'Selecione uma categoria',
            'parameter_category_id.numeric' => 'Selecione uma categoria',
            'parameter_category_id.min' => 'Selecione uma categoria',
            'name.required' => 'Digite um nome',
            'slug.unique' => 'Nome já usado nesta categoria.',
        ];

        $validator = Validator::make($input,[
            'parameter_category_id' => 'required|numeric|min:1',
            'slug' => 'required|unique:parameters',
            'name' => 'required',
            'type' => 'required',
        ], $messages)->validate();

        if (!$validator) {
            return redirect(route('parameters.create'))
                ->withErrors($validator)
                ->withInput();
        }

        Parameter::create($input);

        return redirect(route('parameters.index'));

    }

    public function show(Parameter $parameter)
    {

    }

    public function edit(Parameter $parameter)
    {
        $categories = ParameterCategory::pluck('name','id')->prepend('Selecione',0);
        return view('parameter::parameters.edit', compact('parameter','categories'));
    }

    public function update(Parameter $parameter, Request $request)
    {

        $input = $request->all();
        $input['slug'] = $input['parameter_category_id'] . "-" . str_slug($input['name']);

        $messages = [
            'parameter_category_id.required' => 'Selecione uma categoria',
            'parameter_category_id.numeric' => 'Selecione uma categoria',
            'parameter_category_id.min' => 'Selecione uma categoria',
            'name.required' => 'Digite um nome',
            'slug.unique' => 'Nome já usado nesta categoria.',
        ];

        $validator = Validator::make($input,[
            'parameter_category_id' => 'required|numeric|min:1',
            'slug' => [
                'required',
                Rule::unique('parameters')->ignore($parameter->id)
            ],
            'name' => 'required',
            'type' => 'required',
        ], $messages)->validate();

        if (!$validator) {
            return redirect(route('parameters.edit'))
                ->withErrors($validator)
                ->withInput();
        }

        $parameter->update($request->all());
        return redirect(route('parameters.index'));

    }

    public function destroy(Parameter $parameter)
    {
        $parameter->delete();
        return redirect(route('parameters.index'));
    }

    private function loadData()
    {
        $this->data = Parameter::paginate(config('parameter.per_page'));
    }
}