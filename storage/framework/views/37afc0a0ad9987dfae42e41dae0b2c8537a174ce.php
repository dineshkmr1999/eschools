<?php $__env->startSection('title'); ?>
<?php echo e(__('manage') . ' ' . __('exam')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            <?php echo e(__('manage') . ' ' . __('exam')); ?>

        </h3>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card search-container">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">
                        <?php echo e(__('create') . ' ' . __('exams')); ?>

                    </h4>
                    <form class="pt-3 mt-6 add-exam-form create-form" method="POST" action="<?php echo e(url('exams')); ?>">
                        <div class="row">
                            <div class="form-group col-sm-12 col-md-6">
                                <label><?php echo e(__('exam_name')); ?> <span class="text-danger">*</span></label>
                                <input type="text" id="name" name="name" placeholder="<?php echo e(__('exam_name')); ?>" class="form-control" />
                            </div>
                            <div class="form-group col-sm-12 col-md-6">
                                <label><?php echo e(__('session_years')); ?><span class="text-danger">*</span></label>
                                <select required name="session_year_id" id="session_year_id" class="form-control select2" style="width:100%;" tabindex="-1" aria-hidden="true">
                                    <?php $__currentLoopData = $session_year_all; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $years): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($years->id); ?>"<?php echo e($years->default == 1 ? 'selected':''); ?>><?php echo e($years->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>

                            
                            <?php if(isset($classes)): ?>
                            <div class="form-group col-sm-12 col-md-12">
                                <label><?php echo e(__('class')); ?><span class="text-danger">*</span></label><br>
                                <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input type="checkbox" name="class_id[]" class="form-check-input chkclass" value="<?php echo e($class['id']); ?>" data-mediumid="<?php echo e($class['medium_id']); ?>"><?php echo e($class['name']); ?>

                                        - <?php echo e($class['medium']['name']); ?>

                                    </label>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <?php endif; ?>

                            
                        </div>
                        <div class="row">
                            <div class="form-group col">
                                <label><?php echo e(__('exam_description')); ?></label>
                                <textarea id="description" name="description" placeholder="<?php echo e(__('exam_description')); ?>" class="form-control"></textarea>
                            </div>
                        </div>
                        <input class="btn btn-theme" id="add-exam-btn" type="submit" value=<?php echo e(__('submit')); ?>>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card search-container">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        <?php echo e(__('list') . ' ' . __('exams')); ?>

                    </h4>
                    <table aria-describedby="mydesc" class='table table-striped' id='table_list' data-toggle="table" data-url="<?php echo e(route('exams.show', 1)); ?>" data-click-to-select="true" data-side-pagination="server" data-pagination="true" data-page-list="[5, 10, 20, 50, 100, 200]" data-search="true" data-toolbar="#toolbar" data-show-columns="true" data-show-refresh="true" data-fixed-columns="true" data-fixed-number="2" data-fixed-right-number="1" data-trim-on-search="false" data-mobile-responsive="true" data-sort-name="id" data-sort-order="desc" data-maintain-selected="true" data-export-types='["txt","excel"]' data-export-options='{ "fileName": "exam-list-<?= date(' d-m-y') ?>" ,"ignoreColumn":
                        ["operate"]}' data-show-export="true" data-detail-formatter="examListFormatter">
                        <thead>
                            <tr>
                                <th scope="col" data-field="id" data-sortable="true" data-visible="false"><?php echo e(__('id')); ?>

                                </th>
                                <th scope="col" data-field="no" data-sortable="false"><?php echo e(__('no.')); ?></th>
                                <th scope="col" data-field="name" data-sortable="true"><?php echo e(__('name')); ?></th>
                                <th scope="col" data-field="description" data-sortable="true"><?php echo e(__('description')); ?></th>
                                <th scope="col" data-field="class_name" data-sortable="false"><?php echo e(__('class')); ?></th>
                                <th scope="col" data-field="publish" data-sortable="true" data-formatter="examPublishFormatter"><?php echo e(__('publish')); ?></th>
                                <th scope="col" data-field="session_year_name" data-sortable="false"><?php echo e(__('session_years')); ?></th>
                                <th scope="col" data-field="created_at" data-sortable="true" data-visible="false"><?php echo e(__('created_at')); ?></th>
                                <th scope="col" data-field="updated_at" data-sortable="true" data-visible="false"><?php echo e(__('updated_at')); ?></th>
                                <th scope="col" data-field="operate" data-sortable="false" data-events="examEvents"><?php echo e(__('action')); ?></th>
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
                            <?php echo e(__('edit') . ' ' . __('lesson')); ?>

                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form class="pt-3 edit-exam-form" id="edit-form" action="<?php echo e(url('exams')); ?>" novalidate="novalidate">
                        <input type="hidden" name="edit_id" id="edit_id" value="" />
                        <div class="modal-body">
                            <div class="row">
                                <div class="form-group col-sm-12 col-md-6">
                                    <label><?php echo e(__('exam_name')); ?> <span class="text-danger">*</span></label>
                                    <input type="text" required id="edit_name" name="name" placeholder="<?php echo e(__('exam_name')); ?>" class="form-control" />
                                </div>
                                <div class="form-group col-sm-12 col-md-6">
                                    <label><?php echo e(__('session_years')); ?><span class="text-danger">*</span></label>
                                    <select required name="session_year_id" id="session_year_id" class="form-control select2" style="width:100%;" tabindex="-1" aria-hidden="true">
                                        <?php $__currentLoopData = $session_year_all; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $years): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($years->id); ?>"<?php echo e($years->default == 1 ? 'selected':''); ?>><?php echo e($years->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                            <?php if(isset($classes)): ?>
                            <div class="form-group">
                                <label><?php echo e(__('class')); ?><span class="text-danger">*</span></label><br>
                                <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input type="checkbox" name="class_id[]" class="form-check-input chkclass edit_class_id" value="<?php echo e($class['id']); ?>" data-mediumid="<?php echo e($class['medium_id']); ?>" required>
                                        <?php echo e($class['name']); ?> - <?php echo e($class['medium']['name']); ?>

                                    </label>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <?php endif; ?>
                            <div class="form-group">
                                <label><?php echo e(__('exam_description')); ?></label>
                                <textarea id="edit_description" name="description" placeholder="<?php echo e(__('exam_description')); ?>" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('close')); ?></button>
                            <input class="btn btn-theme" type="submit" value=<?php echo e(__('edit')); ?> />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocss\htdocs\eschool204\resources\views/exams/index.blade.php ENDPATH**/ ?>