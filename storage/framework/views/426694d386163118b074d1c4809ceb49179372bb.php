
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
        <!--store Section Start---->

        <div class="card">
            <div class="card-title">
                <h4 class="p-3 text-center">Edit Store</h4>
                <hr>
            </div>
            <div class="card-body">
                <?php if(session()->has('fail')): ?>

                <div class="alert alert-danger"><?php echo e(session()->get('fail')); ?></div>

                <?php endif; ?>

              <form action="<?php echo e(route('backoffice.update-store',$getdatas->store_id)); ?>" method="post" enctype="multipart/form-data">

                <?php echo csrf_field(); ?>
                <?php echo method_field('put'); ?>
                  <div class="form-group">
                      <label for="supplier_name">Store Name</label>
                      <input type="text" class="form-control my-2" name="store_name" placeholder="Enter Store Name" value="<?php echo e($getdatas->store_name); ?>">

                  </div>

                  <div class="form-group">
                      <label for="is_active">Select Status</label>
                      <select class="form-control my-2" name="is_active">
                          <option selected="true" disabled="disabled">-----------Select----------</option>
                          <option <?php if($getdatas->is_active==1): ?> selected <?php endif; ?> value="1">Active</option>
                          <option <?php if($getdatas->is_active==0): ?> selected <?php endif; ?> value="0">Not Active</option>
                      </select>
                      <span class="text-danger"></span>
                  </div>

                  <div class="form-group">
                      <button type="submit" class="btn btn-primary mt-2">Submit</button>
                      <a class="btn btn-primary mt-2 float-right" class="text-light" href="<?php echo e(route('backoffice.store-list')); ?>">Back</a>
                  </div>

                  <br>
              </form>
            </div>

        </div>






        <!--store Section End---->
    </div>

</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/nescggna/public_html/mpos/resources/views/store/editStore.blade.php ENDPATH**/ ?>