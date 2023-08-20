
<?php $__env->startSection('title'); ?>
    <?php echo e(__(' super admin dashboard')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-theme text-white mr-2">
                <i class="fa fa-home"></i>
            </span> <?php echo e(__(' super admin dashboard')); ?>

        </h3>
    </div>
    <div class="row">
        <div class="col-md-4 stretch-card grid-margin">
        <a class="btn bg-theme text-white" href="<?php echo e(url ('class')); ?>" role="button">Add   class</a>
        </div>
        <div class="col-md-4 stretch-card grid-margin">
        <a class="btn bg-theme text-white" href="<?php echo e(route ('students.create-bulk-data')); ?>" role="button">Add bulk Students</a>
        </div>
        <div class="col-md-4 stretch-card grid-margin">
        <a class="btn bg-theme text-white" href="<?php echo e(route ('fees-type.create-bulk-data')); ?>" role="button">Add bulk  Teachers</a>
        </div>
        <div class="col-md-4 stretch-card grid-margin">
        <a class="btn bg-theme text-white" href="<?php echo e(route ('fees-type.create-bulk-data')); ?>" role="button">Add bulk Fees type</a>
        </div>
       
        <div class="col-md-4 stretch-card grid-margin">
        <a class="btn bg-theme text-white" href="<?php echo e(route ('fees-type.create-bulk-data')); ?>" role="button">Add bulk Fees type</a>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.super_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/dineshkumar/Desktop/eschools1234/resources/views/superadmin/dashboard.blade.php ENDPATH**/ ?>