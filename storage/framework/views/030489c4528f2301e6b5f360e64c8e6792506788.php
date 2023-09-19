<?php $__env->startSection('title'); ?>
    <?php echo e(__('enquirymode')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <?php echo e(__('manage') . ' ' . __('enquirymode')); ?>

            </h3>
        </div>

        <div class="row">
            <?php if(Auth::user()->can('manage-enquiry-mode-create')): ?>
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">
                            <?php echo e(__('create') . ' ' . __('enquirymode')); ?>

                        </h4>
                        <form class="create-form pt-3" id="formdata" action="<?php echo e(url('enquirymode')); ?>" method="POST" novalidate="novalidate">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="form-group col-sm-12 col-md-6">
                                    <label><?php echo e(__('mode_name')); ?> <span class="text-danger">*</span></label>
                                    <?php echo Form::text('mode_name', null, ['required', 'placeholder' => __('mode_name'), 'class' => 'form-control']); ?>

                                    <span class="input-group-addon input-group-append">
                                    </span>
                                </div>
                            </div>

                            <input class="btn btn-theme" type="submit" value=<?php echo e(__('submit')); ?>>
                        </form>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <?php if(Auth::user()->can('manage-enquiry-mode-list')): ?>
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">
                                <?php echo e(__('list') . ' ' . __('enquirymode')); ?>

                            </h4>
                            <div class="row">
                                <div class="col-12">
                                    <table aria-describedby="mydesc" class='table' id='table_list' data-toggle="table"
                                        data-url="<?php echo e(url('enquirymode-list')); ?>" data-click-to-select="true"
                                        data-side-pagination="server" data-pagination="true"
                                        data-page-list="[5, 10, 20, 50, 100, 200]"  data-search="true"
                                        data-toolbar="#toolbar" data-show-columns="true" data-show-refresh="true"
                                        data-fixed-columns="true" data-fixed-number="2" data-fixed-right-number="1"
                                        data-trim-on-search="false" data-mobile-responsive="true" data-sort-name="id"
                                        data-sort-order="desc" data-maintain-selected="true"
                                        data-export-types='["txt","excel"]'
                                        data-export-options='{ "fileName": "enquirymode-list-<?= date('d-m-y') ?>","ignoreColumn": ["operate"]}'
                                        data-query-params="queryParams">
                                        <thead>
                                            <tr>
                                                <th scope="col" data-field="id" data-sortable="true" data-visible="false">
                                                    <?php echo e(__('id')); ?></th>
                                                <th scope="col" data-field="no" data-sortable="false"><?php echo e(__('no.')); ?>

                                                </th>
                                                <th scope="col" data-field="mode_name" data-sortable="false">
                                                    <?php echo e(__('mode_name')); ?>

                                                </th>
                                                <th scope="col" data-field="active" data-sortable="false">
                                                    <?php echo e(__('active')); ?></th>
                                                <?php if(Auth::user()->can('manage-enquiry-mode-edit') || Auth::user()->can('manage-enquiry-mode-delete')): ?>
                                                    <th data-events="actionEvents" data-width="150" scope="col" data-field="operate"
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
            <?php endif; ?>
        </div>
    </div>


    <div class="modal fade" id="editModal" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> <?php echo e(__('edit') . ' ' . __('enquirymode')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fa fa-close"></i></span>
                    </button>
                </div>
                <form id="formdata" class="editform" action="<?php echo e(url('enquirymode')); ?>" novalidate="novalidate">
                    <?php echo csrf_field(); ?>
                    <div class="modal-body">
                        <input type="hidden" name="id" id="id">
                        <div class="row form-group">
                            <div class="col-sm-12 col-md-12">
                                <label><?php echo e(__('mode_name')); ?> <span class="text-danger">*</span></label>
                                <?php echo Form::text('mode_name', null, ['required', 'placeholder' => __('Mode Name'), 'class' => 'form-control', 'id' => 'mode_name']); ?>

                            </div>
                        </div>
                        <div class="form-group">
        <label><?php echo e(__('Active')); ?></label>
        <div class="form-check">
            <label class="form-check-label">
                <?php echo Form::radio('active', 1, null, ['class' => 'form-check-input', 'id' => 'edit_active_true']); ?>

                <?php echo e(__('yes')); ?>

            </label>
        </div>
        <div class="form-check">
            <label class="form-check-label">
                <?php echo Form::radio('active', 0, null, ['class' => 'form-check-input', 'id' => 'edit_active_false']); ?>

                <?php echo e(__('no')); ?>

            </label>
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
                $('#id').val(row.id);
                $('#mode_name').val(row.mode_name);

                var activeBadgeHtml = row.active;
                var activeValue = activeBadgeHtml.includes('badge-success') ? 1 : 0;

                if (activeValue == 1) {
                    $('#edit_active_true').prop('checked', true);
                } else {
                    $('#edit_active_false').prop('checked', true);
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/dineshkumar/Desktop/eschools1234/resources/views/enquiry_mode/index.blade.php ENDPATH**/ ?>