@extends('layouts.admin.app2')
@section('title', $title)
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Edit Data Trafo</h4>

        <!-- Basic Layout -->
        <div class="row">
            <div class="col-sm-6">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Edit Data Trafo </h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('trafo.update', $trafo->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-fullname">Trafo</label>
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                            class="bx bx-home-alt"></i></span>
                                    <input type="text" class="form-control" id="trafo_name" aria-describedby="trafo"
                                        value="{{ $trafo->name }}" name="trafo_name" required />
                                </div>
                            </div>
                            {{-- arus --}}
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-fullname">Arus R</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-home-alt"></i></span>
                                    <input type="text" class="form-control" id="arusr_topic_name" aria-describedby="name"
                                        name="arusr_topic_name" value="{{ $trafo->arus->topic_name_r }}" />
                                </div>
                            </div>
                            {{-- arus s --}}
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-fullname">Arus S</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-home-alt"></i></span>
                                    <input type="text" class="form-control" id="aruss_topic_name" aria-describedby="name"
                                        name="aruss_topic_name" value="{{ $trafo->arus->topic_name_s }}" />
                                </div>
                            </div>
                            {{-- arus t --}}
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-fullname">Arus T</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-home-alt"></i></span>
                                    <input type="text" class="form-control" id="arust_topic_name" aria-describedby="name"
                                        name="arust_topic_name" value="{{ $trafo->arus->topic_name_t }}" />
                                </div>
                            </div>

                            {{-- tegangan --}}
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-fullname">Tegangan R</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-home-alt"></i></span>
                                    <input type="text" class="form-control" id="teganganr_topic_name"
                                        aria-describedby="name" name="teganganr_topic_name"
                                        value="{{ $trafo->tegangan->topic_name_r }}" />
                                </div>
                            </div>

                            {{-- tegangan --}}
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-fullname">Tegangan S</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-home-alt"></i></span>
                                    <input type="text" class="form-control" id="tegangans_topic_name"
                                        aria-describedby="name" name="tegangans_topic_name"
                                        value="{{ $trafo->tegangan->topic_name_s }}" />
                                </div>
                            </div>

                            {{-- tegangan --}}
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-fullname">Tegangan T</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-home-alt"></i></span>
                                    <input type="text" class="form-control" id="tegangant_topic_name"
                                        aria-describedby="name" name="tegangant_topic_name"
                                        value="{{ $trafo->tegangan->topic_name_t }}" />
                                </div>
                            </div>

                            {{-- suhu --}}
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-fullname">Suhu</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-home-alt"></i></span>
                                    <input type="text" class="form-control" id="suhu_topic_name"
                                        aria-describedby="name" name="suhu_topic_name"
                                        value="{{ $trafo->suhu->topic_name }}" />
                                </div>
                            </div>
                            {{-- tekanan --}}
                            <div class="mb-3">
                                <label class="form-label" for="basic-icon-default-fullname">Tekanan</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text"><i class="bx bx-home-alt"></i></span>
                                    <input type="text" class="form-control" id="tekanan_topic_name"
                                        aria-describedby="name" name="tekanan_topic_name"
                                        value="{{ $trafo->tekanan->topic_name }}" />
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
