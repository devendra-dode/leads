<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                  
                </div><!-- /.col -->
                <div class="col-sm-6 text-right">
                    <h1 class="m-0">Users List</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

                            
    <!-- Main content -->
    <section class="content">

        <?php include APPPATH . 'Views/messages.php'; ?>  <!-- Include Messages Here -->

<input type="hidden" id="serviceType" value="service">

    <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <table id="usersList" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Name</th>
                  <th>Mobile</th>
                  <th>AlterName Mobile</th>
                  <th>Address</th>
                  <th>Created On</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Id</th>
                  <th>Name</th>
                  <th>Mobile</th>
                  <th>AlterName Mobile</th>
                  <th>Address</th>
                  <th>Created On</th>
                  <th>Actions</th>
                </tr>
              </tfoot>
            </table>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
</div>

<?= $this->section('scripts') ?>
<script>
$(function () {
    $("#usersList").DataTable({
        responsive: true,
        lengthChange: false,
        autoWidth: false,
        info: true,
        ordering: true,
        paging: true,
        pageLength: 5,
        processing: true,
        serverSide: true,
        ajax: {
            url: '<?= base_url('/fetchUsers') ?>',
            dataSrc: function(json) {
                console.log("API Response:", json); // ✅ Debugging
                return json.data;
            }
        },
        columns: [
            { data: 0 },  // Id
            { 
                data: 1, 
                render: function(data) { return data ? data : 'N/A'; } // ✅ Name
            },
            { 
                data: 2, 
                render: function(data) { return data ? data : 'N/A'; } // ✅ Mobile
            },
            { 
                data: 3, 
                render: function(data) { return data ? data : 'N/A'; } // ✅ Alternate Mobile
            },
            { 
                data: 4, 
                render: function(data) { return data ? data : 'N/A'; } // ✅ Address
            },
            { 
                data: 5, 
                render: function(data) { return data ? data : 'N/A'; } // ✅ Created On
            },
            { 
                data: null, // Actions
                searchable: false,
                orderable: false,
                render: function (data, type, row) {
                    return `<a href="<?= base_url('/') ?>user/edit/${row[0]}" class="btn btn-sm btn-info">
                                <i class="fa fa-pencil-alt"></i>
                            </a>`;
                }
            }
        ]
    });
});

</script>

<?= $this->endSection() ?>