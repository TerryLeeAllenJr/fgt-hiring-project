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

    /**
     * Provides an easy and central way to access the POST validation parameters.
     * @var array
     */
    public static $postValidationParameters = [
        'name' => 'required|string|unique:categories|max:64',
        'slug' => 'required|alpha_dash|unique:categories|max:64',
    ];

    /**
     * Provides an easy and central way to access the PUT validation parameters.
     * @var array
     */
    public static $putValidationParameters = [
        'name' => 'required|string|unique:categories|max:64',
        'slug' => 'required|alpha_dash|unique:categories|max:64',
    ];

    // Using the NodeTrait from Kalnoy\NestedSet to provide out of the box Nested Set functionality within Eloquent.
    use NodeTrait;
}
