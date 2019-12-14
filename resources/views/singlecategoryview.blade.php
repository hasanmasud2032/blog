@extends('categorymaster');

@section('content')
<section id="blogcreate">
  <div class="card col-lg-6 offset-md-3 px-0">
    <div class="card-header bg-dark text-white">
        VIEW CATEGORY
    </div>
    <div class="card-body">
      @if($category!="")
      <div class="input-group input-group-lg mb-3">
          <div class="col-lg-4">
            <label>Category Name*</label>
          </div>
          <div class="col-lg-8">
            <label>{{ $category->name }}</label>
          </div>
       </div>
        <div class="input-group input-group-lg mb-3">
            <div class="col-lg-4">
              <label>Slug Name*</label>
            </div>
            <div class="col-lg-8">
              <label>{{ $category->slug }}</label>
            </div>
         </div>
         <div class="input-group input-group-lg mb-3">
             <div class="col-lg-4">
               <label>Status*</label>
             </div>
             <div class="col-lg-8">
               <label>{{ $category->status }}</label>
             </div>
          </div>
          <div class="input-group input-group-lg mb-3">
              <div class="col-lg-4">
                <label>Created Date*</label>
              </div>
              <div class="col-lg-8">
                <label>{{ $category->created_at }}</label>
              </div>
           </div>
           <div class="input-group input-group-lg">
               <div class="col-lg-6">
                 <a class="btn btn-info btn-block" href="{{ route('categories.edit',$category->id) }}" name="button">Edit</a>
               </div>
               <div class="col-lg-6">
                 <a class="btn btn-info btn-block" href="{{ route('categories.all-record-view') }}" name="button">Back</a>
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
