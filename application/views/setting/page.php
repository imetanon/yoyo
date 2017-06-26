<div class="row">
    <div class="col-md-12">
        <div class="card">

            <div class="toolbar">
                <button id="add" class="btn btn-primary btn-fill" data-toggle="modal" data-target="#addModal" onclick="addModal()">
                    <i class="fa fa-plus" aria-hidden="true"></i> Add
                </button>
            </div>

            <table id="bootstrap-table" class="table table-no-bordered" data-url="/yoyo/index.php/setting_page/fetchData">
                <thead>
                    <th data-field="state" data-checkbox="true"></th>
                    <th data-field="id" class="text-center">ID</th>
                    <th data-field="name">Name</th>
                    <th data-field="link">Link</th>
                    <th data-field="controller">Controller</th>
                    <th data-field="group">Group</th>
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
                <h4 class="modal-title">Add Page</h4>
            </div>
            <form method="post" action="" id="createForm">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="pageName">Name * </label>
                        <input type="text" class="form-control" id="pageName" name="pageName" placeholder="Page Name">
                    </div>
                    <div class="form-group">
                        <label for="pageLink">Link*</label>
                        <input type="text" class="form-control" id="pageLink" name="pageLink" placeholder="Page Link">
                    </div>
                    <div class="form-group">
                        <label for="pageController">Controller*</label>
                        <input type="text" class="form-control" id="pageController" name="pageController" placeholder="Page Contoller">
                    </div>
                    <div class="form-group">
                        <label for="contact"></label>
                        <input type="text" class="form-control" id="contact" name="contact" placeholder="Contact">
                    </div>
                    <div class="form-group">
                        <label for="address"></label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="Address">
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
                        $("#addMember").modal('hide');

                        // update the manageMemberTable
                        manageMemberTable.ajax.reload(null, false);

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
</script>