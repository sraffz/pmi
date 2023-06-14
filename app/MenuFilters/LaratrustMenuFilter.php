<?php

namespace App\MenuFilters;

use JeroenNoten\LaravelAdminLte\Menu\Builder;
use JeroenNoten\LaravelAdminLte\Menu\Filters\FilterInterface;
use Laratrust\Laratrust;

class LaratrustMenuFilter implements FilterInterface
{
    public function transform($item)
    // public function transform($item, Builder $builder)
    {
        
        if (isset($item['role']) && ! auth()->user()->hasRole($item['role'])) {
            return false;
        }

        return $item;
    }
}