<?php $__env->startSection('title'); ?>
<?php echo e(__('online')); ?> <?php echo e(__('fees')); ?> <?php echo e(__('transactions')); ?> <?php echo e(__('logs')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            <?php echo e(__('online')); ?> <?php echo e(__('fees')); ?> <?php echo e(__('transactions')); ?> <?php echo e(__('logs')); ?>

        </h3>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card search-container">
            <div class="card">
                <div class="card-body">
                    <div id="toolbar" class="row">
                        <div class="col col-md-4">
                            <label for="filter_class_id" style="font-size: 0.89rem">
                                <?php echo e(__('class')); ?>

                            </label>
                            <select name="filter_class_id" id="filter_class_id" class="form-control">
                                <option value=""><?php echo e(__('all')); ?></option>
                                <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($class->id); ?>">
                                    <?php echo e($class->name); ?> <?php echo e($class->medium->name); ?>

                                </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="col col-md-4">
                            <label for="filter_session_year_id" style="font-size: 0.89rem">
                                <?php echo e(__('session_years')); ?>

                            </label>
                            <select name="filter_session_year_id" id="filter_session_year_id" class="form-control">
                                <option value=""><?php echo e(__('all')); ?></option>
                                <?php $__currentLoopData = $session_year_all; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $session_year): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($session_year->id); ?>">
                                    <?php echo e($session_year->name); ?>

                                </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                         <div class="col col-md-4">
                            <label for="filter_payment_status" style="font-size: 0.86rem;width: 110px">
                                <?php echo e(__('payment_status')); ?>

                            </label>
                            <select name="filter_payment_status" id="filter_payment_status" class="form-control">
                                <option value=""><?php echo e(__('all')); ?></option>
                                <option value="0"><?php echo e(__('failed')); ?></option>
                                <option value="1"><?php echo e(__('success')); ?></option>
                                <option value="2"><?php echo e(__('pending')); ?></option>
                            </select>
                        </div>
                    </div>
                    <table aria-describedby="mydesc" class='table table-striped' id='table_list' data-toggle="table" data-url="<?php echo e(route('fees.transactions.log.list', 1)); ?>" data-click-to-select="true" data-side-pagination="server" data-pagination="true" data-page-list="[5, 10, 20, 50, 100, 200]" data-search="true" data-toolbar="#toolbar" data-show-columns="true" data-show-refresh="true" data-fixed-columns="false" data-fixed-number="2" data-fixed-right-number="1" data-trim-on-search="false" data-mobile-responsive="true" data-sort-name="id" data-sort-order="desc" data-maintain-selected="true" data-export-types='["txt","excel"]' data-export-options='{ "fileName": "<?php echo e(__('fees')); ?>-<?php echo e(__('transactions')); ?>-<?= date(' d-m-y') ?>" ,"ignoreColumn":["operate"]}' data-show-export="true" data-query-params="feesPaymentTransactionQueryParams" >
                        <thead>
                            <tr>
                                <th scope="col" data-field="id" data-sortable="true" data-visible="false"><?php echo e(__('id')); ?></th>
                                <th scope="col" data-field="student_id" data-sortable="true" data-visible="false"><?php echo e(__('student_id')); ?></th>
                                <th scope="col" data-field="no" data-sortable="false"><?php echo e(__('no.')); ?></th>
                                <th scope="col" data-field="student_name" data-sortable="false"><?php echo e(__('students').' '.__('name')); ?></th>
                                <th scope="col" data-field="total_fees" data-sortable="false" data-align="center"><?php echo e(__('total')); ?> <?php echo e(__('fees')); ?></th>
                                <th scope="col" data-field="payment_gateway" data-sortable="false" data-align="center" data-formatter="feesOnlineTransactionLogParentGateway"><?php echo e(__('payment_gateway')); ?></th>
                                <th scope="col" data-field="payment_status" data-sortable="false" data-align="center" data-formatter="feesOnlineTransactionLogPaymentStatus"><?php echo e(__('payment_status')); ?></th>
                                <th scope="col" data-field="order_id" data-sortable="false" data-align="center"><?php echo e(__('order_id')); ?> / <?php echo e(__('payment_intent_id')); ?></th>
                                <th scope="col" data-field="payment_id" data-sortable="false" data-align="center"><?php echo e(__('payment_id')); ?></th>
                                <th scope="col" data-field="payment_signature" data-sortable="false" data-align="center"><?php echo e(__('payment_signature')); ?></th>
                                <th scope="col" data-field="session_year_name" data-sortable="false" data-align="center"><?php echo e(__('session_years')); ?></th>
                                <th scope="col" data-field="created_at" data-sortable="true" data-visible="false"><?php echo e(__('created_at')); ?></th>
                                <th scope="col" data-field="updated_at" data-sortable="true" data-visible="false"><?php echo e(__('updated_at')); ?></th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocss\htdocs\eschool204\resources\views/fees/fees_transaction_logs.blade.php ENDPATH**/ ?>