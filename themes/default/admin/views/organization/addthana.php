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



                    <div class="form-group">
                        <?= lang("সংগঠনের ধরন", "org_type"); ?>
                        <?php
                        $wrt[''] = lang('select') . ' ' . lang('organization_type');
                        foreach (['Residential' => 'আবাসিক', 'Institutional' => 'প্রাতিষ্ঠানিক', 'Departmental' => 'বিভাগীয়'] as $key => $type)
                            $wrt[$key] = $type;

                        echo form_dropdown('org_type', $wrt, (isset($_POST['org_type']) ? $_POST['org_type'] : ''), 'id="org_type"   class="form-control select" style="width:100%;" ');
                        ?>
                    </div>


                    <!-- for আবাসিক -->


                    <div class="form-group">
                        <?= lang("প্রশাসনিক বিবরন", "prosasonik_details"); ?>
                        <?php
                        foreach (['1' => 'প্রশাসনিক এলাকা ', '2' => 'মেস', '3' => 'হল/হোস্টেল', '4' => 'কোয়াটার'] as $key => $type)
                            $prosasonik_details[$key] = $type;

                        echo form_dropdown('prosasonik_details', $prosasonik_details, (isset($_POST['prosasonik_details']) ? $_POST['prosasonik_details'] : ''), 'id="prosasonik_details"   class="form-control select" style="width:100%;" ');
                        ?>
                    </div>











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
                        </select>

                    </div>

                    <div class="form-group">
                        <?= lang("পৌরসভা /ইউনিয়ন", "union_name") ?>
                        <select id="union_name" name="union_name" class="form-control">
                        </select>
                    </div>

                    <div class="form-group">
                        <?= lang("সিটি/ পৌরসভা /ইউনিয়নের ওয়ার্ড", "ward_name") ?>
                        <select id="ward_name" name="ward_name" class="form-control">
                        </select>
                    </div>





                    <div class="form-group">
                        <?= lang("শিক্ষাপ্রতিষ্ঠানের বিবরন", "educational_details"); ?>
                        <?php
                        foreach (['1' => 'শিক্ষাপ্রতিষ্ঠান ', '2' => 'কোচিং/প্রাইভেট সেন্টার', '3' => 'ট্রেনিং সেন্টার'] as $key => $type)
                            $educational_details[$key] = $type;

                        echo form_dropdown('educational_details', $educational_details, (isset($_POST['educational_details']) ? $_POST['educational_details'] : ''), 'id="educational_details"   class="form-control select" style="width:100%;" ');
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
                            echo form_dropdown('institution_parent_id', $whp, (isset($_POST['institution_parent_id']) ? $_POST['institution_parent_id'] : ''), 'id="institution_parent_id"  class="form-control skip" style="width:100%;" ');
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
                            <select id="ins_name" name="ins_name" class="form-control">
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
                        <?= lang('সাংগঠনিক ওয়ার্ড সংখ্যা', 'ward_number'); ?>
                        <?= form_input('ward_number', set_value('ward_number', '0'), 'class="form-control tip" id="ward_number" required="required" '); ?>
                    </div>
                    <div class="form-group">
                        <?= lang('উপশাখা সংখ্যা', 'unit_number'); ?>
                        <?= form_input('unit_number', set_value('unit_number', '0'), 'class="form-control tip" id="unit_number"  '); ?>
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



                        echo form_dropdown('branch_id', $wh, (isset($_POST['branch_id']) ? $_POST['branch_id'] : ''), 'id="branch_id"  class="form-control select" style="width:100%;" ');
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



        $('#district').change(function() {
            var district_id = $(this).val();
            if (district_id) {
                $.ajax({
                    url: "<?php echo admin_url('organization/get_upazilas'); ?>",
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
                        var options = "<option selected disabled><?= lang('select') . ' ' . lang('union_name'); ?></option>";
                        $.each(response, function(index, union) {
                            options += "<option value='" + union.id + "'>" + union.name + "</option>";
                        });
                        $('#union_name').empty().append(options);
                    },
                    error: function() {
                        console.log("Error fetching unions!");
                    }
                });
            } else {
                $('#union_name').empty().append("<option selected disabled><?= lang('select') . ' ' . lang('union_name'); ?></option>");
            }
        });




        $('#union_name').change(function() {
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
                        var options = "<option selected disabled><?= lang('select') . ' ' . lang('ward_name'); ?></option>";
                        $.each(response, function(index, ward) {
                            options += "<option value='" + ward.id + "'>" + ward.name + "</option>";
                        });
                        $('#ward_name').empty().append(options);
                    },
                    error: function() {
                        console.log("Error fetching wards!");
                    }
                });
            } else {
                $('#ward_name').empty().append("<option selected disabled><?= lang('select') . ' ' . lang('ward_name'); ?></option>");
            }
        });



        $('#institution_type_id').change(function() {
            var institution_type_id = $(this).val();


            // alert(institution_type_id);


            if (institution_type_id) {
                $.ajax({
                    url: "<?php echo admin_url('organization/get_institutionlist'); ?>",
                    method: "GET",
                    data: {
                        institution_type_id: institution_type_id
                    },
                    dataType: 'json',
                    success: function(response) {
                        var options = "<option selected disabled><?= lang('select') . ' ' . lang('institution_name'); ?></option>";
                        $.each(response, function(index, institution) {
                            options += "<option value='" + institution.id + "'>" + institution.name + "</option>";
                        });
                        $('#ins_name').empty().append(options);
                    },
                    error: function() {
                        console.log("Error fetching institutions!");
                    }
                });
            } else {
                $('#ins_name').empty().append("<option selected disabled><?= lang('select') . ' ' . lang('institution_name'); ?></option>");
            }
        });









        $('#org_type').change(function() {
            var selectedValue = $(this).val();

            if (selectedValue === 'Institutional') {
                $('.show_when_Institutional').show();
                $('.show_when_Residential').hide();
                $('#union_name').attr('required', false);
            } else if (selectedValue === 'Residential') {
                $('#union_name').attr('required', true);
                $('.show_when_Residential').show();
                $('.show_when_Institutional').hide();
            } else {
                $('.show_when_Institutional').hide();
                $('.show_when_Residential').hide();
            }
        });

        $('#org_type').trigger('change');

        $("#institution_type_id").chained("#institution_parent_id");

        $('form[data-toggle="validator"]').bootstrapValidator({
            excluded: [':disabled']
        });

        var audio_success = new Audio('<?= base_url('assets/sounds/sound2.mp3'); ?>');
        var audio_error = new Audio('<?= base_url('assets/sounds/sound3.mp3'); ?>');

        $.ajaxSetup({
            headers: {
                'X-CSRF-Token': $('meta[name="token"]').attr('content')
            }
        });

        var _URL = window.URL || window.webkitURL;
        var variants = <?= json_encode($vars); ?>;
    });
</script>