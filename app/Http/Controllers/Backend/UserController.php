<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $data['users'] = User :: all();
      return view('user.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('user.create');
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
        'name'      => 'required',
        'email'     => 'required|email|unique:users,email',
        'phone'     => 'required|min:6|max:13|unique:users,phone',
        'password'  => 'required|min:6|max:20|confirmed',

    ]);

    $data = [
      'name'      => strtolower(trim($request->input('name'))),
      'email'     => strtolower(trim($request->input('email'))),
      'phone'     => trim($request->input('phone')),
      'password'  => bcrypt(trim($request->input('password'))),

    ];

    try {
      User :: create($data);
      $this->setSuccessMessage('Data Inserted Successfully');
      return redirect()->route('users.create');
    }catch (Exception $e) {
      $this->setErrorMessage($e->getMessage());
      return redirect()->back();
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
      $data['user'] = User :: find($id);
       // $data['user'] = User :: select('name','email','phone','created_at')->where('id',$id)->get();
       // return response()->json($data);
      return view('user.show',$data);
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
}
