@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="my-3 fw-bold">Dashboard</h2>
        </div>

        <!-- Card Statistik -->
        <div class="col-md-3">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body text-center">
                    <i class="fa fa-box fa-3x text-primary mb-3"></i>
                    <h5 class="fw-bold">Produk</h5>
                    <p class="fs-4">120</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body text-center">
                    <i class="fa fa-shopping-cart fa-3x text-success mb-3"></i>
                    <h5 class="fw-bold">Pembelian</h5>
                    <p class="fs-4">350</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body text-center">
                    <i class="fa fa-users fa-3x text-warning mb-3"></i>
                    <h5 class="fw-bold">User</h5>
                    <p class="fs-4">25</p>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body text-center">
                    <i class="fa fa-user fa-3x text-danger mb-3"></i>
                    <h5 class="fw-bold">Member</h5>
                    <p class="fs-4">80</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
