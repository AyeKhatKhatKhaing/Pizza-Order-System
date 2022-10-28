<?php

namespace App\Http\Controllers\API;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class ApiController extends Controller
{
    public function categoryList(){
            $category = Category::get();

            $response = [
                'status' => "200",
                'message' => "Success",
                'data'=> $category
            ];
            return response()->json($response);
    }

    public function createCategory(Request $request){
        //dd($request->header('API-KEY'));
        //dd($request->all());

        $data = [
            'category_name' => $request->categoryName,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];

        Category::create($data);
        $response = [
            'status' => '200',
            'message' => 'Success',
        ];

        return response()->json($response);
    }

    public function categoryDetails($id,Request $request){
       // $id = $request->id;

        $data = Category::where('category_id',$id)->first();

        if(!empty($data)){
            return response()->json([
                'status' => 200,
                'message' => 'success',
                'data' => $data
            ]);
        }

        return response()->json([
            'status' => 200,
            'message' => 'fail',
            'data' => $data
        ]);
    }

    public function categoryDelete($id){
        $data = Category::where('category_id',$id)->first();

        if(empty($data)){
            return response()->json([
                'status' => 200,
                'message' => 'There is no such data in table',
                'data' => $data
            ]);
        }

        Category::where('category_id',$id)->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Success',
        ]);
    }

    public function categoryUpdate(Request $request){
        $updateData = [
            'category_id' => $request->id,
            'category_name' => $request->categoryName,
            'updated_at' => Carbon::now()
        ];

        $check = Category::where('category_id',$request->id)->first();

        if(!empty($check)){
            Category::where('category_id',$request->id)->update($updateData);
            return response()->json([
                'status' => 200,
                'message' => 'Success'
            ]);
        }

        return response()->json([
            'status' => 200,
            'message' => 'There is no such data in table'
        ]);
    }
}
