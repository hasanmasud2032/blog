@extends('backend.blog.master')

@section('content')

<section id="blogsindex">
    <div class="col-lg-12 mx-auto">
      <div class="card">
        <div class="card-header bg-dark text-white">
          <div class="row">
            <div class="col-lg-12">
              VIEW BLOGS
            </div>
          </div>
        </div>
        <div class="card-body" style="overflow-x:auto">
          @if(session()->has('message'))
          <div class="alert alert-{{ session('type') }}">
              {{ session('message') }}
          </div>
          @endif
          <div class="pb-3">
            <a href="{{ route('backend.blogs.create') }}" class="btn btn-outline-primary">Add Blog</a>
          </div>
          @if($blogs->count()>=1)
          <table class="table table-dark table-striped">
               <thead class="text-center">
                   <tr>
                     <th>ID</th>
                     <th>Author</th>
                     <th>Topic</th>
                     <th>Title</th>
                     <th>Content</th>
                     <th>Image</th>
                     <th class="pl-5">Action</th>
                   </tr>
               </thead>
                <tbody class="text-light text-center">
                  <?php $x=0?>
                  @foreach($blogs as $blog)
                   <tr>
                      <td>{{ ++$x }}</td>
                      <td>{{ $blog->user->name}}</td>
                      <td>{{ $blog->category->name }}</td>
                      <td>{{ Helper :: textShorten($blog->title,10) }}</td>
                      <td>{{ Helper :: textShorten($blog->content,10) }}</td>
                      <td><img src="{{ asset('uploads/images/'.$blog->image_path) }}" class="img-fluid" style="height:50px;width:50px;"></td>
                      <td>
                      <div class="row d-flex justify-content-center"">
                          <a  data-toggle="tooltip" href="{{ route('backend.blogs.edit',$blog->id) }}" data-placement="top" title="edit" class="bg-primary py-1 px-2 ml-1"><i class="fa fa-pencil-square-o text-light"></i></a>

                         <a  data-toggle="tooltip"  href="{{ route('backend.blogs.show',$blog->id) }}" data-placement="top" title="view" class="bg-primary py-1 px-2 ml-1"><i class="fa fa-eye-slash text-light"></i></a>

                      <form action="{{ route('backend.blogs.destroy',$blog->id)}}" method="post" onsubmit="return confirm('Are you sure to delete this filed !!!')">
                        @csrf
                        @method('DELETE')
                         <button type="submit" style="cursor:pointer;" data-toggle="tooltip" data-placement="top" title="delete" class="bg-danger px-2 ml-1 pb-2" id="delete"><i class="fa fa-trash text-light"></i></button>
                      </form>

                      </div>
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
