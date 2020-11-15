<?php
namespace App\Repositories;

use App\Models\Soda;
use App\Repositories\Contracts\SodaInterface;

class SodaRepository extends AbstractRepository implements SodaInterface {

    protected $model = Soda::class;



}
