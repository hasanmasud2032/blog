<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Category;
use App\Models\Blog;


class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $data['blogs'] = Blog :: with('category','user')->select('id','user_id','category_id','title','content','image_path','created_at')->get();
      return view('backend.blog.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $data['categories'] = Category :: select('id','name')->get();
      return view('backend.blog.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate([
        'title'      => 'required',
        'text'       => 'required',
        'file'       => 'required|image|max:10240',
        'topic'      => 'required',
        'status'     => 'required',
    ]);

    $phote = $request->file('file');
    $file_name = uniqid('photo_',true).str_random(10).'.'.$phote->getClientOriginalExtension();
    if($phote->isValid()){
      $phote->storeAs('images',$file_name);
    }
    $data = [
      'user_id'         => trim($request->input('author')),
      'category_id'     => trim($request->input('topic')),
      'title'           => trim($request->input('title')),
      'content'         => trim($request->input('text')),
      'image_path'      => trim($file_name),
      'status'          => trim($request->input('status')),

    ];

      try {
        Blog :: create($data);
        $this->setSuccessMessage('Data Inserted Successfully');
        return redirect()->route('backend.blogs.create');
      }catch (Exception $e) {
        $this->setErrorMessage($e->getMessage());
        return redirect()->back('backend.blogs.create');
      }
  }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

       $data['blog'] = Blog :: with('category','user')->select('id','user_id','category_id','title','content','image_path','created_at','status')->WHERE('id',$id)->first();

      //  $data['blog'] = Blog :: with('category','user')->find($id);

    // return response()->json($data);
       return view('backend.blog.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $category['categories'] = Category :: select('id','name')->get();

      $data['blog'] = Blog :: with('category','user')->select('id','user_id','category_id','title','content','image_path','created_at','status')->WHERE('id',$id)->first();
    //  return response()->json($data);
      return view('backend.blog.edit',$data,$category);
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
      $request->validate([
        'title'      => 'required',
        'text'       => 'required',
        'file'       => 'image|max:10240',
        'topic'      => 'required',
        'status'     => 'required',
    ]);

    $phote = $request->file('file');
    if($phote){
      $file_name = uniqid('photo_',true).str_random(10).'.'.$phote->getClientOriginalExtension();
      $phote->storeAs('images',$file_name);
    }else{
      $file_name = $request->input('old_file');
    }
    $data = [
      'user_id'         => trim($request->input('author')),
      'category_id'     => trim($request->input('topic')),
      'title'           => trim($request->input('title')),
      'content'         => trim($request->input('text')),
      'image_path'      => trim($file_name),
      'status'          => trim($request->input('status')),

    ];

      try {
        $blog = Blog :: find($id);
        $blog->update($data);
        $this->setSuccessMessage('Data Updated Successfully');
          return redirect()->back();
      }catch (Exception $e) {
        $this->setErrorMessage($e->getMessage());
        return redirect()->back();
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $blog = Blog :: find($id);
      // $path = asset('uploads/images/'.$blog->image_path);
      unlink(public_path().'/uploads/images/'.$blog->image_path);
      $blog->delete();
      $this->setSuccessMessage('Data deleted Successfully');
      return redirect()->route('backend.blogs.index');
    }
}
