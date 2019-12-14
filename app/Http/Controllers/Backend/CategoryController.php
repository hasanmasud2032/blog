<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;


class CategoryController extends Controller
{
  public function categoriesInsert() {
    return view('categorycreate');
  }

  public function categoriesInsertProcess(Request $request){
      $request->validate([
        'categoryname' => 'required|unique:categories,name',
        'slugname'     => 'required|unique:categories,slug',
        'status'       => 'required',
    ]);

    $data = [
      'name'     => strtolower($request->input('categoryname')),
      'slug'     => strtolower($request->input('slugname')),
      'status'   => strtolower($request->input('status')),
    ];

    try {
      category :: create($data);
      $this->setSuccessMessage('Data Inserted Successfully');
      return redirect()->route('category.create');
    }catch (Exception $e) {
      $this->setErrorMessage($e->getMessage());
      return redirect()->back();
    }

  }

  public function categoriesEdit($id) {
    $data['category'] = Category :: find($id);
    return view('categoryedit',$data);
  }


    public function categoriesUpdate($id,Request $request) {
      $request->validate([
        'categoryname' => 'required|unique:categories,name,'.$id,
        'slugname'     => 'required|unique:categories,slug,'.$id,
        'status'       => 'required',
    ]);

    try {
      $category = Category :: find($id);
      $category->update([
        'name'     => strtolower($request->input('categoryname')),
        'slug'     => strtolower($request->input('slugname')),
        'status'   => strtolower($request->input('status')),
      ]);

      $this->setSuccessMessage('Data Updated Successfully');
      return redirect()->back();
    }catch (Exception $e) {
      $this->setErrorMessage($e->getMessage());
      return redirect()->back();
    }

    }

  public function categoriesDestroy($id) {
     $category = Category :: find($id);
     // $category->delete();
      return redirect()->route('categories.all-record-view');
  }

  public function categoriesShow($id){
    $data['category'] = Category :: find($id);
    return view('singlecategoryview',$data);
  }

  public function categoriesIndex() {
      $data['categories'] = Category :: all();
      return view('categoryindex',$data);
       // return response()->json($data);
  }
}
