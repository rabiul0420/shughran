<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<style>
    .btn-outline-primary {
        color: #007bff;
        border-color: #007bff
    }

    .btn-outline-primary:hover {
        color: #fff;
        background-color: #007bff;
        border-color: #007bff
    }

    .btn-outline-primary.focus,
    .btn-outline-primary:focus {
        box-shadow: 0 0 0 .2rem rgba(0, 123, 255, .5)
    }

    .btn-outline-primary.disabled,
    .btn-outline-primary:disabled {
        color: #007bff;
        background-color: transparent
    }

    .btn-outline-primary:not(:disabled):not(.disabled).active,
    .btn-outline-primary:not(:disabled):not(.disabled):active,
    .show>.btn-outline-primary.dropdown-toggle {
        color: #fff;
        background-color: #007bff;
        border-color: #007bff
    }

    .btn-outline-primary:not(:disabled):not(.disabled).active:focus,
    .btn-outline-primary:not(:disabled):not(.disabled):active:focus,
    .show>.btn-outline-primary.dropdown-toggle:focus {
        box-shadow: 0 0 0 .2rem rgba(0, 123, 255, .5)
    }




    .btn-outline-success {
        color: #28a745;
        border-color: #28a745;
    }

    .btn-outline-success:hover {
        color: #fff;
        background-color: #28a745;
        border-color: #28a745;
    }

    .btn-outline-success.focus,
    .btn-outline-success:focus {
        box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.5);
    }

    .btn-outline-success.disabled,
    .btn-outline-success:disabled {
        color: #28a745;
        background-color: transparent;
    }

    .btn-outline-success:not(:disabled):not(.disabled).active,
    .btn-outline-success:not(:disabled):not(.disabled):active,
    .show>.btn-outline-success.dropdown-toggle {
        color: #fff;
        background-color: #28a745;
        border-color: #28a745;
    }

    .btn-outline-success:not(:disabled):not(.disabled).active:focus,
    .btn-outline-success:not(:disabled):not(.disabled):active:focus,
    .show>.btn-outline-success.dropdown-toggle:focus {
        box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.5);
    }
</style>



<div class="box">
    <div class="box-header">
        <h2 class="blue"><i class="fa fa-th"></i><span class="break"></span>
            <?= lang('Export Report Dashboard') ?>
        </h2>
    </div>
    <br>

    <div id="form" class="no-print" style=" max-width: 800px; ">

        <?php echo admin_form_open('export', 'autocomplete="off" method="get" class="form-inline"'); ?>

        <div class="row">

            <div class="form-group">
                <label class="control-label col-sm-4" for="username"><?= lang(' Branch', ' Branch') ?></label>
                <div class="col-sm-8">
                    <?php
                    $cus[''] = lang('select') . ' ' . lang('branch');
                    if ($this->Owner || $this->Admin)
                        foreach ($branches as $branch) {
                            $cus[$branch->id] = $branch->name;
                        }
                    else if ($this->session->userdata('branch_id') == $branch->id)
                        $cus[$branch->id] = $branch->name;

                    echo form_dropdown('branch', $cus, ($_GET['branch'] ?? ''), 'class="form-control select" required="required" placeholder="' . lang('select') . ' ' . lang('branch') . '" style="width:100%"')
                    ?>
                </div>
                
            </div>

            <div class="form-group">
                <label class="control-label col-sm-3" for="username"> <?= lang('type', 'type') ?></label>
                <div class="col-sm-9">
                    <?php
                    $cus2[''] = lang('select') . ' ' . lang('type');
                    foreach (['half_yearly' => 'Half yearly', 'annual' => 'Annual'] as $key => $row) {
                        $cus2[$key] = $row;
                    }
                    echo form_dropdown('type', $cus2, ($_GET['type'] ?? ''), 'class="form-control select"  required="required" placeholder="' . lang('select') . ' ' . lang('type') . '" style="width:100%"')
                    ?>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-3" for="username"> <?= lang('year', 'year') ?></label>
                <div class="col-sm-9">
                    <?php
                    $cus3[''] = lang('select') . ' ' . lang('year');
                    for ($i = date('Y'); $i >= 2019; $i--) {
                        $cus3[$i] = $i;
                    }
                    echo form_dropdown('year', $cus3, ($_GET['year'] ?? ''), 'class="form-control select" required="required" placeholder="' . lang('select') . ' ' . lang('year') . '" style="width:100%"')
                    ?>
                </div>
            </div>
            <div class="form-group">

                <div class="col-sm-9">
                    <div class="controls">
                        <?php echo form_submit('submit_report', $this->lang->line('submit'), 'class="btn btn-primary"'); ?>
                    </div>
                </div>
            </div>


        </div>



        <?php echo form_close(); ?>

    </div>


    <!-- branch=5&type=yearly&year=2020 -->
    <?php if (isset($_GET['year'])) {   ?>

    <h2 class="text-bold">জনশক্তি :</h2>

   

        <div class="box-content" style="padding: 0px 0px 0px 20px; ">
        <div class="row"> 
            <a class="btn  btn-outline-success" data-placement="bottom" data-html="true" href="<?= admin_url('manpower/exportsummary/'.$_GET['branch'].'?type='.$_GET['type'].'&year='.$_GET['year'] )  ?>">
            একনজরে
            </a>
            <a class="btn  btn-outline-success" data-placement="bottom" data-html="true" href="<?= admin_url('') ?>">
            Coming
            </a>
        </div>

        <div class="clearfix"></div>
    </div>

  

    

    <h2 class="text-bold">দাওয়াত :</h2>
    <div class="box-content" style="padding: 0px 0px 0px 20px; ">
        <div class="row">
        <a class="btn  btn-outline-success" data-placement="bottom" data-html="true" href="<?= admin_url('dawat/export/'.$_GET['branch'].'?type='.$_GET['type'].'&year='.$_GET['year']) ?>">
        দাওয়াত 
            </a>
            <a class="btn  btn-outline-success" data-placement="bottom" data-html="true" href="<?= admin_url('dawat/element_export/'.$_GET['branch'].'?type='.$_GET['type'].'&year='.$_GET['year']) ?>">
            দাওয়াতী উপকরণ 
            </a> 
            <a class="btn  btn-outline-success" data-placement="bottom" data-html="true" href="<?= admin_url('dawat/mosque_export/'.$_GET['branch'].'?type='.$_GET['type'].'&year='.$_GET['year']) ?>">
            মসজিদ ভিত্তিক কাজ 
            </a> 
            <a class="btn  btn-outline-success" data-placement="bottom" data-html="true" href="<?= admin_url('dawat/dawat_extra_export/'.$_GET['branch'].'?type='.$_GET['type'].'&year='.$_GET['year']) ?>">
            অতিরিক্ত দাওয়াত 
            </a> 
            <a class="btn  btn-outline-success" data-placement="bottom" data-html="true" href="<?= admin_url('dawat/dawat_detail_export/'.$_GET['branch'].'?type='.$_GET['type'].'&year='.$_GET['year']) ?>">
            বিস্তারিত দাওয়াত 
            </a> 
        </div>

        <div class="clearfix"></div>
    </div>

    <h2 class="text-bold">সংগঠন:</h2>
    <div class="box-content" style="padding: 0px 0px 0px 20px; ">
        <div class="row">
            <a class="btn  btn-outline-success" data-placement="bottom" data-html="true" href="<?= admin_url('') ?>">
                Coming
            </a>
            
        </div>

        <div class="clearfix"></div>
    </div>


    <h2 class="text-bold">সভাসমূহ :</h2>
    <div class="box-content" style="padding: 0px 0px 0px 20px; ">
        <div class="row">
        <a class="btn  btn-outline-success" data-placement="bottom" data-html="true" href="<?= admin_url('others/program_export/'.$_GET['branch'].'?type='.$_GET['type'].'&year='.$_GET['year']) ?>">
        সভাসমূহ 
            </a>
            
        </div>

        <div class="clearfix"></div>
    </div>

     

    <h2 class="text-bold">প্রশিক্ষণ:</h2>
    <div class="box-content" style="padding: 0px 0px 0px 20px; ">
        <div class="row">
            <a class="btn  btn-outline-success" data-placement="bottom" data-html="true" href="<?= admin_url('others/centraltraining_export/'.$_GET['branch'].'?type='.$_GET['type'].'&year='.$_GET['year']) ?>">
            কেন্দ্রীয় প্রশিক্ষণ
            </a>
            <a class="btn  btn-outline-success" data-placement="bottom" data-html="true" href="<?= admin_url('training/export/'.$_GET['branch'].'?type='.$_GET['type'].'&year='.$_GET['year']) ?>">
            শাখা প্রশিক্ষণ 
            </a>

            <a class="btn  btn-outline-success" data-placement="bottom" data-html="true" href="<?= admin_url('training/library_export/'.$_GET['branch'].'?type='.$_GET['type'].'&year='.$_GET['year']) ?>"> 
            পাঠাগার  
            </a>
            <a class="btn  btn-outline-success" data-placement="bottom" data-html="true" href="<?= admin_url('highersyllabus/export/'.$_GET['branch'].'?type='.$_GET['type'].'&year='.$_GET['year']) ?>"> 
            উচ্চতর সিলেবাস  
            </a>

            
             
        </div>

        <div class="clearfix"></div>
    </div>










    <h2 class="text-bold">অন্যান্য:</h2>
    <div class="box-content" style="padding: 0px 0px 0px 20px; ">
        <div class="row">
            <a class="btn  btn-outline-success" data-placement="bottom" data-html="true" href="<?= admin_url('bm/export/'.$_GET['branch'].'?type='.$_GET['type'].'&year='.$_GET['year']) ?>">
            বিএম
            </a>
            <a class="btn  btn-outline-success" data-placement="bottom" data-html="true" href="<?= admin_url('guest/export/'.$_GET['branch'].'?type='.$_GET['type'].'&year='.$_GET['year']) ?>">
            সফর 
            </a>

            <a class="btn  btn-outline-success" data-placement="bottom" data-html="true" href="<?= admin_url('training/communication_export/'.$_GET['branch'].'?type='.$_GET['type'].'&year='.$_GET['year']) ?>"> 
            যোগাযোগ 
            </a>
            <a class="btn  btn-outline-success" data-placement="bottom" data-html="true" href="<?= admin_url('training/trainingelement_export/'.$_GET['branch'].'?type='.$_GET['type'].'&year='.$_GET['year']) ?>"> 
            উপকরণ  
            </a>

            
             
        </div>

        <div class="clearfix"></div>
    </div>

    <?php  }?>


</div>