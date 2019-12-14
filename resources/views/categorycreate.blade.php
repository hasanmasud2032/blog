@extends('categorymaster');

@section('content')
<section id="blogcreate">
  <div class="card col-lg-6 offset-md-3 px-0">
    <div class="card-header bg-dark text-white">
          CATEGORY CREATE
    </div>
    <div class="card-body">
        <div class="container">
          <div class="row">
              <div class="col-lg-12">
                <div class="card bg-light">
                  <div class="card-body">
                    <form class="px-5 pt-3" action="{{ route('category.create') }}" enctype="multipart/form-data" method="post">
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
                            <label>Category Name</label>
                          </div>
                          <div class="col-lg-8">
                            <input type="text"  value="{{old('categoryname')}}" name="categoryname" placeholder="category name" class="form-control">
                          </div>
                       </div>

                       <div class="input-group input-group-lg mb-3">
                           <div class="col-lg-4">
                             <label>Slug Name</label>
                           </div>
                           <div class="col-lg-8">
                             <input type="text"  value="{{old('slugname')}}" name="slugname" placeholder="slug name" class="form-control">
                           </div>
                        </div>

                         <div class="input-group input-group-lg mb-3">
                           <div class="col-lg-4">
                               <label>Status*</label>
                           </div>
                           <div class="col-lg-8">
                             <select name="status" class="custom-select">
                                 <option value="" selected>Select Status</option>
                                 <option value="Active"
                                  @if(old('status') == "Active")
                                   selected
                                  @endif>Active</option>
                                 <option value="Inactive"
                                 @if(old('status') == "Inactive")
                                  selected
                                 @endif>Inactive</option>
                             </select>
                          </div>
                        </div>
                        <div class="col-lg-12 pt-2">
                            <button type="submit" class="btn btn-outline-primary btn-block">Save</button>
                        </div>
                         <br>
                          <div class="col-lg-12">
                            <a href="{{ route('categories.all-record-view') }}" class="btn btn-outline-primary btn-block">Back to Category List</a>
                          </div>
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
