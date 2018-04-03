<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\m_menu;

class MenuController extends Controller
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
    public function list()
    {
        try {
            $menu = DB::table('m_menu')
                      ->join('m_menu_type', 'm_menu.type_id', '=', 'm_menu_type.id')
                      ->select('m_menu.*', 'm_menu_type.type_name')->get();
            $res['success'] = true;
            $res['data'] = $menu;
            $res['count'] = $menu->count();
            return response($res, 200);
        } catch (\Illuminate\Database\QueryException $ex) {
            $res['success'] = false;
            $res['message'] = $ex->getMessage();
            return response($res, 500);
        }
    }
    public function detail($id)
    {
        try {
            $menu = DB::table('m_menu')
                      ->join('m_menu_type', 'm_menu.type_id', '=', 'm_menu_type.id')
                      ->where('m_menu.id','=',$id)
                      ->select('m_menu.*', 'm_menu_type.type_name')->get();
            $res['success'] = true;
            $res['data'] = $menu[0];
            $res['count'] = $menu->count();
            return response($res, 200);
        } catch (\Illuminate\Database\QueryException $ex) {
            $res['success'] = false;
            $res['message'] = $ex->getMessage();
            return response($res, 500);
        }
    }
    public function save(Request $request)
    {
        try {
            $name = $request->input('name');
            $price = $request->input('price');
            $type_id = $request->input('type_id');
            $note = $request->input('note');
            $save = m_menu::create([
                'name'=> $name,
                'price'=> $price,
                'type_id'=> $type_id,
                'note'=> $note,
            ]);
            $res['success'] = true;
            return response($res, 200);
        } catch (\Illuminate\Database\QueryException $ex) {
            $res['success'] = false;
            $res['message'] = $ex->getMessage();
            return response($res, 500);
        }
    }
    public function update(Request $req)
    {
        try {
            $menu = m_menu::find($req->input("id"));
            if ($menu) {
                $menu->name = $req->input("name");
                $menu->price = $req->input("price");
                $menu->type_id = $req->input("type_id");
                $menu->note = $req->input("note");
                $menu->save();
                $res['success'] = true;
                return response($res, 200);
            } else {
                $res['success'] = false;
                $res['message'] = 'Menu not found';
                return response($res, 200);
            }
        } catch (\Illuminate\Database\QueryException $ex) {
            $res['success'] = false;
            $res['message'] = $ex->getMessage();
            return response($res, 500);
        }
    }
    public function delete($id)
    {
      try {
          $menu = m_menu::find($id);
          if ($menu) {
              $menu->delete();
              $res['success'] = true;
              return response($res, 200);
          } else {
              $res['success'] = false;
              $res['message'] = 'Menu not found';
              return response($res, 200);
          }
      } catch (\Illuminate\Database\QueryException $ex) {
          $res['success'] = false;
          $res['message'] = $ex->getMessage();
          return response($res, 500);
      }
    }

    //
}
