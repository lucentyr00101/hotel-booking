<nav id="menu" class="sidebar" style="oveflow-y: auto;">
    <ul>
        <li>
            <a href="{{ url('/') }}" class="">Dashboard</a>
        </li>
        <li>
            <a href="#"><i class="fas fa-user"></i> Customers<i class="fa fa-caret-down"></i></a>
            <ul>
                <li><a href="{{ route('customers.index') }}">Customer Master List <i class="fas fa-users float-right"></i></a></li>
                <li><a href="{{ route('customers.create') }}">Register New Customer <i class="fas fa-user-plus float-right"></i></a></li>
            </ul>
        </li>
        <li><a href="{{ route('rooms.index') }}"><i class="fas fa-credit-card"></i> Room List</a></li>
        <li><a href="{{ route('check-out.list') }}"><i class="fas fa-credit-card"></i> Check Out</a></li>
    </ul>
</nav>