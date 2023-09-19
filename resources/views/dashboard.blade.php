@extends('layouts.master')

@section('title')
    {{__('dashboard')}}
@endsection

@section('content')

<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-theme text-white mr-2">
                <i class="fa fa-home"></i>
            </span> {{__('dashboard')}}
        </h3>
    </div>
    <div class="row">
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-danger card-img-holder text-white">
                <div class="card-body">
                    <img src="{{asset(config('global.CIRCLE_SVG')) }}" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Total Teachers <i class="mdi mdi-chart-line mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5" id="total-teachers">2</h2>
                    {{-- <h6 class="card-text">Increased by 60%</h6> --}}
                </div>
            </div>
        </div>
    </div>
</div>

<script>
   var xhr = new XMLHttpRequest();
xhr.open('GET', "{{ asset('/dashboard-data') }}", true);

xhr.onreadystatechange = function () {
    if (xhr.readyState === 4) { // Check if the request is complete
        if (xhr.status === 200) { // Check if the request was successful (HTTP status 200)
            var data = JSON.parse(xhr.responseText);

            // Update the HTML elements with the fetched data
            document.getElementById('total-teachers').textContent = data.totalTeachers;
        } else {
            console.error('Error fetching data. HTTP status:', xhr.status);
        }
    }
};

xhr.send();


</script>

@endsection
