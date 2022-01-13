<li class="treeview">
    <a href="/home">
        <i class="fa fa-dashboard"></i>
        <span>Dashboard</span>
    </a>
</li>
<li class="treeview">
    <a href="/academics">
        <i class="fa fa-dashboard"></i>
        <span>Academics</span>
        <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
        <li>
            <a  href="{{ route('courses') }}">
                <i class="fa fa-book"></i>
                <span>Courses</span>
            </a>
        </li>
        <li>
            <a  href="{{ route('departments') }}">
                <i class="fa fa-building-o"></i>
                <span>Departments</span>
            </a>
        </li>
        <li>
            <a  href="{{ route('batches') }}">
                <i class="fa fa-sitemap"></i>
                <span>Batches</span>
            </a>
        </li>
    </ul>
</li>
<li class="treeview">
    <a href="{{ route('students') }}">
        <i class="fa fa-users"></i>
        <span>Students</span>
    </a>
</li>
{{-- <li class="treeview">
    <a href="/teachers">
        <i class="fa fa-users"></i>
        <span>Teachers</span>
    </a>
</li> --}}
<li class="treeview">
    <a href="/examinations">
        <i class="fa fa-pencil"></i>
        <span>Exams</span>
        <i class="fa fa-angle-left pull-right"></i>
    </a>
    <ul class="treeview-menu">
        <li>
            <a  href="{{ route('exams') }}">
                <i class="fa fa-pencil"></i>
                <span>Exams</span>
            </a>
        </li>
        <li>
            <a  href="{{ route('marks') }}">
                <i class="fa fa-pencil-square-o"></i>
                <span>Marks Input</span>
            </a>
        </li>
        <li>
            <a  href="{{ route('grades') }}">
                <i class="fa fa-signal"></i>
                <span>Grades</span>
            </a>
        </li>
        <li>
            <a  href="{{ route('grade.categories') }}">
                <i class="fa fa-signal"></i>
                <span>Grade Categories</span>
            </a>
        </li>
        <li>
            <a  href="{{ route('mds') }}">
                <i class="fa fa-pencil-square-o"></i>
                <span>Mark Distributions</span>
            </a>
        </li>
    </ul>
</li>
<li class="treeview">
    <a href="/results">
        <i class="fa fa-graduation-cap"></i>
        <span>Results</span>
    </a>
</li>
