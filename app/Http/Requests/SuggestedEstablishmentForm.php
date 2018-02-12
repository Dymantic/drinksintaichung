<?php

namespace App\Http\Requests;

use Dymantic\Secretary\ContactMessage;
use Illuminate\Foundation\Http\FormRequest;

class SuggestedEstablishmentForm extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'        => 'required',
            'address'     => 'required',
            'description' => 'required',
            'features'    => 'required|array',
            'features.*'  => ['integer', 'exists:features,id']
        ];
    }

    public function message()
    {
        return new ContactMessage([
            'name' => $this->name,
            'email' => $this->email,
            'message_body' => "There is a new request to add an establishment to Drinks in Taichung",
            'message_notes' => [
                'place' => $this->name,
                'address' => $this->address,
                'opening_hours' => $this->opening_hours,
                'happy_hour' => $this->happy_hour,
                'description' => $this->description
            ]
        ]);
    }
}
