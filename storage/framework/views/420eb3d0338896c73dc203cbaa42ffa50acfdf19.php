<?php $__env->startSection('title'); ?>
    <?php echo e(__('schools')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <?php echo e(__('manage') . ' ' . __('schools')); ?>

            </h3>
        </div>

        <div class="row">
            <?php if(Auth::user()->can('school-create')): ?>
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">
                                <?php echo e(__('create') . ' ' . __('School')); ?>

                            </h4>
                            <form class="create-form pt-3" id="formdata" action="<?php echo e(url('schools')); ?>" method="POST"
                                novalidate="novalidate">
                                <?php echo csrf_field(); ?>
                                <div class="row">
                                    <div class="form-group col-sm-12 col-md-6">
                                        <label><?php echo e(__('school_name')); ?> <span class="text-danger">*</span></label>
                                        <?php echo Form::text('name', null, ['required', 'placeholder' => __('school_name'), 'class' => 'form-control']); ?>


                                    </div>
                                    <div class="form-group col-sm-12 col-md-6">
                                        <label><?php echo e(__('address')); ?> <span class="text-danger">*</span></label>
                                        <?php echo Form::textarea('address', null, [
                                            'required',
                                            'placeholder' => __('address'),
                                            'class' => 'form-control',
                                            'rows' => 3,
                                        ]); ?>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-sm-12 col-md-6">
                                        <label><?php echo e(__('School Email')); ?> <span class="text-danger"></span></label>
                                        <?php echo Form::text('email', null, ['placeholder' => __('email'), 'class' => 'form-control']); ?>

                                    </div>
                                    <div class="form-group col-sm-12 col-md-6">
                                        <label><?php echo e(__('mobile')); ?> <span class="text-danger">*</span></label>
                                        <?php echo Form::number('phone_number', null, [
                                            'required',
                                            'placeholder' => __('mobile'),
                                            'min' => 1,
                                            'class' => 'form-control',
                                        ]); ?>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-sm-12 col-md-6">
                                        <label><?php echo e(__('principal_name')); ?> <span class="text-danger">*</span></label>
                                        <?php echo Form::text('principal_name', null, [
                                            'required',
                                            'placeholder' => __('principal_name'),
                                            'class' => 'form-control',
                                        ]); ?>

                                    </div>
                                    <div class="form-group col-sm-12 col-md-6">
                                        <label><?php echo e(__('founded_date')); ?> <span class="text-danger">*</span></label>
                                        <?php echo Form::text('founded_date', null, [
                                            'required',
                                            'placeholder' => __('founded_date'),
                                            'class' => 'datepicker-popup-no-future form-control',
                                        ]); ?>

                                        <span class="input-group-addon input-group-append">
                                        </span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-sm-12 col-md-6">
                                        <label><?php echo e(__('affiliation')); ?> <span class="text-danger">*</span></label>
                                        <?php echo Form::text('affiliation', null, [
                                            'required',
                                            'placeholder' => __('affiliation'),
                                            'class' => 'form-control',
                                            'rows' => 3,
                                        ]); ?>

                                    </div>
                                    <div class="form-group col-sm-12 col-md-6">
                                        <label><?php echo e(__('website')); ?> <span class="text-danger">*</span></label>
                                        <?php echo Form::text('website', null, ['required', 'placeholder' => __('website'), 'class' => 'form-control']); ?>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-sm-12 col-md-6">
                                        <label><?php echo e(__('description')); ?> <span class="text-danger">*</span></label>
                                        <?php echo Form::textarea('description', null, [
                                            'required',
                                            'placeholder' => __('description'),
                                            'class' => 'form-control',
                                            'rows' => 3,
                                        ]); ?>

                                    </div>
                                </div>

                                <div class="card">
                                    <h4 class="card-title">
                                        <?php echo e(__('Add') . ' ' . __('Admin')); ?>

                                    </h4>

                                    <div class="row">
                                        <div class="form-group col-sm-12 col-md-6">
                                            <label><?php echo e(__('admin_first_name')); ?> <span class="text-danger">*</span></label>
                                            <?php echo Form::text('admin_first_name', null, [
                                                'required',
                                                'placeholder' => __('admin_first_name'),
                                                'class' => 'form-control',
                                            ]); ?>

                                        </div>
                                        <div class="form-group col-sm-12 col-md-6">
                                            <label><?php echo e(__('admin_last_name')); ?> <span class="text-danger">*</span></label>
                                            <?php echo Form::text('admin_last_name', null, [
                                                'required',
                                                'placeholder' => __('admin_last_name'),
                                                'class' => 'form-control',
                                            ]); ?>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-sm-12 col-md-6">
                                            <label><?php echo e(__('admin_email')); ?> <span class="text-danger">*</span></label>
                                            <?php echo Form::text('admin_email', null, ['required', 'placeholder' => __('admin_email'), 'class' => 'form-control']); ?>

                                        </div>
                                        <div class="form-group col-sm-12 col-md-6">
                                            <label><?php echo e(__('admin_password')); ?> <span class="text-danger">*</span></label>
                                            <?php echo Form::text('admin_password', null, [
                                                'required',
                                                'placeholder' => __('admin_password'),
                                                'class' => 'form-control',
                                            ]); ?>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-sm-12 col-md-6">
                                            <label><?php echo e(__('gender')); ?> <span class="text-danger">*</span></label>
                                            <div class="d-flex">
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label">
                                                        <?php echo Form::radio('gender', 'Male', null, ['class' => 'form-check-input edit', 'id' => 'gender']); ?>

                                                        <?php echo e(__('male')); ?>

                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label">
                                                        <?php echo Form::radio('gender', 'Female', null, ['class' => 'form-check-input edit', 'id' => 'gender']); ?>

                                                        <?php echo e(__('female')); ?>

                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-sm-12 col-md-6">
                                            <label><?php echo e(__('admin_phone_number')); ?> <span
                                                    class="text-danger">*</span></label>
                                            <?php echo Form::text('admin_phone_number', null, [
                                                'required',
                                                'placeholder' => __('admin_phone_number'),
                                                'class' => 'form-control',
                                            ]); ?>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-sm-12 col-md-6">
                                            <label><?php echo e(__('admin_dob')); ?> <span class="text-danger">*</span></label>
                                            <?php echo Form::text('admin_dob', null, [
                                                'required',
                                                'placeholder' => __('admin_dob'),
                                                'class' => 'datepicker-popup-no-future form-control',
                                            ]); ?>

                                        </div>
                                        <div class="form-group col-sm-12 col-md-6">
                                            <label><?php echo e(__('admin_current_address')); ?> <span
                                                    class="text-danger">*</span></label>
                                            <?php echo Form::text('admin_current_address', null, [
                                                'required',
                                                'placeholder' => __('admin_current_address'),
                                                'class' => 'form-control',
                                            ]); ?>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-sm-12 col-md-6">
                                            <label><?php echo e(__('permanent_address')); ?> <span class="text-danger">*</span></label>
                                            <?php echo Form::text('permanent_address', null, [
                                                'required',
                                                'placeholder' => __('permanent_address'),
                                                'class' => 'form-control',
                                            ]); ?>

                                        </div>
                                    </div>
                                </div>
                                <input class="btn btn-theme" type="submit" value=<?php echo e(__('submit')); ?>>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <?php if(Auth::user()->can('school-list')): ?>
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">
                                <?php echo e(__('list') . ' ' . __('Schools')); ?>

                            </h4>
                            <div class="row">
                                <div class="col-12">
                                    <table aria-describedby="mydesc" class='table' id='table_list' data-toggle="table"
                                        data-url="<?php echo e(url('schools-list')); ?>" data-click-to-select="true"
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
                                                    <?php echo e(__('id')); ?></th>
                                                <th scope="col" data-field="no" data-sortable="false">
                                                    <?php echo e(__('no.')); ?>

                                                </th>
                                                <th scope="col" data-field="name" data-sortable="false">
                                                    <?php echo e(__('school_name')); ?></th>
                                                <th scope="col" data-field="address" data-sortable="false">
                                                    <?php echo e(__('address')); ?></th>
                                                <th scope="col" data-field="phone_number" data-sortable="false">
                                                    <?php echo e(__('Mobile')); ?></th>
                                                <th scope="col" data-field="email" data-sortable="false">
                                                    <?php echo e(__('School Email')); ?></th>
                                                <th scope="col" data-field="principal_name" data-sortable="false">
                                                    <?php echo e(__('principal_name')); ?></th>
                                                <th scope="col" data-field="founded_date" data-sortable="false">
                                                    <?php echo e(__('founded_date')); ?></th>
                                                <th scope="col" data-field="affiliation" data-sortable="false">
                                                    <?php echo e(__('affiliation')); ?></th>
                                                <th scope="col" data-field="website" data-sortable="false">
                                                    <?php echo e(__('website')); ?></th>
                                                <th scope="col" data-field="admin_name" data-sortable="false">
                                                    <?php echo e(__('admin_name')); ?></th>
                                                <th scope="col" data-field="admin_email" data-sortable="false">
                                                    <?php echo e(__('Admin email')); ?></th>
                                                <th scope="col" data-field="status" data-sortable="false">
                                                    <?php echo e(__('Status')); ?></th>

                                                <?php if(Auth::user()->can('school-edit') || Auth::user()->can('school-delete')): ?>
                                                    <th data-events="actionEvents" data-width="150" scope="col"
                                                        data-field="operate" data-sortable="false"><?php echo e(__('action')); ?>

                                                    </th>
                                                <?php endif; ?>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>


    <div class="modal fade" id="editModal" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?php echo e(__('Edit Schoools')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fa fa-close"></i></span>
                    </button>
                </div>
                <form id="editdata" class="editform" action="<?php echo e(url('schools')); ?>" novalidate="novalidate"
                    enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="modal-body">
                        <input type="hidden" name="id" id="id">
                        <div class="row form-group">
                            <div class="form-group col-sm-12 col-md-6">
                                <label><?php echo e(__('School Name')); ?> <span class="text-danger">*</span></label>
                                <?php echo Form::text('name', null, [
                                    'required',
                                    'placeholder' => __('School Name'),
                                    'class' => 'form-control',
                                    'id' => 'name',
                                ]); ?>


                            </div>
                            <div class="form-group col-sm-12 col-md-6">
                                <label><?php echo e(__('Address')); ?> <span class="text-danger">*</span></label>
                                <?php echo Form::textarea('address', null, [
                                    'required',
                                    'placeholder' => __('Address'),
                                    'class' => 'form-control',
                                    'id' => 'address',
                                    'rows' => 3,
                                ]); ?>

                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="form-group col-sm-12 col-md-6">
                                <label><?php echo e(__('mobile')); ?> <span class="text-danger">*</span></label>
                                <?php echo Form::number('phone_number', null, [
                                    'required',
                                    'placeholder' => __('mobile'),
                                    'class' => 'form-control',
                                    'id' => 'phone_number',
                                ]); ?>


                            </div>
                            <div class="form-group col-sm-12 col-md-6">
                                <label><?php echo e(__('email')); ?> <span class="text-danger">*</span></label>
                                <?php echo Form::text('email', null, [
                                    'required',
                                    'placeholder' => __('email'),
                                    'class' => 'form-control',
                                    'id' => 'email',
                                ]); ?>

                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="form-group col-sm-12 col-md-6">
                                <label><?php echo e(__('principal_name')); ?> <span class="text-danger">*</span></label>
                                <?php echo Form::text('principal_name', null, [
                                    'required',
                                    'placeholder' => __('principal_name'),
                                    'class' => 'form-control',
                                    'id' => 'principal_name',
                                ]); ?>

                            </div>
                            <div class="form-group col-sm-12 col-md-6">
                                <label><?php echo e(__('founded_date')); ?> <span class="text-danger">*</span></label>
                                <?php echo Form::text('founded_date', null, [
                                    'required',
                                    'placeholder' => __('founded_date'),
                                    'class' => 'datepicker-popup-no-future form-control',
                                    'id' => 'founded_date',
                                ]); ?>

                                <span class="input-group-addon input-group-append">
                                </span>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="form-group col-sm-12 col-md-6">
                                <label><?php echo e(__('affiliation')); ?> <span class="text-danger">*</span></label>
                                <?php echo Form::text('affiliation', null, [
                                    'required',
                                    'placeholder' => __('affiliation'),
                                    'class' => 'form-control',
                                    'id' => 'affiliation',
                                ]); ?>

                            </div>
                            <div class="form-group col-sm-12 col-md-6">
                                <label><?php echo e(__('website')); ?> <span class="text-danger">*</span></label>
                                <?php echo Form::text('website', null, [
                                    'required',
                                    'placeholder' => __('website'),
                                    'class' => 'form-control',
                                    'id' => 'website',
                                ]); ?>

                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="form-group col-sm-12 col-md-6">
                                <label><?php echo e(__('description')); ?> <span class="text-danger">*</span></label>
                                <?php echo Form::textarea('description', null, [
                                    'required',
                                    'placeholder' => __('description'),
                                    'class' => 'form-control',
                                    'id' => 'description',
                                    'rows' => 3,
                                ]); ?>

                            </div>
                            <div class="form-group col-sm-12 col-md-6">
                                <label><?php echo e(__('Status')); ?> <span class="text-danger">*</span></label>
                                <div class="d-flex">
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <?php echo Form::radio('status', 'active', null, ['class' => 'form-check-input edit', 'id' => 'editmaleGender']); ?>

                                            <?php echo e(__('Active')); ?>

                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <?php echo Form::radio('status', 'inactive', null, ['class' => 'form-check-input edit', 'id' => 'editfemaleGender']); ?>

                                            <?php echo e(__('Inactive')); ?>

                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input class="btn btn-theme" type="submit" value=<?php echo e(__('submit')); ?>>
                        <button type="button" class="btn btn-light" data-dismiss="modal"><?php echo e(__('cancel')); ?></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
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
            xhr.open('GET', "<?php echo e(asset('/listenquirymode')); ?>", true);
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.super_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocss\htdocs\eschool204\resources\views/schools/index.blade.php ENDPATH**/ ?>