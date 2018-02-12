<?php

namespace App\Http\Controllers\Admin;

use App\Establishments\SuggestedEstablishment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SuggestedEstablishmentsController extends Controller
{

    public function index()
    {
        $suggestions = SuggestedEstablishment::all()->map->toJsonableArray();

        return view('admin.suggested-establishments.index', ['suggestions' => $suggestions]);
    }

    public function show(SuggestedEstablishment $suggestion)
    {
        $suggestion->load('features');
        return view('admin.suggested-establishments.show', ['suggestion' => $suggestion->toJsonableArray()]);
    }

    public function delete(SuggestedEstablishment $suggestion)
    {
        $suggestion->delete();
        return redirect('/admin/suggested-establishments');
    }
}
