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
              <h3 class="page-title">Childs Tree View</h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Consumer</a></li>
                  <li class="breadcrumb-item active" aria-current="page"> Childs Tree View </li>
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <h4 class="card-header text-center">Childs Tree View</h4>
                  <div class="card-body">
                    <!--<div class="card-description btn btn-info"><a class="text-light" href="<?php echo e(route('backoffice.register')); ?>">Add Backoffice User</a></div>-->
                    <h4 class="card-title ">Click Too Expand</h4>
                      <div>
                        <?php $__currentLoopData = $ParentInfo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parent_info): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="body genealogy-body genealogy-scroll">
                            <div class="genealogy-tree">
                                <ul>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="member-view-box">
                                                <div class="member-image">
                                                    <img class="mb-2" src="<?php echo e(asset('backend/images/user.webp')); ?>" alt="Member">
                                                    <div class="member-details">
                                                        <h3><?php echo e($parent_info->consumer_name); ?></h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        <ul class="active">
                                            <?php $__currentLoopData = $ConsumerInformation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child_one): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <div class="member-view-box">
                                                        <div class="member-image">
                                                            <img class="mb-2" src="<?php echo e(asset('backend/images/user.webp')); ?>" alt="Member">
                                                            <div class="member-details">
                                                                <?php 
                                                                    $names = explode(" ", $child_one->consumer_name);
                                                                ?>
                                                                <h3><?php echo e($names[0]); ?></h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                                <ul>
                                                    <?php
                                                      $ChildTwo= \App\Models\ConsumerInformation::where('parent_id','=',$child_one->consumer_id)
                                                      ->get();
                                                    ?>
                                                    
                                                    <?php $__currentLoopData = $ChildTwo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child_two): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li>
                                                        <a href="javascript:void(0);">
                                                            <div class="member-view-box">
                                                                <div class="member-image">
                                                                    <img class="mb-2" src="<?php echo e(asset('backend/images/user.webp')); ?>" alt="Member">
                                                                    <div class="member-details">
                                                                        <?php 
                                                                            $names_one = explode(" ", $child_two->consumer_name);
                                                                        ?>
                                                                        <h3><?php echo e($names_one[0]); ?></h3>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                        <ul>
                                                            <?php
                                                              $ChildThree= \App\Models\ConsumerInformation::where('parent_id','=',$child_two->consumer_id)
                                                              ->get();
                                                            ?>
                                                            
                                                            <?php $__currentLoopData = $ChildThree; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $child_three): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <li>
                                                                <a href="javascript:void(0);">
                                                                    <div class="member-view-box">
                                                                        <div class="member-image">
                                                                            <img class="mb-2" src="<?php echo e(asset('backend/images/user.webp')); ?>" alt="Member">
                                                                            <div class="member-details">
                                                                                <?php 
                                                                                    $names_two = explode(" ", $child_three->consumer_name);
                                                                                ?>
                                                                                <h3><?php echo e($names_two[0]); ?></h3>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </ul>
                                                    </li>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </ul>
                                            </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                  </div>
                </div>
              </div>
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/onlioxoq/public_html/backofficel/resources/views/dashboard/consumer/viewChilds.blade.php ENDPATH**/ ?>