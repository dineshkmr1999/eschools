<!-- partial:../../partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        {{-- dashboard --}}
        <li class="nav-item">
            <a href="{{ url('/super-admin') }}" class="nav-link"> <span class="menu-title">{{ __('dashboard') }}</span> <i class="fa fa-home menu-icon"></i> </a>
        </li>

        @hasrole('Super Admin')
        {{-- academics --}}
        @canany(['medium-create','section-create','subject-create','class-create','subject-create','class-teacher-create','subject-teacher-list','subject-teachers-create','assign-class-to-new-student','promote-student-create'])
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#academics-menu" aria-expanded="false" aria-controls="academics-menu"> <span class="menu-title">{{ __('academics') }}</span> <i class="fa fa-university menu-icon"></i> </a>
                <div class="collapse" id="academics-menu">
                    <ul class="nav flex-column sub-menu">
                        @can('medium-create')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('medium.index') }}"> {{ __('medium') }} </a>
                            </li>
                        @endcan

                        @can('section-create')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('section.index') }}"> {{ __('section') }} </a>
                            </li>
                        @endcan

                        @can('subject-create')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('subject.index') }}"> {{ __('subject') }} </a>
                            </li>
                        @endcan

                        @can('class-create')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('class.index') }}"> {{ __('class') }} </a>
                            </li>
                        @endcan

                        @can('subject-create')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('class.subject') }}">{{ __('assign_class_subject') }} </a>
                            </li>
                        @endcan
                        @can('class-teacher-create')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('class.teacher') }}">
                                    {{ __('assign_class_teacher') }}
                                </a>
                            </li>
                        @endcan

                        @canany(['subject-teacher-list','subject-teacher-create','subject-teacher-edit','subject-teacher-delete'])
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('subject-teachers.index') }}">
                                    {{ __('assign') . ' ' . __('subject') . ' ' . __('teacher') }}
                                </a>
                            </li>
                        @endcan
                        @can('assign-class-to-new-student')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('students.assign-class') }}">
                                    {{ __('assign_new_student_class') }}
                                </a>
                            </li>
                        @endcan
                        @can('promote-student-create')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('promote-student.index') }}">
                                    {{ __('promote_student') }}
                                </a>
                            </li>
                        @endcan
                    </ul>
                </div>
            </li>
        @endcanany
        @endrole


        {{-- student --}}
        @can('teacher-create')
     
            <li class="nav-item">
                <a href="{{ route('students.create-bulk-data')}}" class="nav-link"> <span class="menu-title">{{ __('Student bulk update ') }}</span>  <i class="fa fa-graduation-cap menu-icon"></i> </a> </a>
            </li>
        @endcan
        {{-- teacher --}}
        @can('teacher-create')
            <li class="nav-item">
                <a href="{{ route('teacher.create-bulk-data') }}" class="nav-link"> <span class="menu-title">{{ __('Teacher') }}</span> <i class="fa fa-user menu-icon"></i> </a>
            </li>
        @endcan
        {{-- fees --}}
        @can('teacher-create')
            <li class="nav-item">
            <a  href="{{  route('fees-type.create-bulk-data') }}" class="nav-link"> <span class="menu-title">{{__('Fees type')}} {{ __('bulk data') }} {{__('')}} </span>      <i class="fa fa-dollar menu-icon"></i>  </a>
         </li>
        @endcan


        <!-- {{-- parents --}}
        @can('parents-create')
            <li class="nav-item">
                <a href="{{ route('parents.index') }}" class="nav-link"> <span class="menu-title">{{ __('parents') }}</span> <i class="fa fa-users menu-icon"></i> </a>
            </li>
        @endcan -->

             
    </ul>
</nav>
