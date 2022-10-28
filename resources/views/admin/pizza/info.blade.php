@extends('admin.layout.app')
@section('content')

<div class="content-wrapper">
    <section class="content">
      <div class="container-fluid">
        <div class="row mt-4">
          <div class="col-8 offset-3 mt-5">
            <div class="col-md-9">
               <a href="{{ route('admin#pizza')}}" class="text-decoration-none text-black"><div class="mb-2"><i class="fas fa-chevron-circle-left"></i>Back</div></a>
              <div class="card">
                <div class="card-header p-2">
                  <legend class="text-center">Pizza Information</legend>
                </div>
                <div class="card-body">
                  <div class="tab-content">
                    <div class="active tab-pane d-flex justify-content-center" id="activity">
                        <div class="mt-2 text-center pr-4 pt-4">
                            <img class="img-thumbnail rounded" src="{{ asset('uploads/'.$pizza->image)}}" style="width:250px; height:250px">
                        </div>
                        <div class="">
                            <div class="mt-3">
                                <b>Name</b> : <span>{{ $pizza->pizza_name}}</span>
                            </div>
                            <div class="mt-3">
                                <b>Price</b> : <span>{{ $pizza->price}} Kyats</span>
                            </div>
                            <div class="mt-3">
                                <b>Publisn Status</b> :
                                <span>
                                    @if ($pizza->publish_status ==1)
                                        YES
                                    @else
                                        NO
                                    @endif
                                </span>
                            </div>
                            <div class="mt-3">
                                <b>Category</b> : <span>{{ $pizza->pizza_name}}</span>
                            </div>
                            <div class="mt-3">
                                <b>Discount Price</b> : <span>{{ $pizza->discount_price}}</span>
                            </div>
                            <div class="mt-3">
                                <b>Buy One Get One Status</b> :
                                <span>
                                    @if ($pizza->buy_one_get_one_status ==1)
                                        YES
                                    @else
                                        NO
                                    @endif
                                </span>
                            </div>
                            <div class="mt-3">
                                <b>Waiting Time</b> : <span>{{ $pizza->waiting_time}}</span>
                            </div>
                            <div class="mt-3">
                                <b>Description</b> : <span>{{ $pizza->description}}</span>
                            </div>
                        </div>
                    </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>

@endsection
