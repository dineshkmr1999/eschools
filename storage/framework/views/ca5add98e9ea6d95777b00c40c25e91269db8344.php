<?php $__env->startSection('title'); ?>
    <?php echo e(__('student_late_entry')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <?php echo e(__('manage') . ' ' . __('student_late_entry')); ?>

            </h3>
        </div>

        <div class="row">
            <?php if(Auth::user()->can('student-lateentry-create')): ?>
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">
                                <?php echo e(__('create') . ' ' . __('student_late_entry')); ?>

                            </h4>
                            <form class="create-form pt-3" id="formdata" action="<?php echo e(url('student-lateentry')); ?>"
                                method="POST" novalidate="novalidate">
                                <?php echo csrf_field(); ?>
                                <div class="row">
                                    <div class="form-group col-sm-12 col-md-6">
                                        <label><?php echo e(__('reason')); ?> <span class="text-danger">*</span></label>
                                        <?php echo Form::text('reason', null, ['required', 'placeholder' => __('reason'), 'class' => 'form-control']); ?>

                                        <span class="input-group-addon input-group-append">
                                        </span>
                                    </div>
                                    <div class="form-group col-sm-12 col-md-6">
                                        <label><?php echo e(__('entry_time')); ?> <span class="text-danger">*</span></label>
                                        <?php echo Form::text('entry_time', null, [
                                            'required',
                                            'placeholder' => 'HH:MM',
                                            'type' => 'time',
                                            'class' => 'form-control',
                                        ]); ?>

                                    </div>
                                </div>
                                <div class="row">

                                    <div class="form-group col-sm-12 col-md-12">
                                        <label><?php echo e(__('student_id')); ?></label>
                                        <?php echo Form::number('student_id', null, [
                                            'rows' => '2',
                                            'placeholder' => __('student_id'),
                                            'class' => 'form-control',
                                        ]); ?>


                                    </div>
                                </div>
                                <input class="btn btn-theme" type="submit" value=<?php echo e(__('submit')); ?>>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <?php if(Auth::user()->can('student-lateentry-list')): ?>
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">
                                <?php echo e(__('list') . ' ' . __('student_late_entry')); ?>

                            </h4>
                            <div class="row">
                                <div class="col-12">
                                    <table aria-describedby="mydesc" class='table' id='table_list' data-toggle="table"
                                        data-url="<?php echo e(url('student-lateentry-list')); ?>" data-click-to-select="true"
                                        data-side-pagination="server" data-pagination="true"
                                        data-page-list="[5, 10, 20, 50, 100, 200]" data-search="true"
                                        data-toolbar="#toolbar" data-show-columns="true" data-show-refresh="true"
                                        data-fixed-columns="true" data-fixed-number="2" data-fixed-right-number="1"
                                        data-trim-on-search="false" data-mobile-responsive="true" data-sort-name="id"
                                        data-sort-order="desc" data-maintain-selected="true"
                                        data-export-types='["txt","excel"]'
                                        data-export-options='{ "fileName": "student-lateentry-list-<?= date('d-m-y') ?>
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
                                                <th scope="col" data-field="reason" data-width="150"
                                                    data-sortable="false">
                                                    <?php echo e(__('reason')); ?>

                                                <th scope="col" data-field="entry_time" data-sortable="false">
                                                    <?php echo e(__('entry_time')); ?>

                                                </th>
                                                <th scope="col" data-field="student_id" data-sortable="false">
                                                    <?php echo e(__('student_id')); ?></th>
                                                <?php if(Auth::user()->can('student-lateentry-edit') || Auth::user()->can('student-lateentry-delete')): ?>
                                                    <th data-events="actionEvents" data-width="150" scope="col"
                                                        data-field="operate" data-sortable="false"><?php echo e(__('action')); ?></th>
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
                    <h5 class="modal-title" id="exampleModalLabel"> <?php echo e(__('edit') . ' ' . __('student_late_entry')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fa fa-close"></i></span>
                    </button>
                </div>
                <form id="formdata" class="editform" action="<?php echo e(url('student-lateentry')); ?>" novalidate="novalidate">
                    <?php echo csrf_field(); ?>
                    <div class="modal-body">
                        <input type="hidden" name="id" id="id">
                        <div class="row form-group">
                            <div class="col-sm-12 col-md-12">
                                <label><?php echo e(__('reason')); ?> <span class="text-danger">*</span></label>
                                <?php echo Form::text('reason', null, [
                                    'required',
                                    'placeholder' => __('reason'),
                                    'class' => 'form-control',
                                    'id' => 'reason',
                                ]); ?>

                                <span class="input-group-addon input-group-append">
                                </span>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-12 col-md-12">
                                <label><?php echo e(__('entry_time')); ?> <span class="text-danger">*</span></label>
                                <?php echo Form::text('entry_time', null, [
                                    'required',
                                    'placeholder' => __('entry_time'),
                                    'class' => 'form-control',
                                    'id' => 'entry_time',
                                ]); ?>

                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-12 col-md-12">
                                <label><?php echo e(__('student_id')); ?></label>
                                <?php echo Form::text('student_id', null, [
                                    'placeholder' => __('student_id'),
                                    'class' => 'form-control',
                                    'id' => 'student_id',
                                ]); ?>

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
                $('#reason').val(row.reason);
                $('#entry_time').val(row.entry_time);
                $('#student_id').val(row.student_id);
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocss\htdocs\eschool204\resources\views/students/lateentry.blade.php ENDPATH**/ ?>