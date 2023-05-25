<?php


namespace App\Http\Controllers;

use App\Category;
use App\Http\Controllers\Controller;
use http\Env\Response;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index(){

        $categories = Category::get(); //Take the Category table's data into $categories

         /*Debuging Methods*/
            //dd($categories);
            //var_dump($categories);

        return view('category.category',['title'=>'Categories', 'categories'=>$categories]); //Return Category UI with the Data Of Category Table
    }







    //Save Category Start
    public function categorySave(Request $request){

        //dd($request); //front-end eken request eke back-end ekata ena data tika balaganna

        $category=$request['category'];
        $amount=$request['amount'];



    //Validation Start
        $validator = \Validator::make($request->all(), [

        //'category' and 'amount' are the ones that comes from front-end through request
            'category'  =>   'required|max:80',
            'amount'    =>   'required',

        ], [
            'category.required' =>  'Category should be provided!',
            'category.max'  =>  'Category must be less than 80 characters long.',

            'amount.required'   =>  'Amount should be provided!'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

//Validation End




        //Check whether category is already exist
        $categoryExist = Category::where('category_name', strtoupper($category))->first();
        if ($categoryExist != null){
            return response() -> json(['errors' => ['Category already exist.']]);
        }







        $save=new Category();

        $save->category_name=strtoupper($category); //strtoupper: save category name in capital letters
        $save->amount=$amount;
        $save->status=1;

        $save->save();

        return response()->json(['success'=>'Category Saved']);
    }
//Save Category End








    //Update Category Start
    public function categoryUpdate(Request $request){

        $hiddenCategoryId = $request['hiddenCategoryId'];

        $category = $request['category'];
        $amount = $request['amount'];


   //Validation
        $validator = \Validator::make($request->all(), [

            'category' => 'required|max:80',
            'amount'    => 'required',

        ], [
            'category.required' => 'Category should be provided!',
            'category.max' => 'Category must be less than 80 characters long.',

            'amount.required'   =>  'Amount should be provided!'

        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }



        //(This only for Update) Check whether category is already exist when idcategory eka $hiddenCategoryId ekata samana nowanawita
        $categoryExist = Category::where('idcategory','<>',$hiddenCategoryId)->where('category_name', strtoupper($category))->first();
        if ($categoryExist != null){
            return response() -> json(['errors' => ['Category already exist.']]);
        }




        $update = Category::find($hiddenCategoryId); //primary key deela row eke values tika gannawa

        $update->category_name=strtoupper($category);  //e row eke category_name ekata $category danava
        $update->amount=$amount;

        $update->save();

        return response()->json(['success'=>'Category Updated']);
    }
//Update Category End









    //Delete Category Start
    public function categoryDelete(Request $request){
        $id=$request['id'];
        $update=Category::find($id);

        $update->delete();

        return response()->json(['success'=>'Category Deleted']);
    }
}
//Delete Category End