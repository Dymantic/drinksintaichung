<?php

namespace App\Http\Controllers;

use App\Establishments\SuggestedEstablishment;
use App\Http\Requests\SuggestedEstablishmentForm;
use Dymantic\Secretary\ContactMessage;
use Dymantic\Secretary\Secretary;
use Illuminate\Http\Request;

class SuggestedEstablishmentsController extends Controller
{
    public function store(Secretary $secretary, SuggestedEstablishmentForm $form)
    {
        $suggestion = SuggestedEstablishment::create(request()->all());
        $suggestion->addFeatures(request('features'));


        $secretary->receive($form->message());
    }
}
