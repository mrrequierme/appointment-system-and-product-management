<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-primary sidebar collapse">
    <div class="my-3 text-center text-white row py-2">
        <i class="fa-solid fa-circle-user col-lg-12"></i>
        <span class="col-lg-12 text-capitalize">
            @if (Auth::user()->role === 'admin' || Auth::user()->role === 'staff')
                Hello! {{ Auth::user()->role }} {{ Auth::user()->name }}
            @else
                Hello {{ Auth::user()->name }}
            @endif
        </span>
    </div>

    @if (Auth::user()->role == 'admin' || Auth::user()->role == 'staff')
        <ul class="nav flex-column mt-5 navcont">
            <li class="nav-item">
                <a href="{{ route('admin.record.index') }}"
                   class="nav-link mb-3 {{ request()->routeIs('admin.record.index') ? 'bg-white text-primary' : 'text-white' }}">
                    <i class="fa-solid fa-clipboard ps-lg-5"></i> <span> Records </span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.appointments.index') }}"
                   class="nav-link mb-3 {{ request()->routeIs('admin.appointments.index') ? 'bg-white text-primary' : 'text-white' }}">
                    <i class="fa-regular fa-calendar-check ps-lg-5"></i> <span> Appointment </span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.services.index') }}"
                   class="nav-link mb-3 {{ request()->routeIs('admin.services.index') ? 'bg-white text-primary' : 'text-white' }}">
                    <i class="fa-solid fa-bars ps-lg-5"></i> <span> Services </span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.products.index') }}"
                   class="nav-link mb-3 {{ request()->routeIs('admin.products.index') || request()->routeIs('admin.products.edit') || request()->routeIs('admin.products.create') ? 'bg-white text-primary' : 'text-white' }}">
                    <i class="fa-solid fa-cart-shopping ps-lg-5"></i> <span> Product </span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.user.index') }}"
                   class="nav-link mb-3 {{ request()->routeIs('admin.user.index') || request()->routeIs('admin.user.create') ? 'bg-white text-primary' : 'text-white' }}">
                    <i class="fa-solid fa-user-plus ps-lg-5"></i> <span> Users </span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.history.index') }}"
                   class="nav-link mb-3 {{ request()->routeIs('admin.history.index') ? 'bg-white text-primary' : 'text-white' }}">
                    <i class="fa-solid fa-clock-rotate-left ps-lg-5"></i> <span> History </span>
                </a>
            </li>
        </ul>
    @endif

    @if (Auth::user()->role == 'user')
        <ul class="nav flex-column mt-5 navcont">
            <li class="nav-item">
                <a href="{{ route('user.pets.create') }}"
                   class="nav-link mb-3 {{ request()->routeIs('user.pets.create') ? 'bg-white text-primary' : 'text-white' }}">
                    <i class="fa-solid fa-plus ps-lg-5"></i> <span> Add Pet </span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('user.pets.index') }}"
                   class="nav-link mb-3 {{ request()->routeIs('user.pets.index') || request()->routeIs('user.pets.edit') ? 'bg-white text-primary' : 'text-white' }}">
                    <i class="fa-solid fa-eye ps-lg-5"></i> <span> View Pet </span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('user.appointments.index') }}"
                   class="nav-link mb-3 {{ request()->routeIs('user.appointments.index') ? 'bg-white text-primary' : 'text-white' }}">
                    <i class="fa-regular fa-calendar-check ps-lg-5"></i> <span> Appointment </span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('user.appointments.show') }}"
                   class="nav-link mb-3 {{ request()->routeIs('user.appointments.show') ? 'bg-white text-primary' : 'text-white' }}">
                    <i class="fa-solid fa-calendar-days ps-lg-5"></i> <span> Schedule </span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('user.product.index')}}"
                   class="nav-link mb-3 {{request()->routeIs('user.product.index') ? 'bg-white text-primary' : 'text-white'}}">
                    <i class="fa-solid fa-cart-shopping ps-lg-5"></i> <span> Product </span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('user.services.index')}}"
                   class="nav-link mb-3 {{request()->routeIs('user.services.index') ? 'bg-white text-primary' : 'text-white'}}">
                    <i class="fa-solid fa-bars ps-lg-5"></i> <span> Services </span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('user.history.index')}}"
                   class="nav-link mb-3 {{request()->routeIs('user.history.index') ? 'bg-white text-primary' : 'text-white'}}">
                    <i class="fa-solid fa-clock-rotate-left ps-lg-5"></i> <span> Records </span>
                </a>
            </li>
        </ul>
    @endif

    <form action="{{ route('logout') }}" method="post" class="mt-5 text-center">
        @csrf
        <button type="submit" class="btn btn-danger btn-sm">
            <i class="fa-solid fa-arrow-right-from-bracket"></i>
            <span> Logout </span>
        </button>
    </form>
</nav>
