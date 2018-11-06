<div class="wrapper">
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Site List</h1>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="list" class="table table-bordered table-striped">
                                <thead>    
                                    <tr>
                                        <th>Site Name</th>
                                        <th>DA</th>
                                        <th>Trial</th>
                                        <th>Engine version</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($sites as $site) : ?>    
                                    <tr>
                                        <td><?= $site->site_name; ?></td>
                                        <td><?= $site->da; ?></td>
                                        <td><?php if($site->trail == 1){
                                            echo 'Yes';
                                        }else{
                                            echo 'No';
                                        } ?></td>
                                        <td> 4</td>
                                        <td><a class="action-btn btn btn-info btn-sm" href="<?= $this->request->webroot ?>admin/sites/edit/<?= $site->id; ?>">Edit</a>
                                            <a class="action-btn btn btn-danger btn-sm" href="javascript:void(0)" onclick="deleteSite(<?= $site->id; ?>)">Delete</a></td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Site Name</th>
                                        <th>DA</th>
                                        <th>Trial</th>
                                        <th>Engine version</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </section>
    </div>
</div>

<script>
  $(function () {
    $('#list').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });


  function deleteSite(id){

    if (confirm("Are you sure ?")) {
        // fetch('<?= $this->request->webroot; ?>admin/sites/delete/'+id,{
        //     type:'get'
        // })
        // .then(function(response){
        //     console.log(response);
        // })

        $.ajax({
            url:'<?= $this->request->webroot; ?>admin/sites/delete/'+id,
            success:function(response){
                response = JSON.parse(response);
                if(response.ACK == 1){
                    location.reload();
                }else{
                    alert('Unable to delete');
                }
            }

        })    

    } 
}
</script>
