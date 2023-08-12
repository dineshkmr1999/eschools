@extends('layouts.master')

@section('title')
    {{ __('teacher') }}
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                {{ __('manage_expenses') }}
            </h3>
        </div>

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">`
                    <div class="card-body">
                        <h4 class="card-title">
                            {{ __('create_expense') }}
                        </h4>
                        <form class="create-form pt-3" id="formdata" action="{{ url('expense') }}"
                            enctype="multipart/form-data" method="POST" novalidate="novalidate">
                            @csrf
                            <div class="row">
                                <div class="form-group col-sm-12 col-md-6">
                                    <label>{{ __('Name') }} <span class="text-danger">*</span></label>
                                    {!! Form::text('name', null, ['required', 'placeholder' => __('Name'), 'class' => 'form-control']) !!}

                                </div>
                                <div class="form-group col-sm-12 col-md-6">
                                    <label>{{ __('Description') }} <span class="text-danger">*</span></label>
                                    {!! Form::text('description', null, ['required', 'placeholder' => __('Description'), 'class' => 'form-control']) !!}
                                </div>
                            </div>
                  
                            <div class="row">
                                <div class="form-group col-sm-12 col-md-6">
                                    <label>{{ __('Cost') }} <span class="text-danger">*</span></label>
                                    {!! Form::number('cost', null, ['required', 'placeholder' => __('Cost'),'min' => 1 , 'class' => 'form-control']) !!}
                                </div>
                                <div class="form-group col-sm-12 col-md-6">
                                    <label>{{ __('School') }} <span class="text-danger">*</span></label>
                                    {!! Form::text('school', null, ['required', 'placeholder' => __('School'), 'class' => 'form-control']) !!}
                                </div>
                            </div>
                    
                            <input class="btn btn-theme" type="submit" value={{ __('submit') }}>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">
                            {{ __('list_expense') }}
                        </h4>
                        <div class="row">
                            <div class="col-12">
                                <table aria-describedby="mydesc" class='table' id='table_list' data-toggle="table"
                                    data-url="{{ url('expense_list') }}" data-click-to-select="true"
                                    data-side-pagination="server" data-pagination="true"
                                    data-page-list="[5, 10, 20, 50, 100, 200]" data-search="true" data-toolbar="#toolbar"
                                    data-show-columns="true" data-show-refresh="true" data-fixed-columns="true"
                                    data-fixed-number="2" data-fixed-right-number="1" data-trim-on-search="false"
                                    data-mobile-responsive="true" data-sort-name="id" data-sort-order="desc"
                                    data-maintain-selected="true" data-export-types='["txt","excel"]'
                                    data-export-options='{ "name": "teacher-list-<?= date('d-m-y') ?>" ,"ignoreColumn":
                                    ["operate"]}'
                                    data-query-params="teacherQueryParams">
                                    <thead>
                                        <tr>
                                            <th scope="col" data-field="id" data-sortable="true" data-visible="false">
                                                {{ __('id') }}</th>
                                            <th scope="col" data-field="no" data-sortable="false">{{ __('no.') }}
                                            </th>
                                            <th scope="col" data-field="user_id" data-sortable="false"
                                                data-visible="false">{{ __('user_id') }}</th>
                                            <th scope="col" data-field="name" data-sortable="false">
                                                {{ __('Name') }}</th>
                                            <th scope="col" data-field="description" data-sortable="false">
                                                {{ __('Description') }}</th>
                                            <th scope="col" data-field="cost" data-sortable="false">
                                                {{ __('Cost') }}</th>
                                            <th scope="col" data-field="school_id" data-sortable="false">
                                                {{ __('School') }}</th>
                                                <th data-events="expenseActionEvents" scope="col" data-field="operate"
                                                data-sortable="false">{{ __('action') }}</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="editModal" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('edit_expense') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fa fa-close"></i></span>
                    </button>
                </div>
                <form id="editdata" class="editform" action="{{ url('expense') }}" novalidate="novalidate"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="user_id" id="user_id">
                        <input type="hidden" name="id" id="id">
                        <div class="row form-group">
                            <div class="form-group col-sm-12 col-md-6">
                                <label>{{ __('name') }} <span class="text-danger">*</span></label>
                                {!! Form::text('name', null, ['required', 'placeholder' => __('name'), 'class' => 'form-control', 'id' => 'name']) !!}

                            </div>
                            <div class="form-group col-sm-12 col-md-6">
                                <label>{{ __('description') }} <span class="text-danger">*</span></label>
                                {!! Form::text('description', null, ['required', 'placeholder' => __('description'), 'class' => 'form-control', 'id' => 'description']) !!}
                            </div>
                        </div>
                    
                        <div class="row form-group">
                            <div class="form-group col-sm-12 col-md-6">
                                <label>{{ __('cost') }} <span class="text-danger">*</span></label>
                                {!! Form::number('cost', null, ['required', 'min' => 1 , 'placeholder' => __('cost'), 'class' => 'form-control', 'id' => 'cost']) !!}
                            </div>
                            <div class="form-group col-sm-12 col-md-6">
                                <label>{{ __('school') }} <span class="text-danger">*</span></label>
                                {!! Form::text('school', null, ['required', 'placeholder' => __('school'), 'class' => 'form-control', 'id' => 'school']) !!}
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
