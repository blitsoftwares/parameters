<?php

namespace Blit\Parameters\Models;

use Illuminate\Database\Eloquent\Model;

class ParameterCategory extends Model
{

    protected $fillable = ['name'];

    /**
     * Parameters
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function parameters()
    {
        return $this->hasMany(Parameter::class);
    }

}