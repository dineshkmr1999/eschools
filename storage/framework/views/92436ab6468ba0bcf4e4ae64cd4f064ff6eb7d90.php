<?php $__env->startSection('title'); ?>
<?php echo e(__('add_bulk_data')); ?>

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
                    <form class="pt-3" id="create-form-bulk-data" enctype="multipart/form-data" action="<?php echo e(route('students.store-bulk-data')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="form-group col-sm-12 col-md-4">
                                <label><?php echo e(__('class') . ' ' . __('section')); ?> <span class="text-danger">*</span></label>
                                <select name="class_section_id" id="class_section" class="form-control select2">
                                    <option value=""><?php echo e(__('select') . ' ' . __('class') . ' ' . __('section')); ?>

                                    </option>
                                    <?php $__currentLoopData = $class_section; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($section->id); ?>"><?php echo e($section->class->name); ?> -
                                        <?php echo e($section->section->name); ?> <?php echo e($section->class->medium->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>

                            </div>
                            <div class="form-group col-sm-12 col-md-4">
                                <label><?php echo e(__('file_upload')); ?> <span class="text-danger">*</span></label>
                                <input type="file" name="file" class="file-upload-default" />
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled="" placeholder="<?php echo e(__('file_upload')); ?>" required="required" />
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-theme" type="button"><?php echo e(__('upload')); ?></button>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group col-sm-12 col-xs-12">
                                <input class="btn btn-theme submit_bulk_file" type="submit" value="Submit" name="submit" id="submit_bulk_file">
                            </div>
                        </div>
                    </form>
                    <hr>
                    <div class="form-group col-12 col-md-3 mt-5">
                        <a class="btn btn-theme form-control" href="<?php echo e(Storage::url('public/dummy_file.xlsx')); ?>" download>
                            <strong><?php echo e(__('download_sample_excel_file')); ?></strong>
                        </a>
                    </div>
                    <div class="col-sm-12 col-xs-12">
                        <span style="font-size: 14px"> <b><?php echo e(__('Note')); ?> :- </b><?php echo e(__('first_download_dummy_file_and_convert_to_csv_file_then_upload_it')); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.super_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocss\htdocs\eschool19-09\escool123\resources\views/students/add_bulk_data_super_admin.blade.php ENDPATH**/ ?>