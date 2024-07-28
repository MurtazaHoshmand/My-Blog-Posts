<?php

// here we implement a global scope which is responsible for adding a query that make the order of items desc
// to use this scope we just need to create an obj of it to desired model

namespace App\Scopes;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Builder;

class LatestScope implements Scope{
    public function apply(Builder $builder, Model $model){
        $builder->orderBy($model::CREATED_AT,"desc");
    }

    
}
