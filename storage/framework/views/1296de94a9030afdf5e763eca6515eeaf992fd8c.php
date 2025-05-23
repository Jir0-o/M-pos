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
        
        <?php $__currentLoopData = $allConsumerInfo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="main-panel">
             <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"><?php echo e($user->consumer_name); ?></h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Consumer</a></li>
                  <li class="breadcrumb-item active" aria-current="page"> <?php echo e($user->consumer_name); ?> </li>
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-header text-center"> Consumer Details </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="p-3 col-md-3 border">
                                <p class="h4 py-2"> Name :</p>
                                <?php echo e($user->consumer_name); ?>

                            </div>
                            <div class="p-3 col-md-3 border">
                                <p class="h4 py-2"> Email :</p>
                                <?php echo e($user->email); ?>

                            </div>
                            <div class="p-3 col-md-3 border">
                                <p class="h4 py-2"> Mobile No :</p>
                                <?php echo e($user->mobile_no); ?>

                            </div>
                            <div class="p-3 col-md-3 border">
                                <p class="h4 py-2"> SAL : </p>
                                <?php if($user->level_id == 1): ?>
                                    User
                                <?php elseif($user->level_id == 2): ?>
                                    Marchentizer
                                <?php elseif($user->level_id == 3): ?>
                                    Shop Owner
                                <?php elseif($user->level_id == 4): ?>
                                    Profit Partner
                                <?php else: ?>
                                    Null
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="p-3 col-md-3 border">
                                <p class="h4 py-2"> Address :</p>
                                <?php echo e($user->address); ?>

                            </div>
                            <div class="p-3 col-md-3 border">
                                <p class="h4 py-2"> Zip code :</p>
                                <?php echo e($user->zip_code); ?>

                            </div>
                            <div class="p-3 col-md-3 border">
                                <p class="h4 py-2"> Cash For Referral :</p>
                                <div class="alert alert-danger"><?php echo e($user->cash_for_referral); ?></div>
                            </div>
                            <div class="p-3 col-md-3 border">
                                <p class="h4 py-2"> Cash For Points :</p>
                                <div class="alert alert-danger"><?php echo e($user->cash_for_points); ?></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="p-3 col-md-3 border">
                                <p class="h4 py-2"> Accumulated Points :</p>
                                <div class="alert alert-danger"><?php echo e($user->accumulated_points); ?></div>
                            </div>
                        </div>
                        <div class="row float-right">
                          <div class="p-3 col-md-12">
                                <a href="<?php echo e(URL::previous()); ?>" class="btn btn-primary"> Back </a>
                          </div>  
                        </div>
                        
                        
                    </div>
                </div>
              </div>
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/onlioxoq/public_html/backofficel/resources/views/dashboard/consumer/viewConsumer.blade.php ENDPATH**/ ?>