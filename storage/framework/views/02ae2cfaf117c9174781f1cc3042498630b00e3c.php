<?php $__env->startSection('title'); ?>
<?php echo e(__('manage'). ' ' . __('grade')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            <?php echo e(__('manage') . ' ' . __('grade')); ?>

        </h3>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card search-container">
            <div class="card">
                <div class="card-body">
                    <h4 class="page-title mb-4">
                        <?php echo e(__('create') . ' ' . __('grade')); ?>

                    </h4>
                    <div class="form-group">
                        
                        <div class="grade_content_div" style="display: none;">
                            <div class="grade_content">
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label><?php echo e(__('starting_range')); ?> </label>
                                        <input type="number" name="grade[0][starting_range]" class="temp_starting_range form-control" placeholder="<?php echo e(__('starting_range')); ?>" required />
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label><?php echo e(__('ending_range')); ?> </label>
                                        <input type="number" name="grade[0][ending_range]" class="temp_ending_range form-control" placeholder="<?php echo e(__('ending_range')); ?>" required />
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label><?php echo e(__('grade')); ?> </label>
                                        <input type="text" name="grade[0][grades]" class="temp_grade form-control" placeholder="<?php echo e(__('grade')); ?>" required />
                                    </div>
                                    <div class="form-group col-md-1 pl-0 mt-4">
                                        <button type="button" class="btn btn-icon btn-inverse-danger remove-grades" title="Remove Grade">
                                            <i class="fa fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <form id="create-grades" action="<?php echo e(url('create-grades')); ?>" method="POST">
                            <div class="extra_content">
                                <?php for($i = 0; $i < count($grades); $i++): ?> <div class="grade_content">
                                    <div class="row">
                                        <input type="hidden" name="grade[<?php echo e($i); ?>][id]" class="form-control hidden" value=<?php echo e($grades[$i]['id']); ?> />
                                        <div class="form-group col-md-4">
                                            <label><?php echo e(__('starting_range')); ?> </label>
                                            <?php if(isset($grades[$i-1])): ?>
                                            <?php
                                            $min = $grades[$i-1]['ending_range'];
                                            $min = $min+1;
                                            ?>
                                            <input type="number" min="<?php echo e($min); ?>" name="grade[<?php echo e($i); ?>][starting_range]" class="starting_range form-control" placeholder="<?php echo e(__('starting_range')); ?>" value="<?php echo e($grades[$i]['starting_range']); ?>" />
                                            <?php else: ?>
                                            <input type="number" min="0" name="grade[<?php echo e($i); ?>][starting_range]" class="starting_range form-control" placeholder="<?php echo e(__('starting_range')); ?>" value="<?php echo e($grades[$i]['starting_range']); ?>" />
                                            <?php endif; ?>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label><?php echo e(__('ending_range')); ?> </label>
                                            <?php if(isset($grades[$i+1])): ?>
                                            <?php
                                            $max = $grades[$i+1]['starting_range'];
                                            $max = $max-1;
                                            ?>
                                            <input type="number" name="grade[<?php echo e($i); ?>][ending_range]" max="<?php echo e($max); ?>" class="ending_range form-control" placeholder="<?php echo e(__('ending_range')); ?>" value="<?php echo e($grades[$i]['ending_range']); ?>" />
                                            <?php else: ?>
                                            <input type="number" name="grade[<?php echo e($i); ?>][ending_range]" max=100 class="ending_range form-control" placeholder="<?php echo e(__('ending_range')); ?>" value="<?php echo e($grades[$i]['ending_range']); ?>" />
                                            <?php endif; ?>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label><?php echo e(__('grade')); ?> </label>
                                            <input type="text" name="grade[<?php echo e($i); ?>][grades]" class="grade form-control" placeholder="<?php echo e(__('grade')); ?>" value="<?php echo e($grades[$i]['grade']); ?>" />
                                        </div>
                                        <div class="form-group col-md-1 pl-0 mt-4">
                                            <button type="button" class="btn btn-icon btn-inverse-danger remove-grades" data-id="<?php echo e($grades[$i]['id']); ?>" title="Remove Grade">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                            </div>
                            <?php endfor; ?>
                    </div>
                    <div class="extra-grade-content"></div>
                    <div class="col-md-4 pl-0 mb-4">
                        <button type="button" class="btn btn-success add-grade-content" title="Add new row">
                            Add New Data
                        </button>
                    </div>
                    <input type="submit" class="btn btn-theme" value=<?php echo e(__('submit')); ?> />
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocss\htdocs\eschool204\resources\views/exams/exam-grade.blade.php ENDPATH**/ ?>