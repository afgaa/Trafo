@extends('layouts.admin.app2')
@section('title', $title)
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            {{-- <div class="col-lg-12 mb-4 order-0">
          <div class="card">
              <div class="d-flex align-items-end">
                  <img src="{{asset('img\t.jpeg')}}" alt="" class="img-fluid">
              </div>
          </div>
      </div> --}}
            <div class="col-lg-12 mb-2 order-0">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-sm-12">
                            <div class="card-body">
                                <h5 class="card-title text-primary">Monitoring Trafo</h5>
                                {{-- <p class="mt-2"> </p> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-12 mb-4 order-0">
                        <div class="card">
                            <div class="d-flex align-items-end">
                                <img src="{{ asset('img\t.jpeg') }}" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
        </div>
    </div>
@endsection()
