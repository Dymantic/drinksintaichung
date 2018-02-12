<?php

namespace App\Http\Controllers\Admin;

use App\Establishments\Establishment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EstablishmentFeatureListController extends Controller
{
    public function store(Establishment $establishment)
    {
        request()->validate([
            'feature_ids' => ['required', 'array'],
            'feature_ids.*' => ['integer', 'exists:features,id']
        ]);
        $establishment->syncFeatures(request('feature_ids'));
    }
}
