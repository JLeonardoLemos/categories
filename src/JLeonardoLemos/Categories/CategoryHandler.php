<?php

namespace JLeonardoLemos\Categories;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CategoryHandler
 *
 * @author leonardo
 */
use Form;
use JLeonardoLemos\Categories\Category;
use Input;

class CategoryHandler {
   
    public function select($label = 'Categoria', $groupSlug = '', $model = '') {
        
        if ($groupSlug == '') {
            dd('groupSlug indefinido');
        }
        
        $categories = Category::where('group_slug', $groupSlug)->get()->lists('name', 'id');
        
        $currentCategory = ($model != '') ? $model->category_id : null;
        $currentCategory = Input::get('category_id') ? : null;
        
        $html = Form::control('select', 'category_id', $label, $currentCategory,  [], $categories);
        
        return $html;
    }   
    
}
