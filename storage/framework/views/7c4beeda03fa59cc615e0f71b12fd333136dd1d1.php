<?php $__env->startSection('title'); ?>
<?php echo e(__('fees')); ?> <?php echo e(__('classes')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            <?php echo e(__('manage')); ?> <?php echo e(__('fees')); ?> <?php echo e(__('classes')); ?>

        </h3>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div id="toolbar">
                        <select name="filter_medium_id" id="filter_medium_id" class="form-control">
                            <option value=""><?php echo e(__('all')); ?></option>
                            <?php $__currentLoopData = $mediums; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $medium): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($medium->id); ?>">
                                <?php echo e($medium->name); ?>

                            </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <table aria-describedby="mydesc" class='table table-striped' id='table_list' data-toggle="table" data-url="<?php echo e(route('fees.class.list')); ?>" data-click-to-select="true" data-side-pagination="server" data-pagination="true" data-page-list="[5, 10, 20, 50, 100, 200, All]" data-search="true" data-toolbar="#toolbar" data-show-columns="true" data-show-refresh="true" data-fixed-columns="true" data-fixed-number="2" data-fixed-right-number="1" data-trim-on-search="false" data-mobile-responsive="true" data-sort-name="id" data-sort-order="desc" data-maintain-selected="true" data-export-types='["txt","excel"]' data-query-params="AssignclassQueryParams" data-export-options='{ "fileName": "class-list-<?= date(' d-m-y') ?>" ,"ignoreColumn":
                        ["operate"]}' data-show-export="true">
                        <thead>
                            <tr>
                                <th scope="col" data-field="class_id" data-sortable="true" data-visible="false"><?php echo e(__('id')); ?></th>
                                <th scope="col" data-field="no" data-sortable="false"><?php echo e(__('no.')); ?></th>
                                <th scope="col" data-field="class_name" data-sortable="false"><?php echo e(__('class')); ?></th>
                                <th scope="col" data-field="fees_type" data-sortable="false" data-align="left" data-formatter="feesTypeFormatter"><?php echo e(__('fees')); ?> <?php echo e(__('type')); ?></th>
                                <th scope="col" data-field="base_amount" data-sortable="false" data-align="center"><?php echo e(__('base')); ?> <?php echo e(__('amount')); ?></th>
                                <th scope="col" data-field="total_amount" data-sortable="false" data-align="center"><?php echo e(__('total')); ?> <?php echo e(__('amount')); ?></th>
                                <th scope="col" data-field="created_at" data-sortable="true" data-visible="false"><?php echo e(__('created_at')); ?></th>
                                <th scope="col" data-field="updated_at" data-sortable="true" data-visible="false"><?php echo e(__('updated_at')); ?></th>
                                <th scope="col" data-field="operate" data-sortable="false" data-events="feesClassEvents"> <?php echo e(__('action')); ?></th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                            <?php echo e(__('edit') . ' ' . __('class') . ' ' . __('subject')); ?>

                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    
                    <div class="row edit-fees-type-div" style="display: none;">
                        <div class="row col-11">
                            <div class="form-group col-md-6">
                                <input type="hidden" name="edit_fees_type[0][fees_class_id]" class="edit-fees-type-id form-control" disabled>
                                <select name="edit_fees_type[0][fees_type_id]" class="edit-fees-type form-control" required="required">
                                    <option value=""><?php echo e(__('select')); ?> <?php echo e(__('fees')); ?> <?php echo e(__('type')); ?></option>
                                    <?php $__currentLoopData = $fees_type_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fees_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($fees_type->id); ?>">
                                    <?php echo e($fees_type->name); ?>

                                    </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <?php echo Form::number('edit_fees_type[0][amount]', null, ['class' => 'form-control edit_amount','placeholder' => __('enter').' '.__('fees').' '.__('amount'),'id' => 'edit_amount']); ?>

                            </div>
                        </div>
                        <div class="col-1 pl-0">
                            <button type="button" class="btn btn-icon btn-inverse-danger remove-fees-type" title="Remove Core Subject">
                                <i class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>

                    
                    <div class="row template_fees_type" style="display: none;">
                        <div class="row col-11">
                            <div class="form-group col-md-6">
                                <select name="fees_type[0][fees_type_id]" class="form-control" required="required">
                                    <option value=""><?php echo e(__('select')); ?> <?php echo e(__('fees')); ?> <?php echo e(__('type')); ?></option>
                                    <?php $__currentLoopData = $fees_type_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fees_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($fees_type->id); ?>">
                                    <?php echo e($fees_type->name); ?>

                                    </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <?php echo Form::number('fees_type[0][amount]', null, ['class' => 'form-control amount-text','placeholder' => __('enter').' '.__('fees').' '.__('amount'),'id' => 'amount-text']); ?>

                            </div>
                        </div>
                        <div class="col-1 pl-0">
                            <button type="button" class="btn btn-inverse-success btn-icon add-fees-type remove_field" title="" id="remove_field">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <form class="pt-3" id="fees-class-create-form" action="<?php echo e(url('class/fees-type')); ?>" novalidate="novalidate">
                        <div class="modal-body">
                            <div class="form-group">
                                <label><?php echo e(__('class')); ?> <span class="text-danger">*</span></label>
                                <select name="class_id" id="edit_class_id" class="form-control" disabled>
                                    <option value=""><?php echo e(__('select_class')); ?></option>
                                    <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($class->id); ?>" data-medium="<?php echo e($class->medium_id); ?>">
                                        <?php echo e($class->name . ' - ' . $class->medium->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <input type="hidden" name="class_id" id="class_id" value="" />
                            </div>

                            <h4 class="mb-3">
                                <?php echo e(__('fees')); ?> <?php echo e(__('type')); ?>

                            </h4>
                            
                            <div class="mt-3 edit-extra-fees-types"></div>

                            <div>
                                <div class="form-group pl-0 mt-4">
                                    <button type="button" class="col-md-3 btn btn-inverse-success add-new-fees-type amount" id="amount">
                                        <?php echo e(__('fees')); ?> <?php echo e(__('type')); ?> <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('close')); ?></button>
                            <input class="btn btn-theme" type="submit" value=<?php echo e(__('save')); ?> />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocss\htdocs\eschool204\resources\views/fees/fees_class.blade.php ENDPATH**/ ?>