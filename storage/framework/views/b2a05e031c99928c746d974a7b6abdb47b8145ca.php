

<?php $__env->startSection('content'); ?>
    <div class="container-scroller">
        <?php echo $__env->make('dashboard.pertials.sideNav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="container-fluid page-body-wrapper">
            <div id="theme-settings" class="settings-panel">
                <i class="settings-close mdi mdi-close"></i>
                <p class="settings-heading">SIDEBAR SKINS</p>
                <div class="sidebar-bg-options selected" id="sidebar-default-theme">
                    <div class="img-ss rounded-circle bg-light border mr-3"></div> Default
                </div>
                <div class="sidebar-bg-options" id="sidebar-dark-theme">
                    <div class="img-ss rounded-circle bg-dark border mr-3"></div> Dark
                </div>
                <p class="settings-heading mt-2">HEADER SKINS</p>
                <div class="color-tiles mx-0 px-4">
                    <div class="tiles light"></div>
                    <div class="tiles dark"></div>
                </div>
            </div>
            <?php echo $__env->make('dashboard.pertials.topNav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title">Purchase Report</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Reports</a></li>
                                <li class="breadcrumb-item active" aria-current="page"> Purchase Report </li>
                            </ol>
                        </nav>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="input-group mb-4">
                                <div class="input-group col-xs-12">
                                    <span class="input-group-append">
                                        <span class="file-upload-browse btn btn-primary"> From </span>
                                    </span>
                                    <input id="from" type="date" class="form-control file-upload-info" placeholder="From">
                                    <input id="to" type="date" class="form-control file-upload-info" placeholder="To">
                                    <span class="input-group-append">
                                        <span class="file-upload-browse btn btn-primary"> To </span>
                                    </span>
                                </div>
                            </div>
                            <div class="mb-4" id="error"></div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group mb-4">
                                <div class="input-group col-xs-12">
                                    <input id="singledate" type="date" name="singledate" class="form-control file-upload-info" placeholder="To">
                                    <span class="input-group-append">
                                        <span class="file-upload-browse btn btn-primary"> Date </span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12 col-md-9 col-lg-9">
                                            <h4 class="card-title pb-3">PURCHASE REPORT</h4>
                                        </div>
                                        <div class="col-12 col-md-3 col-lg-3 text-right">
                                            <button type="button" class="btn btn-primary btn-icon-text"> Print <i class="mdi mdi-printer btn-icon-append"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Date</th>
                                                <th>Pur No</th>
                                                <th>Ref No</th>
                                                <th>Purchase Amount</th>
                                                <th>Discount</th>
                                                <th>Vat</th>
                                                <th>Payable</th>
                                                <th>Paid</th>
                                                <th>Due</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody id="sales"></tbody>
                                        <tfoot id="summary"></tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- main-panel ends -->
                </div>
                <!-- page-body-wrapper ends -->
            </div>
            <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
                integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
            </script>

            <script type="text/javascript">
                $(document).ready(function() {
                    var nodata='<tr><td colspan="10" class="text-center"><p>Select Date For Result</p></td></tr>'
                    $('#sales').append(nodata);
                    $("#error").empty();

                    $(document).on('change', '#singledate', function(e) {
                        var singledate=$(this).val();
                        console.log(singledate);
                        $('#sales').empty();
                        $('#summary').empty();
                         $("#error").empty();
                        $.ajax({
                                url: 'single-date-purchase/'+singledate,
                                type: "GET",
                                data: {
                                    "_token": "<?php echo e(csrf_token()); ?>",
                                },
                                dataType: "json",
                                success: function(data) {
                                    var i=0;
                                    var dshtml;
                                    console.log(data);
                                    $.each(data.singleDateSales, function(col, dsdata) {
                                        i=i+1;
                                        dshtml='<tr>'
                                            dshtml+='<td>'+ i +'</td>'
                                            dshtml+='<td>'+ dsdata.pur_date +'</td>'
                                            dshtml+='<td>'+ dsdata.purchase_id +'</td>'
                                            dshtml+='<td>'+ dsdata.ref_no +'</td>'
                                            dshtml+='<td>'+ dsdata.total_item_price +'</td>'
                                            dshtml+='<td>'+ dsdata.discount +'</td>'
                                            dshtml+='<td>'+ dsdata.total_vat +'</td>'
                                            dshtml+='<td>'+ dsdata.total_payable +'</td>'
                                            dshtml+='<td>'+ dsdata.paid_amount +'</td>'
                                            dshtml+='<td>'+ dsdata.due_amount +'</td>'
                                            dshtml+='<td>'+ dsdata.paid_status +'</td>'
                                        dshtml+='</tr>';
                                        $('#sales').append(dshtml);
                                    });

                                   var summary_data='<tr class="h4 bg-secondary">'
                                            summary_data+='<td colspan="2">Summary</td>'
                                            summary_data+='<td>'+ data.summary.total_orders +'</td>'
                                            summary_data+='<td></td>'
                                            summary_data+='<td>'+ data.summary.invoice_amount +'</td>'
                                            summary_data+='<td>'+ data.summary.discount +'</td>'
                                            summary_data+='<td>'+ data.summary.vat +'</td>'
                                            summary_data+='<td>'+ data.summary.payable +'</td>'
                                            summary_data+='<td>'+ data.summary.paid +'</td>'
                                            summary_data+='<td>'+ data.summary.due +'</td>'
                                            summary_data+='<td></td>'
                                        summary_data+='</tr>';
                                    $('#summary').append(summary_data);
                                    $("#error").empty();
                                     
                                }
                               
                            });
                    });

                    $(document).on('change', '#from', function(e) {
                        $('#sales').empty();
                        $('#summary').empty();
                        var from=$("#from").val();
                        var to=$("#to").val();
                        if(!to){
                            $("#error").append('<div class="alert alert-danger"> To Date Is Required</div>');
                            return;
                        }
                        if(!from){
                            $("#error").append('<div class="alert alert-danger"> From Date Is Required</div>');
                            return;
                        }

                        $.ajax({
                                url: 'multi-date-purchase/'+from+'/'+to,
                                type: "GET",
                                data: {
                                    "_token": "<?php echo e(csrf_token()); ?>",
                                },
                                dataType: "json",
                                success: function(data) {
                                    console.log(data);
                                    var i=0;
                                    var dshtml;
                                    console.log(data);
                                    $.each(data.singleDateSales, function(col, dsdata) {
                                        i=i+1;
                                        dshtml='<tr>'
                                            dshtml+='<td>'+ i +'</td>'
                                            dshtml+='<td>'+ dsdata.pur_date +'</td>'
                                            dshtml+='<td>'+ dsdata.purchase_id +'</td>'
                                            dshtml+='<td>'+ dsdata.ref_no +'</td>'
                                            dshtml+='<td>'+ dsdata.total_item_price +'</td>'
                                            dshtml+='<td>'+ dsdata.discount +'</td>'
                                            dshtml+='<td>'+ dsdata.total_vat +'</td>'
                                            dshtml+='<td>'+ dsdata.total_payable +'</td>'
                                            dshtml+='<td>'+ dsdata.paid_amount +'</td>'
                                            dshtml+='<td>'+ dsdata.due_amount +'</td>'
                                            dshtml+='<td>'+ dsdata.paid_status +'</td>'
                                        dshtml+='</tr>';
                                        $('#sales').append(dshtml);
                                    });

                                   var summary_data='<tr class="h4 bg-secondary">'
                                            summary_data+='<td colspan="2">Summary</td>'
                                            summary_data+='<td>'+ data.summary.total_orders +'</td>'
                                            summary_data+='<td></td>'
                                            summary_data+='<td>'+ data.summary.invoice_amount +'</td>'
                                            summary_data+='<td>'+ data.summary.discount +'</td>'
                                            summary_data+='<td>'+ data.summary.vat +'</td>'
                                            summary_data+='<td>'+ data.summary.payable +'</td>'
                                            summary_data+='<td>'+ data.summary.paid +'</td>'
                                            summary_data+='<td>'+ data.summary.due +'</td>'
                                            summary_data+='<td></td>'
                                        summary_data+='</tr>';
                                    $('#summary').append(summary_data);
                                    $("#error").empty();
                                     
                                }
                               
                            });
                    });
                    $(document).on('change', '#to', function(e) {
                        $('#sales').empty();
                        $('#summary').empty();
                        var from=$("#from").val();
                        var to=$("#to").val();
                        if(!to){
                            $("#error").append('<div class="alert alert-danger"> To Date Is Required</div>');
                            return;
                        }
                        if(!from){
                            $("#error").append('<div class="alert alert-danger"> From Date Is Required</div>');
                            return;
                        }

                        $.ajax({
                                url: 'multi-date-purchase/'+from+'/'+to,
                                type: "GET",
                                data: {
                                    "_token": "<?php echo e(csrf_token()); ?>",
                                },
                                dataType: "json",
                                success: function(data) {
                                    console.log(data);
                                    var i=0;
                                    var dshtml;
                                    console.log(data);
                                    $.each(data.singleDateSales, function(col, dsdata) {
                                        i=i+1;
                                        dshtml='<tr>'
                                            dshtml+='<td>'+ i +'</td>'
                                            dshtml+='<td>'+ dsdata.pur_date +'</td>'
                                            dshtml+='<td>'+ dsdata.purchase_id +'</td>'
                                            dshtml+='<td>'+ dsdata.ref_no +'</td>'
                                            dshtml+='<td>'+ dsdata.total_item_price +'</td>'
                                            dshtml+='<td>'+ dsdata.discount +'</td>'
                                            dshtml+='<td>'+ dsdata.total_vat +'</td>'
                                            dshtml+='<td>'+ dsdata.total_payable +'</td>'
                                            dshtml+='<td>'+ dsdata.paid_amount +'</td>'
                                            dshtml+='<td>'+ dsdata.due_amount +'</td>'
                                            dshtml+='<td>'+ dsdata.paid_status +'</td>'
                                        dshtml+='</tr>';
                                        $('#sales').append(dshtml);
                                    });

                                   var summary_data='<tr class="h4 bg-secondary">'
                                            summary_data+='<td colspan="2">Summary</td>'
                                            summary_data+='<td>'+ data.summary.total_orders +'</td>'
                                            summary_data+='<td></td>'
                                            summary_data+='<td>'+ data.summary.invoice_amount +'</td>'
                                            summary_data+='<td>'+ data.summary.discount +'</td>'
                                            summary_data+='<td>'+ data.summary.vat +'</td>'
                                            summary_data+='<td>'+ data.summary.payable +'</td>'
                                            summary_data+='<td>'+ data.summary.paid +'</td>'
                                            summary_data+='<td>'+ data.summary.due +'</td>'
                                            summary_data+='<td></td>'
                                        summary_data+='</tr>';
                                    $('#summary').append(summary_data);
                                    $("#error").empty();
                                     
                                }
                               
                            });
                    });
                });
            </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\ussbd\POSSIE\resources\views/possie/reports/purchaseReport.blade.php ENDPATH**/ ?>