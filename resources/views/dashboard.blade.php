
@can('user')
    @include('course.keep_course')
@elsecan('admin')
    @include('user.keep_user')
@endcan         
            

