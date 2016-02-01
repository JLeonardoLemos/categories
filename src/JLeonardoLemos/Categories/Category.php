<?php

namespace JLeonardoLemos\Categories;

use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Eloquent\Model;

class Category extends Model implements SluggableInterface
{

    use SoftDeletes, SluggableTrait;

    protected $dates = ['deleted_at'
        , 'publish_at'];
    protected $fillable = ['status'
        , 'name'
        , 'group_slug'
        , 'description'
        , 'category_id'
    ];
    protected $sluggable = [
        'build_from' => 'name',
        'save_to'    => 'slug',
    ];
    
    public function categorySet() {
        return $this->hasMany('JLeonardoLemos\Categories\CategorySet');
    }
    
    public function daddy() {
        return $this->belongsTo('JLeonardoLemos\Categories\Category', 'category_id');
    }
    
    public function dearChildren() {
        return $this->hasMany('JLeonardoLemos\Categories\Category');
    }
}
