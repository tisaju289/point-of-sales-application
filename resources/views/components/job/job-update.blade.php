<div class="modal animated zoomIn" id="update-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Job Details</h5>
            </div>
            <div class="modal-body">
                <form id="update-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Title *</label>
                                <input type="text" class="form-control" id="title">

                                <label class="form-label mt-3">Vacancy *</label>
                                <input type="text" class="form-control" id="vacancy">

                                <label class="form-label mt-3">Salary *</label>
                                <input type="text" class="form-control" id="salary">

                                <label class="form-label mt-3">Published Date *</label>
                                <input type="text" class="form-control" id="published_date">

                                <label class="form-label mt-3">Benefits *</label>
                                <input type="text" class="form-control" id="benefits">
                                

                                <input type="text" class="d-none" id="updateID">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="update-modal-close" class="btn bg-gradient-primary" data-bs-dismiss="modal" aria-label="Close">Close</button>
                {{-- <button onclick="Update()" id="update-btn" class="btn bg-gradient-success" >Update</button> --}}
            </div>
        </div>
    </div>
</div>


<script>



    async function FillUpUpdateForm(id){
        document.getElementById('updateID').value=id;
        showLoader();
        let res=await axios.post("/admin-job-by-id",{id:id})
        hideLoader();
        document.getElementById('title').value=res.data['title'];
        document.getElementById('vacancy').value=res.data['vacancy'];
        document.getElementById('salary').value=res.data['salary'];
        document.getElementById('published_date').value=res.data['published_date'];
        document.getElementById('benefits').value=res.data['benefits'];
    }


    async function Update() {

        let title = document.getElementById('title').value;
        let vacancy = document.getElementById('vacancy').value;
        let salary = document.getElementById('salary').value;
        let updateID = document.getElementById('updateID').value;


        if (title.length === 0) {
            errorToast("Customer Name Required !")
        }
        else if(customerEmail.length===0){
            errorToast("Customer Email Required !")
        }
        else if(customerMobile.length===0){
            errorToast("Customer Mobile Required !")
        }
        else {

            document.getElementById('update-modal-close').click();

            showLoader();

            // let res = await axios.post("/update-customer",{name:customerName,email:customerEmail,mobile:customerMobile,id:updateID})

            hideLoader();

            if(res.status===200 && res.data===1){

                successToast('Request completed');

                document.getElementById("update-form").reset();

                await getList();
            }
            else{
                errorToast("Request fail !")
            }
        }
    }

</script>
