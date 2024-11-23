<nav id="sidebar" class="active bg-info">
    <p class="text-center fs-4"></p>
    <ul class="list-unstyled components mb-5">

        <li class="{{request()->is('/') ? 'active' : '' }}">
            <a href="/"><span class="bi bi-alarm-fill pe-2"></span>Dashboard</a>
        </li>
        <li class="{{ request()->is('pegawai') || request()->is('pegawai/*') ? 'active' : '' }}">
            <a href="{{ route('pegawai.index') }}"><span class=" fa fa-user"></span> Data Pegawai</a>
        </li>
    </ul>
</nav>
