@extends('layouts.backend.main')

@section('title', 'Clinic | Add new Assessments')

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/home">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('backend.prescriptions.index') }}">All Prescriptions</a></li>
        </ol>
    </nav>
    <div class="row mb-10">
    <div class="col-lg-8 offset-2">
        <div class="card">
            <div class="card-header">
                <strong>Add Prescriptions</strong>
            </div>
            <div class="card-body card-block">
                {!! Form::model( [
                    'method' => 'POST',
                    'route'  => 'backend.prescriptions.store',
                    'files'  => TRUE,
                    'id'     => 'user-form'
                ]) !!}
                @csrf
                @include('backend.medicines.form')

                {!! Form::close() !!}
            </div>
        </div>
    </div>
    </div>
    <br><br>
@endsection

