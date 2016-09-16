<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class TagList extends Model
{
    protected $table = "taglist";
    protected $primaryKey = 'Id';
    public $timestamps = 'false';
}
