<?php
namespace App\Repositories\Contracts;

use Illuminate\Http\Request;

interface SodaInterface {

    public function all();

    public function store( Request $req );

}
