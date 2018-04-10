<?php

namespace Emtudo\Domains\Links\Repositories;

use Emtudo\Support\Domain\Repository;
use Emtudo\Domains\Links\Link;

abstract class LinkRepository extends Repository
{
    protected $modelClass = Link::class;
}