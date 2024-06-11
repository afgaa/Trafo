@extends('layouts.admin.app2')
@section('title', $title)
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tabel /</span> Data User</h4>
        <!-- Striped Rows -->
        <div class="card">
            <div class="row">
                <div class="col-sm-9">
                    <h5 class="card-header">Data User Sistem Monitoring Trafo</h5>
                </div>
                <div class="col-sm-3 mt-3">
                    <a class="btn btn-primary" href="{{ route('user.create') }}">
                        <i class="bx bx-user-plus"></i> Tambah User
                    </a>
                </div>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th style="text-align: center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($paginate as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                    <strong>{{ $user->name }}</strong></td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if ($user->role == 1 or $user->role == 2)
                                        <span class="badge bg-label-primary me-1">Aktif</span>
                                    @else
                                        <span class="badge bg-label-warning me-1">Off</span>
                                    @endif
                                </td>
                                <td>
                                    <form action="{{ route('user.destroy', $user->id) }}" method="POST">
                                        <a class="btn btn-warning" href="{{ route('user.edit', $user->id) }}">
                                            <i class="bx bx-edit-alt me-1"></i>
                                        </a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Apakah anda yakin hapus data ini?')"
                                            class="btn btn-danger">
                                            <i class="bx bx-trash me-1"></i>
                                        </button>
                                    </form>
                                </td>

                                {{-- <td>
                            <form action="{{route('user.edit',$user->id)}}" method="POST">
                                @csrf
                                @method('PUT')
                                <a class="btn btn-warning" href="{{route('user.edit',$user->id)}}"><i class="bx bx-edit-alt me-1"></i></a>
                            </form>
                            <form action="{{route('user.destroy',$user->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Apakah anda yakin hapus User ini ? ')" class="btn btn-danger"><i class="bx bx-trash me-1"></i></button>
                            </form>
                        </td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="card-footer">
                    <div class="paginate">
                        <div class="container">
                            <div class="row">
                                <div class="mx-auto">
                                    <div class="paginate-button col-md-12">
                                        {{ $paginate->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--/ Striped Rows -->
    </div>
@endsection
