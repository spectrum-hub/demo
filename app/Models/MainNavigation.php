<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class MainNavigation extends Model
{
    use HasFactory;

    protected $table = 'main_navigations';

    /** @return MorphToMany<Customer> */
}
