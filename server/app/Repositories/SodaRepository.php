<?php
namespace App\Repositories;

use App\Http\Resources\SodaResource;
use App\Models\Soda;
use App\Repositories\Contracts\SodaInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class SodaRepository extends AbstractRepository implements SodaInterface {

    protected $model = Soda::class;
    private $validator = [
        "brand_id" => 'required',
        "type_id" => 'required',
        "flavor" => 'required',
        "litigation_id" => 'required',
        "value_unit" => 'required',
        "stock" => 'required'
    ];

    public function all() {
        return $this->model->with(['brand','type','litigation'])->paginate(10);
    }

    public function update( Request $req, $id ){

        $out = [];

        if( $obj = $this->model->find( $id ) ){
            //validate datas receipt of post
            $validate = Validator::make($req->all(), $this->validator);
            if( $validate->fails() ){
                $out['status'] = "validate";
                $out['data'] = $validate->errors();
                $out['response'] = 400;
            }
            else {
                //save data update
                $this->model->brand_id = $req->input('brand_id');
                $this->model->type_id = $req->input('type_id');
                $this->model->flavor = $req->input('flavor');
                $this->model->litigation_id = $req->input('litigation_id');
                $this->model->value_unit = $req->input('value_unit');
                $this->model->stock = $req->input('stock');
                $this->model->save();

                $out['status'] = "success";
                $out['response'] = 200;
            }
        }
        else {
            $out['status'] = "empty";
            $out['response'] = 400;
        }

        return $out;

    }

    public function destroy( $ids ){

        $out = [];

       // return count($ids); exit;

        if( count($this->model->find($ids)) > 0 ){
            //return "YES"; exit;
            try {
                $this->model->destroy($ids);
                $out['status'] = "success";
                $out['message'] = "Refrigerante(s) excluidos com sucesso";
                $out['response'] = 200;
            }
            catch( Exception $e ){
                $out['status'] = "error";
                $out["message"] = $e->getMessage();
                $out["response"] = 500;
            }
        }
        else {
            $out['status'] = "empty";
            $out['message'] = "Refrigerante(s) não encontrado";
            $out['response'] = 400;
        }

        return $out;

    }

    public function store( Request $req ){

        $validate = Validator::make($req->all(), $this->validator);
        $out = [];

        if( $validate->fails() ){
            $out['status'] = "validate";
            $out['data'] = $validate->errors();
            $out['response'] = 400;
        }
        else {

            $this->model->brand_id = $req->input('brand_id');
            $this->model->type_id = $req->input('type_id');
            $this->model->flavor = $req->input('flavor');
            $this->model->litigation_id = $req->input('litigation_id');
            $this->model->value_unit = $req->input('value_unit');
            $this->model->stock = $req->input('stock');
            $this->model->save();

            $out['status'] = "success";
            $out['response'] = 200;

        }

        return $out;

    }

}
