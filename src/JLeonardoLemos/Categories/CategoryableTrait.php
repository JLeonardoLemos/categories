<?php

namespace JLeonardoLemos\Categories;

trait CategoryableTrait {

    //retorna todas as galerias do item polimorfico, em casos especiais ele tera varias galerias
    public function categoriesSet() {
        return $this->morphMany('JLeonardoLemos\Categories\CategorySet', 'categoryable');
    }

    public function categories() {
        return $this->belongsToMany('JLeonardoLemos\Categories\Category', 'category_set', 'categoryable_id', 'category_id');
    }    
    
    public function getCategoryAttribute() {
        return $this->categories()->first();
    }

    public function getCategoryIdAttribute() {
        return $this->categories()->first() ? $this->categories()->first()->id : null ;
    }
}
