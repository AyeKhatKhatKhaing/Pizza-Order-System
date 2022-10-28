@extends('admin.layout.app')
@section('content')

<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">

     <div class="container-fluid">

        <div class="row mt-4">
          <div class="col-8 offset-2 mt-4">
              <h3 class="my-3">{{ $pizza[0]->categoryName}}</h3>
            <div class="card">
              <div class="card-header">
                <span class="text-info fs-5 ml-2">Total - {{ $pizza->total() }}</span>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
               <table class="table table-hover text-nowrap text-center">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Pizza Image</th>
                      <th>Pizza Name</th>
                      <th>Price</th>
                    </tr>
                  </thead>
                  <tbody>
                   @foreach ($pizza as $item)
                      <tr>
                         <td>{{ $item->pizza_id }}</td>
                         <td><img src="{{ asset('uploads/'.$item->image)}}" width="130px"></td>
                         <td>{{ $item->pizza_name}}</td>
                         <td>{{ $item->price}}</td>
                      </tr>
                   @endforeach
                  </tbody>
                </table>

                <div class="mt-3 ms-2">{{ $pizza->links() }}</div>

              </div>
              <div class="card-footer">
                  <a href="{{ route('admin#category')}}">
                    <button class="btn bg-dark text-white"><i class="fas fa-arrow-alt-circle-left"></i>Back</button>
                  </a>
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
