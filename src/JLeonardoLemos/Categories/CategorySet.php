<?php

namespace JLeonardoLemos\Categories;

use Illuminate\Database\Eloquent\Model;

class CategorySet extends Model 
{
    protected $table = 'category_set';

    protected $fillable = ['category_id'];
    
    public function categoryable()
    {
        return $this->morphTo();
    }
    
    public function category()
    {
        return $this->belongsTo('JLeonardoLemos\Categories\Category');
    }    
}
