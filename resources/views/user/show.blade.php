@extends('user.master');

@section('content')
<section>
  <div class="card col-lg-6 offset-md-3 px-0">
    <div class="card-header bg-dark text-white">
        VIEW SPECIFIC USER
    </div>
    <div class="card-body">
      @if($user!="")
      <div class="input-group input-group-lg mb-3">
          <div class="col-lg-4">
            <label>Name*</label>
          </div>
          <div class="col-lg-8">
            <label>{{ $user->name }}</label>
          </div>
       </div>
        <div class="input-group input-group-lg mb-3">
            <div class="col-lg-4">
              <label>Email*</label>
            </div>
            <div class="col-lg-8">
              <label>{{ $user->email }}</label>
            </div>
         </div>
         <div class="input-group input-group-lg mb-3">
             <div class="col-lg-4">
               <label>Phone*</label>
             </div>
             <div class="col-lg-8">
               <label>{{ $user->phone }}</label>
             </div>
          </div>
          <div class="input-group input-group-lg mb-3">
              <div class="col-lg-4">
                <label>Created Date*</label>
              </div>
              <div class="col-lg-8">
                <label>{{ $user->created_at }}</label>
              </div>
           </div>
           <div class="input-group input-group-lg">
               <div class="col-lg-6">
                 <a class="btn btn-info btn-block" href="{{ route('users.index') }}" name="button">Back</a>
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
