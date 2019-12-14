@extends('categorymaster')
@section('content')
<section id="catagoriesindex">
    <div class="col-lg-6 offset-md-3">
      <div class="card">
        <div class="card-header bg-dark text-white">
          <div class="row">
            <div class="col-lg-6">
              VIEW CATEGORY
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="pb-3">
            <a href="{{ route('category.create') }}" class="btn btn-outline-primary">Add Category</a>
          </div>
          @if($categories->count()>=1)
          <table class="table table-dark table-striped">
               <thead class="text-center">
                   <tr>
                     <th>ID</th>
                     <th>Category Name</th>
                     <th>Status</th>
                     <th class="pl-5">Action</th>
                   </tr>
               </thead>
                <tbody class="text-light text-center">
                  <?php $x=0?>
                  @foreach($categories as $category)
                   <tr>
                      <td>{{ ++$x }}</td>
                      <td>{{ $category->name }}</td>
                      <td>{{ $category->status }}</td>
                      <td>
                        <a  data-toggle="tooltip" href="{{ route('categories.edit',$category->id) }}" data-placement="top" title="edit" class="bg-primary py-1 px-2 ml-1"  href=""><i class="fa fa-pencil-square-o text-light"></i></a>

                        <a  data-toggle="tooltip"  href="{{ route('categories.single-record-view',$category->id) }}" data-placement="top" title="view" class="bg-primary py-1 px-2 ml-1"><i class="fa fa-eye-slash text-light"></i></a>

                       <a style="cursor:pointer;"data-toggle="tooltip" data-placement="top" title="delete" class="bg-danger py-1 px-2 ml-1" id="catdelete"  href="{{ route('categories.delete',$category->id) }}"><i class="fa fa-trash text-light"></i></a>
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
