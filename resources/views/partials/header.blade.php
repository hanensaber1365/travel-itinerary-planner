<!-- resources/views/partials/header.blade.php -->
<header class="topbar d-flex align-items-center justify-content-between px-4 py-4">

    <div>
        <h1 class="h4 fw-semibold text-dark mb-1">
            Welcome back, {{ $user->name }}! ✈️ 👋
        </h1>
        <p class="text-muted mb-0" style="font-size: 14px;">Let's make your next trip amazing</p>
    </div>

    <div class="d-flex align-items-center gap-4">
        {{-- Profile dropdown --}}
        <div class="dropdown">
            
            <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="#"><i class="bi bi-person me-2"></i>Profile</a></li>
                <li><a class="dropdown-item" href="#"><i class="bi bi-gear me-2"></i>Settings</a></li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <form method="POST" action="/logout">
                        @csrf
                        <button type="submit" class="dropdown-item text-danger">
                            <i class="bi bi-box-arrow-right me-2"></i>Logout
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</header>