<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <a href="<?= base_url('blog/create') ?>" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Add New Blog
                    </a>
                </div><!-- /.col -->
                <div class="col-sm-6 text-right">
                    <h1 class="m-0">Blog List</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

                            
    <!-- Main content -->
    <section class="content">

        <?php include APPPATH . 'Views/messages.php'; ?>  <!-- Include Messages Here -->

    <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <table id="blogList" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Name</th>
                  <th>Short Description</th>
                  <th>Category</th>
                  <th>Image</th>
                  <th>Created On</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Id</th>
                  <th>Name</th>
                  <th>Short Description</th>
                  <th>Category</th>
                  <th>Image</th>
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
    $("#blogList").DataTable({
        responsive: true,
        lengthChange: false,
        autoWidth: false,
        info: true,
        ordering: true,
        paging: true,
        pageLength: 10,
        processing: true,
        serverSide: true,
       // stateSave: true,
        ajax: {
            url: '<?= base_url('/fetchBlogs') ?>',
            dataSrc: function(json) {
                console.log("API Response:", json); // ✅ Debugging
                return json.data;
            }
        },
        columnDefs: [
            {
                targets: -1, 
                data: null, 
                searchable: false,  // ❌ Make it non-searchable
                orderable: false,   // ❌ Make it non-sortable
                render: function (data, type, row) {
                    return `<a href="<?= base_url('/') ?>blog/edit/${row[0]}" class="btn btn-sm btn-info">
                                <i class="fa fa-pencil-alt"></i>
                            </a>`;
                }
            },
            {
                targets: 3, // Column where row[4] is displayed
                render: function (data, type, row) {
                    console.log("Value of row[3]:", row[3]); // ✅ Debugging in console
                    return row[3] ? row[3] : 'N/A'; // ✅ Show value directly in table
                }
            },
            {
                targets: 4, // Image Column
                searchable: false,  // ❌ Make it non-searchable
                orderable: false,   // ❌ Make it non-sortable
                render: function (data, type, row) {
                    return `<img src="${row[4]}" width="50" height="50" alt="Blog Image">`;
                }
            },
        ]
    });
});


</script>
<?= $this->endSection() ?>