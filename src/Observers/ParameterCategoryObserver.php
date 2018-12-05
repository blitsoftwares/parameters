<?php

namespace Blit\Parameters\Observers;

use Blit\Parameters\Models\ParameterCategory;

class ParameterCategoryObserver
{
    public function creating(ParameterCategory $parameterCategory)
    {
        $parameterCategory->slug = $parameterCategory->generateSlug();
    }

    public function updating(ParameterCategory $parameterCategory)
    {
        $parameterCategory->slug = $parameterCategory->generateSlug();
    }
}
