@extends('user.master')

@section('content')
<section id="catagoriesindex">
    <div class="col-lg-8 mx-auto">
      <div class="card">
        <div class="card-header bg-dark text-white">
          <div class="row">
            <div class="col-lg-6">
              VIEW USER
            </div>
          </div>
        </div>
        <div class="card-body" style="overflow-x:auto">
          @if($users->count()>=1)
          <table class="table table-dark table-striped">
               <thead class="text-center">
                   <tr>
                     <th>ID</th>
                     <th>Name</th>
                     <th>Email</th>
                     <th>Phone</th>
                     <th class="pl-5">Action</th>
                   </tr>
               </thead>
                <tbody class="text-light text-center">
                  <?php $x=0?>
                  @foreach($users as $user)
                   <tr>
                      <td>{{ ++$x }}</td>
                      <td>{{ $user->name }}</td>
                      <td>{{ $user->email }}</td>
                      <td>{{ $user->phone }}</td>
                      <td>
                        <a  data-toggle="tooltip"  href="{{ route('users.show',$user->id) }}" data-placement="top" title="view" class="bg-primary py-1 px-2 ml-1"><i class="fa fa-eye-slash text-light"></i></a>

                       <a style="cursor:pointer;"data-toggle="tooltip" data-placement="top" title="delete" class="bg-danger py-1 px-2 ml-1" id="delete"  href="{{ route('users.destroy',$user->id) }}"><i class="fa fa-trash text-light"></i></a>
                      </td>
                   </tr>
                   @endforeach
               </tbody>
              </table>
              @else
              <div class="text-info">
                <h4>Data Not Found</h4>
              </div>
              @endif
        </div>
      </div>
    </div>
</section>

@stop
