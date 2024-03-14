@extends('layout.mainapp')

@section('content')
    
<div class="container-xxl bg-white p-0">

    @include('components.header')
  

 <!-- Header End -->
 <div class="container-xxl py-5 bg-dark page-header mb-5">
    <div class="container my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Job Detail</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb text-uppercase">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item text-white active" aria-current="page">Job Detail</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Header End -->


<!-- Job Detail Start -->
<div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container">
        <div class="row gy-5 gx-4">
            <div class="col-lg-8">
                <div class="d-flex align-items-center mb-5">
                 
                    <div class="text-start ps-4">
                        <h3 class="mb-3">{{ $jobs->title }}</h3>
                        <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i>{{ $jobs->location }}</span>
                        <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i>Full Time</span>
                        <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i>BDT {{ $jobs->salary }}</span>
                    </div>
                </div>

                <div class="mb-5">
                    <h4 class="mb-3">Job description</h4>
                    <p>{{ $jobs->description }}</p>
                    <h4 class="mb-3">Responsibility</h4>
                    <p>Magna et elitr diam sed lorem. Diam diam stet erat no est est. Accusam sed lorem stet voluptua sit sit at stet consetetur, takimata at diam kasd gubergren elitr dolor</p>
                    <ul class="list-unstyled">
                        <li><i class="fa fa-angle-right text-primary me-2"></i>{{ $jobs->responsibility }}</li>
                        <li><i class="fa fa-angle-right text-primary me-2"></i>Elitr stet dolor vero clita labore gubergren</li>
                        <li><i class="fa fa-angle-right text-primary me-2"></i>Rebum vero dolores dolores elitr</li>
                        <li><i class="fa fa-angle-right text-primary me-2"></i>Est voluptua et sanctus at sanctus erat</li>
                        <li><i class="fa fa-angle-right text-primary me-2"></i>Diam diam stet erat no est est</li>
                    </ul>
                    <h4 class="mb-3">Qualifications</h4>
                    <p>Magna et elitr diam sed lorem. Diam diam stet erat no est est. Accusam sed lorem stet voluptua sit sit at stet consetetur, takimata at diam kasd gubergren elitr dolor</p>
                    <ul class="list-unstyled">
                        <li><i class="fa fa-angle-right text-primary me-2"></i>{{ $jobs->qualification }}</li>
                        <li><i class="fa fa-angle-right text-primary me-2"></i>Elitr stet dolor vero clita labore gubergren</li>
                        <li><i class="fa fa-angle-right text-primary me-2"></i>Rebum vero dolores dolores elitr</li>
                        <li><i class="fa fa-angle-right text-primary me-2"></i>Est voluptua et sanctus at sanctus erat</li>
                        <li><i class="fa fa-angle-right text-primary me-2"></i>Diam diam stet erat no est est</li>
                    </ul>
                </div>

                <div class="">
                    <h4 class="mb-4">Apply For The Job</h4>
                    <a class="btn btn-primary" href="{{url('apply-job-by-id')}}">Apply Now</a>
                    
                </div>
            </div>

            <div class="col-lg-4">
                <div class="bg-light rounded p-5 mb-4 wow slideInUp" data-wow-delay="0.1s">
                    <h4 class="mb-4">Job Summery</h4>
                    <p><i class="fa fa-angle-right text-primary me-2"></i>Published On: {{ $jobs->published_date }}</p>
                    <p><i class="fa fa-angle-right text-primary me-2"></i>Vacancy: {{ $jobs->vacancy }}</p>
                    <p><i class="fa fa-angle-right text-primary me-2"></i>Job Nature: Full Time</p>
                    <p><i class="fa fa-angle-right text-primary me-2"></i>Salary: {{ $jobs->salary }}</p>
                    <p><i class="fa fa-angle-right text-primary me-2"></i>Location: {{ $jobs->location }}</p>
                    <p class="m-0"><i class="fa fa-angle-right text-primary me-2"></i>Date Line: 01 Jan, 2045</p>
                </div>
                <div class="bg-light rounded p-5 wow slideInUp" data-wow-delay="0.1s">
                    <h4 class="mb-4">Company Detail</h4>

                    <p><i class="fa fa-angle-right text-primary me-2"></i>Company Name: {{ $jobs->company_name }}</p>
                    <p><i class="fa fa-angle-right text-primary me-2"></i>Company Location: {{ $jobs->company_location }}</p>
                    <p><i class="fa fa-angle-right text-primary me-2"></i>Company Website: {{ $jobs->website }}</p>


                </div>
            </div>
        </div>
    </div>
</div>
<!-- Job Detail End -->



  
    @include('components.footer')
    
 
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
</div>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    async function onRegistration() {
        let name = document.getElementById('name').value;
        let email = document.getElementById('email').value;
        let portfolio = document.getElementById('portfolio').value;
        let resume = document.getElementById('resume').files[0];
        let coverLetter = document.getElementById('coverLetter').value;

        // Create FormData object
        let formData = new FormData();
        formData.append('name', name);
        formData.append('email', email);
        formData.append('portfolio', website);
        formData.append('resume', resume);
        formData.append('coverLetter', coverLetter);

        try {
            let response = await axios.post('/applications', formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            });

            // Handle success response
            console.log(response.data);
            alert('Application submitted f successfully!');
        } catch (error) {
            // Handle error
            console.error('Error:', error);
            alert('Failed to submi fdt application.');
        }
    }
</script>

@endsection