@extends('categorymaster');

@section('content')
<section id="categoryedit">
  <div class="card col-lg-6 offset-md-3 px-0">
    <div class="card-header bg-dark text-white">
          CATEGORY EDIT
    </div>
    <div class="card-body">
        <div class="container">
          <div class="row">
              <div class="col-lg-12">
                <div class="card bg-light">
                  <div class="card-body">
                    <form class="px-5 pt-3" action="{{ route('categories.update',$category->id) }}" enctype="multipart/form-data" method="post">
                      @csrf
                      @method('PUT')
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
                            <input type="text"  value="{{ $category->name }}" name="categoryname" placeholder="category name" class="form-control">
                          </div>
                       </div>

                       <div class="input-group input-group-lg mb-3">
                           <div class="col-lg-4">
                             <label>Slug Name</label>
                           </div>
                           <div class="col-lg-8">
                             <input type="text"  value="{{ $category->slug }}" name="slugname" placeholder="slug name" class="form-control">
                           </div>
                        </div>

                         <div class="input-group input-group-lg mb-3">
                           <div class="col-lg-4">
                               <label>Status*</label>
                           </div>
                           <div class="col-lg-8">
                             <select name="status" class="custom-select">
                                 <option value="" selected>Select Status</option>
                                 <option value="active"
                                  @if($category->status == "active")
                                   selected
                                  @endif>Active</option>
                                 <option value="inactive"
                                 @if($category->status == "inactive")
                                  selected
                                 @endif>Inactive</option>
                             </select>
                          </div>
                        </div>
                        <br>
                          <div class="col-lg-12">
                            <button type="submit" class="btn btn-outline-primary btn-block">Category update</button>
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
