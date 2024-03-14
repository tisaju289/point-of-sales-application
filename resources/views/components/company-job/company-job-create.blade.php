<div class="modal animated zoomIn" id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create Customer</h5>
                </div>
                <div class="modal-body">
                    <form id="save-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Title *</label>
                                <input type="text" class="form-control" id="title">
                                <label class="form-label">category_id *</label>
                                {{-- <input type="text" class="form-control" id="category_id"> --}}
                                <select type="text" class="form-control form-select" id="category_id">
                                    <option value="">Select Category</option>
                                </select>
            
                                <label class="form-label">jobtype_id*</label>
                                {{-- <input type="text" class="form-control" id="jobtype_id"> --}}
                                <select type="text" class="form-control form-select" id="jobtype_id">
                                    <option value="">Select Category</option>
                                </select>

                                <label class="form-label">vacancy *</label>
                                <input type="text" class="form-control" id="vacancy">
                                <label class="form-label">salary *</label>
                                <input type="text" class="form-control" id="salary">
                                <label class="form-label">location *</label>
                                <input type="text" class="form-control" id="location">
                                <label class="form-label">description *</label>
                                <input type="text" class="form-control" id="description">
                                <label class="form-label">benefits *</label>
                                <input type="text" class="form-control" id="benefits">
                                <label class="form-label">experience *</label>
                                <input type="text" class="form-control" id="experience">
                                <label class="form-label">responsibility *</label>
                                <input type="text" class="form-control" id="responsibility">
                                <label class="form-label">qualification *</label>
                                <input type="text" class="form-control" id="qualification">
                                <label class="form-label">keyword *</label>
                                <input type="text" class="form-control" id="keyword">
                                <label class="form-label">company_name *</label>
                                <input type="text" class="form-control" id="company_name">
                                <label class="form-label">company_location *</label>
                                <input type="text" class="form-control" id="company_location">
                                <label class="form-label">website *</label>
                                <input type="text" class="form-control" id="website">
                                <label class="form-label">published_date *</label>
                                <input type="text" class="form-control" id="published_date">
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button id="modal-close" class="btn bg-gradient-primary" data-bs-dismiss="modal" aria-label="Close">Close</button>
                    <button onclick="Save()" id="save-btn" class="btn bg-gradient-success" >Save</button>
                </div>
            </div>
    </div>
</div>


<script>

FillCategoryDropDown();
FillJobTypeDropDown();

async function FillCategoryDropDown(){
    let res = await axios.get("/CategoryList")
    res.data.forEach(function (item,i) {
        let option=`<option value="${item['id']}">${item['category_name']}</option>`
        $("#category_id").append(option);
    })
}

async function FillJobTypeDropDown(){
    let res = await axios.get("/JobTypeList")
    res.data.forEach(function (item,i) {
        let option=`<option value="${item['id']}">${item['jobtype']}</option>`
        $("#jobtype_id").append(option);
    })
}


  
    async function Save() {

        let title = document.getElementById('title').value;
        let category_id = document.getElementById('category_id').value;
        let jobtype_id = document.getElementById('jobtype_id').value;
        let vacancy = document.getElementById('vacancy').value;
        let salary = document.getElementById('salary').value;
        let location = document.getElementById('location').value;
        let description = document.getElementById('description').value;
        let benefits = document.getElementById('benefits').value;
        let experience = document.getElementById('experience').value;
        let responsibility = document.getElementById('responsibility').value;
        let qualification = document.getElementById('qualification').value;
        let keyword = document.getElementById('keyword').value;
        let company_name = document.getElementById('company_name').value;
        let company_location = document.getElementById('company_location').value;
        let website = document.getElementById('website').value;
        let published_date = document.getElementById('published_date').value;

        // if (customerName.length === 0) {
        //     errorToast("Customer Name Required !")
        // }
        // else if(customerEmail.length===0){
        //     errorToast("Customer Email Required !")
        // }
        // else if(customerMobile.length===0){
        //     errorToast("Customer Mobile Required !")
        // }
        // else {

            document.getElementById('modal-close').click();

            showLoader();
            let res = await axios.post("/create-job",{
                title:title,
                category_id:category_id,
                jobtype_id:jobtype_id,
                vacancy:vacancy,
                salary:salary,
                location:location,
                description:description,
                benefits:benefits,
                experience:experience,
                responsibility:responsibility,
                qualification:qualification,
                keyword:keyword,
                company_name:company_name,
                company_location:company_location,
                website:website,
                published_date:published_date,
            })
            hideLoader();

            if(res.status===201){

                successToast('Request completed');

                document.getElementById("save-form").reset();

                await getList();
            }
            else{
                errorToast("Request fail !")
            }
        }
    

</script>
