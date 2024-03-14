<!-- Modal for updating blog information -->
<div class="modal animated zoomIn" id="update-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Blog</h5>
            </div>
            <div class="modal-body">
                <form id="update-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label for="title" class="form-label">Title *</label>
                                <input type="text" class="form-control" id="title" required>

                                <label for="content" class="form-label mt-3">Content *</label>
                                <input type="text" class="form-control" id="content" required>

                                <input type="hidden" class="form-control" id="updateID">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="update-modal-close" class="btn bg-gradient-primary" data-bs-dismiss="modal" aria-label="Close">Close</button>
                <button onclick="Update()" id="update-btn" class="btn bg-gradient-success">Update</button>
            </div>
        </div>
    </div>
</div>

<script>
    async function FillUpUpdateForm(id) {
        try {
            document.getElementById('updateID').value = id;
            showLoader();
            const res = await axios.post("/company-id-by-blog", { id: id });
            hideLoader();
            document.getElementById('title').value = res.data.title;
            document.getElementById('content').value = res.data.content;
        } catch (error) {
            console.error('Error filling up update form:', error);
        }
    }

    async function Update() {
        try {
            const title = document.getElementById('title').value.trim();
            const content = document.getElementById('content').value.trim();
            const updateID = document.getElementById('updateID').value;

            // Basic validation
            if (!title || !content) {
                throw new Error('Title and content are required.');
            }

            showLoader();

            const res = await axios.post("/update-blog", { title, content, id: updateID });

            hideLoader();

            if (res.status === 200 && res.data === 1) {
                successToast('Blog updated successfully.');
                document.getElementById("update-form").reset();
                await getList(); // Assuming this function reloads the blog list
            } else {
                throw new Error('Failed to update blog.');
            }
        } catch (error) {
            console.error('Error updating blog:', error);
            errorToast(error.message || 'Failed to update blog.');
        }
    }
</script>
