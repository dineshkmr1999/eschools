<!-- partial:../../partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        
        <li class="nav-item">
            <a href="<?php echo e(url('/super-admin')); ?>" class="nav-link"> <span class="menu-title"><?php echo e(__('dashboard')); ?></span> <i
                    class="fa fa-home menu-icon"></i> </a>
        </li>

        <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'Super Admin')): ?>
            
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['medium-create', 'section-create', 'subject-create', 'class-create', 'subject-create',
                'class-teacher-create', 'subject-teacher-list', 'subject-teachers-create', 'assign-class-to-new-student',
                'promote-student-create'])): ?>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#academics-menu" aria-expanded="false"
                        aria-controls="academics-menu"> <span class="menu-title"><?php echo e(__('academics')); ?></span> <i
                            class="fa fa-university menu-icon"></i> </a>
                    <div class="collapse" id="academics-menu">
                        <ul class="nav flex-column sub-menu">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('medium-create')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('medium.index')); ?>"> <?php echo e(__('medium')); ?> </a>
                                </li>
                            <?php endif; ?>

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('section-create')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('section.index')); ?>"> <?php echo e(__('section')); ?> </a>
                                </li>
                            <?php endif; ?>

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('subject-create')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('subject.index')); ?>"> <?php echo e(__('subject')); ?> </a>
                                </li>
                            <?php endif; ?>

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('class-create')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('class.index')); ?>"> <?php echo e(__('class')); ?> </a>
                                </li>
                            <?php endif; ?>

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('subject-create')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('class.subject')); ?>"><?php echo e(__('assign_class_subject')); ?> </a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('class-teacher-create')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('class.teacher')); ?>">
                                        <?php echo e(__('assign_class_teacher')); ?>

                                    </a>
                                </li>
                            <?php endif; ?>

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->any(['subject-teacher-list', 'subject-teacher-create', 'subject-teacher-edit',
                                'subject-teacher-delete'])): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('subject-teachers.index')); ?>">
                                        <?php echo e(__('assign') . ' ' . __('subject') . ' ' . __('teacher')); ?>

                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('assign-class-to-new-student')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('students.assign-class')); ?>">
                                        <?php echo e(__('assign_new_student_class')); ?>

                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('promote-student-create')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('promote-student.index')); ?>">
                                        <?php echo e(__('promote_student')); ?>

                                    </a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </li>
            <?php endif; ?>
        <?php endif; ?>


        
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('teacher-create')): ?>
            <li class="nav-item">
                <a href="<?php echo e(route('students.create-bulk-data')); ?>" class="nav-link"> <span
                        class="menu-title"><?php echo e(__('Student bulk update ')); ?></span> <i
                        class="fa fa-graduation-cap menu-icon"></i> </a> </a>
            </li>
        <?php endif; ?>
        
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('teacher-create')): ?>
            <li class="nav-item">
                <a href="<?php echo e(route('teacher.create-bulk-data')); ?>" class="nav-link"> <span
                        class="menu-title"><?php echo e(__('Teacher')); ?></span> <i class="fa fa-user menu-icon"></i> </a>
            </li>
        <?php endif; ?>
        
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('teacher-create')): ?>
            <li class="nav-item">
                <a href="<?php echo e(route('fees-type.create-bulk-data')); ?>" class="nav-link"> <span
                        class="menu-title"><?php echo e(__('Fees type')); ?> <?php echo e(__('bulk data')); ?> <?php echo e(__('')); ?> </span> <i
                        class="fa fa-dollar menu-icon"></i> </a>
            </li>
        <?php endif; ?>
        
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('school-create')): ?>
            <li class="nav-item">
                <a href="<?php echo e(url('schools')); ?>" class="nav-link"> <span
                        class="menu-title"><?php echo e(__('Manage')); ?> <?php echo e(__('Schools')); ?> <?php echo e(__('')); ?> </span> <i
                        class="fa fa-building-o menu-icon"></i> </a>
            </li>
        <?php endif; ?>


        <!-- 
        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('parents-create')): ?>
    <li class="nav-item">
                    <a href="<?php echo e(route('parents.index')); ?>" class="nav-link"> <span class="menu-title"><?php echo e(__('parents')); ?></span> <i class="fa fa-users menu-icon"></i> </a>
                </li>
<?php endif; ?> -->


    </ul>
</nav>
<?php /**PATH C:\xampp\htdocss\htdocs\eschool204\resources\views/layouts/super_admin.blade.php ENDPATH**/ ?>