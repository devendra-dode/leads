<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Users</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Users</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
    <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <table id="userList" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Mobile</th>
                  <th>Created On</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Id</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Mobile</th>
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
    $("#userList").DataTable({
      responsive: true, lengthChange: false, autoWidth: false,
      info: true, ordering: true, paging: true, pageLength: 5,
      processing: true,
      serverSide: true,
      stateSave: true,
      ajax: {
        url: '/fetchUsers'
      },
      columnDefs: [
        {
            data: null,
            defaultContent: '<button class="btn btn-sm btn-info">'
            + '<i class="fa fa-pencil-alt" aria-hidden="true"></i></button>&nbsp;'
            + '<button class="btn btn-sm btn-warning"><i class="fa fa-eye" aria-hidden="true"></i></button>&nbsp;'
            + '<button class="btn btn-sm btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>',
            targets: -1
        }
      ]
    }).buttons().container().appendTo('#userList_wrapper .col-md-6:eq(0)');

  });

</script>
<?= $this->endSection() ?>