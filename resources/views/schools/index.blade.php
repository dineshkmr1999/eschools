@extends('layouts.super_master')

@section('title')
    {{ __('schools') }}
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                {{ __('manage') . ' ' . __('schools') }}
            </h3>
        </div>

        <div class="row">
            @if (Auth::user()->can('school-create'))
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">
                                {{ __('create') . ' ' . __('School') }}
                            </h4>
                            <form class="create-form pt-3" id="formdata" action="{{ url('schools') }}" method="POST"
                                novalidate="novalidate">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-sm-12 col-md-6">
                                        <label>{{ __('school_name') }} <span class="text-danger">*</span></label>
                                        {!! Form::text('name', null, ['required', 'placeholder' => __('school_name'), 'class' => 'form-control']) !!}

                                    </div>
                                    <div class="form-group col-sm-12 col-md-6">
                                        <label>{{ __('address') }} <span class="text-danger">*</span></label>
                                        {!! Form::textarea('address', null, [
                                            'required',
                                            'placeholder' => __('address'),
                                            'class' => 'form-control',
                                            'rows' => 3,
                                        ]) !!}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-sm-12 col-md-6">
                                        <label>{{ __('School Email') }} <span class="text-danger"></span></label>
                                        {!! Form::text('email', null, ['placeholder' => __('email'), 'class' => 'form-control']) !!}
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6">
                                        <label>{{ __('mobile') }} <span class="text-danger">*</span></label>
                                        {!! Form::number('phone_number', null, [
                                            'required',
                                            'placeholder' => __('mobile'),
                                            'min' => 1,
                                            'class' => 'form-control',
                                        ]) !!}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-sm-12 col-md-6">
                                        <label>{{ __('principal_name') }} <span class="text-danger">*</span></label>
                                        {!! Form::text('principal_name', null, [
                                            'required',
                                            'placeholder' => __('principal_name'),
                                            'class' => 'form-control',
                                        ]) !!}
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6">
                                        <label>{{ __('founded_date') }} <span class="text-danger">*</span></label>
                                        {!! Form::text('founded_date', null, [
                                            'required',
                                            'placeholder' => __('founded_date'),
                                            'class' => 'datepicker-popup-no-future form-control',
                                        ]) !!}
                                        <span class="input-group-addon input-group-append">
                                        </span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-sm-12 col-md-6">
                                        <label>{{ __('affiliation') }} <span class="text-danger">*</span></label>
                                        {!! Form::text('affiliation', null, [
                                            'required',
                                            'placeholder' => __('affiliation'),
                                            'class' => 'form-control',
                                            'rows' => 3,
                                        ]) !!}
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6">
                                        <label>{{ __('website') }} <span class="text-danger">*</span></label>
                                        {!! Form::text('website', null, ['required', 'placeholder' => __('website'), 'class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-sm-12 col-md-6">
                                        <label>{{ __('description') }} <span class="text-danger">*</span></label>
                                        {!! Form::textarea('description', null, [
                                            'required',
                                            'placeholder' => __('description'),
                                            'class' => 'form-control',
                                            'rows' => 3,
                                        ]) !!}
                                    </div>
                                </div>

                                <div class="card">
                                    <h4 class="card-title">
                                        {{ __('Add') . ' ' . __('Admin') }}
                                    </h4>

                                    <div class="row">
                                        <div class="form-group col-sm-12 col-md-6">
                                            <label>{{ __('admin_first_name') }} <span class="text-danger">*</span></label>
                                            {!! Form::text('admin_first_name', null, [
                                                'required',
                                                'placeholder' => __('admin_first_name'),
                                                'class' => 'form-control',
                                            ]) !!}
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6">
                                            <label>{{ __('admin_last_name') }} <span class="text-danger">*</span></label>
                                            {!! Form::text('admin_last_name', null, [
                                                'required',
                                                'placeholder' => __('admin_last_name'),
                                                'class' => 'form-control',
                                            ]) !!}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-sm-12 col-md-6">
                                            <label>{{ __('admin_email') }} <span class="text-danger">*</span></label>
                                            {!! Form::text('admin_email', null, ['required', 'placeholder' => __('admin_email'), 'class' => 'form-control']) !!}
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6">
                                            <label>{{ __('admin_password') }} <span class="text-danger">*</span></label>
                                            {!! Form::text('admin_password', null, [
                                                'required',
                                                'placeholder' => __('admin_password'),
                                                'class' => 'form-control',
                                            ]) !!}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-sm-12 col-md-6">
                                            <label>{{ __('gender') }} <span class="text-danger">*</span></label>
                                            <div class="d-flex">
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label">
                                                        {!! Form::radio('gender', 'Male', null, ['class' => 'form-check-input edit', 'id' => 'gender']) !!}
                                                        {{ __('male') }}
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label">
                                                        {!! Form::radio('gender', 'Female', null, ['class' => 'form-check-input edit', 'id' => 'gender']) !!}
                                                        {{ __('female') }}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6">
                                            <label>{{ __('admin_phone_number') }} <span
                                                    class="text-danger">*</span></label>
                                            {!! Form::text('admin_phone_number', null, [
                                                'required',
                                                'placeholder' => __('admin_phone_number'),
                                                'class' => 'form-control',
                                            ]) !!}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-sm-12 col-md-6">
                                            <label>{{ __('admin_dob') }} <span class="text-danger">*</span></label>
                                            {!! Form::text('admin_dob', null, [
                                                'required',
                                                'placeholder' => __('admin_dob'),
                                                'class' => 'datepicker-popup-no-future form-control',
                                            ]) !!}
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6">
                                            <label>{{ __('admin_current_address') }} <span
                                                    class="text-danger">*</span></label>
                                            {!! Form::text('admin_current_address', null, [
                                                'required',
                                                'placeholder' => __('admin_current_address'),
                                                'class' => 'form-control',
                                            ]) !!}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-sm-12 col-md-6">
                                            <label>{{ __('permanent_address') }} <span class="text-danger">*</span></label>
                                            {!! Form::text('permanent_address', null, [
                                                'required',
                                                'placeholder' => __('permanent_address'),
                                                'class' => 'form-control',
                                            ]) !!}
                                        </div>
                                    </div>
                                </div>
                                <input class="btn btn-theme" type="submit" value={{ __('submit') }}>
                            </form>
                        </div>
                    </div>
                </div>
            @endif
            @if (Auth::user()->can('school-list'))
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">
                                {{ __('list') . ' ' . __('Schools') }}
                            </h4>
                            <div class="row">
                                <div class="col-12">
                                    <table aria-describedby="mydesc" class='table' id='table_list' data-toggle="table"
                                        data-url="{{ url('schools-list') }}" data-click-to-select="true"
                                        data-side-pagination="server" data-pagination="true"
                                        data-page-list="[5, 10, 20, 50, 100, 200]" data-search="true"
                                        data-toolbar="#toolbar" data-show-columns="true" data-show-refresh="true"
                                        data-fixed-columns="true" data-fixed-number="2" data-fixed-right-number="1"
                                        data-trim-on-search="false" data-mobile-responsive="true" data-sort-name="id"
                                        data-sort-order="desc" data-maintain-selected="true"
                                        data-export-types='["txt","excel"]'
                                        data-export-options='{ "fileName": "schools-list-<?= date('d-m-y') ?>
                                        ","ignoreColumn": ["operate"]}'
                                        data-query-params="queryParams">
                                        <thead>
                                            <tr>
                                                <th scope="col" data-field="id" data-sortable="true"
                                                    data-visible="false">
                                                    {{ __('id') }}</th>
                                                <th scope="col" data-field="no" data-sortable="false">
                                                    {{ __('no.') }}
                                                </th>
                                                <th scope="col" data-field="name" data-sortable="false">
                                                    {{ __('school_name') }}</th>
                                                <th scope="col" data-field="address" data-sortable="false">
                                                    {{ __('address') }}</th>
                                                <th scope="col" data-field="phone_number" data-sortable="false">
                                                    {{ __('Mobile') }}</th>
                                                <th scope="col" data-field="email" data-sortable="false">
                                                    {{ __('School Email') }}</th>
                                                <th scope="col" data-field="principal_name" data-sortable="false">
                                                    {{ __('principal_name') }}</th>
                                                <th scope="col" data-field="founded_date" data-sortable="false">
                                                    {{ __('founded_date') }}</th>
                                                <th scope="col" data-field="affiliation" data-sortable="false">
                                                    {{ __('affiliation') }}</th>
                                                <th scope="col" data-field="website" data-sortable="false">
                                                    {{ __('website') }}</th>
                                                <th scope="col" data-field="admin_name" data-sortable="false">
                                                    {{ __('admin_name') }}</th>
                                                <th scope="col" data-field="admin_email" data-sortable="false">
                                                    {{ __('Admin email') }}</th>
                                                <th scope="col" data-field="status" data-sortable="false">
                                                    {{ __('Status') }}</th>

                                                @if (Auth::user()->can('school-edit') || Auth::user()->can('school-delete'))
                                                    <th data-events="actionEvents" data-width="150" scope="col"
                                                        data-field="operate" data-sortable="false">{{ __('action') }}
                                                    </th>
                                                @endif
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>


    <div class="modal fade" id="editModal" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('Edit Schoools') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fa fa-close"></i></span>
                    </button>
                </div>
                <form id="editdata" class="editform" action="{{ url('schools') }}" novalidate="novalidate"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="id" id="id">
                        <div class="row form-group">
                            <div class="form-group col-sm-12 col-md-6">
                                <label>{{ __('School Name') }} <span class="text-danger">*</span></label>
                                {!! Form::text('name', null, [
                                    'required',
                                    'placeholder' => __('School Name'),
                                    'class' => 'form-control',
                                    'id' => 'name',
                                ]) !!}

                            </div>
                            <div class="form-group col-sm-12 col-md-6">
                                <label>{{ __('Address') }} <span class="text-danger">*</span></label>
                                {!! Form::textarea('address', null, [
                                    'required',
                                    'placeholder' => __('Address'),
                                    'class' => 'form-control',
                                    'id' => 'address',
                                    'rows' => 3,
                                ]) !!}
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="form-group col-sm-12 col-md-6">
                                <label>{{ __('mobile') }} <span class="text-danger">*</span></label>
                                {!! Form::number('phone_number', null, [
                                    'required',
                                    'placeholder' => __('mobile'),
                                    'class' => 'form-control',
                                    'id' => 'phone_number',
                                ]) !!}

                            </div>
                            <div class="form-group col-sm-12 col-md-6">
                                <label>{{ __('email') }} <span class="text-danger">*</span></label>
                                {!! Form::text('email', null, [
                                    'required',
                                    'placeholder' => __('email'),
                                    'class' => 'form-control',
                                    'id' => 'email',
                                ]) !!}
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="form-group col-sm-12 col-md-6">
                                <label>{{ __('principal_name') }} <span class="text-danger">*</span></label>
                                {!! Form::text('principal_name', null, [
                                    'required',
                                    'placeholder' => __('principal_name'),
                                    'class' => 'form-control',
                                    'id' => 'principal_name',
                                ]) !!}
                            </div>
                            <div class="form-group col-sm-12 col-md-6">
                                <label>{{ __('founded_date') }} <span class="text-danger">*</span></label>
                                {!! Form::text('founded_date', null, [
                                    'required',
                                    'placeholder' => __('founded_date'),
                                    'class' => 'datepicker-popup-no-future form-control',
                                    'id' => 'founded_date',
                                ]) !!}
                                <span class="input-group-addon input-group-append">
                                </span>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="form-group col-sm-12 col-md-6">
                                <label>{{ __('affiliation') }} <span class="text-danger">*</span></label>
                                {!! Form::text('affiliation', null, [
                                    'required',
                                    'placeholder' => __('affiliation'),
                                    'class' => 'form-control',
                                    'id' => 'affiliation',
                                ]) !!}
                            </div>
                            <div class="form-group col-sm-12 col-md-6">
                                <label>{{ __('website') }} <span class="text-danger">*</span></label>
                                {!! Form::text('website', null, [
                                    'required',
                                    'placeholder' => __('website'),
                                    'class' => 'form-control',
                                    'id' => 'website',
                                ]) !!}
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="form-group col-sm-12 col-md-6">
                                <label>{{ __('description') }} <span class="text-danger">*</span></label>
                                {!! Form::textarea('description', null, [
                                    'required',
                                    'placeholder' => __('description'),
                                    'class' => 'form-control',
                                    'id' => 'description',
                                    'rows' => 3,
                                ]) !!}
                            </div>
                            <div class="form-group col-sm-12 col-md-6">
                                <label>{{ __('Status') }} <span class="text-danger">*</span></label>
                                <div class="d-flex">
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            {!! Form::radio('status', 'active', null, ['class' => 'form-check-input edit', 'id' => 'editmaleGender']) !!}
                                            {{ __('Active') }}
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            {!! Form::radio('status', 'inactive', null, ['class' => 'form-check-input edit', 'id' => 'editfemaleGender']) !!}
                                            {{ __('Inactive') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input class="btn btn-theme" type="submit" value={{ __('submit') }}>
                        <button type="button" class="btn btn-light" data-dismiss="modal">{{ __('cancel') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        window.actionEvents = {
            'click .editdata': function(e, value, row, index) {
                console.log(row);
                $('#id').val(row.id);
                $('#name').val(row.name);
                $('#address').val(row.address);
                $('#phone_number').val(row.phone_number);
                $('#email').val(row.email);
                $('#principal_name').val(row.principal_name);
                $('#founded_date').val(row.founded_date);
                $('#affiliation').val(row.affiliation);
                $('#website').val(row.website);
                $('#description').val(row.description);
                // Set radio button selection
                if (row.status === 'active') {
                    $('#editmaleGender').prop('checked', true);
                } else if (row.gender === 'inactive') {
                    $('#editfemaleGender').prop('checked', true);
                }


                // Open the modal
                $('#editModal').modal('show');
            }
        };
    </script>


    <script type="text/javascript">
        function queryParams(p) {
            return {
                limit: p.limit,
                sort: p.sort,
                order: p.order,
                offset: p.offset,
                search: p.search
            };
        }
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Fetch enquiry modes for the create form dropdown
            var enquiryModeSelect = document.getElementById('enquiryModeSelect');
            var editEnquiryModeSelect = document.getElementById('editEnquiryModeSelect');

            var xhr = new XMLHttpRequest();
            xhr.open('GET', "{{ asset('/listenquirymode') }}", true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4) {
                    if (xhr.status === 200) {
                        var data = JSON.parse(xhr.responseText);
                        data.forEach(function(mode) {
                            var option = document.createElement('option');
                            option.value = mode.id;
                            option.textContent = mode.mode_name;
                            enquiryModeSelect.appendChild(option);
                            editEnquiryModeSelect.appendChild(option.cloneNode(
                                true));
                        });
                    } else {
                        console.error('AJAX Error:', xhr.status, xhr.statusText);
                    }
                }
            };
            xhr.onerror = function() {
                console.error('Network Error');
            };
            xhr.send();

            // Update selected Enquiry Mode ID in the hidden field when dropdown changes
            enquiryModeSelect.addEventListener('change', function() {
                var selectedId = this.value;
                document.querySelector('input[name="enquiry_mode_id"]').value = selectedId;
            });

            // Update selected Enquiry Mode ID in the hidden field for edit modal dropdown
            editEnquiryModeSelect.addEventListener('change', function() {
                var selectedId = this.value;
                document.querySelector('input[name="enquiry_mode"]').value = selectedId;
            });
        });
    </script>
@endsection
