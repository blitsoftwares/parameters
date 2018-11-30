<?php
/**
 * Created by PhpStorm.
 * User: lucaspasquetto
 * Date: 30/11/18
 * Time: 10:07
 */

namespace Blit\Parameters\Observers;


use Blit\Parameters\Models\Parameter;

class ParameterObserver
{

    public function creating(Parameter $parameter)
    {
        $parameter->slug = $parameter->generateSlug();
    }

    public function updating(Parameter $parameter)
    {
        $parameter->slug = $parameter->generateSlug();
    }

}