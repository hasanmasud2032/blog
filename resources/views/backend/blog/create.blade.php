@extends('backend.blog.master')

@section('content')
<section id="blogcreate" class="mx-auto">
  <div class="card">
    <div class="card-header bg-dark text-white">
          BLOG CREATE
    </div>
    <div class="card-body">
        <div class="container">
          <div class="row">
              <div class="col-lg-12">
                <div class="card bg-light">
                  <div class="card-body">
                    <form class="px-5 pt-3" action="{{route('backend.blogs.store')}}" enctype="multipart/form-data" method="post">
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
                            <label>Blog Title</label>
                          </div>
                          <div class="col-lg-8">
                            <input type="text"  value="{{old('title')}}" name="title" placeholder="Title" class="form-control">
                          </div>
                       </div>

                       <div class="input-group input-group-lg mb-3">
                           <div class="col-lg-4">
                               <label>Blog Text</label>
                           </div>
                           <div class="col-lg-8">
                              <textarea name="text" placeholder="Content" rows="8" class="form-control" cols="3">{{old('text')}}</textarea>
                           </div>
                        </div>

                        <div class="input-group input-group-lg mb-3">
                            <div class="col-lg-8">
                              <input hidden type="text" value="1" name="author" placeholder="Author" class="form-control">
                            </div>
                         </div>

                          <div class="input-group input-group-lg mb-2">
                             <div class="col-lg-4">
                                 <label>Upload Image*</label>
                             </div>
                             <div class="col-lg-8">
                               <div class="custom-file mb-3">
                                <input type="file" name="file" class="custom-file-input">
                                 <label class="custom-file-label">Choose file</label>
                               </div>
                             </div>
                          </div>

                          <div class="input-group input-group-lg mb-3">
                            <div class="col-lg-4">
                                <label>Topic*</label>
                            </div>
                            <div class="col-lg-8">
                              <select name="topic" class="custom-select">
                                  <option value="" selected>Select Topic</option>
                                  @foreach($categories as $category)
                                  <option value="{{$category->id}}"
                                    @if(old('topic') == $category->id)
                                     selected
                                    @endif
                                    >{{ucfirst($category->name)}}
                                  </option>
                                  @endforeach
                              </select>
                           </div>
                         </div>

                           <div class="input-group input-group-lg mb-3">
                             <div class="col-lg-4">
                                 <label>Status*</label>
                             </div>
                             <div class="col-lg-8">
                               <select name="status" class="custom-select">
                                   <option value="" selected>Select Status</option>
                                   <option value="1"
                                    @if(old('status') == "1")
                                     selected
                                    @endif>Active</option>
                                   <option value="0"
                                   @if(old('status') == "0")
                                    selected
                                   @endif>Inactive</option>
                               </select>
                            </div>
                          </div>
                          <div class="d-flex justify-content-between">
                            <div>
                              <button type="submit" class="btn btn-outline-primary">Save</button>
                            </div>
                            <div>
                              <a href="{{ route('backend.blogs.index') }}" class="btn btn-outline-primary btn-block">Back to Blogs List</a>
                            </div>
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
