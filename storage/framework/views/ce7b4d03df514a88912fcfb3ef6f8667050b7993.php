<?php $__env->startSection('title'); ?>
    <?php echo e(__('announcement')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <?php echo e(__('manage') . ' ' . __('announcement')); ?>

            </h3>
        </div>

        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">
                            <?php echo e(__('create') . ' ' . __('announcement')); ?>

                        </h4>
                        <form class="create-form pt-3" action="<?php echo e(url('announcement')); ?>" id="formdata" method="POST" novalidate="novalidate">
                            <?php echo csrf_field(); ?>
                            <div class="row">
                                <div class="form-group col-sm-12 col-md-6">
                                    <label><?php echo e(__('title')); ?> <span class="text-danger">*</span></label>
                                    <?php echo Form::text('title', null, ['required', 'placeholder' => __('title'), 'class' => 'form-control']); ?>

                                </div>
                                <div class="form-group col-sm-12 col-md-6">
                                    <label><?php echo e(__('description')); ?></label>
                                    <?php echo Form::textarea('description', null, ['rows' => '2', 'placeholder' => __('description'), 'class' => 'form-control']); ?>

                                </div>
                                <div class="form-group col-sm-12 col-md-4">
                                    <label><?php echo e(__('files')); ?> </label>
                                    <input type="file" name="file[]" class="form-control" multiple/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-12 col-md-3">
                                    <label><?php echo e(__('assign_to')); ?></label>
                                    <select name="set_data" id="set_data" class="form-control select2">
                                        <option value=""><?php echo e(__('select') . ' ' . __('assign_to')); ?></option>
                                        <?php if(Auth::user()->hasRole('Teacher')): ?>
                                            <option value="class_section"><?php echo e(__('class') . ' ' . __('section')); ?></option>
                                        <?php else: ?>
                                            
                                            <option value="general"><?php echo e(__('noticeboard')); ?></option>
                                        <?php endif; ?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-12 col-md-3 show_class_section_id">
                                    <label>&nbsp;</label>
                                    <select name="class_section_id" id="class_section_id" class="class_section_id form-control" style="width:100%;" tabindex="-1" aria-hidden="true">
                                        <option value=""><?php echo e(__('select') . ' ' . __('class_section')); ?></option>
                                        <?php $__currentLoopData = $class_section; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($item->id); ?>" data-class="<?php echo e($item->class->id); ?>"><?php echo e($item->class->name . ' ' . $item->section->name.' - '.$item->class->medium->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="form-group col-sm-12 col-md-3 show_class_section_id">
                                    <label>&nbsp;</label>
                                    <select name="get_data[]" id="get_data" class="subject_id form-control" style="width:100%; display: none"></select>
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
                            <?php echo e(__('list') . ' ' . __('announcement')); ?>

                        </h4>
                        <div class="row">
                            <div class="col-12">
                                <table aria-describedby="mydesc" class='table' id='table_list' data-toggle="table"
                                       data-url="<?php echo e(url('announcement-list')); ?>" data-click-to-select="true"
                                       data-side-pagination="server" data-pagination="true"
                                       data-page-list="[5, 10, 20, 50, 100, 200]" data-search="true"
                                       data-toolbar="#toolbar" data-show-columns="true" data-show-refresh="true"
                                       data-fixed-columns="true" data-fixed-number="2" data-fixed-right-number="1"
                                       data-trim-on-search="false" data-mobile-responsive="true" data-sort-name="id"
                                       data-sort-order="desc" data-maintain-selected="true"
                                       data-export-types='["txt","excel"]'
                                       data-export-options='{ "fileName": "announcement-list-<?= date('d-m-y') ?>" ,"ignoreColumn": ["operate"]}'
                                       data-query-params="queryParams">
                                    <thead>
                                    <tr>
                                        <th scope="col" data-field="id" data-sortable="true" data-visible="false"><?php echo e(__('id')); ?></th>
                                        <th scope="col" data-field="no" data-sortable="false"><?php echo e(__('no.')); ?></th>
                                        <th scope="col" data-field="title" data-sortable="false"><?php echo e(__('title')); ?></th>
                                        <th scope="col" data-field="description" data-sortable="false"><?php echo e(__('description')); ?></th>
                                        <th scope="col" data-field="assignto" data-sortable="false"><?php echo e(__('assign_to')); ?></th>
                                        <th scope="col" data-field="file" data-sortable="false" data-formatter="fileFormatter"><?php echo e(__('files')); ?></th>
                                        <th data-events="announcementEvents" data-width="150" scope="col" data-field="operate" data-sortable="false"><?php echo e(__('action')); ?></th>
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


    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> <?php echo e(__('edit') . ' ' . __('announcement')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fa fa-close"></i></span>
                    </button>
                </div>
                <form id="formdata" class="editform" action="<?php echo e(url('announcement')); ?>" novalidate="novalidate">
                    <?php echo csrf_field(); ?>
                    <div class="modal-body">
                        <input type="hidden" name="id" id="id">
                        <div class="row">
                            <div class="form-group col-sm-12 col-md-12">
                                <label><?php echo e(__('title')); ?> <span class="text-danger">*</span></label>
                                <?php echo Form::text('title', null, ['required', 'placeholder' => __('title'), 'class' => 'form-control', 'id' => 'title']); ?>

                            </div>
                            <div class="form-group col-sm-12 col-md-12">
                                <label><?php echo e(__('description')); ?></label>
                                <?php echo Form::textarea('description', null, ['rows' => 2, 'placeholder' => __('description'), 'class' => 'form-control', 'id' => 'description']); ?>

                            </div>
                            <div class="form-group col-sm-12 col-md-12">
                                <label><?php echo e(__('assign_to')); ?> <span class="text-danger">*</span></label>
                                <select name="set_data" id="edit_set_data" class="form-control">
                                    <option value=""><?php echo e(__('select') . ' ' . __('assign_to')); ?></option>
                                    <?php if(Auth::user()->hasRole('Teacher')): ?>
                                    <option value="class_section"><?php echo e(__('class') . ' ' . __('section')); ?></option>
                                    <?php else: ?>
                                    
                                    <option value="general"><?php echo e(__('general')); ?></option>
                                    <?php endif; ?>
                                </select>
                            </div>
                            <div class="form-group col-sm-12 col-md-12 edit_show_class_section_id">
                                <label>&nbsp;</label>
                                <select name="class_section_id" id="edit_class_section_id" class="form-control js-example-basic-single select2-hidden-accessible" style="width:100%;" tabindex="-1" aria-hidden="true">
                                    <option value=""><?php echo e(__('select') . ' ' . __('class_section')); ?></option>
                                    <?php $__currentLoopData = $class_section; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($item->id); ?>" data-class="<?php echo e($item->class->id); ?>"><?php echo e($item->class->name . ' ' . $item->section->name. ' - ' .$item->class->medium->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <br>
                                <br>
                                <div class="form-group">
                                    <label><?php echo e(__('old_files')); ?> </label>
                                    <div id="old_files"></div>
                                </div>

                                <div class="form-group">
                                    <label><?php echo e(__('upload_new_files')); ?> </label>
                                    <input type="file" name="file[]" class="form-control" multiple/>
                                </div>
                            </div>
                            <div class="form-group col-sm-12 col-md-12 edit_show_class_section_id">
                                <label>&nbsp;</label>
                                <select name="get_data" id="edit_get_data" class="form-control" style="width:100%;" tabindex="-1" aria-hidden="true"></select>
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

<?php $__env->startSection('js'); ?>
    <script>
        $('.show_class_section_id').hide();

        $('#set_data').on('change', function () {
            data = $(this).val();
            if (data == 'class_section') {
                $('.show_class_section_id').show();
                $('#get_data').show();
            } else {
                $('.show_class_section_id').hide();
                $('#get_data').hide();
            }
            $.ajax({
                url: "<?php echo e(url('getAssignData')); ?>",
                type: "GET",
                data: {
                    data: data
                },
                success: function (response) {
                    html = '';
                    if (data == 'class') {
                        for (let i = 0; i < response.length; i++) {
                            html += '<option value=' + response[i]['id'] + '>' + response[i]['name'] +
                                '</option>';
                        }
                    }
                    $('#get_data').html(html);
                }
            });
        });


        
        
        

        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
    </script>

    <script>
        $('.edit_show_class_section_id').hide();
        $('#edit_set_data').on('change', function (e, type_id) {
            data = $(this).val();
            if (data == 'class_section') {
                $('.edit_show_class_section_id').show();
            } else {
                $('.edit_show_class_section_id').hide();
            }
            $.ajax({
                url: "<?php echo e(url('getAssignData')); ?>",
                type: "GET",
                data: {
                    data: data
                },
                success: function (response) {
                    html = '';
                    if (data == 'class') {
                        for (let i = 0; i < response.length; i++) {
                            var chk = (response[i]['id'] == type_id) ? 'selected' : '';
                            html += '<option value=' + response[i]['id'] + '' + chk + '>' + response[i][
                                    'name'
                                    ] +
                                '</option>';
                        }
                    }
                    $('#edit_get_data').html(html);
                }
            });
        });


        $('#edit_class_section_id').on('change', function (e, subjectid) {
            data = $('#edit_set_data').val();
            class_id = $('#edit_class_section_id').find(':selected').attr('data-class');

            $.ajax({
                url: "<?php echo e(url('getAssignData')); ?>",
                type: "GET",
                data: {
                    data: data,
                    class_id: class_id
                },
                success: function (response) {
                    html = '';
                    if (response != '') {
                        html += '<option value="">Select Subject</option>';
                        for (let i = 0; i < response.length; i++) {
                            var chk = (response[i]['subject']['id'] == subjectid) ? 'selected' : '';
                            html += '<option value=' + response[i]['subject']['id'] + ' ' + chk + '>' +
                                response[i]['subject']['name'] + '</option>';

                        }
                    }
                    $('#edit_get_data').html(html);
                }
            });
        });
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocss\htdocs\eschool204\resources\views/announcement/index.blade.php ENDPATH**/ ?>