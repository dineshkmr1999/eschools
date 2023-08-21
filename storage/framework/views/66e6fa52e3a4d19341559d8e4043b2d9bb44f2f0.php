<?php $__env->startSection('title'); ?>
<?php echo e(__('manage') . ' ' . __('exam') . ' ' . __('timetable')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            <?php echo e(__('manage') . ' ' . __('exam') . ' ' . __('timetable')); ?>

        </h3>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card search-container">
            <div class="card">
                <div class="card-body">
                    <h4 class="page-title mb-4">
                        <?php echo e(__('create') . ' ' . __('exam') . ' ' . __('timetable')); ?>

                    </h4>
                    <div class="form-group">
                        <form class="create_exam_timetable_form" action="<?php echo e(url('exam-timetable')); ?>" method="POST">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label><?php echo e(__('exam')); ?> </label>
                                    <select name="exam_id" id="exam_options" class="form-control" required>
                                        <option value="">--<?php echo e(__('select')); ?>--</option>
                                        <?php $__currentLoopData = $exams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($exam->id); ?>"><?php echo e($exam->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label><?php echo e(__('class')); ?> </label>
                                    <select name="class_id" id="exam_classes_options" class="form-control" required>
                                        <option value="">--<?php echo e(__('select')); ?>--</option>
                                    </select>
                                </div>
                            </div>

                            <div class="exam_timetable_content">
                                <div class="row">
                                    <input type="hidden" name="timetable[0][timetable_id]" class="timetable_id form-control" required>
                                    <div class="form-group col-md-4">
                                        <label><?php echo e(__('subject')); ?> </label>
                                        <select name="timetable[0][subject_id]" class="form-control exam_subjects_options" required>
                                            <option value="">--<?php echo e(__('select')); ?>--</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label><?php echo e(__('total_marks')); ?> <span class="text-danger">*</span></label>
                                        <input type="number" name="timetable[0][total_marks]" class="total_marks form-control" placeholder="<?php echo e(__('total_marks')); ?>" min="1" required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label><?php echo e(__('passing_marks')); ?> <span class="text-danger">*</span></label>
                                        <input type="number" name="timetable[0][passing_marks]" class="passing_marks form-control" placeholder="<?php echo e(__('passing_marks')); ?>" min="1" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label><?php echo e(__('start_time')); ?> <span class="text-danger">*</span></label>
                                        <input type="time" name="timetable[0][start_time]" class="start_time form-control" placeholder="<?php echo e(__('start_time')); ?>" autocomplete="off" required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label><?php echo e(__('end_time')); ?> <span class="text-danger">*</span></label>
                                        <input type="time" name="timetable[0][end_time]" class="end_time form-control" placeholder="<?php echo e(__('end_time')); ?>" autocomplete="off" required>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label><?php echo e(__('date')); ?> <span class="text-danger">*</span></label>
                                        <input type="text" name="timetable[0][date]" class="datepicker-popup form-control" placeholder="<?php echo e(__('date')); ?>" autocomplete="off" required>
                                    </div>
                                    <div class="form-group col-md-1 pl-0 mt-4">
                                        <button type="button" class="btn btn-inverse-success btn-icon add-exam-timetable-content">
                                            <i class="fa fa-plus"></i></button>
                                    </div>
                                    <div class="col-12">
                                        <hr>
                                    </div>
                                </div>
                            </div>

                            
                            <div class="extra-timetable"></div>

                            <input type="submit" class="btn btn-theme" value=<?php echo e(__('submit')); ?> />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card search-container">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        <?php echo e(__('list') . ' ' . __('exam') . ' ' . __('timetable')); ?>

                    </h4>
                    <div id="toolbar" class="row exam_class_filter">

                        <div class="col">
                            <label for="filter_exam_name">
                                <?php echo e(__('exam')); ?>

                            </label>
                            <select name="filter_exam_name" id="filter_exam_name" class="form-control">
                                <option value="">All</option>
                                <?php $__currentLoopData = $exams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exam): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($exam->id); ?>"><?php echo e($exam->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="col">
                            <label for="filter_class_name">
                                <?php echo e(__('class')); ?>

                            </label>
                            <select name="filter_class_name" id="filter_class_name" class="form-control">
                                <option value="">All</option>
                                <?php $__currentLoopData = $class_name; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($class->id); ?>"><?php echo e($class->name.' - '.$class->medium->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <table aria-describedby="mydesc" class='table table-striped' id='table_list' data-toggle="table" data-url="<?php echo e(route('exam-timetable.show', 1)); ?>" data-click-to-select="true" data-side-pagination="server" data-pagination="true" data-page-list="[5, 10, 20, 50, 100, 200]" data-search="true" data-toolbar="#toolbar" data-show-columns="true" data-query-params="ExamClassQueryParams" data-show-refresh="true" data-fixed-columns="true" data-fixed-number="2" data-fixed-right-number="1" data-trim-on-search="false" data-mobile-responsive="true" data-sort-name="id" data-sort-order="desc" data-maintain-selected="true" data-export-types='["txt","excel"]' data-export-options='{ "fileName": "exam-timetable-list-<?= date(' d-m-y') ?>","ignoreColumn":["operate"]}' data-show-export="true" data-detail-formatter="examListFormatter">
                        <thead>
                            <tr>
                                <th scope="col" data-field="id" data-sortable="true" data-visible="false"> <?php echo e(__('id')); ?></th>
                                <th scope="col" data-field="no"><?php echo e(__('no.')); ?></th>
                                <th scope="col" data-field="exam_name" data-sortable="false"><?php echo e(__('exam')); ?> <?php echo e(__('name')); ?></th>
                                <th scope="col" data-field="class_name" data-sortable="false"><?php echo e(__('class')); ?> </th>
                                <th scope="col" data-field="timetable" data-formatter="examTimetableFormatter"><?php echo e(__('timetable')); ?> </th>
                                <th scope="col" data-field="session_year"><?php echo e(__('session_years')); ?></th>
                                <th scope="col" data-field="created_at" data-sortable="true" data-visible="false"><?php echo e(__('created_at')); ?></th>
                                <th scope="col" data-field="updated_at" data-sortable="true" data-visible="false"><?php echo e(__('updated_at')); ?></th>
                                <th scope="col" data-field="operate" data-events="examTimetableEvents"><?php echo e(__('action')); ?></th>
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
                            <?php echo e(__('edit') . ' ' . __('exam'). ' ' . __('timetable')); ?>

                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="edit_exam_timetable_tamplate" style="display:none">
                            <div class="row">
                                <input type="hidden" name="edit_timetable[0][timetable_id]" class="edit_timetable_id form-control" required>
                                <div class="form-group col-md-4">
                                    <label><?php echo e(__('subject')); ?> </label> <span class="text-danger">*</span></label>
                                    <select name="edit_timetable[0][subject_id]" class="form-control edit_exam_subjects_options" required></select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label><?php echo e(__('total_marks')); ?> <span class="text-danger">*</span></label>
                                    <input type="number" name="edit_timetable[0][total_marks]" class="edit_total_marks form-control" placeholder="<?php echo e(__('total_marks')); ?>" min="1" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label><?php echo e(__('passing_marks')); ?> <span class="text-danger">*</span></label>
                                    <input type="number" name="edit_timetable[0][passing_marks]" class="edit_passing_marks form-control" placeholder="<?php echo e(__('passing_marks')); ?>" min="1" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label><?php echo e(__('start_time')); ?> <span class="text-danger">*</span></label>
                                    <input type="time" name="edit_timetable[0][start_time]" class="edit_start_time form-control" placeholder="<?php echo e(__('start_time')); ?>" autocomplete="off" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label><?php echo e(__('end_time')); ?> <span class="text-danger">*</span></label>
                                    <input type="time" name="edit_timetable[0][end_time]" class="edit_end_time form-control" placeholder="<?php echo e(__('end_time')); ?>" autocomplete="off" required>
                                </div>
                                <div class="form-group col-md-3">
                                    <label><?php echo e(__('date')); ?> <span class="text-danger">*</span></label>
                                    <input type="text" name="edit_timetable[0][date]" class="datepicker-popup edit_date form-control" placeholder="<?php echo e(__('date')); ?>" autocomplete="off" required>
                                </div>
                                <div class="form-group col-md-1 pl-0 mt-4">
                                    <button type="button" class="btn btn-inverse-danger btn-icon remove-edit-exam-timetable-content">
                                        <i class="fa fa-times"></i></button>
                                </div>
                                <div class="col-12">
                                    <hr>
                                </div>
                            </div>
                        </div>
                        <form class="pt-3 edit-form-timetable" action="<?php echo e(url('exams/update-timetable')); ?>" novalidate="novalidate">
                            <input type="hidden" name="exam_id" class="edit_timetable_exam_id form-control" required>
                            <input type="hidden" name="class_id" class="edit_timetable_class_id form-control" required>
                            <input type="hidden" name="session_year_id" class="edit_timetable_session_year_id form-control" required>

                            <div class="edit-timetable-container"></div>
                            <div class="col-md-4 pl-0 mb-4">
                                <button type="button" class="btn btn-inverse-success add-new-timetable-data" title="Add new row">
                                    Add New Data
                                </button>
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocss\htdocs\eschool204\resources\views/exams/exam-timetable.blade.php ENDPATH**/ ?>