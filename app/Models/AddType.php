<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

/**
 * Add type class
 */
class AddType extends Model
{
    /**
     * Undocumented function
     *
     * @return void
     */
    public function add()
    {
        return $this->belongsTo(Add::class);
    }
}
