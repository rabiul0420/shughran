<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<style>
    @font-face {
        font-family: 'SolaimanLipi';
        src: url('<?php echo site_url('assets/solaimanlipi/'); ?>SolaimanLipi.eot');
        src: url('<?php echo site_url('assets/solaimanlipi/'); ?>SolaimanLipi.woff') format('woff'),
            url('<?php echo site_url('assets/solaimanlipi/'); ?>SolaimanLipi.ttf') format('truetype'),
            url('<?php echo site_url('assets/solaimanlipi/'); ?>SolaimanLipi.svg#SolaimanLipiNormal') format('svg'),
            url('<?php echo site_url('assets/solaimanlipi/'); ?>SolaimanLipi.eot?#iefix') format('embedded-opentype');
        font-weight: normal;
        font-style: normal;
    }

    #institution {
        font-family: SolaimanLipi;
    }

    #institution td {
        padding: 2px;
        text-align: center;
    }
</style>

<style>
    .form-control[disabled],
    .form-control[readonly],
    fieldset[disabled] .form-control {
        cursor: text;
        background-color: #fff;
        opacity: 1;
    }
</style>


<?php
if (!empty($variants)) {
    foreach ($variants as $variant) {
        $vars[] = addslashes($variant->name);
    }
} else {
    $vars = array();
}
?>

<div class="box">
    <div class="box-header">
        <h2 class="blue"><i class="fa-fw fa fa-plus"></i><?= 'থানা'; ?></h2>
    </div>
    <div class="box-content">
        <div class="row">
            <div class="col-lg-12">

                <p class="introtext hidden"><?php echo lang('enter_info'); ?></p>

                <?php
                $attrib = array('data-toggle' => 'validator', 'role' => 'form', 'autocomplete' => 'off');
                echo admin_form_open_multipart("organization/addthana", $attrib)
                ?>

                <div class="col-md-6">

                    <div class="form-group">
                        <?= lang("সাংগঠনিক থানার নাম", "thana_name") ?>

                        <?= form_input('thana_name', (isset($_POST['thana_name']) ? $_POST['thana_name'] : ''), 'class="form-control" id="thana_name" required="required"'); ?>
                    </div>





                    <div class="form-group">
                        <?= lang('থানা কোড', 'thana_code'); ?>
                        <?= form_input('thana_code', set_value('thana_code', ''), 'class="form-control tip" id="thana_code" required="required" '); ?>
                    </div>



                    <div class="form-group">
                        <?= lang("সংগঠনের ধরন", "org_type"); ?>

                        <?php
                        $wrt[''] = lang('select') . ' ' . lang('organization_type');
                        foreach (['Institutional' => 'Institutional', 'Residential' => 'Residential'] as $type)
                            $wrt[$type] = $type;



                        echo form_dropdown('org_type', $wrt, (isset($_POST['org_type']) ? $_POST['org_type'] : ''), 'id="org_type"   class="form-control select" style="width:100%;" ');
                        ?>


                        <?php  //echo  form_input('responsibility', (isset($_POST['responsibility']) ? $_POST['responsibility'] : ''), 'class="form-control" id="responsibility" '); 
                        ?>




                    </div>





                    <div class="form-group">
                        <?= lang('সদস্য', 'member_number'); ?>
                        <?= form_input('member_number', set_value('member_number', '0'), 'class="form-control tip" id="member_number" required="required" '); ?>
                    </div>
                    <div class="form-group">
                        <?= lang('সাথী', 'associate_number'); ?>
                        <?= form_input('associate_number', set_value('associate_number', '0'), 'class="form-control tip" id="associate_number" required="required" '); ?>
                    </div>
                    <div class="form-group">
                        <?= lang('কর্মী', 'worker_number'); ?>
                        <?= form_input('worker_number', set_value('worker_number', '0'), 'class="form-control tip" id="worker_number" required="required" '); ?>
                    </div>
                    <div class="form-group">
                        <?= lang('সমর্থক সংখ্যা', 'unit_number'); ?>
                        <?= form_input('supporter_number', set_value('supporter_number', '0'), 'class="form-control tip" id="supporter_number" required="required" '); ?>
                    </div>








                </div>


                <div class="col-md-6">


                    
                    <div class="form-group">
                        <?= lang('সাংগঠনিক ওয়ার্ড সংখ্যা', 'ward_number'); ?>
                        <?= form_input('ward_number', set_value('ward_number', '0'), 'class="form-control tip" id="ward_number" required="required" '); ?>
                    </div>
                    <div class="form-group">
                        <?= lang('উপশাখা সংখ্যা', 'unit_number'); ?>
                        <?= form_input('unit_number', set_value('unit_number', '0'), 'class="form-control tip" id="unit_number" required="required" '); ?>
                    </div>


                    <div class="form-group">
                        <?= lang('চলতি সেশনে বৃদ্ধি কিনা?', 'increase_in_current_session'); ?>

                        <div class="radio">
                            <input type="radio" class="checkbox" name="increase_in_current_session" value="1" <?= 1 ? 'checked="checked"' : ''; ?> />
                            <label   class="padding05"><?= 'হ্যাঁ' ?></label>
                        </div>

                        <div class="radio">
                            <input type="radio" class="checkbox" name="increase_in_current_session" value="2" <?= 2 ? 'checked="checked"' : ''; ?>>
                            <label   class="padding05"><?= 'না ' ?></label>

                        </div>
                    </div>





                    <div class="form-group">
                        <?= lang("শাখা", "branch"); ?>
                        <?php
                        $wh[''] = lang('select') . ' ' . lang('branch');
                        if ($this->Admin || $this->Owner)
                            $flag = 1;
                        else
                            $flag = 2;
                        foreach ($branches as $branch) {
                            if ($flag == 1)
                                $wh[$branch->id] = $branch->name;
                            elseif ($branch->id == $this->session->userdata('branch_id'))
                                $wh[$branch->id] = $branch->name;
                        }



                        echo form_dropdown('branch_id', $wh, (isset($_POST['branch_id']) ? $_POST['branch_id'] : ''), 'id="branch_id" required="required" class="form-control select" style="width:100%;" ');
                        ?>
                    </div>



























                </div>





                <div class="col-md-12">





                    <div class="form-group all">
                        <?= lang("মন্তব্য", "note") ?>
                        <?= form_textarea('note', (isset($_POST['note']) ? $_POST['note'] : ''), 'class="form-control" id="note"'); ?>
                    </div>



                </div>





                <div class="col-md-12">






                    <div class="form-group">
                        <?php echo form_submit('add_transfer', 'Save', 'class="btn btn-primary"'); ?>
                    </div>

                </div>





                <?= form_close(); ?>

            </div>

        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('form[data-toggle="validator"]').bootstrapValidator({
            excluded: [':disabled']
        });
        var audio_success = new Audio('<?= $assets ?>sounds/sound2.mp3');
        var audio_error = new Audio('<?= $assets ?>sounds/sound3.mp3');




        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': $('meta[name="token"]').attr('content')
            }
        });











        var _URL = window.URL || window.webkitURL;

        var variants = <?= json_encode($vars); ?>;






    });
</script>