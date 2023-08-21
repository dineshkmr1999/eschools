<?php $__env->startSection('title'); ?>
    <?php echo e(__('fees')); ?> <?php echo e(__('type')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            <?php echo e(__('manage')); ?> <?php echo e(__('fees')); ?> <?php echo e(__('type')); ?>

        </h3>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card search-container">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        <?php echo e(__('create')); ?> <?php echo e(__('fees')); ?> <?php echo e(__('type')); ?>

                    </h4>
                    <form id="create-form" class="pt-3 create-form" url="<?php echo e(url('fees-type')); ?>" method="POST" novalidate="novalidate">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="form-group col-sm-6 col-md-4">
                                <label><?php echo e(__('name')); ?> <span class="text-danger">*</span></label>
                                <?php echo Form::text('name', null, ['required', 'placeholder' => __('name'), 'class' => 'form-control']); ?>

                            </div>

                            <div class="form-group col-sm-6 col-md-5">
                                <label><?php echo e(__('description')); ?> </label>
                                <?php echo Form::textarea('description', null, ['placeholder' => __('description'), 'class' => 'form-control']); ?>

                            </div>
                            <div class="form-group col-sm-6 col-md-3">
                                <label><?php echo e(__('choiceable')); ?> <span class="text-danger">*</span></label>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <?php echo Form::radio('choiceable', 1, true, ['class' => 'form-check-input']); ?>

                                        <?php echo e(__('yes')); ?>

                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <?php echo Form::radio('choiceable', 0, false, ['class' => 'form-check-input']); ?>

                                        <?php echo e(__('no')); ?>

                                    </label>
                                </div>
                            </div>
                        </div>
                        <input class="btn btn-theme" type="submit" value=<?php echo e(__('submit')); ?>>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-12 grid-margin stretch-card search-container">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        <?php echo e(__('list')); ?> <?php echo e(__('fees')); ?>

                    </h4>
                    <div class="row">
                        <div class="col-12">
                            <table aria-describedby="mydesc" class='table' id='table_list'
                            data-toggle="table" data-url="<?php echo e(route('fees-type.show',1)); ?>" data-click-to-select="true"
                            data-side-pagination="server" data-pagination="true"
                            data-page-list="[5, 10, 20, 50, 100, 200]"  data-search="true" data-toolbar="#toolbar"
                            data-show-columns="true" data-show-refresh="true" data-fixed-columns="true"
                            data-fixed-number="2" data-fixed-right-number="1" data-trim-on-search="false"
                            data-mobile-responsive="true" data-sort-name="id" data-sort-order="desc"
                            data-maintain-selected="true" data-export-types='["txt","excel"]'
                            data-query-params="feesTypeQueryParams">
                            <thead>
                                <tr>
                                    <th scope="col" data-field="id" data-sortable="true" data-visible="false"><?php echo e(__('id')); ?></th>
                                    <th scope="col" data-field="no" data-sortable="false"><?php echo e(__('no.')); ?></th>
                                    <th scope="col" data-field="name" data-sortable="true"><?php echo e(__('name')); ?></th>
                                    <th scope="col" data-field="description" data-sortable="true"><?php echo e(__('description')); ?></th>
                                    <th scope="col" data-field="choiceable" data-sortable="true" data-formatter="feesTypeChoiceable" data-align="center"><?php echo e(__('choiceable')); ?></th>
                                    <th scope="col" data-events="FeesTypeActionEvents" data-field="operate" data-sortable="false"><?php echo e(__('action')); ?></th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><?php echo e(__('edit_fees')); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fa fa-close"></i></span>
                </button>
            </div>
            <form id="edit-form" class="pt-3 edit-form" action="<?php echo e(url('fees-type')); ?>">
                <input type="hidden" name="edit_id" id="edit_id">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name"><?php echo e(__('name')); ?> <span class="text-danger">*</span></label>
                        <?php echo Form::text('edit_name',null,['required','class' => 'form-control edit_name','id' => 'edit_name','placeholder' => __('name')]); ?>

                    </div>

                    <div class="form-group">
                        <label for="name"><?php echo e(__('description')); ?> </label>
                        <?php echo Form::textarea('edit_description',null,array('class'=>'form-control edit_description','id'=>'edit_description','placeholder'=>__('description'))); ?>

                    </div>
                    <div class="form-group">
                        <label><?php echo e(__('choiceable')); ?></label>
                        <div class="form-check">
                            <label class="form-check-label">
                                
                                <input type="radio" name="edit_choiceable" value="1" id="edit_choiceable_true" class="form-check-input">
                                <?php echo e(__('yes')); ?>

                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" name="edit_choiceable" value="0" id="edit_choiceable_false" class="form-check-input">
                                
                                <?php echo e(__('no')); ?>

                            </label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"data-dismiss="modal"><?php echo e(__('close')); ?></button>
                    <input class="btn btn-theme" type="submit" value=<?php echo e(__('submit')); ?> />
                </div>
            </form>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocss\htdocs\eschool204\resources\views/fees/fees_types.blade.php ENDPATH**/ ?>