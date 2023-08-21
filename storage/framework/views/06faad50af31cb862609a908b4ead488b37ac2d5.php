<?php $__env->startSection('title'); ?>
    <?php echo e(__('students')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <?php echo e(__('manage') . ' ' . __('students')); ?>

            </h3>
        </div>

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">
                            <?php echo e(__('list') . ' ' . __('students')); ?>

                        </h4>
                        <div id="toolbar">
                            <div class="row">
                                <div class="col">
                                    <select name="filter_class_section_id" id="filter_class_section_id"
                                        class="form-control">
                                        <option value=""><?php echo e(__('select_class_section')); ?></option>
                                        <?php $__currentLoopData = $class_section; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value=<?php echo e($class->id); ?>>
                                                <?php echo e($class->class->name . ' ' . $class->section->name . ' ' . $class->class->medium->name); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-12">
                                <table aria-describedby="mydesc" class='table table-responsive' id='table_list'
                                    data-toggle="table" data-url="<?php echo e(url('students-list')); ?>" data-click-to-select="true"
                                    data-side-pagination="server" data-pagination="true"
                                    data-page-list="[5, 10, 20, 50, 100, 200]" data-search="true"
                                    data-toolbar="#toolbar" data-show-columns="true" data-show-refresh="true"
                                    data-fixed-columns="true" data-fixed-number="2" data-fixed-right-number="1"
                                    data-trim-on-search="false" data-mobile-responsive="true" data-sort-name="id"
                                    data-sort-order="desc" data-maintain-selected="true" data-export-types='["txt","excel"]'
                                    data-export-options='{ "fileName": "students-list-<?= date('d-m-y') ?>" ,"ignoreColumn":
                                    ["operate"]}' data-query-params="studentDetailsqueryParams"
                                    data-check-on-init="true">

                                    <thead>
                                        <tr>
                                            <th scope="col" data-field="id" data-sortable="true" data-visible="false">
                                                <?php echo e(__('id')); ?></th>
                                            <th scope="col" data-field="no" data-sortable="false"><?php echo e(__('no.')); ?></th>
                                            <th scope="col" data-field="user_id" data-sortable="false"
                                                data-visible="false"><?php echo e(__('user_id')); ?></th>
                                            <th scope="col" data-field="first_name" data-sortable="false">
                                                <?php echo e(__('first_name')); ?></th>
                                            <th scope="col" data-field="last_name" data-sortable="false">
                                                <?php echo e(__('last_name')); ?></th>
                                            <th scope="col" data-field="dob" data-sortable="false"><?php echo e(__('dob')); ?>

                                            </th>
                                            <th scope="col" data-field="image" data-sortable="false"
                                                data-formatter="imageFormatter"><?php echo e(__('image')); ?>

                                            </th>
                                            <th scope="col" data-field="class_section_id" data-sortable="false"
                                                data-visible="false">
                                                <?php echo e(__('class') . ' ' . __('section') . ' ' . __('id')); ?></th>
                                            <th scope="col" data-field="class_section_name" data-sortable="false">
                                                <?php echo e(__('class') . ' ' . __('section')); ?></th>
                                            <th scope="col" data-field="category_id" data-sortable="false"
                                                data-visible="false"><?php echo e(__('category') . ' ' . __('id')); ?></th>
                                            <th scope="col" data-field="category_name" data-sortable="false">
                                                <?php echo e(__('category')); ?></th>
                                            <th scope="col" data-field="admission_no" data-sortable="false">
                                                <?php echo e(__('gr_number')); ?></th>
                                            <th scope="col" data-field="roll_number" data-sortable="false">
                                                <?php echo e(__('roll_no')); ?></th>
                                            <th scope="col" data-field="caste" data-sortable="false"><?php echo e(__('caste')); ?>

                                            </th>
                                            <th scope="col" data-field="religion" data-sortable="false">
                                                <?php echo e(__('religion')); ?></th>
                                            <th scope="col" data-field="admission_date" data-sortable="false">
                                                <?php echo e(__('admission_date')); ?></th>
                                            <th scope="col" data-field="blood_group" data-sortable="false">
                                                <?php echo e(__('blood_group')); ?></th>
                                            <th scope="col" data-field="height" data-sortable="false">
                                                <?php echo e(__('height')); ?></th>
                                            <th scope="col" data-field="weight" data-sortable="false">
                                                <?php echo e(__('weight')); ?></th>
                                            <th scope="col" data-field="father_first_name" data-sortable="false">
                                                <?php echo e(__('father') . ' ' . __('name')); ?></th>
                                            <th scope="col" data-field="father_mobile" data-sortable="false">
                                                <?php echo e(__('father') . ' ' . __('mobile')); ?></th>
                                            <th scope="col" data-field="father_occupation" data-sortable="false">
                                                <?php echo e(__('father') . ' ' . __('occupation')); ?></th>
                                            <th scope="col" data-field="father_image" data-sortable="false"
                                                data-formatter="fatherImageFormatter">
                                                <?php echo e(__('father') . ' ' . __('image')); ?></th>
                                            <th scope="col" data-field="mother_first_name" data-sortable="false">
                                                <?php echo e(__('mother') . ' ' . __('name')); ?></th>
                                            <th scope="col" data-field="mother_occupation" data-sortable="false">
                                                <?php echo e(__('parents') . ' ' . __('occupation')); ?></th>
                                            <th scope="col" data-field="mother_image" data-sortable="false"
                                                data-formatter="motherImageFormatter">
                                                <?php echo e(__('mother') . ' ' . __('image')); ?></th>
                                            <th scope="col" data-field="is_new_admission" data-sortable="false"
                                                data-visible="false"><?php echo e(__('is_new_admission')); ?></th>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['student-edit', 'student-delete'])): ?>
                                                <th data-events="studentEvents" data-width="150" scope="col" data-field="operate"
                                                    data-sortable="false"><?php echo e(__('action')); ?></th>
                                            <?php endif; ?>
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

    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('student-edit')): ?>
        <div class="modal fade" id="editModal" data-backdrop="static" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLabel"><?php echo e(__('edit') . ' ' . __('students')); ?></h4><br>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fa fa-close"></i></span>
                        </button>
                    </div>
                    <form id="edit-form" class="edit-student-registration-form" novalidate="novalidate"
                        action="<?php echo e(url('students')); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="modal-body">
                            <input type="hidden" name="edit_id" id="edit_id">

                            <div class="row">
                                <div class="form-group col-sm-12 col-md-4">
                                    <label><?php echo e(__('first_name')); ?> <span class="text-danger">*</span></label>
                                    <?php echo Form::text('first_name', null, ['placeholder' => __('first_name'), 'class' => 'form-control', 'id' => 'edit_first_name']); ?>


                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label><?php echo e(__('last_name')); ?> <span class="text-danger">*</span></label>
                                    <?php echo Form::text('last_name', null, ['placeholder' => __('last_name'), 'class' => 'form-control', 'id' => 'edit_last_name']); ?>


                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label><?php echo e(__('mobile')); ?></label>
                                    <?php echo Form::tel('mobile', null, ['placeholder' => __('mobile'), 'min' => 1 , 'class' => 'form-control', 'id' => 'edit_mobile']); ?>

                                </div>
                                <div class="form-group col-sm-12 col-md-12">
                                    <label><?php echo e(__('gender')); ?> <span class="text-danger">*</span></label><br>
                                    <div class="d-flex">
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <?php echo Form::radio('gender', 'male', ['id' => 'male']); ?>

                                                <?php echo e(__('male')); ?>

                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <?php echo Form::radio('gender', 'female', ['id' => 'female']); ?>

                                                <?php echo e(__('female')); ?>

                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label><?php echo e(__('image')); ?> <span class="text-danger">*</span></label>
                                    <input type="file" name="image" class="file-upload-default" />
                                    <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info" disabled=""
                                            placeholder="<?php echo e(__('image')); ?>" required="required" id="edit_image" />
                                        <span class="input-group-append">
                                            <button class="file-upload-browse btn btn-theme"
                                                type="button"><?php echo e(__('upload')); ?></button>
                                        </span>
                                    </div>
                                    <div style="width: 100px;">
                                        <img src="" id="edit-student-image-tag" class="img-fluid w-100" />
                                    </div>
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label><?php echo e(__('dob')); ?> <span class="text-danger">*</span></label>
                                    <?php echo Form::text('dob', null, ['placeholder' => __('dob'), 'class' => 'datepicker-popup-no-future form-control', 'id' => 'edit_dob']); ?>

                                    <span class="input-group-addon input-group-append">
                                    </span>
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label><?php echo e(__('class') . ' ' . __('section')); ?> <span
                                            class="text-danger">*</span></label>
                                    <select required name="class_section_id" class="form-control" id="edit_class_section_id">
                                        <option value=""><?php echo e(__('select') . ' ' . __('class') . ' ' . __('section')); ?>

                                        </option>
                                        <?php $__currentLoopData = $class_section; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($section->id); ?>"><?php echo e($section->class->name); ?> -
                                                <?php echo e($section->section->name); ?> <?php echo e($section->class->medium->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-12 col-md-4">
                                    <label> <?php echo e(__('category')); ?> <span class="text-danger">*</span></label>
                                    <select name="category_id" class="form-control" id="edit_category_id">
                                        <option value=""><?php echo e(__('select') . ' ' . __('category')); ?></option>
                                        <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($cat->id); ?>"><?php echo e($cat->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label><?php echo e(__('gr_number')); ?> <span class="text-danger">*</span></label>
                                    <?php echo Form::text('admission_no', null, ['placeholder' => __('admission_no'), 'class' => 'form-control', 'id' => 'edit_admission_no' ,'readonly'=>true]); ?>


                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label><?php echo e(__('roll_no')); ?> <span class="text-danger">*</span></label>
                                    <?php echo Form::text('roll_number', null, ['placeholder' => __('roll_no'), 'class' => 'form-control', 'id' => 'edit_roll_number']); ?>

                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label><?php echo e(__('caste')); ?></label>
                                    <?php echo Form::text('caste', null, ['placeholder' => __('caste'), 'class' => 'form-control', 'id' => 'edit_caste']); ?>


                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label><?php echo e(__('religion')); ?></label>
                                    <?php echo Form::text('religion', null, ['placeholder' => __('religion'), 'class' => 'form-control', 'id' => 'edit_religion']); ?>

                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label><?php echo e(__('admission_date')); ?> <span class="text-danger">*</span></label>
                                    <?php echo Form::text('admission_date', null, ['placeholder' => __('admission_date'), 'class' => 'datepicker-popup form-control', 'id' => 'edit_admission_date']); ?>

                                    <span class="input-group-addon input-group-append">
                                    </span>
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label><?php echo e(__('blood_group')); ?> <span class="text-danger">*</span></label>
                                    <select name="blood_group" class="form-control" id="edit_blood_group">
                                        <option value=""><?php echo e(__('select') . ' ' . __('blood_group')); ?></option>
                                        <option value="A+">A+</option>
                                        <option value="A-">A-</option>
                                        <option value="B+">B+</option>
                                        <option value="B-">B-</option>
                                        <option value="O+">O+</option>
                                        <option value="O-">O-</option>
                                        <option value="AB+">AB+</option>
                                        <option value="AB-">AB-</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label><?php echo e(__('height')); ?> <span class="text-danger">*</span></label>
                                    <?php echo Form::text('height', null, ['placeholder' => __('height'), 'class' => 'form-control', 'id' => 'edit_height']); ?>

                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label><?php echo e(__('weight')); ?> <span class="text-danger">*</span></label>
                                    <?php echo Form::text('weight', null, ['placeholder' => __('weight'), 'class' => 'form-control', 'id' => 'edit_weight']); ?>

                                </div>
                                <div class="form-group col-12">
                                    <label><?php echo e(__('address')); ?> <span class="text-danger">*</span></label>
                                    <?php echo Form::textarea('current_address', null, ['placeholder' => __('current_address'), 'class' => 'form-control', 'id' => 'current_address', 'id' => 'edit_current_address', 'rows' => 2]); ?>

                                </div>
                                <div class="form-group col-12">
                                    <label><?php echo e(__('permanent_address')); ?> <span class="text-danger">*</span></label>
                                    <?php echo Form::textarea('permanent_address', null, ['placeholder' => __('permanent_address'), 'class' => 'form-control', 'id' => 'permanent_address', 'id' => 'edit_permanent_address', 'rows' => 2]); ?>

                                </div>
                            </div>
                            <hr>
                            <h4>Parent Guardian Details</h4><br>
                            <div class="row">
                                <div class="form-group col-sm-12 col-md-12">
                                    <label><?php echo e(__('father_email')); ?> <span class="text-danger">*</span></label>
                                    <select class="edit-father-search w-100" id="edit_father_email"
                                        name="father_email"></select>
                                </div>

                                <div class="form-group col-sm-12 col-md-4">
                                    <label><?php echo e(__('father') . ' ' . __('first_name')); ?> <span
                                            class="text-danger">*</span></label>
                                    <?php echo Form::text('father_first_name', null, ['placeholder' => __('father') . ' ' . __('first_name'), 'class' => 'form-control', 'id' => 'edit_father_first_name', 'readonly' => true]); ?>

                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label><?php echo e(__('father') . ' ' . __('last_name')); ?> <span
                                            class="text-danger">*</span></label>
                                    <?php echo Form::text('father_last_name', null, ['placeholder' => __('father') . ' ' . __('last_name'), 'class' => 'form-control', 'id' => 'edit_father_last_name', 'readonly' => true]); ?>

                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label><?php echo e(__('father') . ' ' . __('mobile')); ?> <span
                                            class="text-danger">*</span></label>
                                    <?php echo Form::text('father_mobile', null, ['placeholder' => __('father') . ' ' . __('mobile'), 'class' => 'form-control', 'min' => 1  ,'id' => 'edit_father_mobile', 'readonly' => true]); ?>

                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label><?php echo e(__('father') . ' ' . __('dob')); ?> <span class="text-danger">*</span></label>
                                    <?php echo Form::text('father_dob', null, ['placeholder' => __('father') . ' ' . __('dob'), 'class' => 'form-control datepicker-popup-no-future form-control', 'id' => 'edit_father_dob', 'readonly' => true]); ?>

                                </div>

                                <div class="form-group col-sm-12 col-md-4">
                                    <label><?php echo e(__('father') . ' ' . __('occupation')); ?> <span
                                            class="text-danger">*</span></label>
                                    <?php echo Form::text('father_occupation', null, ['placeholder' => __('father') . ' ' . __('occupation'), 'class' => 'form-control', 'id' => 'edit_father_occupation', 'readonly' => true]); ?>

                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label><?php echo e(__('father') . ' ' . __('image')); ?> <span class="text-danger">*</span></label>
                                    <input type="file" name="father_image" class="father_image file-upload-default" />
                                    <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info" disabled=""
                                            placeholder="<?php echo e(__('father') . ' ' . __('image')); ?>" />
                                        <span class="input-group-append">
                                            <button class="file-upload-browse btn btn-theme"
                                                type="button"><?php echo e(__('upload')); ?></button>
                                        </span>
                                    </div>
                                    <div style="width: 100px;">
                                        <img src="" id="edit-father-image-tag" class="img-fluid w-100" />
                                    </div>
                                </div>
                            </div>

                            <hr>
                            <div class="row">
                                <div class="form-group col-sm-12 col-md-12">
                                    <label><?php echo e(__('mother_email')); ?> <span class="text-danger">*</span></label>
                                    <select class="edit-mother-search w-100" id="edit_mother_email"
                                        name="mother_email"></select>
                                </div>

                                <div class="form-group col-sm-12 col-md-4">
                                    <label><?php echo e(__('mother') . ' ' . __('first_name')); ?> <span
                                            class="text-danger">*</span></label>
                                    <?php echo Form::text('mother_first_name', null, ['placeholder' => __('mother') . ' ' . __('first_name'), 'class' => 'form-control', 'id' => 'edit_mother_first_name', 'readonly' => true]); ?>

                                </div>

                                <div class="form-group col-sm-12 col-md-4">
                                    <label><?php echo e(__('mother') . ' ' . __('last_name')); ?> <span
                                            class="text-danger">*</span></label>
                                    <?php echo Form::text('mother_last_name', null, ['placeholder' => __('mother') . ' ' . __('last_name'), 'class' => 'form-control', 'id' => 'edit_mother_last_name', 'readonly' => true]); ?>

                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label><?php echo e(__('mother') . ' ' . __('mobile')); ?> <span
                                            class="text-danger">*</span></label>
                                    <?php echo Form::text('mother_mobile', null, ['placeholder' => __('mother') . ' ' . __('mobile'), 'class' => 'form-control', 'min' => 1  ,'id' => 'edit_mother_mobile', 'readonly' => true]); ?>

                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label><?php echo e(__('mother') . ' ' . __('dob')); ?> <span class="text-danger">*</span></label>
                                    <?php echo Form::text('mother_dob', null, ['placeholder' => __('mother') . ' ' . __('dob'), 'class' => 'form-control datepicker-popup-no-future form-control', 'id' => 'edit_mother_dob', 'readonly' => true]); ?>

                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label><?php echo e(__('mother') . ' ' . __('occupation')); ?> <span
                                            class="text-danger">*</span></label>
                                    <?php echo Form::text('mother_occupation', null, ['placeholder' => __('mother') . ' ' . __('occupation'), 'class' => 'form-control', 'id' => 'edit_mother_occupation', 'readonly' => true]); ?>

                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label><?php echo e(__('mother') . ' ' . __('image')); ?> <span class="text-danger">*</span></label>
                                    <input type="file" name="mother_image" class="file-upload-default" />
                                    <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info" disabled=""
                                            placeholder="<?php echo e(__('mother') . ' ' . __('image')); ?>" />
                                        <span class="input-group-append">
                                            <button class="file-upload-browse btn btn-theme"
                                                type="button"><?php echo e(__('upload')); ?></button>
                                        </span>
                                    </div>
                                    <div style="width: 100px;">
                                        <img src="" id="edit-mother-image-tag" class="img-fluid w-100" />
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input"
                                            id="show-edit-guardian-details"><?php echo e(__('guardian_details')); ?>

                                    </label>
                                </div>
                            </div>
                            <div class="row" id="edit_guardian_div" style="display:none;">
                                <div class="form-group col-sm-12 col-md-12">
                                    <label><?php echo e(__('guardian') . ' ' . __('email')); ?> <span
                                            class="text-danger">*</span></label>
                                    <select class="edit-guardian-search form-control" id="edit_guardian_email"
                                        name="guardian_email"></select>
                                </div>

                                <div class="form-group col-sm-12 col-md-4">
                                    <label><?php echo e(__('guardian') . ' ' . __('first_name')); ?> <span
                                            class="text-danger">*</span></label>
                                    <?php echo Form::text('guardian_first_name', null, ['placeholder' => __('guardian') . ' ' . __('first_name'), 'class' => 'form-control', 'id' => 'edit_guardian_first_name', 'readonly' => true]); ?>

                                </div>

                                <div class="form-group col-sm-12 col-md-4">
                                    <label><?php echo e(__('guardian') . ' ' . __('last_name')); ?> <span
                                            class="text-danger">*</span></label>
                                    <?php echo Form::text('guardian_last_name', null, ['placeholder' => __('guardian') . ' ' . __('last_name'), 'class' => 'form-control', 'id' => 'edit_guardian_last_name', 'readonly' => true]); ?>

                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label><?php echo e(__('guardian') . ' ' . __('mobile')); ?> <span
                                            class="text-danger">*</span></label>
                                    <?php echo Form::text('guardian_mobile', null, ['placeholder' => __('guardian') . ' ' . __('mobile'), 'class' => 'form-control', 'min' => 1  ,'id' => 'edit_guardian_mobile', 'readonly' => true]); ?>

                                </div>
                                <div class="form-group col-sm-12 col-md-12">
                                    <label><?php echo e(__('gender')); ?> <span class="text-danger">*</span></label><br>
                                    <div class="d-flex">
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" name="guardian_gender" value="male" id="edit_guardian_male">
                                                <?php echo e(__('male')); ?>

                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" name="guardian_gender" value="female" id="edit_guardian_female">
                                                <?php echo e(__('female')); ?>

                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label><?php echo e(__('guardian') . ' ' . __('dob')); ?> <span class="text-danger">*</span></label>
                                    <?php echo Form::text('guardian_dob', null, ['placeholder' => __('guardian') . ' ' . __('dob'), 'class' => 'form-control datepicker-popup-no-future form-control', 'id' => 'edit_guardian_dob', 'readonly' => true]); ?>

                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label><?php echo e(__('guardian') . ' ' . __('occupation')); ?> <span
                                            class="text-danger">*</span></label>
                                    <?php echo Form::text('guardian_occupation', null, ['placeholder' => __('guardian') . ' ' . __('occupation'), 'class' => 'form-control', 'id' => 'edit_guardian_occupation', 'readonly' => true]); ?>

                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label><?php echo e(__('guardian') . ' ' . __('image')); ?> <span
                                            class="text-danger">*</span></label>
                                    <input type="file" name="guardian_image" class="file-upload-default" />
                                    <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info" disabled=""
                                            placeholder="<?php echo e(__('guardian') . ' ' . __('image')); ?>" />
                                        <span class="input-group-append">
                                            <button class="file-upload-browse btn btn-theme"
                                                type="button"><?php echo e(__('upload')); ?></button>
                                        </span>
                                    </div>
                                    <div style="width: 100px;">
                                        <img src="" id="edit-guardian-image-tag" class="img-fluid w-100" />
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
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocss\htdocs\eschool204\resources\views/students/details.blade.php ENDPATH**/ ?>