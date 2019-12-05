<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{

    /**
     * @var array
     */
    protected $fillable = ['category_id','image_id','thumbnail_id','user_id','title','slug','short_desc','desc'];

    /**
     * Defines the validation rules for POST requests.
     * @var array
     */
    public static $postValidationParameters = [
        'category_id' => 'required|integer|exists:categories,id',
        'title' => 'required|string|max:128',
        'slug' => 'required|string|unique:entries|max:64',
        'short_desc' => 'required|string',
        'desc' => 'required|string',
    ];

    /**
     * Defines the validation rules for POST requests.
     * @var array
     */
    public static $putValidationParameters = [
        'category_id' => 'required|integer|exists:categories,id',
        'title' => 'required|string|max:128',
        'slug' => 'required|string|unique:entries|max:64',
        'short_desc' => 'required|string',
        'desc' => 'required|string',
    ];

    /**
     * Defines the relationship between Entry and Category
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function category()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }

    /**
     * Defines the image relationship between Entry.image_id and File.id
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function image()
    {
        return $this->belongsTo(File::class,'image_id','id');
    }

    /**
     * Defines the relationship between Entry.thumbnail_id and File.id
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function thumbnail()
    {
        return $this->belongsTo(File::class,'thumbnail_id','id');
    }

    /**
     * Eloquent scope to only return blog posts from a specific category.
     * @param $query
     * @param $options
     * @return mixed
     */
    public function scopeGetEntriesByCategory($query, $options)
    {

        return (isset($options['category_id'])) ?
            $query->where('category_id','=', $options['category_id']) :
            $query;
    }
}
