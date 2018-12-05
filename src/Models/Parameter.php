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

    public function generateSlug()
    {
        return str_slug($this->category->name) . "-" . str_slug($this->name);
    }

    public function parameterValue()
    {
        return $this->hasOne(ParameterValue::class, 'parameter_id', 'id' );
    }

}
