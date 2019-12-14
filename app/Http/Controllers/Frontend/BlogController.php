<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Blog;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function viewIndex()
    {
        $category['categories'] = Category :: all();
        // $data['blogs'] = Blog :: with('category','user')->get([
        //   'id',
        //   'user_id',
        //   'category_id',
        //   'title',
        //   'content',
        //   'image_path',
        //   'created_at',
        //   DB::raw('DATE_FORMAT(created_at, "%M %d, %Y") as custom_date')
        // ]);
        $data['blogs'] = Blog :: with('category','user')->select(
         'id',
         'user_id',
         'category_id',
         'title',
         'content',
         'image_path',
         'created_at',
          DB::raw('DATE_FORMAT(created_at, "%M %d, %Y") as custom_date')
         )->paginate(3);
        // dd($data);
        return view('frontend.blog.index',$category,$data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function viewByCategory($name)
    {
        $category = Category :: where('name',$name)->firstOrFail();
        $id = $category->id;
       $category['categories'] = Category :: all();
       $data['blogs'] = Blog :: with('category','user')->select(
        'id',
        'user_id',
        'category_id',
        'title',
        'content',
        'image_path',
        'created_at',
         DB::raw('DATE_FORMAT(created_at, "%M %d, %Y") as custom_date')
        )->WHERE('category_id',$id)->get();
       // dd($data);
       return view('frontend.blog.viewallcategory',$category,$data);

    }

    public function viewSingleBlog($name,$id)
    {
      $category = Category :: where('name',$name)->firstOrFail();
      $category['categories'] = Category :: all();
         $data['blog'] = Blog :: with('category','user')->select(
           'id',
           'user_id',
           'category_id',
           'title',
           'content',
           'image_path',
           'created_at',
            DB::raw('DATE_FORMAT(created_at, "%M %d, %Y") as custom_date')
           )->WHERE('id',$id)->firstOrFail();
       // dd($data);
        return view('frontend.blog.singleblog',$category,$data);

    }
}
