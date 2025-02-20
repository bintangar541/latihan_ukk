<div class="sidebar">
    <div>
        <a href="{{ route('dashboard') }}" class="d-flex align-items-center mb-3 text-white text-decoration-none">
            <i class="fa fa-cash-register fa-2x me-2"></i>
            <span class="fs-5 fw-bold">Kasir App</span>
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}">
                    <i class="fa fa-home me-2"></i> Dashboard
                </a>
            </li>
            <li>
                <a href="{{ route('products.index') }}" class="nav-link {{ request()->is('products*') ? 'active' : '' }}">
                    <i class="fa fa-box me-2"></i> Produk
                </a>
            </li>
            <li>
                <a href="{{ route('purchase.index') }}" class="nav-link {{ request()->is('purchase*') ? 'active' : '' }}">
                    <i class="fa fa-shopping-cart me-2"></i> Pembelian
                </a>
            </li>

            <!-- Hanya Admin yang Bisa Melihat Menu User -->
            @if(auth()->user()->role === 'admin')
                <li>
                    <a href="{{ route('users.index') }}" class="nav-link {{ request()->is('users*') ? 'active' : '' }}">
                        <i class="fa fa-users me-2"></i> User
                    </a>
                </li>
            @endif
        </ul>
    </div>

    <hr>

    <!-- Logout di Sidebar -->
    <div class="text-center">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger w-100">
                <i class="fa fa-sign-out-alt me-2"></i> Logout
            </button>
        </form>
    </div>
</div>
