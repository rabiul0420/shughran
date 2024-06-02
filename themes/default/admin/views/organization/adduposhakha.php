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
                            <?php echo form_input('date', '01/01/2015', 'class="form-control date" id="date" readonly required="required"'); ?>
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

                        echo form_dropdown('thana_id', $dt,  '', 'id="thana_id"  class="form-control select" style="width:100%;" required="required" ');
                        ?>
                    </div>


                    <div class="form-group">
                        <?= lang("সাংগঠনিক ওয়ার্ড/ইউনিয়নের নাম", "ward_id"); ?>
                        <select id="ward_id" name="ward_id" class="form-control" required="required" > </select>

                    </div>


                    <div class="form-group">
                        <?= lang("সংগঠনের ধরন", "org_type"); ?>
                        <?php
                        $wrt[''] = lang('select') . ' ' . lang('organization_type');
                        foreach (['Residential' => 'আবাসিক', 'Institutional' => 'প্রাতিষ্ঠানিক', 'Departmental' => 'বিভাগীয়'] as $key => $type)
                            $wrt[$key] = $type;

                        echo form_dropdown('org_type', $wrt,  '', 'id="org_type"   class="form-control select" style="width:100%;" required="required" ');
                        ?>
                    </div>


                    <div class="form-group hide_for_departmental hide_for_Institutional">
                        <?= lang("প্রশাসনিক বিবরন", "prosasonik_details"); ?>
                        <?php
                        foreach (['1' => 'প্রশাসনিক এলাকা ', '2' => 'মেস', '3' => 'হল/হোস্টেল', '4' => 'কোয়াটার'] as $key => $type)
                            $prosasonik_details[$key] = $type;

                        echo form_dropdown('prosasonik_details', $prosasonik_details, '', 'id="prosasonik_details"   class="form-control select" style="width:100%;" ');
                        ?>
                    </div>


                    <div class="form-group hide_for_departmental hide_for_Institutional">
                        <?= lang("জেলা", "district"); ?>
                        <?php
                        $dt[''] = lang('select') . ' ' . lang('district');
                        foreach ($districts as $district) if ($district->parent_id == 0)
                            $dt[$district->id] = $district->name;

                        echo form_dropdown('district', $dt,  '', 'id="district"  class="form-control select" style="width:100%;" ');
                        ?>
                    </div>

                    <div class="form-group hide_for_departmental hide_for_Institutional">
                        <?= lang("উপজেলা/ওয়ার্ড", "upazila"); ?>
                        <select id="upazila" name="upazila" class="form-control">
                        </select>

                    </div>

                    <div class="form-group hide_for_departmental hide_for_Institutional">
                        <?= lang("পৌরসভা /ইউনিয়ন", "union") ?>
                        <select id="union" name="union" class="form-control">
                        </select>
                    </div>

                    <div class="form-group hide_for_departmental hide_for_Institutional">
                        <?= lang("সিটি/ পৌরসভা /ইউনিয়নের ওয়ার্ড", "ward") ?>
                        <select id="ward" name="ward" class="form-control">
                        </select>
                    </div>


                </div>


                <div class="col-md-6 hide_for_departmental">


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
                            <label for="sub_category">সাব ক্যাটাগরি </label>
                            <select id="sub_category" name="sub_category" class="form-control ">
                            </select>
                        </div>

                        <div class="form-group">
                            <?= lang("প্রতিষ্ঠানের নাম", "institutionlist"); ?>
                            <select id="institutionlist" name="institution_id" class="form-control">
                            </select>
                        </div>



                        <hr>
                    </div>


                    <div class="form-group">
                        <?= lang('সদস্য সংখ্যা', 'member_number'); ?>
                        <?= form_input('member_number', set_value('member_number', '0'), 'class="form-control tip" id="member_number" required="required"  '); ?>
                    </div>
                    <div class="form-group">
                        <?= lang('সাথী সংখ্যা', 'associate_number'); ?>
                        <?= form_input('associate_number', set_value('associate_number', '0'), 'class="form-control tip" id="associate_number" required="required"  '); ?>
                    </div>


                    <div class="form-group">
                        <?= lang('কর্মী সংখ্যা', 'worker_number'); ?>
                        <?= form_input('worker_number', set_value('worker_number', ''), 'class="form-control tip" id="worker_number" required="required" '); ?>
                    </div>
                    <div class="form-group">
                        <?= lang('সমর্থক সংখ্যা', 'supporter_number'); ?>
                        <?= form_input('supporter_number', set_value('supporter_number', ''), 'class="form-control tip" id="supporter_number" required="required"  '); ?>
                    </div>





                    <div class="form-group">
                        <?= lang('সেট-আপ আছে কি না?', 'is_setup'); ?>

                        <div class="radio">
                            <input type="radio" class="checkbox" name="is_setup"  value="1" <?= 1 ? 'checked="checked"' : ''; ?> />
                            <label class="padding05"><?= 'হ্যাঁ' ?></label>
                        </div>

                        <div class="radio">
                            <input type="radio" class="checkbox" name="is_setup" value="2" <?= 2 ? 'checked="checked"' : ''; ?>>
                            <label class="padding05"><?= 'না ' ?></label>

                        </div>
                    </div>


                    <div class="form-group">
                        <?= lang("কোন মানের উপশাখা", "unit_category"); ?>
                        <?php
                        foreach (['Strong' => 'মজবুত ', 'Weak' => 'দূর্বল', 'Inactive' => 'নিষ্ক্রিয়'] as $key => $type)
                            $unit_category[$key] = $type;

                        echo form_dropdown('unit_category', $unit_category, '', 'id="unit_category"   class="form-control select" style="width:100%;" ');
                        ?>
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

                            echo form_dropdown('branch_id', $wh, '', 'id="branch_id" class="form-control select" style="width:100%;" required="required"');
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



<script type="text/javascript">
    $(document).ready(function() {






        $('#org_type').change(function() {
            $('.hide_for_departmental').show();
            $('.hide_for_Institutional').show();
            if ($(this).val() === 'Departmental') {
                $('.hide_for_departmental').hide();
            } else if ($(this).val() === 'Institutional') {
                $('.hide_for_Institutional').hide();
            }
        });








        $('#thana_id').change(function() {
            var thana_id = $(this).val();

            if (thana_id) {
                $.ajax({
                    url: "<?php echo admin_url('organization/getWardList'); ?>",
                    method: "GET",
                    data: {
                        thana_id: thana_id
                    },
                    dataType: 'json',
                    success: function(response) {
                        var options = "<option selected disabled><?= lang('select') . ' ' . lang('ward'); ?></option>";
                        $.each(response, function(index, wards) {
                            options += "<option value='" + wards.id + "'>" + wards.thana_name + "</option>";
                        });
                        $('#ward_id').empty().append(options);
                    },
                    error: function() {
                        console.log("Error fetching wards!");
                    }
                });
            } else {
                $('#ward_id').empty().append("<option selected disabled><?= lang('select') . ' ' . lang('ward'); ?></option>");
            }
        });


        $('#district').change(function() {
            var district_id = $(this).val();

            if (district_id) {
                $.ajax({
                    url: "<?php echo admin_url('organization/getUpazilas'); ?>",
                    method: "GET",
                    data: {
                        district_id: district_id
                    },
                    dataType: 'json',
                    success: function(response) {
                        var options = "<option selected disabled><?= lang('select') . ' ' . lang('upazila'); ?></option>";
                        $.each(response, function(index, upazila) {
                            options += "<option value='" + upazila.id + "'>" + upazila.name + "</option>";
                        });
                        $('#upazila').empty().append(options);
                    },
                    error: function() {
                        console.log("Error fetching upazilas!");
                    }
                });
            } else {
                $('#upazila').empty().append("<option selected disabled><?= lang('select') . ' ' . lang('upazila'); ?></option>");
            }
        });


        $('#upazila').change(function() {
            var upazila_id = $(this).val();
            if (upazila_id) {
                $.ajax({
                    url: "<?php echo admin_url('organization/get_unions'); ?>",
                    method: "GET",
                    data: {
                        upazila_id: upazila_id
                    },
                    dataType: 'json',
                    success: function(response) {
                        var options = "<option selected disabled><?= lang('select') . ' ' . lang('union'); ?></option>";
                        $.each(response, function(index, union) {
                            options += "<option value='" + union.id + "'>" + union.name + "</option>";
                        });
                        $('#union').empty().append(options);
                    },
                    error: function() {
                        console.log("Error fetching unions!");
                    }
                });
            } else {
                $('#union').empty().append("<option selected disabled><?= lang('select') . ' ' . lang('union'); ?></option>");
            }
        });




        $('#union').change(function() {
            var union_id = $(this).val();
            if (union_id) {
                $.ajax({
                    url: "<?php echo admin_url('organization/get_wards'); ?>",
                    method: "GET",
                    data: {
                        union_id: union_id
                    },
                    dataType: 'json',
                    success: function(response) {
                        var options = "<option selected disabled><?= lang('select') . ' ' . lang('ward'); ?></option>";
                        $.each(response, function(index, ward) {
                            options += "<option value='" + ward.id + "'>" + ward.name + "</option>";
                        });
                        $('#ward').empty().append(options);
                    },
                    error: function() {
                        console.log("Error fetching wards!");
                    }
                });
            } else {
                $('#ward').empty().append("<option selected disabled><?= lang('select') . ' ' . lang('ward'); ?></option>");
            }
        });



        $('#institution_parent_id').change(function() {
            var institution_parent_id = $(this).val();
            if (institution_parent_id) {
                $.ajax({
                    url: "<?php echo admin_url('organization/get_sub_categoryList'); ?>",
                    method: "GET",
                    data: {
                        institution_parent_id: institution_parent_id
                    },
                    dataType: 'json',
                    success: function(response) {
                        var options = "<option selected disabled><?= lang('select') . ' ' . lang('sub_category'); ?></option>";
                        $.each(response, function(index, sub_category) {
                            options += "<option value='" + sub_category.id + "'>" + sub_category.institution_type + "</option>";
                        });
                        $('#sub_category').empty().append(options);
                    },
                    error: function() {
                        console.log("Error fetching sub_categorys!");
                    }
                });
            } else {
                $('#sub_category').empty().append("<option selected disabled><?= lang('select') . ' ' . lang('sub_category'); ?></option>");
            }
        });



        $('#sub_category').change(function() {
            var sub_category = $(this).val();

            // alert(sub_category);


            if (sub_category) {
                $.ajax({
                    url: "<?php echo admin_url('organization/get_institutionlist'); ?>",
                    method: "GET",
                    data: {
                        sub_category: sub_category
                    },
                    dataType: 'json',
                    success: function(response) {
                        var options = "<option selected disabled><?= lang('select') . ' ' . lang('sub_category'); ?></option>";
                        $.each(response, function(index, institutionlist) {
                            options += "<option value='" + institutionlist.id + "'>" + institutionlist.ins_name + "</option>";
                        });
                        $('#institutionlist').empty().append(options);
                    },
                    error: function() {
                        console.log("Error fetching institutionlists!");
                    }
                });
            } else {
                $('#institutionlist').empty().append("<option selected disabled><?= lang('select') . ' ' . lang('institutionlist'); ?></option>");
            }
        });







    });
</script>