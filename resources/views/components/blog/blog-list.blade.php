<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-lg-12">
            <div class="card px-5 py-5">
                <div class="row justify-content-between ">
                    <div class="align-items-center col">
                        <h4>Blogs</h4>
                      <div class="align-items-center col">
                    <button data-bs-toggle="modal" data-bs-target="#create-modal" class="float-end btn m-0 bg-gradient-primary">Create</button>
                </div>
                    </div>
                </div>
                <hr class="bg-dark" />
                <table class="table" id="tableData">
                    <thead>
                        <tr class="bg-light">
                            <th>No</th>
                            <th>Title</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="tableList">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<script>

getList();


async function getList() {
    showLoader();
    let res=await axios.get("/list-blog");
    hideLoader();

    let tableList=$("#tableList");
    let tableData=$("#tableData");

    tableData.DataTable().destroy();
    tableList.empty();

    res.data.forEach(function (item,index) {
        let row=`<tr>
                    <td>${index+1}</td>
                    <td>${item['title']}</td>
                    <td>
                        
                        
                        
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                            <label class="form-check-label" for="flexSwitchCheckChecked"></label>
                        </div>


                        
                        
                    </td>
                    <td>
                        <button data-id="${item['id']}" class="btn editBtn btn-sm btn-outline-success">Show</button>
                        <button data-id="${item['id']}" class="btn deleteBtn btn-sm btn-outline-danger">Delete</button>
                    </td>
                 </tr>`
        tableList.append(row)
    })

    $('.editBtn').on('click', async function () {
           let id= $(this).data('id');
           await FillUpUpdateForm(id)
           $("#update-modal").modal('show');
    })

    $('.deleteBtn').on('click',function () {
        let id= $(this).data('id');
        $("#delete-modal").modal('show');
        $("#deleteID").val(id);
    })

    new DataTable('#tableData',{
        order:[[0,'desc']],
        lengthMenu:[5,10,15,20,30]
    });

}


</script>

    
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var switchCheckbox = document.getElementById('flexSwitchCheckChecked');
        
        switchCheckbox.addEventListener('change', function() {
            var newState = switchCheckbox.checked ? 'Active' : 'Deactive';
            console.log('New state:', newState);
            // You can add further logic here to handle state changes, such as sending an update request.
        });
    });
    </script>
    
