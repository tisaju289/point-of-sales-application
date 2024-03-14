<div class="container">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card animated fadeIn w-100 p-3">
                <div class="card-body">
                    <h4>Company Profile</h4>
                    <hr/>
                    <div class="container-fluid m-0 p-0">
                        <div class="row m-0 p-0">
                            <div class="col-md-4 p-2">
                                <label>Email Address</label>
                                <input readonly id="email" placeholder="Company Email" class="form-control" type="email"/>
                            </div>
                            <div class="col-md-4 p-2">
                                <label>Full Name</label>
                                <input id="company_name" placeholder="Full Name" class="form-control" type="text"/>
                            </div>
                            <div class="col-md-4 p-2">
                                <label>Location</label>
                                <input id="location" placeholder="Location" class="form-control" type="text"/>
                            </div>
                            <div class="col-md-4 p-2">
                                <label>Mobile Number</label>
                                <input id="mobile" placeholder="Mobile" class="form-control" type="mobile"/>
                            </div>
                            <div class="col-md-4 p-2">
                                <label>Password</label>
                                <input id="password" placeholder="User Password" class="form-control" type="password"/>
                            </div>
                        </div>
                        <div class="row m-0 p-0">
                            <div class="col-md-4 p-2">
                                <button onclick="onUpdate()" class="btn mt-3 w-100  bg-gradient-primary">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    getProfile();
    async function getProfile(){
        showLoader();
        let res=await axios.get("/company-profile")
        hideLoader();
        if(res.status===200 && res.data['status']==='success'){
            let data=res.data['data'];
            document.getElementById('email').value=data['email'];
            document.getElementById('company_name').value=data['company_name'];
            document.getElementById('location').value=data['location'];
            document.getElementById('mobile').value=data['mobile'];
            document.getElementById('password').value=data['password'];
        }
        else{
            errorToast(res.data['message'])
        }

    }

    async function onUpdate() {


        let firstName = document.getElementById('company_name').value;
        let lastName = document.getElementById('location').value;
        let mobile = document.getElementById('mobile').value;
        let password = document.getElementById('password').value;

        if(company_name.length===0){
            errorToast('First Name is required')
        }
        else if(location.length===0){
            errorToast('Last Name is required')
        }
        else if(mobile.length===0){
            errorToast('Mobile is required')
        }
        else if(password.length===0){
            errorToast('Password is required')
        }
        else{
            showLoader();
            let res=await axios.post("/company-update-profile",{
                company_name:company_name,
                location:location,
                mobile:mobile,
                password:password
            })
            hideLoader();
            if(res.status===200 && res.data['status']==='success'){
                successToast(res.data['message']);
                await getProfile();
            }
            else{
                errorToast(res.data['message'])
            }
        }
    }

</script>

