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
        <h2 class="blue"><i class="fa-fw fa fa-plus"></i><?= 'উপশাখা'; ?></h2>
    </div>
    <div class="box-content">
        <div class="row">

            <div class="col-lg-12">

                <p class="introtext hidden"><?php echo lang('enter_info'); ?></p>

                <?php
                $attrib = array('data-toggle' => 'validator', 'role' => 'form', 'autocomplete' => 'off');
                echo admin_form_open_multipart("organization/addthana/3", $attrib)
                ?>

                <div class="col-md-6">
                    <div class="form-group">
                        <?php echo lang('বৃদ্ধির তারিখ', 'date'); ?>
                        <div class="controls">
                            <?php echo form_input('date', '', 'class="form-control fixed_date" id="date" readonly required="required"'); ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <?= lang("সাংগঠনিক উপশাখা নাম", "thana_name") ?>
                        <?= form_input('thana_name', '', 'class="form-control" id="thana_name" required="required"'); ?>
                    </div>

                    <div class="form-group">
                        <?= lang("সাংগঠনিক থানা শাখার নাম", "thana_id"); ?>
                        <?php
                        $dt[''] = lang('select') . ' ' . lang('থানা');
                        foreach ($thanas as $thana)
                            $dt[$thana->id] = $thana->thana_name;

                        echo form_dropdown('thana_id', $dt,  '', 'id="thana_id"  class="form-control select" style="width:100%;" ');
                        ?>
                    </div>

                    <div class="form-group">
                        <?= lang("সাংগঠনিক ওয়ার্ড/ইউনিয়নের নাম", "ward_id"); ?>
                        <select id="ward_id" name="ward_id" class="form-control">

                    </div>


                    <div class="form-group">
                        <?= lang("সংগঠনের ধরন", "org_type"); ?>
                        <?php
                        $wrt[''] = lang('select') . ' ' . lang('organization_type');
                        foreach (['Residential' => 'আবাসিক', 'Institutional' => 'প্রাতিষ্ঠানিক', 'Departmental' => 'বিভাগীয়'] as $key => $type)
                            $wrt[$key] = $type;

                        echo form_dropdown('org_type', $wrt,  '', 'id="org_type"   class="form-control select" style="width:100%;" ');
                        ?>
                    </div>


                    <!-- for আবাসিক -->


                    <div class="form-group">
                        <?= lang("প্রশাসনিক বিবরন", "prosasonik_details"); ?>
                        <?php
                        foreach (['1' => 'প্রশাসনিক এলাকা ', '2' => 'মেস', '3' => 'হল/হোস্টেল', '4' => 'কোয়াটার'] as $key => $type)
                            $prosasonik_details[$key] = $type;

                        echo form_dropdown('prosasonik_details', $prosasonik_details, '', 'id="prosasonik_details"   class="form-control select" style="width:100%;" ');
                        ?>
                    </div>




                    <div class="form-group">
                        <?= lang("জেলা", "district"); ?>
                        <?php
                        $dt[''] = lang('select') . ' ' . lang('district');
                        foreach ($districts as $district) if ($district->parent_id == 0)
                            $dt[$district->id] = $district->name;

                        echo form_dropdown('district', $dt,  '', 'id="district"  class="form-control select" style="width:100%;" ');
                        ?>
                    </div>

                    <div class="form-group">
                        <?= lang("উপজেলা/উপশাখা", "upazila"); ?>
                        <select id="upazila" name="upazila" class="form-control">
                        </select>

                    </div>

                    <div class="form-group">
                        <?= lang("পৌরসভা /ইউনিয়ন", "union_name") ?>
                        <select id="union_name" name="union_name" class="form-control">
                        </select>
                    </div>

                    <div class="form-group">
                        <?= lang("সিটি/ পৌরসভা /ইউনিয়নের উপশাখা", "ward_name") ?>
                        <select id="ward_name" name="ward_name" class="form-control">
                        </select>
                    </div>





                    <div class="form-group">
                        <?= lang("শিক্ষাপ্রতিষ্ঠানের বিবরন", "educational_details"); ?>
                        <?php
                        foreach (['1' => 'শিক্ষাপ্রতিষ্ঠান ', '2' => 'কোচিং/প্রাইভেট সেন্টার', '3' => 'ট্রেনিং সেন্টার'] as $key => $type)
                            $educational_details[$key] = $type;

                        echo form_dropdown('educational_details', $educational_details, '', 'id="educational_details"   class="form-control select" style="width:100%;" ');
                        ?>
                    </div>



                    <div class="">
                        <div class="form-group">
                            <label for="institution_parent_id">ক্যাটাগরি </label>
                            <?php
                            $whp[''] = lang('select') . ' ' . 'ক্যাটাগরি';
                            foreach ($institution_types as $institution_type) {
                                $whp[$institution_type->id] = $institution_type->institution_type;
                            }
                            echo form_dropdown('institution_parent_id', $whp, '', 'id="institution_parent_id"  class="form-control skip" style="width:100%;" ');
                            ?>
                        </div>

                        <div class="form-group">
                            <label for="institution_type_id">সাব ক্যাটাগরি </label>
                            <select id="institution_type_id" name="institution_type_id" class="form-control skip">
                                <option value="">--</option>
                                <?php
                                foreach ($institutions as $institution) {
                                    echo '<option value="' . $institution->id . '" data-chained="' . $institution->type_id . '">' . $institution->institution_type . '</option>';
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <?= lang("প্রতিষ্ঠানের নাম", "ins_name"); ?>
                            <select id="ins_name" name="institution_id" class="form-control">
                            </select>
                        </div>
                        <hr>
                    </div>




                    <div class="form-group">
                        <?= lang('কর্মী', 'worker_number'); ?>
                        <?= form_input('worker_number', set_value('worker_number', '0'), 'class="form-control tip" id="worker_number"  '); ?>
                    </div>
                    <div class="form-group">
                        <?= lang('সমর্থক সংখ্যা', 'supporter_number'); ?>
                        <?= form_input('supporter_number', set_value('supporter_number', '0'), 'class="form-control tip" id="supporter_number"  '); ?>
                    </div>


                </div>


                <div class="col-md-6">



                    <div class="form-group">
                        <?= lang('উপশাখা সংখ্যা', 'unit_number'); ?>
                        <?= form_input('unit_number', set_value('unit_number', '0'), 'class="form-control tip" id="unit_number"  '); ?>
                    </div>


                    <div class="form-group">
                        <?= lang('আদর্শ উপশাখা?', 'is_ideal_thana'); ?>

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



                        echo form_dropdown('branch_id', $wh, '', 'id="branch_id"  class="form-control select" style="width:100%;" ');
                        ?>
                    </div>






                </div>


                <div class="col-md-6">





                    <div class="form-group all">
                        <?= lang("মন্তব্য", "note") ?>
                        <?= form_textarea('note', '', 'class="form-control" id="note"'); ?>
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









