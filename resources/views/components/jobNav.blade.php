
        <!-- Header End -->
        <div class="container-xxl py-5 bg-dark page-header mb-5">
            <div class="container my-5 pt-5 pb-4">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Job List</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb text-uppercase">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Job List</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Header End -->



<!-- Jobs Start -->
<div class="container-xxl py-5">
    <div class="container">
        <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Job Listing</h1>
        <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">
            <ul class="nav nav-pills d-inline-flex justify-content-center border-bottom mb-5">
                <li class="nav-item">
                    <a class="d-flex align-items-center text-start mx-3 ms-0 pb-3 active" data-bs-toggle="pill" href="#tab-1">
                        <h6 class="mt-n1 mb-0">Featured Job</h6>
                    </a>
                </li>
            </ul>
            <div class="tab-content">
                <div id="RecentJob" class="tab-pane fade show p-0 active style=width:100px">
                   
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Jobs End -->




<script>
   RecentJob()
    async function RecentJob(){
        let res=await axios.get("/HomeJobList");
        $("#RecentJob").empty()
        res.data['data'].forEach((item,i)=>{
            let EachItem= `  <div class="job-item p-4 mb-4">
                                <div class="row g-4">
                                   
                                    <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                       
                                        <img class="flex-shrink-0 img-fluid border rounded" src="img/com-logo-1.jpg" alt="" style="width: 80px; height: 80px;">
                                        <a href="/job-by-id?id=${item['id']}" class="d-flex align-items-center">
                                        <div class="text-start ps-4">
                                           
                                            <h5 class="mb-3">${item['title']}</h5>
                                            <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i>${item['location']}</span>
                                            <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i>Full Time</span>
                                            <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i>BDT 
                                                ${item['salary']}</span>
                                      
                                        </div>
                                    </a>
                                    </div>
                                    <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                        <div class="d-flex mb-3">
                                            <a class="btn btn-light btn-square me-3" href=""><i class="far fa-heart text-primary"></i></a>
                                            <a class="btn btn-primary" href="{{url('apply-job-by-id')}}">Apply Now</a>
                                        </div>
                                        <small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>${item['published_date']}</small>
                                      
                                    </div>
                              
                                </div>
                            </div>
`





            $("#RecentJob").append(EachItem);
        })
    }
</script> 

