<?php

namespace App\Http\Controllers;

use App\Exports\EndUserExport;
use App\Imports\EndUserImport;
use App\Models\EndUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class MainController extends Controller {
    public function index(){
        return view('index');
    }

    public function getData(){
        $page   = request()->input('page');
        $length = request()->input('length');

        $validator = Validator::make(request()->all(), [
            'length'    => 'required|integer|min:1|max:100',
            'page'      => 'required|integer|min:1',
        ]);

        $response = null;

        try{
            if ($validator->fails()) {
                throw new \Exception($validator->errors()->first());
            }
            
            $offset     = $length * ($page - 1);
            $response   = EndUser::select(['id AS 0', 'username AS 1', 'full_name AS 2', 'phone AS 3', 'email AS 4', 'created_at AS 5'])->skip($offset)->take($length)->get();
        }catch( \Exception $e){

        }

        return $response;
    }

    public function importData(){
        $data = request()->file('excel');

        $validator = Validator::make(request()->all(), [
            'excel' => 'required|mimes:xlsx|max:2048'
        ]);

        try{
            if ($validator->fails()) {
                throw new \Exception($validator->errors()->first());
            }

            Excel::import(new EndUserImport, $data);
        }catch( \Exception $e){

        }
        
        return true;
    }

    public function exportData(){
        return Excel::download(new EndUserExport, 'users.xlsx');
    }

    public function generateData(){
        $seeder = new \Database\Seeders\DatabaseSeeder();
        $seeder->run();

        return true;
    }

    public function cleanData(){
        EndUser::truncate();

        return true;
    }
}
