@extends('layouts.admin.app2')
@section('title', $title)
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Tambah User Monitoring Trafo</h4>

    <!-- Basic Layout -->
    <div class="row">
      <div class="col-xl-6">
        <div class="card mb-4">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Tambah Data User</h5>
          </div>
          <div class="card-body">
            <form method="POST" action="{{ route('user.store') }}" enctype="multipart/form-data">
              @csrf
              <div class="mb-3">
                <i class="bx bx-user"></i>
                <label class="form-label" for="basic-icon-default-fullname">Nama</label>
                <div class="input-group input-group-merge">
                  {{-- <span id="basic-icon-default-fullname2" class="input-group-text"><i class="bx bx-user"></i></span> --}}
                  <input
                    type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
              </div>
              
              {{-- <div class="mb-3">
                <label class="form-label" for="basic-icon-default-company">Company</label>
                <div class="input-group input-group-merge">
                  <span id="basic-icon-default-company2" class="input-group-text"
                    ><i class="bx bx-buildings"></i
                  ></span>
                  <input
                    type="text"
                    id="basic-icon-default-company"
                    class="form-control"
                    placeholder="ACME Inc."
                    aria-label="ACME Inc."
                    aria-describedby="basic-icon-default-company2"
                  />
                </div>
              </div> --}}
              <div class="mb-3">
                <i class="bx bx-envelope"></i>
                <label class="form-label" for="basic-icon-default-email">Email</label>
                <div class="input-group input-group-merge">
                  {{-- <span class="input-group-text"><i class="bx bx-envelope"></i></span> --}}
                  <input
                    type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
              </div>
              {{-- <div class="mb-3">
                <label class="form-label" for="basic-icon-default-password">Password</label>
                <div class="input-group input-group-merge">
                  <span class="input-group-text"><i class="bx bx-lock-alt"></i></span>
                  <input
                    id="password" type="password" 
                    class="form-control @error('password') is-invalid @enderror" 
                    name="password" required autocomplete="new-password"
                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;">
                  @error('password')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                </div>
              </div> --}}

              <div class="mb-3 form-password-toggle">
                <i class="bx bx-lock-alt"></i>
                <label class="form-label" for="password">Password</label>
                <div class="input-group input-group-merge">
                  <input
                    type="password"
                    id="password"
                    class="form-control" @error('password') is-invalid @enderror" 
                    name="password"
                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                    aria-describedby="password"
                  />
                  @error('password')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                  <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                </div>
              </div>

              <button type="submit" class="btn btn-primary">Buat Akun</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
            


           
