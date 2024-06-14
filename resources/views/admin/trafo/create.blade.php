@extends('layouts.admin.app2')
@section('title', $title)
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Tambah Trafo</h4>

        <!-- Basic Layout -->
        <div class="row">
            <div class="col-xl-6">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Tambah Data Trafo</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('trafo.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-fullname">Trafo</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-home-alt"></i></span>
                                    <input type="text" class="form-control" id="" aria-describedby="name"
                                        name="trafo_name" />
                                </div>
                            </div>
                            {{-- arus --}}
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-fullname">Arus Topic Name</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-home-alt"></i></span>
                                    <input type="text" class="form-control" id="arus_topic_name" aria-describedby="name"
                                        name="arus_topic_name" />
                                </div>
                            </div>
                            {{-- tegangan --}}
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-fullname">Tegangan Topic Name</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-home-alt"></i></span>
                                    <input type="text" class="form-control" id="tegangan_topic_name"
                                        aria-describedby="name" name="tegangan_topic_name" />
                                </div>
                            </div>
                            {{-- suhu --}}
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-fullname">Suhu Topic Name</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-home-alt"></i></span>
                                    <input type="text" class="form-control" id="suhu_topic_name" aria-describedby="name"
                                        name="suhu_topic_name" />
                                </div>
                            </div>
                            {{-- tekanan --}}
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-fullname">Tekanan Topic Name</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-home-alt"></i></span>
                                    <input type="text" class="form-control" id="tekanan_topic_name"
                                        aria-describedby="name" name="tekanan_topic_name" />
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Tambah Trafo</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
