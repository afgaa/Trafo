@extends('layouts.app')
@section('title', $title)
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="row">
    <div class="col-lg-12 mb-4 order-0">
      <div class="card">
        <div class="d-flex align-items-end row">
          <div class="col-sm-12">
            <div class="card-body">
              <h5 class="card-title text-primary">Monitoring Tekanan</h5>
              <div id="incomeChart"></div>
              <p class="mt-2"> Monitoring Suhu Pada Bulan Sebelumnya</p>
            </div>
          </div>
        </div>
      </div>
    </div>
 
    <div class="col-lg-6 mb-4 order-1">
      <div class="card">
        <div class="d-flex align-items-end row">
          <div class="col-sm-12">
            <div class="card-body">
              <h5 class="card-title text-primary">Fasa R</h5>
              <p class="mb-4">
                You have done <span class="fw-bold">72%</span> more sales today. Check your new badge in
                your profile.
              </p>
              <div id="growthChart"></div>
              <div class="text-center fw-semibold pt-3 mb-2">62% Company Growth</div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-6 mb-4 order-2">
      <div class="card">
        <div class="d-flex align-items-end row">
          <div class="col-sm-12">
            <div class="card-body">
              <h5 class="card-title text-primary">Fasa S</h5>
              <div id="expensesOfWeek"></div>
              <p class="mb-4">
                You have done <span class="fw-bold">72%</span> more sales today. Check your new badge in
                your profile.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-6 mb-4 order-3">
      <div class="card">
        <div class="d-flex align-items-end row">
          <div class="col-sm-12">
            <div class="card-body">
              <h5 class="card-title text-primary">Fasa </h5>
              <p class="mb-4">
                You have done <span class="fw-bold">72%</span> more sales today. Check your new badge in
                your profile.
              </p>
              <div id="growthChart"></div>
              <div class="text-center fw-semibold pt-3 mb-2">62% Company Growth</div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-6 mb-4 order-4">
      <div class="card">
        <div class="d-flex align-items-end row">
          <div class="col-sm-12">
            <div class="card-body">
              <h5 class="card-title text-primary">Fasa 4</h5>
              <p class="mb-4">
                You have done <span class="fw-bold">72%</span> more sales today. Check your new badge in
                your profile.
              </p>
              <div id="growthChart"></div>
              <div class="text-center fw-semibold pt-3 mb-2">62% Company Growth</div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-6 mb-4 order-5">
      <div class="card">
        <div class="d-flex align-items-end row">
          <div class="col-sm-12">
            <div class="card-body">
              <h5 class="card-title text-primary">Fasa 5</h5>
              <p class="mb-4">
                You have done <span class="fw-bold">72%</span> more sales today. Check your new badge in
                your profile.
              </p>
              <div id="growthChart"></div>
              <div class="text-center fw-semibold pt-3 mb-2">62% Company Growth</div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-6 mb-4 order-5">
      <div class="card">
        <div class="d-flex align-items-end row">
          <div class="col-sm-12">
            <div class="card-body">
              <h5 class="card-title text-primary">Fasa 6</h5>
              <p class="mb-4">
                You have done <span class="fw-bold">72%</span> more sales today. Check your new badge in
                your profile.
              </p>
              <div id="growthChart"></div>
              <div class="text-center fw-semibold pt-3 mb-2">62% Company Growth</div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
@endsection()