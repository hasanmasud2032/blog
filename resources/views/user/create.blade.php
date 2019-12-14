@extends('user.master')

@section('content')
<section id="usercreate" class="pt-4">
  <div class="card col-lg-8 mx-auto px-0">
    <div class="card-header bg-dark text-white">
          REGISTER YOUR ACCOUNT
    </div>
    <div class="card-body">
        <div class="container">
          <div class="row">
              <div class="col-lg-12">
                <div class="card bg-light">
                  <div class="card-body pb-0">
                    <form class="px-5 pt-3" action="{{ route('users.store') }}" enctype="multipart/form-data" method="post">
                      @csrf

                      @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                      @endif

                      @if(session()->has('message'))
                      <div class="alert alert-{{ session('type') }}">
                          {{ session('message') }}
                      </div>
                      @endif

                      <div class="input-group input-group-lg mb-3">
                          <div class="col-lg-4">
                            <label>Name</label>
                          </div>
                          <div class="col-lg-8">
                            <input type="text"  value="{{old('name')}}" name="name" placeholder="Name" class="form-control">
                          </div>
                       </div>

                       <div class="input-group input-group-lg mb-3">
                           <div class="col-lg-4">
                             <label>Email</label>
                           </div>
                           <div class="col-lg-8">
                             <input type="email"  value="{{old('email')}}" name="email" placeholder="Email" class="form-control">
                           </div>
                        </div>

                       <div class="input-group input-group-lg mb-3">
                           <div class="col-lg-4">
                             <label>Phone</label>
                           </div>
                           <div class="col-lg-8">
                             <input type="number"  value="{{old('phone')}}" name="phone" placeholder="Phone Number" class="form-control">
                           </div>
                        </div>

                       <div class="input-group input-group-lg mb-3">
                           <div class="col-lg-4">
                             <label>Password</label>
                           </div>
                           <div class="col-lg-8">
                             <input type="password"  value="{{old('password')}}" name="password" placeholder="password" class="form-control">
                           </div>
                        </div>
                        <div class="input-group input-group-lg mb-3">
                            <div class="col-lg-4">
                              <label>Confirm Password</label>
                            </div>
                            <div class="col-lg-8">
                              <input type="password"  value="{{old('password_confirmation')}}" name="password_confirmation" placeholder="Conform Password" class="form-control">
                            </div>
                         </div>

                        <div class="col-lg-12 pt-2 pb-0">
                            <button type="submit" class="btn btn-outline-primary btn-block">Save</button>
                        </div>
                         <br>

                    </form>
                  </div>
                </div>
              </div>
          </div>
        </div>
    </div>
  </div>
</section>

@stop
