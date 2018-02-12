<?php

namespace App\Establishments;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    protected $fillable = ['label', 'short_name', 'icon'];

    public function setLabelAttribute($label_string)
    {
        $this->attributes['label'] = $label_string;
        $this->attributes['short_name'] = str_slug($label_string);
    }

    public function toJsonableArray()
    {
        return [
            'id'         => $this->id,
            'label'      => $this->label,
            'short_name' => $this->short_name,
            'icon'       => $this->icon
        ];
    }
}
