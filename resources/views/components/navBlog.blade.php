
        <!-- Header End -->
        <div class="container-xxl py-5 bg-dark page-header mb-5">
            <div class="container my-5 pt-5 pb-4">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Blogs</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb text-uppercase">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        <li class="breadcrumb-item"><a href="#">About</a></li>
                        
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Header End -->


<!-- Jobs Start -->
<div class="container-xxl py-5">
    <div class="container">
        <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Blogs</h1>
        <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">
            <ul class="nav nav-pills d-inline-flex justify-content-center border-bottom mb-5">
                <li class="nav-item">
                    <a class="d-flex align-items-center text-start mx-3 ms-0 pb-3 active" data-bs-toggle="pill" href="#tab-1">
                        <h6 class="mt-n1 mb-0">Featured Blog</h6>
                    </a>
                </li>
            </ul>
            <div class="tab-content">
                <div id="RecentJob" class="row align-items-center g-5 -mb-2">
                   
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Jobs End -->

<script>
   RecentJob()
    async function RecentJob(){
        let res=await axios.get("/BlogList");
        $("#RecentJob").empty();
        let cardGroup = '<div class="row align-items-center g-5 -mb-2">';
        res.data['data'].forEach((item,i)=>{
            let EachItem= ` <div class="col-md-4">
                            <div class="card mb-3">
                                <img src="/images/images.jpeg" class="card-img-top">

                                <div class="card-body">
                                    <h5 class="card-title">${item['title']}</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>
                            </div>`;
            // Append card to the card group
            cardGroup += EachItem;
            // Check if three cards are added, then close the row and start a new one
            if ((i + 1) % 3 === 0 || i === res.data['data'].length - 1) {
                cardGroup += '</div><div class="row align-items-center g-5 -mb-2">';
            }
        });
        // Append card groups to the RecentJob container
        $("#RecentJob").append(cardGroup);
    }
</script>
