<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Home</h5>
                    <p class="card-text">This is the Home section.</p>
                    <button class="btn btn-primary toggle">Activate</button>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">About</h5>
                    <p class="card-text">This is the About section.</p>
                    <button class="btn btn-primary toggle">Activate</button>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Page</h5>
                    <p class="card-text">This is the Page section.</p>
                    <button class="btn btn-primary toggle">Activate</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

$(document).ready(function(){
    // Toggle button click event
    $(".toggle").click(function(){
        var $card = $(this).closest('.card');
        if ($card.hasClass('active')) {
            $card.removeClass('active');
            $(this).text('Activate');
            $(this).removeClass('btn-danger').addClass('btn-primary');
        } else {
            $card.addClass('active');
            $(this).text('Deactivate');
            $(this).removeClass('btn-primary').addClass('btn-danger');
        }
    });
});


</script>