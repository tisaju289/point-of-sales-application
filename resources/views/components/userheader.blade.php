<!-- Navbar Start -->
<nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
    <a href="/" class="navbar-brand d-flex align-items-center text-center py-0 px-4 px-lg-5">
        <h1 class="m-0 text-dark">JobPulse</h1>
    </a>
    <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a href="{{url('/user-auth-home')}}" class="nav-item nav-link" id="home-link">Home</a>
            <a href="{{url('/UserNavAboutPage')}}" class="nav-item nav-link" id="about-link">About</a>
            <a href="{{url('/UserNavJobPage')}}" class="nav-item nav-link" id="jobs-link">Jobs</a>
            <a href="{{url('/UserNavBlogPage')}}" class="nav-item nav-link" id="blogs-link">Blogs</a>
            <a href="{{url('/UserNavContactPage')}}" class="nav-item nav-link" id="contact-link">Contact</a>
        </div>
        <a href="{{url('/Dashboard')}}" class="btn btn-dark rounded-1  py-4 px-lg-4 d-none d-lg-block bg-gradient-primary me-2 mb-2 mb-sm-0">Dashboard<i class="fa fa-arrow-right ms-3"></i></a>
    </div>
</nav>
<!-- Navbar End -->


<script>
    // Add event listeners to each link to remove the 'active' class from the 'Home' link
    document.getElementById('about-link').addEventListener('click', function() {
        document.getElementById('home-link').classList.remove('active');
    });

    document.getElementById('jobs-link').addEventListener('click', function() {
        document.getElementById('home-link').classList.remove('active');
    });

    document.getElementById('blogs-link').addEventListener('click', function() {
        document.getElementById('home-link').classList.remove('active');
    });

    document.getElementById('contact-link').addEventListener('click', function() {
        document.getElementById('home-link').classList.remove('active');
    });
</script>