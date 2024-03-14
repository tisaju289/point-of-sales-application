<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-10 center-screen">
            <div class="card animated fadeIn w-100 p-3">
                <div class="card-body">
                    <h4>Sign Up</h4>
                    <hr/>
                    <div class="container-fluid m-0 p-0">
                        <div class="row m-0 p-0">
                            <div class="col-md-4 p-2">
                                <label>Email Address</label>
                                <input id="email" placeholder="Company Email" class="form-control" type="email"/>
                            </div>
                            <div class="col-md-4 p-2">
                                <label>Company Name</label>
                                <input id="company_name" placeholder="Full Name" class="form-control" type="text"/>
                            </div>
                            <div class="col-md-4 p-2">
                                <label>Location</label>
                                <input id="location" placeholder="Enter Location" class="form-control" type="text"/>
                            </div>
                            <div class="col-md-4 p-2">
                                <label>Mobile Number</label>
                                <input id="mobile" placeholder="Mobile" class="form-control" type="mobile"/>
                            </div>
                            <div class="col-md-4 p-2">
                                <label>Password</label>
                                <input id="password" placeholder="Company Password" class="form-control" type="password"/>
                            </div>
                            <div class="col-md-4 p-2">
                                <label>Company Logo</label>
                                <input id="company_img"  class="form-control" type="file"/>
                            </div>
                        </div>
                        <div class="row m-0 p-0">
                            <div class="col-md-4 p-2">
                                <button onclick="onRegistration()" class="btn mt-3 w-100  bg-gradient-primary">Complete</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<script>
    async function onRegistration() {
    let email = document.getElementById('email').value;
    let company_name = document.getElementById('company_name').value;
    let location = document.getElementById('location').value;
    let mobile = document.getElementById('mobile').value;
    let password = document.getElementById('password').value;
    let company_img = document.getElementById('company_img').files[0]; // Access the uploaded file

    if(email.length === 0){
        errorToast('Email is required');
    } else if(company_name.length === 0){
        errorToast('Company Name is required');
    } else if(location.length === 0){
        errorToast('Location is required');
    } else if(mobile.length === 0){
        errorToast('Mobile is required');
    } else if(password.length === 0){
        errorToast('Password is required');
    } else if(company_img === undefined) {
        errorToast('Company Logo is required');
    } else {
        showLoader();
        
        let formData = new FormData(); // Create FormData object
        formData.append('email', email);
        formData.append('company_name', company_name);
        formData.append('location', location);
        formData.append('mobile', mobile);
        formData.append('password', password);
        formData.append('company_img', company_img); // Append file
        
        try {
            let res = await axios.post("/company-registration", formData, {
                headers: {
                    'Content-Type': 'multipart/form-data' // Set content type to multipart/form-data
                }
            });
            
            hideLoader();
            
            if(res.status === 200 && res.data['status'] === 'success') {
                successToast(res.data['message']);
                setTimeout(function() {
                    window.location.href = '/companyLogin';
                }, 2000);
            } else {
                errorToast(res.data['message']);
            }
        } catch (error) {
            hideLoader();
            errorToast(error.message);
        }
    }
}

</script>