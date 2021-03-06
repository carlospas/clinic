@extends('layouts.backend.main')

@section('title', 'Norsu Clinic | account index')
@section('css')
@endsection
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/home">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('backend.patients.index')}}">Patient List</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('backend.prescriptions.index')}}">Prescriptions</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('backend.appointments.index')}}">Appointments</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="{{ url('event')}}">Calendar</a></li>
        </ol>
    </nav>

    <div class="content mt-3">
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="bg-primary p-2 mb-2 text-white text-center">
                                        Profile
                                    </div>
                                </div>
                                <!-- /.col-md-12 -->
                                <div class="col-md-3 col-lg-3 " align="center">
                                    <img src="{{ $user->image_url}}" alt="">
                                </div>
                                <!-- /.col-m-3 -->
                                <div class="col-md-4">
                                    <br>
                                    {!! Form::model($user, [
                                    'method' => 'PUT',
                                    'files'  => TRUE,
                                    'route'  => ['backend.users.update', $user->id],
                                     ]) !!}
                                    @csrf
                                    {{ Form::hidden('slug', null, array('id' => 'slug')) }}
                                    Name: <strong><input class="effect-1"  name="name" type="text" value="{{$user->name}}"></strong><hr>
                                    Email: <strong><input class="effect-1" name="email" type="text" value="{{$user->email}}"></strong><hr>
                                    Phone: <strong><input class="effect-1" name="phone" type="text" value="{{$user->phone}}"></strong><hr>
                                    Address: <strong><input class="effect-1 "name="address" type="text" value="{{$user->address}}"></strong><hr>

                                </div>
                                <div class="col-md-4">

                                </div>
                            </div>
                            <br>
                            <!-- /.div -->
                            <div class="border-top  border-dark pt-2">
                                <button type="submit" class="btn btn-outline-primary btn-lg">UPDATE</button>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>

            </div>
    </div><!-- .content -->
@endsection

@include('backend.account.script')
