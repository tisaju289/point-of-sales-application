<!-- Include Axios for making HTTP requests -->
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<div class="col-md-6">
    <div class="wow fadeInUp" data-wow-delay="0.5s">
        <h2 class="mb-4">Get in Touch</h2>
        <div class="row g-3">
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="text" class="form-control" id="name" placeholder="Your Name">
                    <label for="name">Your Name</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="email" class="form-control" id="email" placeholder="Your Email">
                    <label for="email">Your Email</label>
                </div>
            </div>
            <div class="col-12">
                <div class="form-floating">
                    <input type="text" class="form-control" id="subject" placeholder="Subject">
                    <label for="subject">Subject</label>
                </div>
            </div>
            <div class="col-12">
                <div class="form-floating">
                    <textarea class="form-control" placeholder="Leave a message here" id="message" style="height: 150px"></textarea>
                    <label for="message">Message</label>
                </div>
            </div>
            <div class="col-12">
                <button onclick="submitForm()" class="btn btn-primary w-100 py-3" type="button">Send Message</button>
            </div>
        </div>
    </div>
</div>

<script>
    async function submitForm() {
        let name = document.getElementById('name').value;
        let email = document.getElementById('email').value;
        let subject = document.getElementById('subject').value;
        let message = document.getElementById('message').value;

        // Simple client-side validation
        if (!name.trim() || !email.trim() || !subject.trim() || !message.trim()) {
            alert('All fields are required');
            return;
        }

        try {
            // Show loader
            showLoader();

            // Send data to server
            const response = await axios.post("/send-message", {
                name: name,
                email: email,
                subject: subject,
                message: message
            });

            // Hide loader
            showLoader();

            // Handle server response
            if (response.status === 200 && response.data.status === 'success') {
                successToast(response.data.message);
            } else {
                errorToast(response.data.message);
            }
        } catch (error) {
            // Hide loader
            hideLoader();

            // Log and display error message
            console.error('Error:', error);
            errorToast('Failed to send message');
        }
    }

    // Function to show loader (replace this with your actual implementation)
    function showLoader() {
        // Show loader implementation
    }

    // Function to hide loader (replace this with your actual implementation)
    function hideLoader() {
        // Hide loader implementation
    }

    // Function to display success toast (replace this with your actual implementation)
    function successToast(message) {
        alert('Success: ' + message); // Example implementation using alert
    }

    // Function to display error toast (replace this with your actual implementation)
    function errorToast(message) {
        alert('Error: ' + message); // Example implementation using alert
    }
</script>
