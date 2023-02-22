<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use PhpParser\Builder\Function_;
use PhpParser\Node\Expr\FuncCall;

class AjaxController extends Controller
{
   public function index(){
       return view('ajax.index');
   }

   public function allData(){
       $data = Teacher::orderBy('id','DESC')->get();
       return response()->json($data);
   }

   public function storeData(Request $request){
       $request->validate([
            'name' => 'required|min:4|unique:teachers,name',
            'title' => 'required',
            'institute' => 'required',
       ]);
        $store = Teacher::insert([
                'name' => $request->name,
                'title' => $request->title,
                'institute' => $request->institute,
                ]);

       return response()->json($store);
   }


   public function editData($id){
       $data = Teacher::findOrFail($id);
       return response()->json($data);
   }


   public function updateData(Request $request,$id){
            $request->validate([
                'name' => 'required|min:4',
                'title' => 'required',
                'institute' => 'required',
            ]);

              $update = Teacher::findOrFail($id)->update([
                       'name' => $request->name,
                       'title' => $request->title,
                       'institute' => $request->institute,
                       ]);
               return response()->json($update);
   }

   public function deleteData($id){
       Teacher::findOrFail($id)->delete();
       return response()->json('delete done');
   }
}
