<?php

namespace Blit\Parameters\Models;


use Illuminate\Database\Eloquent\Model;
use function PHPSTORM_META\type;

class Parameter extends Model
{
    protected $fillable = [
        'parameter_category_id',
        'name',
        'slug',
        'type'
    ];

    /**
     * Category
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(ParameterCategory::class,'parameter_category_id');
    }

}