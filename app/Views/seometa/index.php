<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">

                </div><!-- /.col -->
                <div class="col-sm-6 text-right">
                    <h1 class="m-0">SEO Meta List</h1>
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
                    <table id="seoMetaList" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Title</th>
                                <th>Page URL</th>
                                <th>Description</th>
                                <th>Created On</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Title</th>
                                <th>Page URL</th>
                                <th>Description</th>
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
    $("#seoMetaList").DataTable({
        responsive: true,
        lengthChange: false,
        autoWidth: false,
        info: true,
        ordering: true,
        paging: true,
        pageLength: 10,
        processing: true,
        serverSide: true,
       /// stateSave: true,
        ajax: {
            url: '<?= base_url('/fetchSeoMeta') ?>',
                data: function (d) {
        console.log("Sent Data:", d);  // ✅ Debugging
        return d;
    },
            dataSrc: function(json) {
                console.log("API Response:", json); // ✅ Debugging
                return json.data;
            }
        },

        order: [[0, 'desc']], // Order by the first column (ID) in descending order
        columnDefs: [
            {
                targets: -1, 
                searchable: false,  // ❌ Make it non-searchable
                orderable: false,   // ❌ Make it non-sortable
                data: null, 
                render: function (data, type, row) {
                    return `<a href="<?= base_url('/') ?>seo-meta/edit/${row[0]}" class="btn btn-sm btn-info">
                                <i class="fa fa-pencil-alt"></i>
                            </a>`;
                }
            }
        ]
    });
  });
</script>
<?= $this->endSection() ?>