<!-- Modal for updating company information -->
<div class="modal animated zoomIn" id="update-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Company Overview</h5>
            </div>
            <div class="modal-body">
                <form id="update-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="company_name" class="form-label">Company Name *</label>
                                    <input type="text" class="form-control" id="company_name">
                                </div>
                                <div class="mb-3">
                                    <label for="company_email" class="form-label">Company Email *</label>
                                    <input type="email" class="form-control" id="company_email">
                                </div>
                                <div class="mb-3">
                                    <label for="company_mobile" class="form-label">Company Mobile *</label>
                                    <input type="tel" class="form-control" id="company_mobile">
                                </div>
                                <div class="mb-3">
                                    <label for="company_location" class="form-label">Company Location *</label>
                                    <input type="text" class="form-control" id="company_location">
                                </div>
                                <input type="hidden" class="form-control" id="updateID">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="update-modal-close" class="btn bg-gradient-primary" data-bs-dismiss="modal" aria-label="Close">Close</button>
                <button onclick="UpdateCompany()" id="update-btn" class="btn bg-gradient-success">Update</button>
            </div>
        </div>
    </div>
</div>

<script>
    async function FillUpUpdateForm(id) {
        try {
            // Fetch company data by ID
            const response = await axios.get(`/company-by-id?id=${id}`);
            const companyData = response.data;

            // Populate form fields with company data
            document.getElementById('updateID').value = id;
            document.getElementById('company_name').value = companyData.company_name;
            document.getElementById('company_email').value = companyData.email;
            document.getElementById('company_mobile').value = companyData.mobile;
            document.getElementById('company_location').value = companyData.location;
        } catch (error) {
            console.error('Error fetching company data:', error);
        }
    }

   
</script>
