<div class="row">
    <div class="col-md-12">
        <div class="card">

            <div class="toolbar">
                <button id="add" class="btn btn-primary btn-fill" data-toggle="modal" data-target="#addModal" onclick="addModal()">
                    <i class="fa fa-plus" aria-hidden="true"></i> Add
                </button>
            </div>

            <table id="bootstrap-table" class="table table-no-bordered" data-url="/yoyo/index.php/customer/fetchData">
                <thead>
                    <th data-field="state" data-checkbox="true"></th>
                    <th data-field="id" class="text-center">ID</th>
                    <th data-field="name">Name</th>
                    <th data-field="type">Type</th>
                    <th data-field="credit">Credit</th>
                    <th data-field="actions" class="td-actions text-right">Actions</th>
                </thead>
            </table>
        </div>
        <!--  end card  -->
    </div>
    <!-- end col-md-12 -->
</div>
<!-- end row -->


<!-- add -->
<div class="modal fade" role="dialog" id="addModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add Customer</h4>
            </div>
            <form method="post" action="customer/create" id="createForm">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="customerName">Name * </label>
                        <input type="text" class="form-control" id="customerName" name="customerName" placeholder="Customer Name">
                    </div>
                    <div class="form-group">
                        <label for="customerType">Type*</label>
                        <div class="row">
                            <div class="col-lg-2">
                                <label class="radio"><span class="icons"><span class="first-icon fa fa-circle-o"></span><span class="second-icon fa fa-dot-circle-o"></span></span><input type="radio" data-toggle="radio" name="customerType" value="cash">Cash</label>
                            </div>
                            <div class="col-lg-2">
                                <label class="radio"><span class="icons"><span class="first-icon fa fa-circle-o"></span><span class="second-icon fa fa-dot-circle-o"></span></span><input type="radio" data-toggle="radio" name="customerType" value="credit">Credit</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="customerCredit">Credit*</label>
                        <input type="text" class="form-control" id="customerCredit" name="customerCredit" placeholder="Customer Credit">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-fill" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary btn-fill">Save changes</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- /add -->

<!-- edit -->
<div class="modal fade" tabindex="-1" role="dialog" id="editModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Customer</h4>
            </div>
            <div class="modal-body" id="loader-modal">
                <div class="loader"></div>
            </div>
            <div id="modal-body">
                <form method="post" action="customer/edit" id="editForm">

                    <div class="modal-body">
                        <div class="form-group">
                            <label for="editCustomerName">Name * </label>
                            <input type="text" class="form-control" id="editCustomerName" name="editCustomerName" placeholder="Customer Name">
                        </div>
                        <div class="form-group">
                            <label for="editCustomerType">Type * </label>
                            <div class="row">
                                <div class="col-lg-2">
                                    <label for="cash" class="radio"><span class="icons"><span class="first-icon fa fa-circle-o"></span><span class="second-icon fa fa-dot-circle-o"></span></span><input type="radio" data-toggle="radio" name="editCustomerType" value="cash">Cash</label>
                                </div>
                                <div class="col-lg-2">
                                    <label for="credit" class="radio"><span class="icons"><span class="first-icon fa fa-circle-o"></span><span class="second-icon fa fa-dot-circle-o"></span></span><input type="radio" data-toggle="radio" name="editCustomerType" value="credit">Credit</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="editCustomerCredit">Customer Credit * </label>
                            <input type="text" class="form-control" id="editCustomerCredit" name="editCustomerCredit" placeholder="Customer Credit">
                        </div>
                        <div class="form-group">
                            <label for="createdAt">Created At</label>
                            <input type="text" class="form-control" id="createdAt" name="createdAt" disabled>
                        </div>
                        <div class="form-group">
                            <label for="updatedAt">Updated At</label>
                            <input type="text" class="form-control" id="updatedAt" name="updatedAt" disabled>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-fill" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-fill">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- /edit -->

<script type="text/javascript">
    var $table = $('#bootstrap-table');
    $().ready(function() {
        $table.bootstrapTable({
            toolbar: ".toolbar",
            search: true,
            showToggle: true,
            showColumns: true,
            pagination: true,
            searchAlign: 'left',
            buttonsAlign: 'left',
            toolbarAlign: 'right',
            pageSize: 5,
            clickToSelect: false,
            pageList: [5, 10, 20, 50, 100],
            showExport: true,

            formatShowingRows: function(pageFrom, pageTo, totalRows) {
                //do nothing here, we don't want to show the text "showing x of y from..."
            },
            formatRecordsPerPage: function(pageNumber) {
                return pageNumber + " rows visible";
            },
            icons: {
                refresh: 'fa fa-refresh',
                toggle: 'fa fa-th-list',
                columns: 'fa fa-columns',
                detailOpen: 'fa fa-plus-circle',
                detailClose: 'fa fa-minus-circle'
            }
        });

        $(window).resize(function() {
            $table.bootstrapTable('resetView');
        });

        $('.modal').appendTo("body");
    });


    function addModal() {
        $("#createForm")[0].reset();

        //remove textdanger
        $(".text-danger").remove();
        // remove form-group
        $(".form-group").removeClass('has-error').removeClass('has-success');

        $("#createForm").unbind('submit').bind('submit', function() {
            var form = $(this);

            // remove the text-danger
            $(".text-danger").remove();

            $.ajax({
                url: form.attr('action'),
                type: form.attr('method'),
                data: form.serialize(), // /converting the form data into array and sending it to server
                dataType: 'json',
                success: function(response) {
                    if (response.success === true) {
                        $(".messages").html('<div class="alert alert-success alert-dismissible" role="alert">' +
                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                            '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>' + response.messages +
                            '</div>');

                        // hide the modal
                        $("#addModal").modal('hide');


                        $table.bootstrapTable('refresh');

                    }
                    else {
                        if (response.messages instanceof Object) {
                            $.each(response.messages, function(index, value) {
                                var id = $("#" + index);

                                id
                                    .closest('.form-group')
                                    .removeClass('has-error')
                                    .removeClass('has-success')
                                    .addClass(value.length > 0 ? 'has-error' : 'has-success')
                                    .after(value);

                            });
                        }
                        else {
                            $(".messages").html('<div class="alert alert-warning alert-dismissible" role="alert">' +
                                '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                                '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>' + response.messages +
                                '</div>');
                        }
                    }
                }
            });

            return false;
        });



    }

    function editModal(id = null) {
        if (id) {
            $("#editForm")[0].reset();
            $("#editForm label").removeClass('checked');
            $('.form-group').removeClass('has-error').removeClass('has-success');
            $('.text-danger').remove();
            $('#loader-modal').show();
            $('#modal-body').hide();

            $.ajax({
                url: 'customer/getInfo/' + id,
                type: 'post',
                dataType: 'json',
                success: function(response) {
                    $("#editCustomerName").val(response.customer_name);

                    var $label = $("label[for='" + response.customer_type + "']");
                    $label.addClass('checked');

                    $("#editCustomerCredit").val(response.customer_credit);

                    $("#createdAt").val(response.created_at);

                    $("#updatedAt").val(response.updated_at);

                    $('#modal-body').show();
                    $('#loader-modal').hide();

                    $("#editForm").unbind('submit').bind('submit', function() {

                        var form = $(this);

                        $.ajax({
                            url: form.attr('action') + '/' + id,
                            type: 'post',
                            data: form.serialize(),
                            dataType: 'json',
                            success: function(response) {
                                    if (response.success === true) {
                                        $(".messages").html('<div class="alert alert-success alert-dismissible" role="alert">' +
                                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                                            '<strong> <span class="glyphicon glyphicon-ok-sign"></span> </strong>' + response.messages +
                                            '</div>');

                                        // hide the modal
                                        $("#editModal").modal('hide');

                                        $table.bootstrapTable('refresh');

                                    }
                                    else {
                                        $('.text-danger').remove()
                                        if (response.messages instanceof Object) {
                                            $.each(response.messages, function(index, value) {
                                                var id = $("#" + index);

                                                id
                                                    .closest('.form-group')
                                                    .removeClass('has-error')
                                                    .removeClass('has-success')
                                                    .addClass(value.length > 0 ? 'has-error' : 'has-success')
                                                    .after(value);

                                            });
                                        }
                                        else {
                                            $(".messages").html('<div class="alert alert-warning alert-dismissible" role="alert">' +
                                                '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                                                '<strong> <span class="glyphicon glyphicon-exclamation-sign"></span> </strong>' + response.messages +
                                                '</div>');
                                        }
                                    }
                                } // /succes
                        }); // /ajax

                        return false;
                    });

                }
            });
        }
        else {
            alert('error');
        }
    }
</script>