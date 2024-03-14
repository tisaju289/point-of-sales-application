<div class="container">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card animated fadeIn w-100 p-3">
                <div class="card-body">
                    <h4>Amdin Profile</h4>
                    <hr/>
                    <div class="container-fluid m-0 p-0">
                        <div class="row m-0 p-0">
                            <div class="col-md-4 p-2">
                                <label>Email Address</label>
                                <input readonly id="email" placeholder="Company Email" class="form-control" type="email"/>
                            </div>
                            <div class="col-md-4 p-2">
                                <label>Admin Name</label>
                                <input id="admin_name" placeholder="Admin Name" class="form-control" type="text"/>
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
        let res=await axios.get("/admin-profile")
        hideLoader();
        if(res.status===200 && res.data['status']==='success'){
            let data=res.data['data'];
            document.getElementById('email').value=data['email'];
            document.getElementById('admin_name').value=data['admin_name'];
            document.getElementById('password').value=data['password'];
        }
        else{
            errorToast(res.data['message'])
        }

    }

    async function onUpdate() {


        let admin_name = document.getElementById('admin_name').value;
        let password = document.getElementById('password').value;

        if(admin_name.length===0){
            errorToast('Admin Name is required')
        }
    
        else if(password.length===0){
            errorToast('Password is required')
        }
        else{
            showLoader();
            let res=await axios.post("/admin-update-profile",{
                admin_name:admin_name,
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

