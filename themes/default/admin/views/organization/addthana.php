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
                        <?php echo lang('বৃদ্ধির তারিখ', 'date'); ?>
                        <div class="controls">
                            <?php echo form_input('date', '', 'class="form-control fixed_date" id="date" readonly required="required"'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <?= lang("সাংগঠনিক থানা শাখার নাম", "thana_name") ?>
                        <?= form_input('thana_name', (isset($_POST['thana_name']) ? $_POST['thana_name'] : ''), 'class="form-control" id="thana_name" required="required"'); ?>
                    </div>


                    <div class="form-group all">
                        <?= lang('থানা কোড', 'thana_code'); ?>

                        <?php $tc = array();
                        $tc[''] =  'থানা কোড';
                        for ($i = 1; $i <= 60; $i++) {
                            $tc[$i] =  $i;
                        }

                        $tc[100] =  100;

                        echo form_dropdown('thana_code', $tc, '', 'id="thana_code"  class="form-control select" required="required" style="width:100%;" ');
                        ?>
                    </div>

                    <div class="form-group">
                        <?= lang("সংগঠনের ধরন", "org_type"); ?>
                        <?php
                        $wrt[''] = lang('select') . ' ' . lang('organization_type');
                        foreach (['Institutional' => 'প্রাতিষ্ঠানিক', 'Residential' => 'আবাসিক'] as $key => $type)
                            $wrt[$key] = $type;

                        echo form_dropdown('org_type', $wrt, (isset($_POST['org_type']) ? $_POST['org_type'] : ''), 'id="org_type"   class="form-control select" style="width:100%;" ');
                        ?>
                    </div>


                    <!-- for আবাসিক -->
                    <div class="show_when_Residential">

                        <hr>
                        <hr>
                        <h1>প্রশাসনিক বিবরন</h1>

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

                            echo form_dropdown('district', $dt, (isset($_POST['district']) ? $_POST['district'] : ''), 'id="district" required="required" class="form-control select" style="width:100%;" ');
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

                            <?= form_input('union_name', (isset($_POST['union_name']) ? $_POST['union_name'] : ''), 'class="form-control" id="union_name" required="required"'); ?>
                        </div>

                        <div class="form-group">
                            <?= lang("সিটি/ পৌরসভা /ইউনিয়নের ওয়ার্ড", "ward_name") ?>

                            <?= form_input('ward_name', (isset($_POST['ward_name']) ? $_POST['ward_name'] : ''), 'class="form-control" id="ward_name" required="required"'); ?>
                        </div>

                        <!-- শিক্ষাপ্রতিষ্ঠানের বিবরন -->
                        <hr>
                        <hr>


                        <h1>শিক্ষাপ্রতিষ্ঠানের বিবরন</h1>


                        <label class="checkbox" for="is_under_instute">
                            <input type="checkbox" name="is_under_instute" value="1" id="is_under_instute" />
                            আবাসিক সংগঠন কিন্তু কোন শিক্ষা প্রতিষ্ঠানের অন্তর্ভুক্ত কি না?
                        </label>


                        <div class="form-group all">
                            <?= lang('শিক্ষাপ্রতিষ্ঠানের ধরন', 'institution_type'); ?>

                            <?php
                            $it[''] = lang('select') . ' ' . lang('institution_type');
                            foreach ($institution_types as $institution_type)
                                $it[$institution_type->id] = $institution_type->institution_type;

                            echo form_dropdown('institution_type', $it, (''), 'id="institution_type"  class="form-control select" style="width:100%;" required="required" ');
                            ?>
                        </div>



                        <div class="form-group all">

                            <label for="institution_type_child">শিক্ষাপ্রতিষ্ঠানের সাব ধরন</label>

                            <select id="institution_type_child" name="institution_type_child" class="form-control">
                                <option value="">--</option>
                                <?php

                                foreach ($institutions as $institute) if ($institute->id > 0) {


                                    echo '<option  value="' . $institute->id . '" data-chained="' . $institute->type_id . '">' . $institute->institution_type . '</option>';
                                }


                                //  echo form_dropdown('institution_type_id', $wh, (isset($_POST['institution_type_id']) ? $_POST['institution_type_id'] : ''), 'id="institution_type_id" required="required" class="form-control skip" style="width:100%;" ');
                                ?>
                            </select>
                        </div>






                        <div class="form-group">
                            <?= lang("প্রতিষ্ঠানের নাম", "name_institution"); ?>
                            <?= form_input('name_institution', '', 'class="form-control tip" id="name_institution" required="required" '); ?>
                        </div>
                        <hr>

                    </div>

                    <!-- for প্রাতিষ্ঠানিক -->
                    <div class="show_when_Institutional">

                        <hr>
                        <hr>


                        <h1>শিক্ষাপ্রতিষ্ঠানের বিবরন</h1>
                        <label class="checkbox" for="is_coaching">
                            <input type="checkbox" name="is_coaching" value="1" id="is_coaching" />
                            প্রাতিষ্ঠানিক কিন্তু কোচিং, প্রাইভেট সেন্টার, বিভাগ কিনা?
                        </label>



                        <div class="form-group">

                            <label for="institution_parent_id">ক্যাটাগরি </label>
                            <?php
                            $whp[''] = lang('select') . ' ' . 'ক্যাটাগরি';
                            foreach ($institution_types as $institution_type) {
                                $whp[$institution_type->id] = $institution_type->institution_type;
                            }
                            echo form_dropdown('institution_parent_id', $whp, (isset($_POST['institution_parent_id']) ? $_POST['institution_parent_id'] : ''), 'id="institution_parent_id" required="required" class="form-control skip" style="width:100%;" ');
                            ?>
                        </div>

                        <div class="form-group">

                            <label for="institution_type_id">সাব ক্যাটাগরি </label>

                            <select id="institution_type_id" name="institution_type_id" class="form-control skip" required="required">
                                <option value="">--</option>
                                <?php

                                foreach ($institutions as $institution) {
                                    echo '<option  value="' . $institution->id . '" data-chained="' . $institution->type_id . '">' . $institution->institution_type . '</option>';



                                    // $wh[$institution->id] = $institution->institution_type;
                                }


                                //  echo form_dropdown('institution_type_id', $wh, (isset($_POST['institution_type_id']) ? $_POST['institution_type_id'] : ''), 'id="institution_type_id" required="required" class="form-control skip" style="width:100%;" ');
                                ?>
                            </select>
                        </div>



                        <div class="form-group">
                            <?= lang("প্রতিষ্ঠানের নাম", "dist"); ?>
                            <?= form_input('ward_number', '', 'class="form-control tip" id="ward_number" required="required" '); ?>
                        </div>
                        <hr>

                    </div>




                    <div class="form-group">
                        <?= lang('কর্মী', 'worker_number'); ?>
                        <?= form_input('worker_number', set_value('worker_number', '0'), 'class="form-control tip" id="worker_number" required="required" '); ?>
                    </div>
                    <div class="form-group">
                        <?= lang('সমর্থক সংখ্যা', 'supporter_number'); ?>
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
                        <?= lang('আদর্শ থানা?', 'is_ideal_thana'); ?>

                        <div class="radio">
                            <input type="radio" class="checkbox" name="is_ideal_thana" value="1" <?= 1 ? 'checked="checked"' : ''; ?> />
                            <label class="padding05"><?= 'হ্যাঁ' ?></label>
                        </div>

                        <div class="radio">
                            <input type="radio" class="checkbox" name="is_ideal_thana" value="2" <?= 2 ? 'checked="checked"' : ''; ?>>
                            <label class="padding05"><?= 'না ' ?></label>

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


                <div class="col-md-6">





                    <div class="form-group all">
                        <?= lang("মন্তব্য", "note") ?>
                        <?= form_textarea('note', (isset($_POST['note']) ? $_POST['note'] : ''), 'class="form-control" id="note"'); ?>
                    </div>



                </div>


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

        $("#institution_type_child").chained("#institution_type");







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