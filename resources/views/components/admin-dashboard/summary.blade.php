<div class="container-fluid">
    <div class="row">
        <h2>Admin Dashboard</h2>
        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 animated fadeIn p-2">
            <div class="card card-plain h-100 bg-white">
                <div class="p-3">
                    <div class="row">
                        <div class="col-9 col-lg-8 col-md-8 col-sm-9">
                            <div>
                                <p class="mb-0 text-sm">Active <br>Companies</p>
                                <h5 class="mb-0 text-capitalize font-weight-bold">
                                    <span id="active_company">5</span>
                                </h5>
                              
                            </div>
                        </div>
                        <div class="col-3 col-lg-4 col-md-4 col-sm-3 text-end">
                            <div class="icon icon-shape bg-gradient-primary shadow float-end border-radius-md">
                                <img class="w-100 " src="{{asset('images/icon.svg')}}"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 animated fadeIn p-2">
            <div class="card card-plain h-100 bg-white">
                <div class="p-3">
                    <div class="row">
                        <div class="col-9 col-lg-8 col-md-8 col-sm-9">
                            <div>
                                <p class="mb-0 text-sm">Pending Companies</p>
                                <h5 class="mb-0 text-capitalize font-weight-bold">
                                    <span id="pending_company">2</span>
                                </h5>
                              
                            </div>
                        </div>
                        <div class="col-3 col-lg-4 col-md-4 col-sm-3 text-end">
                            <div class="icon icon-shape bg-gradient-primary shadow float-end border-radius-md">
                                <img class="w-100 " src="{{asset('images/icon.svg')}}"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 animated fadeIn p-2">
            <div class="card card-plain h-100 bg-white">
                <div class="p-3">
                    <div class="row">
                        <div class="col-9 col-lg-8 col-md-8 col-sm-9">
                            <div>
                                <p class="mb-0 text-sm">Jobs <br>Posted</p>
                                <h5 class="mb-0 text-capitalize font-weight-bold">
                                    <span id="jobs"></span>
                                </h5>
                             
                            </div>
                        </div>
                        <div class="col-3 col-lg-4 col-md-4 col-sm-3 text-end">
                            <div class="icon icon-shape bg-gradient-primary shadow float-end border-radius-md">
                                <img class="w-100 " src="{{asset('images/icon.svg')}}"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<script>
    getList();
   async function getList() {
    showLoader();
    try {
        const response = await fetch("/admin-summary");
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        const data = await response.json();
        // document.getElementById('active_company').innerText = data['active_company'];
        // document.getElementById('pending_company').innerText = data['pending_company'];
        document.getElementById('jobs').innerText = data['jobs'];
    } catch (error) {
        console.error('There was a problem with the fetch operation:', error);
    }
    hideLoader();
}

</script>
