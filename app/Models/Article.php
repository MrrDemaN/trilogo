<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id',
        'name',
        'title',
        'descriptoin',
        'meta_name',
        'meta_title',
        'slug',
        'content',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'category_id' => 'integer',
    ];


    public function categories()
    {
        return $this->belongsToMany(\App\Models\Category::class);
    }

    public function category()
    {
        return $this->belongsTo(\App\Models\Category::class);
    }
}
