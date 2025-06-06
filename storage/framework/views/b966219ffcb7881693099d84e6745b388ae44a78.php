<?php
    
    $user_id = session()->get('LoggedUser');
    
    $user_data = \App\Models\BackofficeLogin::join('backoffice_role', 'backoffice_role.role_id', '=', 'backoffice_login.role_id')
    
        ->where('login_id', $user_id)
    
        ->first();
    
    $banner_Information = \App\Models\BannerInformation::first();
    
?>

<nav class="sidebar sidebar-offcanvas" id="sidebar">

    <div class="text-center sidebar-brand-wrapper d-flex align-items-center mb-5 mt-3">

        <a class="sidebar-brand brand-logo" href="<?php echo e(route('backoffice.home')); ?>"><img style="height:100px; width:100px;"
                src="<?php echo e($banner_Information->banner_logo); ?>" alt="logo" /></a>

        <a class="sidebar-brand brand-logo-mini pl-4 pt-3" href="<?php echo e(route('backoffice.home')); ?>"><img
                src="<?php echo e($banner_Information->banner_logo); ?>" alt="logo" /></a>

    </div>

    <ul class="nav">

        <li class="nav-item nav-profile">

            <a href="<?php echo e(route('backoffice.home')); ?>" class="nav-link">

                <div class="nav-profile-image">

                    <img src="<?php echo e(asset('backend/images/profile_picture/' . $user_data->user_image)); ?>" />

                    <span class="login-status online"></span>

                    <!--change to offline or busy as needed-->

                </div>

                <div class="nav-profile-text d-flex flex-column pr-3">

                    <span class="font-weight-medium mb-2"><?php echo e($user_data->full_name); ?></span>

                    <span class="font-weight-normal"><?php echo e($user_data->role_name); ?></span>

                </div>

                <!--<span class="badge badge-danger text-white ml-3 rounded">3</span>-->

            </a>

        </li>

        <?php if($user_data->role_id == 1 || $user_data->role_id == 2): ?>
            <li class="nav-item">

                <a class="nav-link" href="<?php echo e(route('backoffice.sales-form')); ?>">

                    <i class="mdi mdi mdi-basket-unfill menu-icon"></i>

                    <span class="menu-title">Sales Invoice</span>

                </a>

            </li>

            <li class="nav-item">

                <a class="nav-link" href="<?php echo e(route('backoffice.purchase-form')); ?>">

                    <i class="mdi mdi mdi-basket-fill menu-icon"></i>

                    <span class="menu-title">Purchase Invoice</span>

                </a>

            </li>

            <li class="nav-item">

                <a class="nav-link" data-toggle="collapse" href="#ui-sales" aria-expanded="false"
                    aria-controls="ui-sales">

                    <i class="mdi mdi mdi-format-list-bulleted menu-icon"></i>

                    <span class="menu-title">Sales</span>

                    <i class="menu-arrow"></i>

                </a>

                <div class="collapse" id="ui-sales">

                    <ul class="nav flex-column sub-menu">

                        <li class="nav-item">

                            <a class="nav-link text-dark" href="<?php echo e(route('backoffice.suspended_orders')); ?>">

                                Ordered Items

                            </a>

                        </li>

                        <li class="nav-item">

                            <a class="nav-link text-dark" href="<?php echo e(route('backoffice.daily_sales_report')); ?>">

                                Daily Sales

                            </a>

                        </li>

                        <li class="nav-item">

                            <a class="nav-link text-dark" href="<?php echo e(route('backoffice.all_sales_report')); ?>">

                                All Sales

                            </a>

                        </li>

                    </ul>

                </div>

            </li>

            <li class="nav-item">

                <a class="nav-link" data-toggle="collapse" href="#ui-purchase" aria-expanded="false"
                    aria-controls="ui-purchase">

                    <i class="mdi mdi mdi-format-list-bulleted menu-icon"></i>

                    <span class="menu-title">Purchase</span>

                    <i class="menu-arrow"></i>

                </a>

                <div class="collapse" id="ui-purchase">

                    <ul class="nav flex-column sub-menu">

                        <li class="nav-item">

                            <a class="nav-link text-dark"
                                href="<?php echo e(asset('backoffice/purchase/daily-purchase-report')); ?>">

                                Daily Purchase

                            </a>

                        </li>

                        

                        <li class="nav-item">

                            <a class="nav-link text-dark"
                                href="<?php echo e(asset('backoffice/purchase/all-purchase-report')); ?>">

                                All Purchase

                            </a>

                        </li>

                    </ul>

                </div>

            </li>

            <li class="nav-item">

                <a class="nav-link" data-toggle="collapse" href="#ui-Account" aria-expanded="false"
                    aria-controls="ui-Account">

                    <i class="fa-solid fa-money-check menu-icon"></i>



                    <span class="menu-title">Accounts information</span>

                    <i class="menu-arrow"></i>

                </a>

                <div class="collapse" id="ui-Account">

                    <ul class="nav flex-column sub-menu">

                        <li class="nav-item">

                            <a class="nav-link text-dark" href="<?php echo e(route('backoffice.supplier-payment')); ?>">

                                Supplier Payment</a>

                        </li>

                        <li class="nav-item">

                            <a class="nav-link text-dark" href="<?php echo e(route('backoffice.customer-payment')); ?>">

                                Customer Payment</a>

                        </li>

                        <li class="nav-item">

                            <a class="nav-link text-dark" href="<?php echo e(route('backoffice.accounts-receivable')); ?>">

                                Accounts Receivable</a>

                        </li>

                        <li class="nav-item">

                            <a class="nav-link text-dark" href="<?php echo e(route('backoffice.accounts-payable')); ?>">

                                Accounts Payable</a>

                        </li>

                        <li class="nav-item">

                            <a class="nav-link text-dark" href="<?php echo e(route('backoffice.customer-balance')); ?>">

                                Customer Balance</a>

                        </li>

                        <li class="nav-item">

                            <a class="nav-link text-dark" href="<?php echo e(route('backoffice.supplier-balance')); ?>">

                                Supplier Balance</a>

                        </li>

                    </ul>

                </div>

            </li>

            <li class="nav-item">

                <a class="nav-link" data-toggle="collapse" href="#ui-Payment" aria-expanded="false"
                    aria-controls="ui-Payment">

                    <i class="mdi mdi-crosshairs-gps menu-icon"></i>

                    <span class="menu-title">Bank & Payments</span>

                    <i class="menu-arrow"></i>

                </a>

                <div class="collapse" id="ui-Payment">

                    <ul class="nav flex-column sub-menu">

                        <li class="nav-item">

                            <a class="nav-link text-dark" href="<?php echo e(route('backoffice.bank-actions')); ?>">

                                Bank</a>

                        </li>

                        <li class="nav-item">

                            <a class="nav-link text-dark" href="<?php echo e(route('backoffice.trx-reports')); ?>">

                                Bank Transactions</a>

                        </li>

                        <li class="nav-item">

                            <a class="nav-link text-dark" href="<?php echo e(route('backoffice.supplier-payments')); ?>">

                                Supplier Payments</a>

                        </li>

                        <li class="nav-item">

                            <a class="nav-link text-dark" href="<?php echo e(route('backoffice.customer-payments')); ?>">

                                Customer Payments</a>

                        </li>

                        <li class="nav-item">

                            <a class="nav-link text-dark" href="<?php echo e(route('backoffice.payment-report')); ?>">

                                All Payment Report</a>

                        </li>

                    </ul>

                </div>

            </li>

            <li class="nav-item">

                <a class="nav-link" data-toggle="collapse" href="#ui-reports" aria-expanded="false"
                    aria-controls="ui-reports">

                    <i class="mdi mdi-crosshairs-gps menu-icon"></i>

                    <span class="menu-title">Reports</span>

                    <i class="menu-arrow"></i>

                </a>

                <div class="collapse" id="ui-reports">

                    <ul class="nav flex-column sub-menu">

                        <li class="nav-item">

                            <a class="nav-link text-dark" href="<?php echo e(route('backoffice.salesReport')); ?>">

                                Sales Report</a>

                        </li>

                        <li class="nav-item">

                            <a class="nav-link text-dark" href="<?php echo e(route('backoffice.purchaseReport')); ?>">

                                Purchase Report</a>

                        </li>

                        <li class="nav-item">

                            <a class="nav-link text-dark" href="<?php echo e(route('backoffice.expenseReport')); ?>">

                                Expense Report</a>

                        </li>

                        <li class="nav-item">

                            <a class="nav-link text-dark" href="<?php echo e(route('backoffice.income-statement')); ?>">

                                Cash Flow Statement</a>

                        </li>

                    </ul>

                </div>

            </li>

            <li class="nav-item">

                <a class="nav-link" data-toggle="collapse" href="#ui-stock" aria-expanded="false"
                    aria-controls="ui-stock">

                    <i class="mdi mdi-crosshairs-gps menu-icon"></i>

                    <span class="menu-title">Stock</span>

                    <i class="menu-arrow"></i>

                </a>

                <div class="collapse" id="ui-stock">

                    <ul class="nav flex-column sub-menu">

                        <li class="nav-item">

                            <a class="nav-link text-dark" href="<?php echo e(route('backoffice.all-stock-report')); ?>">

                                Stock Report</a>

                            <a class="nav-link text-dark" href="<?php echo e(route('backoffice.stock-transfer')); ?>">

                                Stock Transfer</a>

                            <a class="nav-link text-dark" href="<?php echo e(route('backoffice.store-list')); ?>">

                                Locations</a>

                        </li>

                    </ul>

                </div>

            </li>

            <li class="nav-item">

                <a class="nav-link" data-toggle="collapse" href="#ui-expense" aria-expanded="false"
                    aria-controls="ui-expense">

                    <i class="mdi mdi-crosshairs-gps menu-icon"></i>

                    <span class="menu-title">Expense</span>

                    <i class="menu-arrow"></i>

                </a>

                <div class="collapse" id="ui-expense">

                    <ul class="nav flex-column sub-menu">

                        <li class="nav-item">

                            <a class="nav-link text-dark" href="<?php echo e(route('backoffice.expense')); ?>">

                                Expenses</a>

                            <a class="nav-link text-dark" href="<?php echo e(route('backoffice.expense_category_list')); ?>">

                                Expenses Category</a>

                            <a class="nav-link text-dark" href="<?php echo e(route('backoffice.all-expenses')); ?>">

                                All Expenses</a>

                        </li>

                    </ul>

                </div>

            </li>

            

            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#ui-return" aria-expanded="false"
                    aria-controls="ui-return">
                    <i class="mdi mdi-crosshairs-gps menu-icon"></i>
                    <span class="menu-title">Return</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse" id="ui-return">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="<?php echo e(route('backoffice.create-return')); ?>">Product
                                Return</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark"
                                href="<?php echo e(route('backoffice.create-service-return')); ?>">Service Return</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="<?php echo e(route('backoffice.all-return')); ?>">Return
                                Requests</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-dark" href="<?php echo e(route('backoffice.completed-return')); ?>">Completed
                                Return</a>
                        </li>
            </li>

    </ul>

    </div>

    </li>

    <li class="nav-item">

        <a class="nav-link" data-toggle="collapse" href="#ui-product" aria-expanded="false"
            aria-controls="ui-product">

            <i class="mdi mdi-crosshairs-gps menu-icon"></i>

            <span class="menu-title">Category & Items</span>

            <i class="menu-arrow"></i>

        </a>

        <div class="collapse" id="ui-product">

            <ul class="nav flex-column sub-menu">

                <li class="nav-item">

                    <a class="nav-link text-dark" href="<?php echo e(route('backoffice.all-products')); ?>">Products</a>

                </li>

                <li class="nav-item">

                    <a class="nav-link text-dark" href="<?php echo e(route('backoffice.all-subCat1')); ?>">Sub

                        Categories</a>

                </li>

                <li class="nav-item">

                    <a class="nav-link text-dark" href="<?php echo e(route('backoffice.all-product-cat')); ?>">Categories</a>

                </li>

                <li class="nav-item">

                    <a class="nav-link text-dark" href="<?php echo e(route('backoffice.all-suppliers')); ?>">Suppliers</a>

                </li>

                <li class="nav-item">

                    <a class="nav-link text-dark" href="<?php echo e(route('backoffice.all-unit')); ?>">All Unit</a>

                </li>



            </ul>

        </div>

    </li>

    <li class="nav-item">

        <a class="nav-link" data-toggle="collapse" href="#ui-backoffice" aria-expanded="false"
            aria-controls="ui-backoffice">

            <i class="mdi mdi-crosshairs-gps menu-icon"></i>

            <span class="menu-title">Users</span>

            <i class="menu-arrow"></i>

        </a>

        <div class="collapse" id="ui-backoffice">

            <ul class="nav flex-column sub-menu">

                <li class="nav-item">

                    <a class="nav-link text-dark" href="<?php echo e(route('backoffice.all-backoffice-user')); ?>">System

                        Users</a>

                </li>

            </ul>

        </div>

    </li>

    <li class="nav-item">

        <a class="nav-link" data-toggle="collapse" href="#ui-settings" aria-expanded="false"
            aria-controls="ui-settings">

            <i class="mdi mdi-crosshairs-gps menu-icon"></i>

            <span class="menu-title">Settings</span>

            <i class="menu-arrow"></i>

        </a>

        <div class="collapse" id="ui-settings">

            <ul class="nav flex-column sub-menu">

                <li class="nav-item">

                    <a class="nav-link text-dark" href="<?php echo e(route('backoffice.system-settings')); ?>">System

                        Settings</a>

                </li>

            </ul>

        </div>

    </li>
    <?php endif; ?>

    <?php if($user_data->role_id == 3): ?>
        <li class="nav-item">

            <a class="nav-link" href="<?php echo e(route('backoffice.sales-form')); ?>">

                <i class="mdi mdi-cart-arrow-down menu-icon"></i>

                <span class="menu-title">Invoice</span>

            </a>

        </li>

        <li class="nav-item">

            <a class="nav-link" data-toggle="collapse" href="#ui-sales" aria-expanded="false"
                aria-controls="ui-sales">

                <i class="mdi mdi-crosshairs-gps menu-icon"></i>

                <span class="menu-title">Reports</span>

                <i class="menu-arrow"></i>

            </a>

            <div class="collapse" id="ui-sales">

                <ul class="nav flex-column sub-menu">

                    <li class="nav-item">

                        <a class="nav-link text-dark" href="<?php echo e(route('backoffice.suspended_orders')); ?>">

                            Ordered Items

                        </a>

                    </li>

                    <li class="nav-item">

                        <a class="nav-link text-dark" href="<?php echo e(route('backoffice.daily_sales_report')); ?>">

                            Daily Sales Report

                        </a>

                    </li>

                </ul>

            </div>

        </li>
    <?php endif; ?>

    <?php if($user_data->role_id == 4): ?>
        <li class="nav-item">

            <a class="nav-link" data-toggle="collapse" href="#ui-sales" aria-expanded="false"
                aria-controls="ui-sales">

                <i class="mdi mdi-crosshairs-gps menu-icon"></i>

                <span class="menu-title">Reports</span>

                <i class="menu-arrow"></i>

            </a>

            <div class="collapse" id="ui-sales">

                <ul class="nav flex-column sub-menu">

                    <li class="nav-item">

                        <a class="nav-link text-dark" href="<?php echo e(route('backoffice.suspended_orders')); ?>">

                            Ordered Items

                        </a>

                    </li>

                </ul>

            </div>

        </li>
    <?php endif; ?>

    <li class="nav-item sidebar-actions">

        <div class="nav-link">

            <div class="mt-4">

                <ul class="mt-4 pl-0">

                    <a href="<?php echo e(route('backoffice.logout')); ?>">Sign Out</a>

                </ul>

            </div>

        </div>

    </li>

    </ul>

</nav>
<?php /**PATH C:\xampp\htdocs\mpos\resources\views/dashboard/pertials/sideNav.blade.php ENDPATH**/ ?>