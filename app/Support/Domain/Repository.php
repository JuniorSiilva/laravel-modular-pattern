<?php

namespace Emtudo\Support\Domain;

abstract class Repository 
{
    protected $modelClass;
    protected $userOnly = false;

    public function newQuery()
    {
        $query = app()->make($this->modelClass)->newQuery();

        if($this->userOnly)
            $query->where('user_id', auth()->user()->id)
    }
}