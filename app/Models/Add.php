<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Add extends Model
{

    /**
     * Undocumented function
     *
     * @return void
     */
    public function addType()
    {
        return $this->hasOne(AddType::class);
    }


}
