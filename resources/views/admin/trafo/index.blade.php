@extends('layouts.admin.app2')
@section('title', $title)
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tabel /</span> Data Trafo</h4>
        <!-- Striped Rows -->
        <div class="card">
            <div class="row">
                <div class="col-sm-9">
                    <h5 class="card-header">Data Trafo </h5>
                </div>
                <div class="col-sm-3 mt-3">
                    <a class="btn btn-primary" href="{{ route('trafo.create') }}">
                        <i class="bx bx-user-plus"></i> Tambah Trafo
                    </a>
                </div>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Trafo</th>
                            <th style="text-align: center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($paginate as $trf)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                    <strong>{{ $trf->name }}</strong>
                                </td>
                                {{-- <td>{{$trf->latitude}}</td>
                        <td>{{$trf->longtitude}}</td> --}}
                                <td class="text-center">
                                    <form action="{{ route('trafo.destroy', $trf->id) }}" method="POST">
                                        <a class="btn btn-warning" href="{{ route('trafo.edit', $trf->id) }}">
                                            <i class="bx bx-edit-alt me-1"></i>
                                        </a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            onclick="return confirm('Apakah anda yakin hapus data trafo ini?')"
                                            class="btn btn-danger">
                                            <i class="bx bx-trash me-1"></i>
                                        </button>
                                    </form>
                                </td>
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
