<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    // show
    public function category() {
        $category = Category::orderBy('created_at', 'desc')->paginate(3);
        return view('admin.Category.category',compact('category'));
        
    }

    // create
    public function categoryCreate(request $request){
       $Data =  $this->getData($request);
       $validationCheck = $this->validatorCheck($request);
       Category::create($Data);
       return back()->with(['complete' => 'Category Created!']);
    }

    private function getData($request){
        return [
            'category_id' => $request->categoryId,
            'title'=> $request->categoryName,
            'description'   => $request->categoryDescription,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }

    private function validatorCheck($request)
    {
        $validationRulesPass = [
            'categoryName' => 'required',
            'categoryDescription' => 'required|min:8',
        ];
        $validationMessagePass = [
            'categoryName.required' => 'title need to fill',
            'categoryDescription.required' => 'description need to fill',
        ];
        validator::make($request->all(), $validationRulesPass, $validationMessagePass)->validate();
    }

    // delete
    public function categoryDelete($id)
    {
        Category::where('category_id',$id)->delete();
        return back()->with(['deleteCategory' => 'Category Deleted!']);
    }

    //search
    public function adminSearch(Request $request){
      $category = Category::where('title', 'LIKE', '%' . $request->adminSearch . '%')
        ->where('description', 'LIKE', '%' . $request->adminSearch . '%')
        ->get();
        return view('admin.Category.category', compact('category'));
    }

    //editPage
    Public function categoryEditPage($id){

         $editData =  Category::where('category_id', $id)->first();
        $category =  Category::get();
        return view('admin.Category.categoryUpdatePage',compact('category','editData'))->with(['deleteCategory' => 'Category Deleted!']);

    }

    public function categoryEdit($id,request $request){
        $Data =  $this->editData($request);
        Category::where('category_id', $id)->update($Data);
        return back();

    }

    private function editData($request)
    {
        return [
            'title' => $request->editName,
            'description'   => $request->editDescription,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }


}
