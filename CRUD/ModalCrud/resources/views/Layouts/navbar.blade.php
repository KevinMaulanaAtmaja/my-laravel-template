<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
    <button class="btn navbar-toggler-icon ms-5 p-3" type="button" data-bs-toggle="offcanvas"
        data-bs-target="#offcanvas" aria-controls="offcanvas">
    </button>
    <div class="container">
        <a class="navbar-brand" href="{{ route('dashboard') }}">
            <img src="{{ asset('img/ohto-title.png') }}" alt="Logo" width="30" class="d-inline-block align-text-top">
            Template
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            {{-- navbar kiri --}}
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('modalcrud.index') }}">ModalCrud</a>
                </li>
            </ul>
            {{-- navbar kanan --}}
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                        {{ auth()->user()->email }}
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-link dropdown-item">Logout</button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>