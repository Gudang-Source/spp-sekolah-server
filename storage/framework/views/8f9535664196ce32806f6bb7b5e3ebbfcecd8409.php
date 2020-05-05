<?php $__env->startSection('title'); ?>
SPP | Dashboard
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="widgets-programs-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="hpanel widget-int-shape responsive-mg-b-30">
                    <div class="panel-body">
                        <div class="stats-title pull-left">
                            <h4>Pemasukan</h4>
                        </div>
                        <div class="stats-icon pull-right">
                            <i class="educate-icon educate-department"></i>
                        </div>
                        <div class="m-t-xl widget-cl-1">
                            <h1 class="text-success">Rp. <?php echo e(number_format($dashboard->pemasukan,0,',','.')); ?></h1>
                            <a class="btn btn-success btn-block loginbtn" style="color:white" href="<?php echo e(route('expense.index')); ?>">
                                <?php echo e(__('Detail')); ?>

                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="hpanel widget-int-shape responsive-mg-b-30">
                    <div class="panel-body">
                        <div class="stats-title pull-left">
                            <h4>Pengeluaran</h4>
                        </div>
                        <div class="stats-icon pull-right">
                            <i class="educate-icon educate-apps"></i>
                        </div>
                            <div class="m-t-xl widget-cl-2">
                            <h1 class="text-info"><?php echo e(number_format($dashboard->pengeluaran,0,',','.')); ?></h1>
                            <a class="btn btn-success btn-block loginbtn" style="color:white" href="<?php echo e(route('expense.index')); ?>">
                                <?php echo e(__('Detail')); ?>

                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="hpanel widget-int-shape responsive-mg-b-30 res-tablet-mg-t-30 dk-res-t-pro-30">
                    <div class="panel-body">
                        <div class="stats-title pull-left">
                            <h4>Jumlah Siswa</h4>
                        </div>
                        <div class="stats-icon pull-right">
                            <i class="educate-icon educate-professor"></i>
                        </div>
                        <div class="m-t-xl widget-cl-3">
                            <h1 class="text-warning"><?php echo e(number_format($dashboard->siswa,0,',','.')); ?></h1>
                            <a class="btn btn-success btn-block loginbtn" style="color:white" href="<?php echo e(route('students.index')); ?>">
                                <?php echo e(__('Detail')); ?>

                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="hpanel widget-int-shape res-tablet-mg-t-30 dk-res-t-pro-30">
                    <div class="panel-body">
                        <div class="stats-title pull-left">
                            <h4>Data Tunggakan</h4>
                        </div>
                        <div class="stats-icon pull-right">
                            <i class="fa fa-times"></i>
                        </div>
                        <div class="m-t-xl widget-cl-4">
                            <h1 class="text-danger"><?php echo e(number_format($dashboard->nunggak,0,',','.')); ?></h1>
                            <a class="btn btn-success btn-block loginbtn" style="color:white" href="<?php echo e(route('payment.index')); ?>">
                                <?php echo e(__('Detail')); ?>

                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
<!-- x-editor CSS  -->
<link rel="stylesheet" href="<?php echo e(asset('assets/css/editor/select2.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('assets/css/editor/datetimepicker.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('assets/css/editor/bootstrap-editable.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('assets/css/editor/x-editor-style.css')); ?>">
<!-- normalize CSS -->
<link rel="stylesheet" href="<?php echo e(asset('assets/css/data-table/bootstrap-table.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('assets/css/data-table/bootstrap-editable.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
<!-- data table JS
		============================================ -->
<script src="<?php echo e(asset('assets/js/data-table/bootstrap-table.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/data-table/tableExport.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/data-table/data-table-active.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/data-table/bootstrap-table-editable.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/data-table/bootstrap-editable.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/data-table/bootstrap-table-resizable.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/data-table/colResizable-1.5.source.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/data-table/bootstrap-table-export.js')); ?>"></script>
<!--  editable JS
		============================================ -->
<script src="<?php echo e(asset('assets/js/editable/jquery.mockjax.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/editable/mock-active.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/editable/select2.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/editable/moment.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/editable/bootstrap-datetimepicker.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/editable/bootstrap-editable.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/editable/xediable-active.js')); ?>"></script>
<?php $__env->stopPush(); ?>


<?php $__env->startPush('breadcrumb-right'); ?>
<div style="float:right">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb" style="margin-bottom:0">
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
        </ol>
    </nav>
</div>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u5982481/public_html/spp-sekolah/core/resources/views/dashboard/index.blade.php ENDPATH**/ ?>