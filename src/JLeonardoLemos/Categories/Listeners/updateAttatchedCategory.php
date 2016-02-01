<?php

namespace JLeonardoLemos\Categories\Listeners;

use Illuminate\Database\Eloquent\Model;
use JLeonardoLemos\Categories\CategoryableContract;
use Input;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of updateAttatchedCategory
 *
 * @author leonardo
 */
class updateAttatchedCategory {
    //put your code here
    
    public function handle(Model $model) {
        
        if ($model instanceof CategoryableContract && Input::get('category_id')) {
            
            $categorySet = $model->categoriesSet->first();
            
            $categorySet->category_id = Input::get('category_id');
            $categorySet->save();
        }
        
    }
    
}
