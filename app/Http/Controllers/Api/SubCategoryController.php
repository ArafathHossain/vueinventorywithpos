<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Subcategory;
use DB;

class SubCategoryController extends Controller
{

    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategory = DB::table('subcategories')
        ->join('categories','subcategories.category_id','categories.id')
        ->select('categories.category_name','subcategories.*')
        ->get();
        return response()->json($subcategory);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'subcategory_name' => 'required|unique:subcategories|max:255',
            'category_id' => 'required',
           ]);
   
            $subcategory = new Subcategory;
            $subcategory->subcategory_name = $request->subcategory_name;
            $subcategory->category_id = $request->category_id;
            $subcategory->save(); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $subcategory = DB::table('subcategories')->where('id',$id)->first();
        return response()->json($subcategory);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $data = array();
        $data['subcategory_name'] =  $request->subcategory_name;
        $data['category_id'] =  $request->category_id;
        DB::table('subcategories')->where('id',$id)->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('subcategories')->where('id',$id)->delete();
    }
}
