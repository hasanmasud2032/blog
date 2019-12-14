@extends('backend.blog.master');

@section('content')
<section class="pb-5">
  <div class="card col-lg-6 mx-auto px-0" style="max-height:550px;overflow-y:auto">
    <div class="card-header bg-dark text-white">
        VIEW BLOG
    </div>
    <div class="card-body">
      @if($blog!="")
      <div class="input-group input-group-lg mb-3">
          <div class="col-lg-4">
            <label>Author Name*</label>
          </div>
          <div class="col-lg-8">
            <label>{{ $blog->user->name }}</label>
          </div>
       </div>
        <div class="input-group input-group-lg mb-3">
            <div class="col-lg-4">
              <label>Topic*</label>
            </div>
            <div class="col-lg-8">
              <label>{{ $blog->category->name }}</label>
            </div>
         </div>
         <div class="input-group input-group-lg mb-3">
             <div class="col-lg-4">
               <label>Title*</label>
             </div>
             <div class="col-lg-8">
               <label>{{ $blog->title }}</label>
             </div>
          </div>
          <div class="input-group input-group-lg mb-3">
              <div class="col-lg-4">
                <label>Content*</label>
              </div>
              <div class="col-lg-8">
                <label>{{ $blog->content }}</label>
              </div>
           </div>

          <div class="input-group input-group-lg mb-3">
              <div class="col-lg-4">
                <label>Created Date*</label>
              </div>
              <div class="col-lg-8">
                <label>{{ $blog->created_at }}</label>
              </div>
           </div>
           <div class="input-group input-group-lg mb-3">
               <div class="col-lg-4">
                 <label>Status*</label>
               </div>
               <div class="col-lg-8">
                 <label>{{ $blog->status ==1? 'Active' : 'Inactive' }}</label>
               </div>
            </div>
           <div class="input-group input-group-lg mb-3">
               <div class="col-lg-4">
                 <label>Image*</label>
               </div>
               <div class="col-lg-8">
                <img src="{{ asset('uploads/images/'.$blog->image_path) }}" class="img-fluid" style="height:100px;width:200px;">
               </div>
            </div>
           <div class="input-group input-group-lg">
               <div class="col-lg-6 col-md-12 col-sm-12 pb-md-2 pb-2">
                 <a class="btn btn-info btn-block" href="{{ route('backend.blogs.edit',$blog->id) }}" name="button">Edit</a>
               </div>
               <div class="col-lg-6 col-md-12 col-sm-12">
                 <a class="btn btn-info btn-block" href="{{ route('backend.blogs.index') }}" name="button">Back</a>
               </div>
            </div>
            @else
            <div class="text-danger">
                <h4>Data Not Found</h4>
            </div>
            @endif
        </div>
     </div>
</section>

@stop
