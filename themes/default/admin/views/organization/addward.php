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
// PHP logic to handle variants
$vars = !empty($variants) ? array_map('addslashes', array_column($variants, 'name')) : array();
?>

<div class="box">
    <div class="box-header">
        <h2 class="blue"><i class="fa-fw fa fa-plus"></i><?= 'ওয়ার্ড'; ?></h2>
    </div>
    <div class="box-content">
        <div class="row">
            <div class="col-lg-12">
                <p class="introtext hidden"><?php echo lang('enter_info'); ?></p>
                <?php
                // Opening the form with attributes
                $attrib = array('data-toggle' => 'validator', 'role' => 'form', 'autocomplete' => 'off');
                echo admin_form_open_multipart("organization/addward", $attrib);
                ?>


                <div class="col-md-6">
                    <!-- Form inputs for ward details -->
                    <div class="form-group">
                        <?php echo lang('বৃদ্ধির তারিখ', 'date'); ?>
                        <div class="controls">
                            <?php echo form_input('date', '', 'class="form-control fixed_date" id="date" readonly required="required"'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <?= lang("সাংগঠনিক ওয়ার্ড/ইউনিয়নের নাম", "ward_name") ?>
                        <?= form_input('ward_name', (isset($_POST['ward_name']) ? $_POST['ward_name'] : ''), 'class="form-control" id="ward_name"  required="required" '); ?>
                    </div>
                    <div class="form-group">
                        <?= lang('ওয়ার্ড কোড', 'ward_code'); ?>
                        <?php
                        // Dropdown for ward code
                        $wc = array();
                        $wc[''] =  'ওয়ার্ড কোড';
                        for ($i = 1; $i <= 60; $i++) {
                            $wc[$i] =  $i;
                        }
                        $wc[100] =  100;
                        echo form_dropdown('ward_code', $wc, '', 'id="ward_code"  class="form-control select" required="required" style="width:100%;" ');
                        ?>
                    </div>


                    <!-- Form inputs for organization type -->
                    <div class="form-group">
                        <?= lang("সংগঠনের ধরন", "org_type"); ?>
                        <?php
                        $wrt[''] = lang('select') . ' ' . lang('organization_type');
                        foreach (['Institutional' => 'প্রাতিষ্ঠানিক', 'Residential' => 'আবাসিক'] as $key => $type)
                            $wrt[$key] = $type;
                        echo form_dropdown('org_type', $wrt, (isset($_POST['org_type']) ? $_POST['org_type'] : ''), 'id="org_type"   class="form-control select" style="width:100%;" ');
                        ?>
                    </div>

                    <div class="show_when_Residential">


                        <h2>প্রশাসনিক বিবরন</h2>

                        <label class="checkbox" for="is_mess">
                            <input type="checkbox" name="is_mess" value="1" id="is_mess" />
                            আবাসিক সংগঠন হলে মেস/আইডিয়াল হোম কি না ?
                        </label>

                        <div class="form-group">
                            <?= lang("জেলা", "district"); ?>
                            <?php
                            $dt[''] = lang('select') . ' ' . lang('district');
                            foreach ($districts as $district) if ($district->parent_id == 0)
                                $dt[$district->id] = $district->name;

                            echo form_dropdown('district', $dt, (isset($_POST['district']) ? $_POST['district'] : ''), 'id="district"  class="form-control select" style="width:100%;" ');
                            ?>
                        </div>

                        <div class="form-group">
                            <?= lang("উপজেলা/থানা", "upazila"); ?>

                            <select id="upazila" name="upazila" class="form-control">

                                <option value="">--</option>
                                <?php
                                foreach ($districts as $district) if ($district->parent_id > 0) {
                                    echo '<option  value="' . $district->id . '" data-chained="' . $district->parent_id . '">' . $district->name . '</option>';
                                }

                                ?>
                            </select>

                        </div>

                        <div class="form-group">
                            <?= lang("পৌরসভা /ইউনিয়ন", "union_name") ?>

                            <?= form_input('union_name', (isset($_POST['union_name']) ? $_POST['union_name'] : ''), 'class="form-control" id="union_name" '); ?>
                        </div>

                        <div class="form-group">
                            <?= lang("সিটি/ পৌরসভা /ইউনিয়নের ওয়ার্ড", "cward_name") ?>

                            <?= form_input('cward_name', (isset($_POST['cward_name']) ? $_POST['cward_name'] : ''), 'class="form-control" id="cward_name" '); ?>
                        </div>


                        <h2>শিক্ষাপ্রতিষ্ঠানের বিবরন</h2>
                        <label class="checkbox" for="is_under_institute">
                            <input type="checkbox" name="is_under_institute" value="1" id="is_under_institute" />
                            আবাসিক সংগঠন কিন্তু কোন শিক্ষা প্রতিষ্ঠানের অন্তর্ভুক্ত কি না?
                        </label>
                    </div>

                    <!-- for প্রাতিষ্ঠানিক -->


                    <div class="show_when_Institutional">

                        <h2>শিক্ষাপ্রতিষ্ঠানের বিবরন</h2>
                        <label class="checkbox" for="is_coaching">
                            <input type="checkbox" name="is_coaching" value="1" id="is_coaching" />
                            প্রাতিষ্ঠানিক কিন্তু কোচিং, প্রাইভেট সেন্টার, বিভাগ কিনা?
                        </label>
                    </div>

                    <div class="">
                        <div class="form-group">

                            <label for="institution_parent_id">ক্যাটাগরি </label>
                            <?php
                            $whp[''] = lang('select') . ' ' . 'ক্যাটাগরি';
                            foreach ($institution_types as $institution_type) {
                                $whp[$institution_type->id] = $institution_type->institution_type;
                            }
                            echo form_dropdown('institution_parent_id', $whp, (isset($_POST['institution_parent_id']) ? $_POST['institution_parent_id'] : ''), 'id="institution_parent_id"  class="form-control skip" style="width:100%;" ');
                            ?>
                        </div>

                        <div class="form-group">

                            <label for="institution_type_id">সাব ক্যাটাগরি </label>

                            <select id="institution_type_id" name="institution_type_id" class="form-control skip">
                                <option value="">--</option>
                                <?php

                                foreach ($institutions as $institution) {
                                    echo '<option  value="' . $institution->id . '" data-chained="' . $institution->type_id . '">' . $institution->institution_type . '</option>';
                                }

                                ?>
                            </select>
                        </div>


                        <div class="form-group">
                            <?= lang("প্রতিষ্ঠানের নাম", "name_institution"); ?>
                            <?= form_input('name_institution', '', 'class="form-control tip" id="name_institution"  '); ?>
                        </div>
                        <hr>

                    </div>






                </div>

             

                <div class="col-md-6">
                    <div class="form-group">
                        <?= lang('কর্মী', 'worker_number'); ?>
                        <?= form_input('worker_number', set_value('worker_number', '0'), 'class="form-control tip" id="worker_number"  '); ?>
                    </div>
                    <div class="form-group">
                        <?= lang('সমর্থক সংখ্যা', 'supporter_number'); ?>
                        <?= form_input('supporter_number', set_value('supporter_number', '0'), 'class="form-control tip" id="supporter_number"  '); ?>
                    </div>
                    <div class="form-group">
                        <?= lang('আদর্শ ওয়ার্ড?', 'is_ideal_ward'); ?>
                        <div class="radio">
                            <input type="radio" class="checkbox" name="is_ideal_ward" value="1" <?= 1 ? 'checked="checked"' : ''; ?> />
                            <label class="padding05"><?= 'হ্যাঁ' ?></label>
                        </div>
                        <div class="radio">
                            <input type="radio" class="checkbox" name="is_ideal_ward" value="2" <?= 2 ? 'checked="checked"' : ''; ?>>
                            <label class="padding05"><?= 'না ' ?></label>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <?= lang("শাখা", "branch"); ?>
                        <?php
                        // Dropdown for selecting a branch
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
                        echo form_dropdown('branch_id', $wh, (isset($_POST['branch_id']) ? $_POST['branch_id'] : ''), 'id="branch_id"  class="form-control select" style="width:100%;"  required="required"       ');
                        ?>
                    </div>
                </div>

                <!-- Form inputs for note -->
                <div class="col-md-6">
                    <div class="form-group all">
                        <?= lang("মন্তব্য", "note") ?>
                        <?= form_textarea('note', (isset($_POST['note']) ? $_POST['note'] : ''), 'class="form-control" id="note"'); ?>
                    </div>
                </div>

                <!-- Form submission button -->
                <div class="col-md-6">
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
        // JavaScript code for dynamic behavior
        $('#org_type').change(function() {
            var selectedValue = $(this).val();
            if (selectedValue === 'Institutional') {
                $('.show_when_Institutional').show();
                $('.show_when_Residential').hide();
            } else if (selectedValue === 'Residential') {
                $('.show_when_Residential').show();
                $('.show_when_Institutional').hide();
            } else {
                $('.show_when_Institutional').hide();
                $('.show_when_Residential').hide();
            }
        });
        $('#org_type').trigger('change');
        $("#upazila").chained("#district");
        $("#institution_type_id").chained("#institution_parent_id");
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