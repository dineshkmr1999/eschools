@extends('layouts.master')

@section('title')
    {{ __('admission_enquire') }}
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                {{ __('manage') . ' ' . __('admission_enquire') }}
            </h3>
        </div>

        <div class="row">
            @if (Auth::user()->can('admission-enquiry-create'))
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">
                                {{ __('create') . ' ' . __('admission_enquire') }}
                            </h4>
                            <form class="create-form pt-3" id="formdata" action="{{ url('admissionenquiry') }}"
                                method="POST" novalidate="novalidate">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-sm-12 col-md-6">
                                        <label>{{ __('admission_number') }} <span class="text-danger">*</span></label>
                                        {!! Form::text('admission_number', null, [
                                            'required',
                                            'placeholder' => __('admission_number'),
                                            'class' => 'form-control',
                                        ]) !!}

                                    </div>
                                    <div class="form-group col-sm-12 col-md-6">
                                        <label>{{ __('student_name') }} <span class="text-danger">*</span></label>
                                        {!! Form::text('student_name', null, [
                                            'required',
                                            'placeholder' => __('student_name'),
                                            'class' => 'form-control',
                                        ]) !!}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-sm-12 col-md-6">
                                        <label>{{ __('gender') }} <span class="text-danger">*</span></label><br>
                                        <div class="d-flex">
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    {!! Form::radio('gender', 'male') !!}
                                                    {{ __('male') }}
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <label class="form-check-label">
                                                    {!! Form::radio('gender', 'female') !!}
                                                    {{ __('female') }}
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6">
                                        <label>{{ __('email') }} <span class="text-danger"></span></label>
                                        {!! Form::text('email', null, ['placeholder' => __('email'), 'class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-sm-12 col-md-6">
                                        <label>{{ __('mobile') }} <span class="text-danger">*</span></label>
                                        {!! Form::number('phone_number', null, [
                                            'required',
                                            'placeholder' => __('mobile'),
                                            'min' => 1,
                                            'class' => 'form-control',
                                        ]) !!}

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
                                        <label>{{ __('dob') }} <span class="text-danger">*</span></label>
                                        {!! Form::text('student_dob', null, [
                                            'required',
                                            'placeholder' => __('dob'),
                                            'class' => 'datepicker-popup-no-future form-control',
                                        ]) !!}
                                        <span class="input-group-addon input-group-append">
                                        </span>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6">
                                        <label>{{ __('added_by') }} <span class="text-danger">*</span></label>
                                        {!! Form::text('added_by', null, [
                                            'required',
                                            'placeholder' => __('added_by'),
                                            'class' => 'form-control',
                                            'rows' => 3,
                                        ]) !!}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-sm-12 col-md-6">
                                        <label>{{ __('class') }} <span class="text-danger">*</span></label>
                                        {!! Form::text('class', null, [
                                            'required',
                                            'placeholder' => __('class'),
                                            'class' => 'form-control',
                                            'rows' => 3,
                                        ]) !!}
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6">
                                        <label>{{ __('enquiry_date') }} <span class="text-danger">*</span></label>
                                        {!! Form::text('enquiry_date', null, [
                                            'required',
                                            'placeholder' => __('enquiry_date'),
                                            'class' => 'datepicker-popup-no-future form-control',
                                            'rows' => 3,
                                        ]) !!}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-sm-12 col-md-6">
                                        <label>{{ __('Enquiry Mode') }} <span class="text-danger">*</span></label>
                                        <select id="enquiryModeSelect" class="form-control">
                                            <option value="">Select Enquiry Mode</option>
                                        </select>
                                        {!! Form::hidden('enquiry_mode_id', null, ['id' => 'selectedEnquiryModeId']) !!}
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6">
                                        <label>{{ __('previous_school') }} <span class="text-danger">*</span></label>
                                        {!! Form::text('previous_school', null, [
                                            'required',
                                            'placeholder' => __('previous_school'),
                                            'class' => 'form-control',
                                            'rows' => 3,
                                        ]) !!}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-sm-12 col-md-6">
                                        <label>{{ __('parent_name') }} <span class="text-danger">*</span></label>
                                        {!! Form::text('parent_name', null, [
                                            'required',
                                            'placeholder' => __('parent_name'),
                                            'class' => 'form-control',
                                            'rows' => 3,
                                        ]) !!}
                                    </div>
                                </div>
                                <input class="btn btn-theme" type="submit" value={{ __('submit') }}>
                            </form>
                        </div>
                    </div>
                </div>
            @endif
            @if (Auth::user()->can('manage-enquiry-mode-list'))
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">
                                {{ __('list') . ' ' . __('admission_enquire') }}
                            </h4>
                            <div class="row">
                                <div class="col-12">
                                    <table aria-describedby="mydesc" class='table' id='table_list' data-toggle="table"
                                        data-url="{{ url('admissionenquiry-list') }}" data-click-to-select="true"
                                        data-side-pagination="server" data-pagination="true"
                                        data-page-list="[5, 10, 20, 50, 100, 200]" data-search="true"
                                        data-toolbar="#toolbar" data-show-columns="true" data-show-refresh="true"
                                        data-fixed-columns="true" data-fixed-number="2" data-fixed-right-number="1"
                                        data-trim-on-search="false" data-mobile-responsive="true" data-sort-name="id"
                                        data-sort-order="desc" data-maintain-selected="true"
                                        data-export-types='["txt","excel"]'
                                        data-export-options='{ "fileName": "admissionenquiry-list-<?= date('d-m-y') ?>
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
                                                <th scope="col" data-field="admission_number" data-sortable="false">
                                                    {{ __('admission_number') }}
                                                </th>
                                                <th scope="col" data-field="student_name" data-sortable="false">
                                                    {{ __('student_name') }}</th>
                                                <th scope="col" data-field="phone_number" data-sortable="false">
                                                    {{ __('phone_number') }}</th>
                                                <th scope="col" data-field="email" data-sortable="false">
                                                    {{ __('email') }}</th>
                                                <th scope="col" data-field="address" data-sortable="false">
                                                    {{ __('address') }}</th>
                                                <th scope="col" data-field="added_by" data-sortable="false">
                                                    {{ __('added_by') }}</th>
                                                <th scope="col" data-field="class" data-sortable="false">
                                                    {{ __('class') }}</th>
                                                <th scope="col" data-field="student_dob" data-sortable="false">
                                                    {{ __('student_dob') }}</th>
                                                <th scope="col" data-field="enquiry_date" data-sortable="false">
                                                    {{ __('enquiry_date') }}</th>
                                                <th scope="col" data-field="enquiry_mode_id" data-sortable="false">
                                                    {{ __('enquiry_mode_id') }}</th>
                                                <th scope="col" data-field="previous_school" data-sortable="false">
                                                    {{ __('previous_school') }}</th>
                                                <th scope="col" data-field="gender" data-sortable="false">
                                                    {{ __('gender') }}</th>
                                                <th scope="col" data-field="parent_name" data-sortable="false">
                                                    {{ __('parent_name') }}</th>
                                                @if (Auth::user()->can('manage-enquiry-mode-edit') || Auth::user()->can('manage-enquiry-mode-delete'))
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
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('edit_admission_enquiry') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fa fa-close"></i></span>
                    </button>
                </div>
                <form id="editdata" class="editform" action="{{ url('admissionenquiry') }}" novalidate="novalidate"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="id" id="id">
                        <div class="row form-group">
                            <div class="form-group col-sm-12 col-md-6">
                                <label>{{ __('admission_number') }} <span class="text-danger">*</span></label>
                                {!! Form::text('admission_number', null, [
                                    'required',
                                    'placeholder' => __('admission_number'),
                                    'class' => 'form-control',
                                    'id' => 'admission_number',
                                ]) !!}

                            </div>
                            <div class="form-group col-sm-12 col-md-6">
                                <label>{{ __('student_name') }} <span class="text-danger">*</span></label>
                                {!! Form::text('student_name', null, [
                                    'required',
                                    'placeholder' => __('student_name'),
                                    'class' => 'form-control',
                                    'id' => 'student_name',
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
                                <label>{{ __('address') }} <span class="text-danger">*</span></label>
                                {!! Form::textarea('address', null, [
                                    'required',
                                    'placeholder' => __('address'),
                                    'class' => 'form-control',
                                    'rows' => 3,
                                    'id' => 'address',
                                ]) !!}
                            </div>
                            <div class="form-group col-sm-12 col-md-6">
                                <label>{{ __('student_dob') }} <span class="text-danger">*</span></label>
                                {!! Form::text('student_dob', null, [
                                    'required',
                                    'placeholder' => __('student_dob'),
                                    'class' => 'datepicker-popup-no-future form-control',
                                    'id' => 'student_dob',
                                ]) !!}
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="form-group col-sm-12 col-md-6">
                                <label>{{ __('added_by') }} <span class="text-danger">*</span></label>
                                {!! Form::text('added_by', null, [
                                    'required',
                                    'placeholder' => __('added_by'),
                                    'class' => 'form-control',
                                    'id' => 'added_by',
                                ]) !!}
                                <span class="input-group-addon input-group-append">
                                </span>
                            </div>
                            <div class="form-group col-sm-12 col-md-6">
                                <label>{{ __('class_applying_for') }} <span class="text-danger">*</span></label>
                                {!! Form::text('class', null, [
                                    'required',
                                    'placeholder' => __('class_applying_for'),
                                    'class' => 'form-control',
                                    'id' => 'class',
                                ]) !!}
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="form-group col-sm-12 col-md-6">
                                <label>{{ __('Enquiry Mode') }} <span class="text-danger">*</span></label>
                                <select id="editEnquiryModeSelect" class="form-control">
                                    <option value="">Select Enquiry Mode</option>
                                </select>
                                {!! Form::hidden('enquiry_mode', null, ['id' => 'editSelectedEnquiryModeId']) !!}
                            </div>
                            <div class="form-group col-sm-12 col-md-6">
                                <label>{{ __('previous_school') }} <span class="text-danger">*</span></label>
                                {!! Form::text('previous_school', null, [
                                    'required',
                                    'placeholder' => __('previous_school'),
                                    'class' => 'form-control',
                                    'id' => 'previous_school',
                                ]) !!}
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="form-group col-sm-12 col-md-6">
                                <label>{{ __('gender') }} <span class="text-danger">*</span></label>
                                <div class="d-flex">
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            {!! Form::radio('gender', 'male', null, ['class' => 'form-check-input edit', 'id' => 'editmaleGender']) !!}
                                            {{ __('male') }}
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            {!! Form::radio('gender', 'female', null, ['class' => 'form-check-input edit', 'id' => 'editfemaleGender']) !!}
                                            {{ __('female') }}
                                        </label>
                                    </div>
                                </div>

                            </div>
                            <div class="form-group col-sm-12 col-md-6">
                                <label>{{ __('enquiry_date') }} <span class="text-danger">*</span></label>
                                {!! Form::text('enquiry_date', null, [
                                    'required',
                                    'placeholder' => __('enquiry_date'),
                                    'class' => 'datepicker-popup-no-future form-control',
                                    'id' => 'enquiry_date',
                                ]) !!}
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="form-group col-sm-12 col-md-6">
                                <label>{{ __('parent_name') }} <span class="text-danger">*</span></label>
                                {!! Form::text('parent_name', null, [
                                    'required',
                                    'placeholder' => __('parent_name'),
                                    'class' => 'form-control',
                                    'id' => 'parent_name',
                                ]) !!}
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
                $('#admission_number').val(row.admission_number);
                $('#student_name').val(row.student_name);
                $('#phone_number').val(row.phone_number);
                $('#email').val(row.email);
                $('#address').val(row.address);
                $('#added_by').val(row.added_by);
                $('#class').val(row.class);
                $('#student_dob').val(row.student_dob);
                $('#enquiry_date').val(row.enquiry_date);
                $('#enquiry_mode_id').val(row.enquiry_mode_id);
                $('#enquiry_mode').val(row.enquiry_mode);
                $('#previous_school').val(row.previous_school);
                $('#parent_name').val(row.parent_name);

                // Set radio button selection
                if (row.gender === 'male') {
                    $('#editmaleGender').prop('checked', true);
                } else if (row.gender === 'female') {
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
