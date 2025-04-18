<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                  
                </div><!-- /.col -->
                <div class="col-sm-6 text-right">
                    <h1 class="m-0">Leads List</h1>
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
            <table id="leadsList" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Name</th>
                  <th>Mobile</th>
                  <th>Loan Type</th>
                  <th>Loan Amount</th>
                  <th>Status</th>
                  <th>Source</th>
                  <th>Remark</th>
                  <th>Created On</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Id</th>
                  <th>Name</th>
                  <th>Mobile</th>
                  <th>Loan Type</th>
                  <th>Loan Amount</th>
                  <th>Status</th>
                  <th>Source</th>
                  <th>Remark</th>
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

<!-- Remarks Modal -->
<!-- Remarks Modal -->
<div class="modal fade" id="remarkModal" tabindex="-1" role="dialog" aria-labelledby="remarkModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="remarkModalLabel">Lead Remarks</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Name Input -->
                <div class="form-group">
                    <label for="leadName">Name</label>
                    <input type="text" id="leadName" class="form-control" placeholder="Enter Name" readonly>
                </div>

                <!-- Mobile Input -->
                <div class="form-group">
                    <label for="leadMobile">Mobile</label>
                    <input type="text" id="leadMobile" class="form-control" placeholder="Enter Mobile" readonly>
                </div>

                <!-- Remarks Textarea -->
                <div class="form-group">
                    <label for="leadRemarks">Remarks</label>
                    <textarea id="leadRemarks" class="form-control" rows="4" placeholder="Enter remarks here..."></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="saveRemark">Save Remark</button>
            </div>
        </div>
    </div>
</div>



<?= $this->section('scripts') ?>
<script>
    $(function () {
        $("#leadsList").DataTable({
            responsive: true,
            lengthChange: false,
            autoWidth: false,
            info: true,
            ordering: true,
            paging: true,
            pageLength: 10,
            processing: true,
            serverSide: true,
            ajax: {
                url: '<?= base_url('/fetchLeads') ?>',
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
                    data: 6, 
                    render: function(data) { return data ? data : 'N/A'; } // ✅ Created On
                },                
                { 
                    data: 7, 
                    render: function(data) { return data ? data : 'N/A'; } // ✅ Created On
                },               
                { 
                    data: 8, 
                    render: function(data) { return data ? data : 'N/A'; } // ✅ Created On
                },
                { 
                    data: null, // Actions
                    searchable: false,
                    orderable: false,
                    render: function (data, type, row) {
                        return `
                            <a href="<?= base_url('/') ?>lead/edit/${row[0]}" class="btn btn-sm btn-info">
                                <i class="fa fa-pencil-alt"></i>
                            </a>
                            <button class="btn btn-sm btn-warning remark-btn" data-name="${row[1]}" data-mobile="${row[2]}" data-id="${row[0]}" data-toggle="modal" data-target="#remarkModal">
                                <i class="fa fa-comment"></i>
                            </button>
                        `;
                    }

                }
            ]
        });
    });


$(document).ready(function () {
    let leadId = null;
    let name = null;
    let mobile = null;

    // Open the remarks modal and store lead ID
    $(document).on('click', '.remark-btn', function () {

        leadId = $(this).data('id');  // Get lead ID
        name = $(this).data('name');  // Get lead ID
        mobile = $(this).data('mobile');  // Get lead ID

        $('#leadRemarks').val(''); // Clear previous text
        $('#leadName').val(name); // Clear previous text
        $('#leadMobile').val(mobile); // Clear previous text
        $('#remarkModal').modal('show');
    });

    // Save the remark when clicking the button
    $('#saveRemark').click(function () {
        let remark = $('#leadRemarks').val();

        if (remark.trim() === '') {
            alert('Please enter a remark.');
            return;
        }

        $.ajax({
            url: "<?= base_url('lead/save_remark') ?>",
            type: "POST",
            data: { lead_id: leadId, remark: remark },
            success: function (response) {
                alert('Remark saved successfully!');
                $('#remarkModal').modal('hide');
                $('#leadName').val(''); // Clear previous text
                $('#leadMobile').val(''); // Clear previous text
                $('#leadRemarks').val(''); // Clear previous text

                $("#leadsList").DataTable().ajax.reload(null, false); // Keep current page

            },
            error: function () {
                alert('Failed to save remark. Try again.');
            }
        });
    });
});

</script>

<?= $this->endSection() ?>