<?php

namespace Blit\Parameters\Http\Controllers;

use App\Http\Controllers\Controller;
use Blit\Parameters\Http\Requests\ParameterCategoryRequest;
use Blit\Parameters\Models\ParameterCategory;
use Illuminate\Http\Request;

class CategoryParameterController extends Controller
{
    protected $data;

    public function index()
    {
        $registers = ParameterCategory::paginate(config('parameter.per_page'));
        return view('parameter::categories.index', compact('registers'));
    }

    public function create()
    {
        return view('parameter::categories.create');
    }

    public function store(ParameterCategoryRequest $request)
    {
        ParameterCategory::create($request->all());

        return redirect(route('parametercategories.index'));

    }

    public function show(ParameterCategory $categoryParameter)
    {

    }

    public function edit(ParameterCategory $parametercategory)
    {
        return view('parameter::categories.edit', compact('parametercategory'));
    }

    public function update(ParameterCategory $parametercategory, ParameterCategoryRequest $request)
    {
        $parametercategory->update($request->all());
        return redirect(route('parametercategories.index'));
    }

    public function destroy(ParameterCategory $parametercategory)
    {
        $parametercategory->delete();
        return redirect(route('parametercategories.index'));
    }

    private function loadData()
    {
        $this->data = ParameterCategory::paginate(config('parameter.per_page'));
    }


}
