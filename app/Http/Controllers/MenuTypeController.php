<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\m_menu_type;

class MenuTypeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function list(){
      try {
           $type = m_menu_type::all();
           $res['success'] = true;
           $res['data'] = $type;
           $res['count'] = $type->count();
           return response($res, 200);
       } catch (\Illuminate\Database\QueryException $ex) {
           $res['success'] = false;
           $res['message'] = $ex->getMessage();
           return response($res, 500);
       }
    }
    public function save(){

    }
    public function upate(){

    }
    public function delete(){

    }

    //
}
