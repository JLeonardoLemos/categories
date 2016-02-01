<?php 

namespace JLeonardoLemos\Categories\Facades;

use Illuminate\Support\Facades\Facade;

class CategoryFacade extends Facade {

    protected static function getFacadeAccessor() { return 'Mixd\Category\Select'; }

}