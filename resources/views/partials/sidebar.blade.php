<nav id="sidebar" class="bg-dark navbar-dark">
    <a href="/" class="nav-link text-white">
        <h2>home</h2>
    </a>

    <!-- Link laterali -->
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link text-white active" href="{{route('admin.projects.index')}}">Projects</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white active" href="{{route('admin.categories.index')}}">Category</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" href="#">Link</a>
        </li>

    </ul>
</nav>