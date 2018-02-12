<?php

namespace App\Establishments;

use Illuminate\Database\Eloquent\Model;

class SuggestedEstablishment extends Model
{
    protected $fillable = [
        'name',
        'address',
        'description',
        'opening_hours',
        'happy_hour',
        'email'
    ];

    public function features()
    {
        return $this->belongsToMany(Feature::class);
    }

    public function addFeatures($features)
    {
        return $this->features()->attach($features);
    }

    public function toJsonableArray()
    {
        $base = [
            'id'            => $this->id,
            'name'          => $this->name,
            'address'       => $this->address,
            'description'   => $this->description,
            'opening_hours' => $this->opening_hours,
            'happy_hour'    => $this->happy_hour,
            'email'         => $this->email,
            'requested_on'  => $this->created_at->toFormattedDateString()
        ];

        if ($this->relationLoaded('features')) {
            $features = $this->features->map(function ($feature) {
                return $feature->toJsonableArray();
            })->all();

            return array_merge($base, ['features' => $features]);
        }

        return $base;
    }
}
