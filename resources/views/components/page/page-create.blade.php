<div class="modal animated zoomIn" id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Blogs</h5>
            </div>
            <div class="modal-body">
                <form id="save-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Title *</label>
                                <input type="text" class="form-control" id="title">
                                <label class="form-label">Slug *</label>
                                <input type="text" class="form-control" id="slug">
                                <label class="form-label">Content *</label>
                                <input type="text" class="form-control" id="content">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="modal-close" class="btn bg-gradient-primary" data-bs-dismiss="modal" aria-label="Close">Close</button>
                <button onclick="Save()" id="save-btn" class="btn bg-gradient-success">Save</button>
            </div>
        </div>
    </div>
</div>

<script>
    async function Save() {
        try {
            let title = document.getElementById('title').value;
            let slug = document.getElementById('slug').value;
            let content = document.getElementById('content').value;

            showLoader();
            let res = await axios.post("/create-page", { title: title, slug: slug, content: content });
            hideLoader();

            if (res.status === 201) {
                successToast('Blog created successfully.');

                // Close the modal after a successful save
                document.getElementById('modal-close').click();

                // Reset the form
                document.getElementById("save-form").reset();

                // Refresh the blog list
                await getList();
            } else {
                // Provide feedback to the user in case of failure
                errorToast("Failed to create blog.");
            }
        } catch (error) {
            console.error('Error saving blog:', error);
            errorToast('Failed to create blog.');
        }
    }
</script>
