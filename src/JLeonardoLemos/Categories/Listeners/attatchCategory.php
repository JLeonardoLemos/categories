<?php

namespace JLeonardoLemos\Categories\Listeners;

use Illuminate\Database\Eloquent\Model;
use JLeonardoLemos\Categories\CategoryableContract;
use Input;

class attatchCategory {

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct() {
        //
    }

    /**
     * Handle the event.
     *
     * @param  PodcastWasPurchased  $event
     * @return void
     */
    public function handle(Model $model) {
        
        if ($model instanceof CategoryableContract) {
            $model->categoriesSet()->create(['category_id' => Input::get('category_id')]);
        }
        
    }

}
