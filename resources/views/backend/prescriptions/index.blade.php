@extends('layouts.backend.main')

@section('title', 'Norsu Clinic | prescriptions index')

@section('content')
    <div class="breadcrumbs">
        <div class="page-header float-left pl-2">
            <div class="page-title">
                <h1 class="bread-head"> <i class="fas fa-tachometer-alt"></i> Dashboard</h1>
            </div>
        </div>
        <div class="float-right pr-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb" id="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">
                        <a href="{{ route('backend.prescriptions.create') }}"><button class="au-btn au-btn-icon au-btn--blue">
                                <i class="zmdi zmdi-plus"></i>Add Prescriptions</button></a>
                    </li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="content mt-3">
        <div class="row">
            <div class="col-sm-12">

    @include('backend_partials.messages')
            @if(! $prescriptions->count())
                <div class="alert alert-danger m-2">
                    No Records
                </div>
                <!-- /.alert alert-danger -->
     @else
                    <div class="card">
                        <div class="card-header bg-primary">
                            <ul class="nav nav-tabs card-header-tabs">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#"><i class="zmdi zmdi-format-align-justify"></i>
                                        LIST OF PRESCRIPTIONS</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body P4">
                <!-- DATA TABLE-->
            <div class="table-responsive m-b-40">
                @include('backend.prescriptions.table')
            </div>
    @endif
                        </div>
                    </div>


            </div> <!-- /.12 -->
        </div>
        <!-- /.row -->
    </div>
@endsection


