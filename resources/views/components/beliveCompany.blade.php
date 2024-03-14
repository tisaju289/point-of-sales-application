
<div class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="heading_s4 text-center">
                    <h2>Companies believe in us</h2>
                </div>
                <p class="text-center leads">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim Nullam nunc varius.</p>
            </div>
        </div>
        <div id="TopCategoryItem" class="row align-items-center g-4">
           
        </div>
    </div>
</div>


<script>
    TopCategory()
    async function TopCategory(){
        let res=await axios.get("/list-company");
        $("#TopCategoryItem").empty()
        res.data['data'].forEach((item,i)=>{
            let EachItem= `   <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                        <a class="cat-item rounded p-4" href="/company-by-id?id=${item['id']}">
                            <img src="${item['company_img']}" alt="cat_img1" style="width:100px; height:60px"/>
                            <h6 class="mb-3">${item['company_name']}</h6>
                            <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i>${item['location']}</span>
                        </a>
                    </div>`
            $("#TopCategoryItem").append(EachItem);
        })
    }
</script>
{{-- <a href="/company-by-id?id=${item['id']}">
    <img src="${item['company_img']}" alt="cat_img1"/>
    <span>Company Name : ${item['company_name']}</span> </br>
    <span>Location : ${item['location']}</span>
</a> --}}