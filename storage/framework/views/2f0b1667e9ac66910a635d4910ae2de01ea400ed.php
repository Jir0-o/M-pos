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
            <div class="content-wrapper pb-0">

        <!--Bank Section Start---->

        <div class="card">
            <div class="card-title">
                <h4 class="p-3 text-center">Generate Transaction Report</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                    <div class="form-group row">
                        <div class="col-12 col-md-4 col-lg-4 col-form-label">Bank Name:</div>
                        <div class="col-12 col-md-8 col-lg-8">
                        <select id="bank_id" class="form-control mt-2" name="bank_id"></select>
                        </div>
                    </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group row">
                        <div class="col-12 col-md-4 col-lg-4 col-form-label">Trx Type</div>
                        <div class="col-12 col-md-8 col-lg-8">
                        <select id="trx_type" class="form-control mt-2" name="trx_type">
                        <option selected disabled>---------Select---------</option>
                        <option value="1">Deposit</option><option value="2">Withdraw</option>    
                        </select>
                        </div>
                    </div>
                    </div>
                </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                        <div class="col-12 col-md-4 col-lg-4 col-form-label">Trx Mode</div>
                        <div class="col-12 col-md-8 col-lg-8">
                        <select id="trx_mode" class="form-control mt-2" name="trx_mode">
                        <option selected disabled>---------Select---------</option>
                        <option value="1">Cash</option><option value="2">Cheque</option><option value="3">ATM</option><option value="4">Others</option>    
                        </select>
                        </div>
                    </div>
                    </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <div class="col-12 col-md-4 col-lg-4 col-form-label">Cheque No</div>
                        <div class="col-12 col-md-8 col-lg-8">
                        <input type="text" id="cheque_no" class="form-control mt-2" name="cheque_no" />
                        </div>
                    </div>
                    </div>
                </div>
            <div class="row">
                    <div class="col-md-6">
                    <div class="form-group row">
                        <div class="col-12 col-md-4 col-lg-4 col-form-label">From Date</div>
                        <div class="col-12 col-md-8 col-lg-8">
                        <input type="date" id="from_date" class="form-control mt-2" name="from_date" />
                        </div>
                    </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group row">
                        <div class="col-12 col-md-4 col-lg-4 col-form-label">To Date</div>
                        <div class="col-12 col-md-8 col-lg-8">
                        <input type="date" id="to_date" class="form-control mt-2" name="to_date" />
                        </div>
                    </div>
                    </div>
                </div>
                <div class="form-group text-right">
                    <button id="generate" type="submit" class="btn btn-primary mt-2">Generate</button>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-md-12 col-lg-12">
                                <table id="example" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Bank</th>
                                                <th>Trx Type</th>
                                                <th>Trx Mode</th>
                                                <th>prev Balance</th>
                                                <th>Amount</th>
                                                <th>Curr Balance</th>
                                            </tr>
                                        </thead>
                                        <tbody id="trxtt">
                                            <?php $__currentLoopData = $bankTrx; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Trx): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($Trx->trx_type == 1): ?>
                                                    <tr style="background-color:#bff5da;">
                                                <?php else: ?>
                                                    <tr style="background-color:#f7dada;">
                                                <?php endif; ?>
                                                    <?php $j=1; ?>
                                                       <td> <?php echo e($j++); ?></td>
                                                        <td><?php echo e($Trx->bank_name); ?></td>
                                                        <?php if($Trx->trx_type==1): ?>
                                                            <td>Deposit</td>
                                                        <?php else: ?>
                                                            <td>Withdraw</td>
                                                        <?php endif; ?>
                                                        <?php if($Trx->trx_mode==1): ?>
                                                        <td>Cash</td>
                                                        <?php elseif($Trx->trx_mode==2): ?>
                                                            <td>Checque</td>
                                                        
                                                        <?php elseif($Trx->trx_mode == 3): ?>
                                                            <td>ATM</td>
                                                        
                                                        <?php elseif($Trx->trx_mode == 4): ?>
                                                            <td>Others</td>
                                                        <?php endif; ?>
                                                        <td><?php echo e($Trx->prev_balance); ?></td>
                                                        <td><?php echo e($Trx->amount); ?></td>
                                                        <td><?php echo e($Trx->current_balance); ?></td>
                                                    </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>      
            </div>
        </div>
        <!--Bank Section End---->
    </div>

</div>
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
        </script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/simple-icons/3.2.0/tata.js"></script>

        <script type="text/javascript">
        $(document).ready(function() { 
            var abd="";
                abd+="<option selected disabled>---------Select---------</option>" 
                $.ajax({
                url: '<?php echo e(route('backoffice.ajax-all-bank')); ?>',
                type: "GET",
                data: {
                    "_token": "<?php echo e(csrf_token()); ?>"
                },
                dataType: "json",
                success: function(data) {
                        $.each(data, function(col, bank) {
                            abd+='<option value="'+bank.bank_id+'">'+bank.bank_name+'</option>'
                        });
                        $("#bank_id").append(abd);
                    }
                });
                
                $("#generate").on("click",function(){
                    var bank_id = $("#bank_id").val();
                    var trx_type = $("#trx_type").val();
                    var trx_mode = $("#trx_mode").val();
                    var cheque_no=$("#cheque_no").val();
                    var from_date=$("#from_date").val();
                    var to_date=$("#to_date").val();

                    $.ajax({
                    url: '<?php echo e(route('backoffice.ajax-generate-report')); ?>',
                    type: "POST",
                    data: {
                        "_token": "<?php echo e(csrf_token()); ?>",
                        "bank_id": bank_id,
                        "trx_type": trx_type,
                        "trx_mode": trx_mode,
                        "cheque_no": cheque_no,
                        "from_date": from_date,
                        "to_date": to_date,
                    },
                    dataType: "json",
                    success: function(data) {
                    $("#trxtt").empty();
                    var trxdtd="";
                    var j=1;
                        $.each(data, function(col, bank) {
                            if(bank.trx_type==1){
                            trxdtd+='<tr style="background-color:#bff5da;">'
                            }else{
                                trxdtd+='<tr style="background-color:#f7dada;">'
                            }
                                trxdtd+='<td>'+ j++ +'</td>'
                                trxdtd+='<td>'+bank.bank_name+'</td>'
                                if(bank.trx_type==1){
                                trxdtd+='<td>Deposit</td>'
                                }else{
                                    trxdtd+='<td>Withdraw</td>'
                                }
                                if(bank.trx_mode==1){
                                trxdtd+='<td>Cash</td>'
                                }else if(bank.trx_mode==2){
                                    trxdtd+='<td>Checque</td>'
                                
                                }else if(bank.trx_mode == 3){
                                    trxdtd+='<td>ATM</td>'
                                
                                }else if(bank.trx_mode == 4){
                                    trxdtd+='<td>Others</td>'
                                }
                                trxdtd+='<td>'+bank.prev_balance+'</td>'
                                trxdtd+='<td>'+bank.amount+'</td>'
                                trxdtd+='<td>'+bank.current_balance+'</td>'
                            trxdtd+='</tr>'
                        });
                        $("#trxtt").append(trxdtd);
                    }
                });
            });
        });
        </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/nescggna/public_html/mpos/resources/views/bank/trxReport.blade.php ENDPATH**/ ?>