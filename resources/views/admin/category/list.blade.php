@extends('admin.layout.app')
@section('content')

<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">

     <div class="container-fluid">
        @if (Session::has('categorySuccess'))
         <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
          {{Session::get('categorySuccess')}}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>
        @endif

        @if (Session::has('deleteSuccess'))
         <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
           {{Session::get('deleteSuccess')}}
           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>
        @endif

        @if (Session::has('updateSuccess'))
        <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
          {{Session::get('updateSuccess')}}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
       @endif
        <div class="row mt-4">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <a href="{{ route('admin#addCategory')}}"><button class="btn btn-sm btn-outline-dark">Add Category</button></a>
                </h3>
                <span class="text-info fs-5 ml-2">Total - {{ $category->total() }}</span>
                <div class="card-tools d-flex">
                  <a href="{{ route('admin#categoryDownload')}}"><button class="btn btn-sm btn-success me-3">Download CSV</button></a>
                  <form action="{{ route('admin#searchCategory')}}" method="get" class="mt-1">
                      @csrf
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="searchData" class="form-control float-right" placeholder="Search">

                        <div class="input-group-append">
                          <button type="submit" class="btn btn-default">
                            <i class="fas fa-search"></i>
                          </button>
                        </div>
                      </div>
                  </form>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
               <table class="table table-hover text-nowrap text-center">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Category Name</th>
                      <th>Product Count</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                   @foreach ($category as $item)
                      <tr>
                         <td>{{ $item->category_id }}</td>
                        <td>{{ $item->category_name}}</td>
                         <td>
                             @if ($item->count == 0)
                                 <a href="#" style="text-decoration: none">{{$item->count}}</a>
                             @else
                                  <a href="{{ route('admin#categoryItem', $item->category_id)}}" style="text-decoration: none">{{ $item->count}}</a>
                             @endif
                         </td>
                         <td>
                           <a href="{{ route('admin#editCategory',$item->category_id)}}"><button class="btn btn-sm bg-dark text-white"><i class="fas fa-edit"></i></button></a>
                           <a href="{{ route('admin#deleteCategory',$item->category_id)}}"><button class="btn btn-sm bg-danger text-white"><i class="fas fa-trash-alt"></i></button></a>
                         </td>
                      </tr>
                   @endforeach
                  </tbody>
                </table>

                <div class="mt-3 ms-2">{{ $category->links() }}</div>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection
