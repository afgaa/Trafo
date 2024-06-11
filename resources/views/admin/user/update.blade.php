@extends('layouts.admin.app2')
@section('title', $title)
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Edit Data User</h4>

        <!-- Basic Layout -->
        <div class="row">
            <div class="col-sm-6">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Edit Data User </h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('user.update', $user->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-fullname">Nama</label>
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                            class="bx bx-user"></i></span>
                                    <input type="text" class="form-control" id="name" aria-describedby="name"
                                        value="{{ $user->name }}" name="name" />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-email">Email</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-envelope"></i></span>
                                    <input type="text" id="email" class="form-control" aria-describedby="email"
                                        value="{{ $user->email }}" name="email" />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="status">Status</label>
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-phone2" class="input-group-text"><i
                                            class='bx bx-user-circle'></i></span>
                                    <select id="status" class="form-control" name="role" onchange="updateRole()">
                                        <option value="2" {{ $user->role == 2 ? 'selected' : '' }}>Aktif</option>
                                        <option value="3" {{ $user->role == 3 ? 'selected' : '' }}>Off</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-fullname">Password</label>
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                            class='bx bxs-key'></i></i></span>
                                    <input type="password" class="form-control" id="password" aria-describedby="name"
                                        name="password" />
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function updateRole() {
            var status = document.getElementById('status').value;
            var role = document.getElementById('role');
            if (status == '2') {
                role.value = 2;
            } else if (status == '3') {
                role.value = 3;
            }
        }
    </script>
@endsection
