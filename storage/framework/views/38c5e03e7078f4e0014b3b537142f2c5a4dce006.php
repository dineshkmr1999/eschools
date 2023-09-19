
<?php $__env->startSection('title'); ?>
    <?php echo e(__(' super admin dashboard')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            <span class="page-title-icon bg-theme text-white mr-2">
                <i class="fa fa-home"></i>
            </span> <?php echo e(__(' Super Admin Dashboard')); ?>

        </h3>
    </div>
    <div class="row">
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-danger card-img-holder text-white">
                <div class="card-body">
                    <img src="<?php echo e(asset(config('global.CIRCLE_SVG'))); ?>" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Total Teachers <i class="mdi mdi-chart-line mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5" id="total-teachers">Loading...</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-info card-img-holder text-white">
                <div class="card-body">
                    <img src="<?php echo e(asset(config('global.CIRCLE_SVG'))); ?>" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Total Students <i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5" id="total-students">Loading...</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4 stretch-card grid-margin">
            <div class="card bg-gradient-success card-img-holder text-white">
                <div class="card-body">
                    <img src="<?php echo e(asset(config('global.CIRCLE_SVG'))); ?>" class="card-img-absolute" alt="circle-image" />
                    <h4 class="font-weight-normal mb-3">Total Parents <i class="mdi mdi-diamond mdi-24px float-right"></i>
                    </h4>
                    <h2 class="mb-5" id="total-parents">Loading...</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var xhr = new XMLHttpRequest();
    xhr.open('GET', "<?php echo e(asset('/dashboard-data')); ?>", true);

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) { // Check if the request is complete
            if (xhr.status === 200) { // Check if the request was successful (HTTP status 200)
                var data = JSON.parse(xhr.responseText);

                // Update the HTML elements with the fetched data
                document.getElementById('total-teachers').textContent = data.teacher_count;
                document.getElementById('total-students').textContent = data.student_count;
                document.getElementById('total-parents').textContent = data.parent_count;
            } else {
                console.error('Error fetching data. HTTP status:', xhr.status);
            }
        }
    };

    xhr.send();
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.super_master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocss\htdocs\eschool19-09\escool123\resources\views/superadmin/dashboard.blade.php ENDPATH**/ ?>