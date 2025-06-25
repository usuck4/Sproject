<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ route('dashboard') }}">
            <i class="fas fa-chess-rook me-2"></i>
            Club Management System
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" 
                       href="{{ route('dashboard') }}">
                       <i class="fas fa-home me-1"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('categories.index') ? 'active' : '' }}" 
                       href="{{ route('categories.index') }}">
                       <i class="fas fa-list me-1"></i> Categories
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('profile.show') ? 'active' : '' }}" 
                       href="{{ route('profile.show') }}">
                       <i class="fas fa-user me-1"></i> Profile
                    </a>
                </li>
            </ul>
            <div class="d-flex">
                <div class="dropdown">
                    <button class="btn btn-outline-light dropdown-toggle" type="button" 
                            id="userMenu" data-bs-toggle="dropdown">
                        <i class="fas fa-user-circle me-1"></i> {{ Auth::user()->name }}
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="{{ route('profile.show') }}">
                            <i class="fas fa-user me-2"></i> Profile</a></li>
                        <li><a class="dropdown-item" href="#">
                            <i class="fas fa-cog me-2"></i> Settings</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger">
                                    <i class="fas fa-sign-out-alt me-2"></i> Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>