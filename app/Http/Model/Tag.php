<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = "tag";
    protected $primaryKey = 'Id';
    public $timestamps = 'false';
}
