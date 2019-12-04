<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

/**
 * Class Category
 * @package App
 */
class Category extends Model
{

    protected $fillable = ['name','slug','user_id'];

    // Using the NodeTrait from Kalnoy\NestedSet to provide out of the box Nested Set functionality within Eloquent.
    use NodeTrait;
}
