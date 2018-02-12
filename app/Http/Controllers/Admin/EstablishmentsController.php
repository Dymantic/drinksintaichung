<?php

namespace App\Http\Controllers\Admin;

use App\Establishments\Establishment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EstablishmentsController extends Controller
{

    public function index()
    {
        $establishments = Establishment::all()->map->toJsonableArray();

        return view('admin.establishments.index', ['establishments' => $establishments]);
    }

    public function show(Establishment $establishment)
    {
        $features = $establishment->features;
        return view('admin.establishments.show', ['establishment' => $establishment, 'features' => $features]);
    }

    public function update(Establishment $establishment)
    {
        request()->validate([
            'name' => ['required'],
            'type' => ['required'],
            'description' => ['required'],
            'address' => ['required'],
            'zh_address' => ['required'],
            'latitude' => ['required', 'numeric', 'between:-80,80'],
            'longitude' => ['required', 'numeric', 'between:-180,180']
        ]);

        $establishment->update(request()->all());

        return $establishment->fresh()->toJsonableArray();
    }

    public function store()
    {
        request()->validate([
            'name' => ['required'],
            'type' => ['required'],
            'description' => ['required'],
            'address' => ['required'],
            'zh_address' => ['required'],
            'latitude' => ['required', 'numeric', 'between:-80,80'],
            'longitude' => ['required', 'numeric', 'between:-180,180']
        ]);
        Establishment::create(request()->all());
    }

    public function delete(Establishment $establishment)
    {
        $establishment->delete();
        return redirect("/admin/establishments");
    }
}
