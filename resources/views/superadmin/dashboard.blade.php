@extends('layouts.super_master')
@section('title')
    {{__(' super admin dashboard')}}
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-theme text-white mr-2">
                <i class="fa fa-home"></i>
            </span> {{__(' super admin dashboard')}}
        </h3>
    </div>
    <div class="row">
        <div class="col-md-4 stretch-card grid-margin">
        <a class="btn bg-theme text-white" href="{{url ('class')}}" role="button">Add   class</a>
        </div>
        <div class="col-md-4 stretch-card grid-margin">
        <a class="btn bg-theme text-white" href="{{route ('students.create-bulk-data')}}" role="button">Add bulk Students</a>
        </div>
        <div class="col-md-4 stretch-card grid-margin">
        <a class="btn bg-theme text-white" href="{{route ('fees-type.create-bulk-data')}}" role="button">Add bulk  Teachers</a>
        </div>
        <div class="col-md-4 stretch-card grid-margin">
        <a class="btn bg-theme text-white" href="{{route ('fees-type.create-bulk-data')}}" role="button">Add bulk Fees type</a>
        </div>
       
        <div class="col-md-4 stretch-card grid-margin">
        <a class="btn bg-theme text-white" href="{{route ('fees-type.create-bulk-data')}}" role="button">Add bulk Fees type</a>
        </div>
    </div>
</div>
@endsection