<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 col-lg-10 center-screen">
            <div class="card animated fadeIn w-100 p-3">
                <div class="card-body">
                    <h4>Apply For Job</h4>
                    <hr/>
                    <div class="container-fluid m-0 p-0">
                        <div class="row m-0 p-0">
                            <div class="col-md-4 p-2">
                                <label>Name</label>
                                <input id="name" placeholder="Full Name" class="form-control" type="text"/>
                            </div>
                            <div class="col-md-4 p-2">
                                <label>Email Address</label>
                                <input id="email" placeholder="Enter Email" class="form-control" type="email"/>
                            </div>
                            <div class="col-md-4 p-2">
                                <label>Portfolio Website</label>
                                <input id="portfolio" placeholder="Enter Portfolio" class="form-control" type="text"/>
                            </div>
                            <div class="col-md-4 p-2">
                                <label>Resume</label>
                                <input id="resume"  class="form-control" type="file"/>
                            </div>
                            <div class="col-md-4 p-2">
                                <label>Cover Letter</label>
                                <input id="cover_letter" placeholder="Mobile" class="form-control" type="text"/>
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
    let name = document.getElementById('name').value;
    let email = document.getElementById('email').value;
    let portfolio = document.getElementById('portfolio').value;
    let resume = document.getElementById('resume').files[0];
    let cover_letter = document.getElementById('cover_letter').value;

    if (name.length === 0) {
        errorToast('Name is required');
    } else if (email.length === 0) {
        errorToast('Email is required');
    } else if (portfolio.length === 0) {
        errorToast('Portfolio is required');
    } else if (resume === undefined) {
        errorToast('Resume is required');
    } else if (cover_letter.length === 0) {
        errorToast('Cover letter is required');
    } else {
        showLoader();

        let formData = new FormData(); // Create FormData object

        formData.append('name', name);
        formData.append('email', email);
        formData.append('portfolio', portfolio);
        formData.append('resume', resume); // Append file
        formData.append('cover_letter', cover_letter);

        try {
            let res = await axios.post("/applications", formData, {
                headers: {
                    'Content-Type': 'multipart/form-data' // Set content type to multipart/form-data
                }
            });

            hideLoader();

            if (res.status === 200 && res.data['status'] === 'success') {
                successToast(res.data['message']);
                setTimeout(function() {
                    window.location.href = '/Dashboard';
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