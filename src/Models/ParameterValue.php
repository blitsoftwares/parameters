<?php

namespace Blit\Parameters\Models;

use Illuminate\Database\Eloquent\Model;

class ParameterValue extends Model
{
    protected $table = 'parameter_values';

    protected $fillable = [
        'parameter_id',
        'tenancy_id',
        'value'
    ];



}
