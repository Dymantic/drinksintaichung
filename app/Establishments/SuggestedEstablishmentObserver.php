<?php


namespace App\Establishments;


class SuggestedEstablishmentObserver
{
    public function deleting(SuggestedEstablishment $suggestion)
    {
        $suggestion->features()->sync([]);
    }
}