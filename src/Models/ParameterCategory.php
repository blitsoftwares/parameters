<?php

namespace Blit\Parameters\Models;

use Illuminate\Database\Eloquent\Model;
use function PHPSTORM_META\type;


class ParameterCategory extends Model
{

    protected $fillable = ['name', 'slug'];

    /**
     * Parameters
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function parameters()
    {
        return $this->hasMany(Parameter::class);
    }

    public function generateSlug()
    {
        return str_slug($this->name);
    }

}
