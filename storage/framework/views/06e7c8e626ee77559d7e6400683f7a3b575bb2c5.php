<?php $__env->startSection('title'); ?>
<?php echo e(__('session_years')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            <?php echo e(__('manage').' '.__('session_years')); ?>

        </h3>
    </div>

    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        <?php echo e(__('create').' '.__('session_years')); ?>

                    </h4>
                    <form action="<?php echo e(url('session-years')); ?>" class="create-form pt-3" id="formdata" method="POST" novalidate="novalidate">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="form-group col-sm-12 col-md-12">
                                <label><?php echo e(__('name')); ?> <span class="text-danger">*</span></label>
                                <?php echo Form::text('name', null, ['required', 'placeholder' => __('name'), 'class' => 'form-control']); ?>

                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-12 col-md-6">
                                <label><?php echo e(__('start_date')); ?> <span class="text-danger">*</span></label>
                                <?php echo Form::text('start_date', null, ['required', 'placeholder' => __('start_date'), 'class' => 'datepicker-popup form-control']); ?>

                                <span class="input-group-addon input-group-append">
                                </span>
                            </div>
                            <div class="form-group col-sm-12 col-md-6">
                                <label><?php echo e(__('end_date')); ?> <span class="text-danger">*</span></label>
                                <?php echo Form::text('end_date', null, ['required', 'placeholder' => __('end_date'), 'class' => 'datepicker-popup form-control']); ?>

                                <span class="input-group-addon input-group-append">
                                </span>
                            </div>
                        </div>
                        <input class="btn btn-theme" type="submit" value=<?php echo e(__('submit')); ?>>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        <?php echo e(__('list').' '.__('session_years')); ?>

                    </h4>
                    <div class="row">
                        <div class="col-12">
                            <table aria-describedby="mydesc" class='table' id='table_list'
                            data-toggle="table" data-url="<?php echo e(url('session_years_list')); ?>" data-click-to-select="true"
                            data-side-pagination="server" data-pagination="true"
                            data-page-list="[5, 10, 20, 50, 100, 200]"  data-search="true" data-toolbar="#toolbar"
                            data-show-columns="true" data-show-refresh="true" data-fixed-columns="true"
                            data-fixed-number="2" data-fixed-right-number="1" data-trim-on-search="false"
                            data-mobile-responsive="true" data-sort-name="id" data-sort-order="desc"
                            data-maintain-selected="true" data-export-types='["txt","excel"]'
                            data-export-options='{ "fileName": "session-year-list-<?= date('d-m-y') ?>","ignoreColumn": ["operate"]}'
                            data-query-params="queryParams">
                            <thead>
                                <tr>
                                    <th scope="col" data-field="id" data-sortable="true" data-visible="false"><?php echo e(__('id')); ?></th>
                                    <th scope="col" data-field="no" data-sortable="false"><?php echo e(__('no.')); ?></th>
                                    <th scope="col" data-field="name" data-sortable="false"><?php echo e(__('name')); ?></th>
                                    <th scope="col" data-field="start_date" data-sortable="true"><?php echo e(__('start_date')); ?></th>
                                    <th scope="col" data-field="end_date" data-sortable="true"><?php echo e(__('end_date')); ?></th>
                                    <th scope="col" data-field="default" data-sortable="true" data-visible="true" data-formatter="defaultYearFormatter"><?php echo e(__('default')); ?></th>
                                    <th data-events="actionEvents" scope="col" data-field="operate" data-sortable="false"><?php echo e(__('action')); ?></th>
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


<div class="modal fade" id="editModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> <?php echo e(__('edit').' '.__('session_years')); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fa fa-close"></i></span>
                </button>
            </div>
            <form id="formdata" class="editform" action="<?php echo e(url('session-years')); ?>" novalidate="novalidate">
                <?php echo csrf_field(); ?>
                <div class="modal-body">
                    <input type="hidden" name="id" id="id">
                    <div class="row form-group">
                        <div class="form-group col-sm-12 col-md-12">
                            <label><?php echo e(__('name')); ?> <span class="text-danger">*</span></label>
                            <?php echo Form::text('name', null, ['required', 'placeholder' => __('name'), 'class' => 'form-control','id'=>'name']); ?>


                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="form-group col-sm-12 col-md-12">
                            <label><?php echo e(__('start_date')); ?> <span class="text-danger">*</span></label>
                            <?php echo Form::text('start_date', null, ['required', 'placeholder' => __('start_date'), 'class' => 'datepicker-popup form-control','id'=>'start_date']); ?>

                            <span class="input-group-addon input-group-append">
                            </span>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="form-group col-sm-12 col-md-12">
                            <label><?php echo e(__('end_date')); ?> <span class="text-danger">*</span></label>
                            <?php echo Form::text('end_date', null, ['required', 'placeholder' => __('end_date'), 'class' => 'datepicker-popup form-control','id'=>'end_date']); ?>

                            <span class="input-group-addon input-group-append">
                            </span>
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
            $('#name').val(row.name);
            $('#start_date').val(row.start_date);
            $('#end_date').val(row.end_date);
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocss\htdocs\eschool204\resources\views/session_years/index.blade.php ENDPATH**/ ?>