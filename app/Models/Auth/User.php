<?php

namespace App\Models\Auth;

use Laravel\Passport\HasApiTokens;
use App\Models\Auth\Traits\Scope\UserScope;
use App\Models\Auth\Traits\Method\UserMethod;
use App\Models\Auth\Traits\Attribute\UserAttribute;
use App\Models\Auth\Traits\Relationship\UserRelationship;

/**
 * Class User.
 */
class User extends BaseUser
{
    use UserAttribute,
        HasApiTokens,
        UserMethod,
        UserRelationship,
        UserScope;
}
