<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Litigation extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ["value"];

    protected $hidden = ["deleted_at","created_at","updated_at"];

    public function sodas() {
        return $this->hasMany('App\Models\Soda');
    }

}
