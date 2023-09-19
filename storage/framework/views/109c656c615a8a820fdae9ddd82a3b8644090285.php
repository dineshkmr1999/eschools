<script src="<?php echo e(asset('/assets/js/vendor.bundle.base.js')); ?>"></script>
<script src="<?php echo e(asset('/assets/js/Chart.min.js')); ?>"></script>
<script src="<?php echo e(asset('/assets/js/jquery.validate.min.js')); ?>"></script>
<script src="<?php echo e(asset('/assets/jquery-toast-plugin/jquery.toast.min.js')); ?>"></script>
<script src="<?php echo e(asset('/assets/select2/select2.min.js')); ?>"></script>

<script src="<?php echo e(asset('/assets/js/off-canvas.js')); ?>"></script>
<script src="<?php echo e(asset('/assets/js/hoverable-collapse.js')); ?>"></script>
<script src="<?php echo e(asset('/assets/js/misc.js')); ?>"></script>
<script src="<?php echo e(asset('/assets/js/settings.js')); ?>"></script>
<script src="<?php echo e(asset('/assets/js/todolist.js')); ?>"></script>
<script src="<?php echo e(asset('/assets/js/ekko-lightbox.min.js')); ?>"></script>


<script src="<?php echo e(asset('/assets/bootstrap-table/bootstrap-table.min.js')); ?>"></script>
<script src="<?php echo e(asset('/assets/bootstrap-table/bootstrap-table-mobile.js')); ?>"></script>
<script src="<?php echo e(asset('/assets/bootstrap-table/bootstrap-table-export.min.js')); ?>"></script>
<script src="<?php echo e(asset('/assets/bootstrap-table/fixed-columns.min.js')); ?>"></script>
<script src="<?php echo e(asset('/assets/bootstrap-table/tableExport.min.js')); ?>"></script>
<script src="<?php echo e(asset('/assets/bootstrap-table/jspdf.min.js')); ?>"></script>
<script src="<?php echo e(asset('/assets/bootstrap-table/jspdf.plugin.autotable.js')); ?>"></script>


<script src="<?php echo e(asset('/assets/js/jquery.cookie.js')); ?>"></script>
<script src="<?php echo e(asset('/assets/js/sweetalert2.all.min.js')); ?>"></script>
<script src="<?php echo e(asset('/assets/js/datepicker.min.js')); ?>"></script>
<script src="<?php echo e(asset('/assets/js/jquery.repeater.js')); ?>"></script>
<script src="<?php echo e(asset('/assets/tinymce/tinymce.min.js')); ?>" async></script>

<script src="<?php echo e(asset('/assets/color-picker/jquery-asColor.min.js')); ?>"></script>
<script src="<?php echo e(asset('/assets/color-picker/color.min.js')); ?>"></script>

<script src="<?php echo e(asset('/assets/js/custom/validate.js')); ?>"></script>
<script src="<?php echo e(asset('/assets/js/jquery-additional-methods.min.js')); ?>"></script>
<script src="<?php echo e(asset('/assets/js/custom/function.js')); ?>"></script>
<script src="<?php echo e(asset('/assets/js/custom/custom.js')); ?>"></script>
<script src="<?php echo e(asset('/assets/js/custom/custom-bootstrap-table.js')); ?>"></script>

<script src="<?php echo e(asset('/assets/ckeditor-4/ckeditor.js')); ?>"></script>
<script src="<?php echo e(asset('/assets/ckeditor-4/adapters/jquery.js')); ?>" async ></script>

<?php if($errors->any()): ?>
    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <script type='text/javascript'>
            $.toast({
                text: '<?php echo e($error); ?>',
                showHideTransition: 'slide',
                icon: 'error',
                loaderBg: '#f2a654',
                position: 'top-right'
            });
        </script>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>

<?php if(Session::has('success')): ?>
    <script>
        $.toast({
            text: '<?php echo e(Session::get('success')); ?>',
            showHideTransition: 'slide',
            icon: 'success',
            loaderBg: '#f96868',
            position: 'top-right'
        });
    </script>
<?php endif; ?>

<script>
    $(document).on('click', '.deletedata', function() {
        Swal.fire({
            title: "<?php echo e(__('delete_title')); ?>",
            text: "<?php echo e(__('confirm_message')); ?>",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: "<?php echo e(__('yes_delete')); ?>"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: $(this).attr('data-url'),
                    type: "DELETE",
                    success: function(response) {
                        if (response['error'] == false) {
                            showSuccessToast(response['message']);
                            $('#table_list').bootstrapTable('refresh');
                        } else {
                            showErrorToast(response['message']);
                        }
                    }
                });
            }
        })
    });
</script>
<script>
    const lang_no = "<?php echo e(__('no')); ?>"
    const lang_yes = "<?php echo e(__('yes')); ?>"
    const lang_cannot_delete_beacuse_data_is_associated_with_other_data = "<?php echo e(__('cannot_delete_beacuse_data_is_associated_with_other_data')); ?>"
    const lang_delete_title = "<?php echo e(__('delete_title')); ?>"
    const lang_delete_warning = "<?php echo e(__('delete_warning')); ?>"
    const lang_yes_delete = "<?php echo e(__('yes_delete')); ?>"
    const lang_cancel = "<?php echo e(__('cancel')); ?>"
    const lang_no_data_found = "<?php echo e(__('no_data_found')); ?>"
    const lang_cash = "<?php echo e(__('cash')); ?>"
    const lang_cheque = "<?php echo e(__('cheque')); ?>"
    const lang_online = "<?php echo e(__('online')); ?>"
    const lang_success = "<?php echo e(__('success')); ?>"
    const lang_failed = "<?php echo e(__('failed')); ?>"
    const lang_pending = "<?php echo e(__('pending')); ?>"
    const lang_select_subject = "<?php echo e(__('select_subject')); ?>"
    const lang_option = "<?php echo e(__('option')); ?>"
    const lang_simple_question = "<?php echo e(__('simple_question')); ?>"
    const lang_equation_based = "<?php echo e(__('equation_based')); ?>"
    const lang_select_option = "<?php echo e(__('select') .' '. __('option')); ?>"
    const lang_enter_option = "<?php echo e(__('enter').' '.__('option')); ?>"
    const lang_add_new_question = "<?php echo e(__('add_new_question')); ?>";
    const lang_yes_change_it = "<?php echo e(__('yes_change_it')); ?>"
    const lang_yes_uncheck = "<?php echo e(__('yes_unckeck')); ?>";
</script>
<?php /**PATH C:\xampp\htdocss\htdocs\eschool204\resources\views/layouts/footer_js.blade.php ENDPATH**/ ?>