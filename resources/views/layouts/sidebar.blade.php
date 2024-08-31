<!-- Navigation -->
<ul class="navbar-nav">
  <li class="nav-item">
    <a class="nav-link " href="{{ route('home') }}">
      <i class="ni ni-tv-2 text-primary"></i> Dashboard
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="{{ route('Users.index') }}">
      <i class="ni ni-single-02 text-black"></i> Users
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('members.index') }}">
      <i class="ni ni-single-02 text-yellow"></i> Members
    </a>
  </li>
  <li class=" nav-item">
    <a class="nav-link" href="{{ route('trainers.index') }}">
      <i class="ni ni-single-02 text-red"></i> Trainers
    </a>
  </li>
  <li class=" nav-item">
    <a class="nav-link" href="{{ route('roles.index') }}">
      <i class="ni ni-single-02 text-red"></i> Roles
    </a>
  </li>
</ul>