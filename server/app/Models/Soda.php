<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soda extends Model
{
    use HasFactory;

    protected $fillable = [
        "id","brand_id","type_id","flavor","litigation_id","value_unit","stock"
    ];

    public function brand() {
        return $this->belongsTo('App\Models\Brand');
    }

    public function type() {
        return $this->belongsTo('App\Models\Type');
    }

    public function litigation() {
        return $this->belongsTo('App\Models\Litigation');
    }

}
