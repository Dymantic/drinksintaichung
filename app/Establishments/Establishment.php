<?php

namespace App\Establishments;

use Illuminate\Database\Eloquent\Model;

class Establishment extends Model
{
    protected $fillable = [
        'name',
        'type',
        'description',
        'address',
        'zh_address',
        'opening_hours',
        'happy_hour',
        'latitude',
        'longitude'
    ];

    protected $casts = ['published' => 'boolean'];

    public function features()
    {
        return $this->belongsToMany(Feature::class);
    }

    public function addFeatures($features)
    {
        return $this->features()->attach($features);
    }

    public function syncFeatures($features)
    {
        return $this->features()->sync($features);
    }

    public function featureList()
    {
        $all_features = Feature::all();
        $true_features = $this->features;

        return $all_features->flatMap(function ($feature) use ($true_features) {
            return [$feature->short_name => $true_features->pluck('id')->contains($feature->id)];
        })->all();
    }

    public function toJsonableArray()
    {
        return [
            'id'            => $this->id,
            'name'          => $this->name,
            'type'          => $this->type,
            'description'   => $this->description,
            'address'       => $this->address,
            'zh_address'    => $this->zh_address,
            'opening_hours' => $this->opening_hours,
            'happy_hour'    => $this->happy_hour,
            'location'      => [
                'latitude'  => $this->latitude,
                'longitude' => $this->longitude
            ],
            'published'     => $this->published,
            'feature_list'  => $this->featureList(),
            'features'      => $this->features->map(function ($feature) {
                return [
                    'id'    => $feature->id,
                    'label' => $feature->label,
                    'icon'  => $feature->icon
                ];
            })->all()
        ];
    }
}
