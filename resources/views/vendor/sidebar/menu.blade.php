<ul class="sidebar-menu">
    @foreach($groups as $group)
        {!! $group !!}
    @endforeach
<li><a href="{{ route('admincourses.index') }}"><i class="fa fa-book"></i>Courses</a></li>
<li><a href="{{ route('adminservices.index') }}"><i class="fa fa-server"></i>Services</a></li>

</ul>
