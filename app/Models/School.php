<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;

class School extends Model implements Searchable
{
    public function getSearchResult(): SearchResult
    {
        $url = route('frontend.schoolhome', $this->schooladminid);

        return new \Spatie\Searchable\SearchResult(
            $this,
            $this->schoolname,
            $url
        );
    }
}