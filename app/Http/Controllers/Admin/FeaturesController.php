<?php

namespace App\Http\Controllers\Admin;

use App\Establishments\Feature;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

class FeaturesController extends Controller
{

    public function index()
    {
        $features = Feature::all()->map->toJsonableArray();

        return view('admin.features.index', ['features' => $features]);
    }

    public function show(Feature $feature)
    {
        return view('admin.features.show', ['feature' => $feature->toJsonableArray()]);
    }

    public function store()
    {
        request()->validate([
            'label' => ['required', 'unique:features,label'],
            'icon' => 'required',
        ]);
        $feature = Feature::create(request()->all());

        return $feature;
    }

    public function update(Feature $feature)
    {
        request()->validate([
            'label' => ['required',  Rule::unique('features')->ignore($feature->id)],
            'icon' => 'required',
        ]);

        $feature->update(request()->all());

        return $feature->fresh()->toJsonableArray();
    }

    public function delete(Feature $feature)
    {
        $feature->delete();
    }
}
