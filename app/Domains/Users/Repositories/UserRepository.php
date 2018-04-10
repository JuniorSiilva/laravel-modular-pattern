<?php

namespace Emtudo\Domains\Users\Repositories;

use Emtudo\Support\Domain\Repository;
use Emtudo\Domains\Users\User;

final class UserRepository extends Repository
{
    protected $modelClass = User::class;
}