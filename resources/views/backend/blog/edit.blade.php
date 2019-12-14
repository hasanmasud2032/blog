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
                    <form class="px-5 pt-3" action="{{route('backend.blogs.update',$blog->id)}}" enctype="multipart/form-data" method="post">
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
                            <label>Blog Title</label>
                          </div>
                          <div class="col-lg-8">
                            <input type="text"  value="{{$blog->title}}" name="title" placeholder="Title" class="form-control">
                          </div>
                       </div>

                       <div class="input-group input-group-lg mb-3">
                           <div class="col-lg-4">
                               <label>Blog Text</label>
                           </div>
                           <div class="col-lg-8">
                              <textarea name="text" placeholder="Content" rows="8" class="form-control" cols="3">{{ $blog->content }}</textarea>
                           </div>
                        </div>

                        <div class="input-group input-group-lg mb-3">
                            <div class="col-lg-8">
                              <input hidden type="text" value="{{$blog->user->id}}" name="author" placeholder="Author" class="form-control">
                            </div>
                         </div>

                          <div class="input-group input-group-lg mb-2">
                             <div class="col-lg-4">
                                 <label>Upload Image*</label>
                             </div>
                             <div class="col-lg-8">
                               <div class="custom-file mb-3">
                                 <input hidden type="text" name="old_file" value="{{$blog->image_path}}">
                                <input type="file" name="file" class="custom-file-input">
                                 <label class="custom-file-label">Choose file</label>
                               </div>
                             </div>
                          </div>

                          <div class="input-group input-group-lg mb-2">
                             <div class="col-lg-4">

                             </div>
                             <div class="col-lg-8">
                               <img src="{{ asset('uploads/images/'.$blog->image_path) }}" class="img-fluid" style="height:100px;width:200px;">

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
                                    @if($blog->category_id == $category->id)
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
                                    @if($blog->status == 1)
                                     selected
                                    >Active</option>
                                   <option value="0"
                                   @else
                                    selected
                                   @endif>Inactive</option>
                               </select>
                            </div>
                          </div>
                          <div class="col-lg-12">
                            <button type="submit" class="btn btn-outline-primary btn-block">Update</button>
                          </div>
                          <br>
                          <div class="col-lg-12">
                            <a href="{{ route('backend.blogs.index') }}" class="btn btn-outline-primary btn-block">Back to Blogs List</a>
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
