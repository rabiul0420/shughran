<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>


<style>

</style>

<div class="box ">
    <div class="box-header">
        <h2 class="blue"><i
                class="fa-fw fa fa-barcode"></i><?= 'প্রাতিষ্ঠানিক সংগঠন একনজরে ' . ' (' . ($branch_id ? $branch->name : 'সকল শাখা') . ')'; ?>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;



            <?php


            if ($report_info['is_current'] || $report_info['year'] == date('Y')) {
                if ($report_info['type'] == 'annual') {
                    echo anchor('admin/organization' . ($branch_id ? '/' . $branch_id : '') . ('?type=half_yearly&year=' . $report_info['year']), 'ষাণ্মাসিক ' . $report_info['year']);
                    echo "&nbsp;|&nbsp;" . anchor('admin/organization' . ($branch_id ? '/' . $branch_id : ''), 'জুন-নভেম্বর\'' . $report_info['year']);
                    echo "&nbsp;|&nbsp;";
                    echo anchor('admin/organization' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'বার্ষিক ' . $report_info['year']);
                } else {
                    echo anchor('admin/organization' . ($branch_id ? '/' . $branch_id : ''), 'ষাণ্মাসিক ' . $report_info['year']);
                    echo "&nbsp;|&nbsp;" . anchor('admin/organization' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['last_year'], 'বার্ষিক ' . $report_info['last_year']);

                }
            } else {

                if ($report_info['type'] == 'annual') {
                    echo anchor('admin/organization' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $report_info['year'], 'বার্ষিক ' . $report_info['year']);
                } else {

                    echo anchor('admin/organization' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $report_info['year'], 'ষাণ্মাসিক ' . $report_info['year']);

                }

            }



            ?>
            &nbsp;&nbsp;



            <span class="dropdown">

                <button class="btn btn-primary dropdown-toggle" type="button" id="archive" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    Archive
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="archive">


                    <?php

                    echo ' <li>' . anchor('admin/organization' . ($branch_id ? '/' . $branch_id : ''), 'বর্তমান ') . ' </li>';

                    for ($i = date('Y') - 1; $i >= 2019; $i--) {
                        echo ' <li>' . anchor('admin/organization' . ($branch_id ? '/' . $branch_id : '') . '?type=annual&year=' . $i, 'বার্ষিক ' . $i) . ' </li>';

                        echo ' <li>' . anchor('admin/organization' . ($branch_id ? '/' . $branch_id : '') . '?type=half_yearly&year=' . $i, 'ষাণ্মাসিক ' . $i) . ' </li>';


                    }
                    ?>

                </ul>
            </span>




        </h2>

        <div class="box-icon">
            <ul class="btn-tasks">
                <li>
                    <a class="hidden" href="#" id="excel" data-action="export_excel">
                        <i class="icon fa fa-file-excel-o"></i> <?= lang('export_to_excel') ?>
                    </a>

                    <a href="#" onclick="doit('xlsx','example');  return false;"><i class="icon fa fa-file-excel-o"></i>
                        <?= lang('export_to_excel') ?> </a>

                </li>
                <?php if (!empty($branches)) { ?>
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon fa fa-building-o tip"
                                data-placement="left" title="<?= lang("all_branches") ?>"></i></a>
                        <ul class="dropdown-menu pull-right tasks-menus" role="menu" aria-labelledby="dLabel">
                            <li><a href="<?= admin_url('organization') ?>"><i class="fa fa-building-o"></i>
                                    <?= 'সকল শাখা' ?></a></li>
                            <li class="divider"></li>
                            <?php
                            foreach ($branches as $branch) {
                                echo '<li><a href="' . admin_url('organization/' . $branch->id) . '"><i class="fa fa-building"></i>' . $branch->name . '</a></li>';
                            }
                            ?>
                        </ul>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
    <div class="box-content">
        <div class="row">
            <div class="col-lg-12">
                <p class="introtext"><?php // lang('list_results'); ?></p>


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
                </style>




                <p>&nbsp;</p>



                <p>কোন মানের সংগঠন</p>
                <table class="table table-bordered"
                    data-branch="<?php echo isset($branch_code) ? $branch_code . '_organization_' : 'central_organization'; ?>">

                    <thead>
                        <tr>
                            <th class="text-center">সংগঠন</th>
                            <th colspan="4">প্রতিষ্ঠান</th>
                            <th colspan="5">সংগঠন</th>
                            <th colspan="9">কোন মানের সংগঠন</th>
                            <th colspan="4">
                                <p>সমর্থক সংগঠন</p>
                                <p>(সংগঠন নেই এমন প্রতিষ্ঠানের কয়টিতে ন্যূনতম একটি সমর্থক সংগঠন আছে?)</p>
                            </th>
                        </tr>
                        <tr>
                            <th></th>
                            <th>পূর্ব সংখ্যা</th>
                            <th>সংখ্যা</th>
                            <th>বৃৃদ্ধি</th>
                            <th>ঘাটতি</th>
                            <th>পূর্ব সংখ্যা</th>
                            <th>বর্তমান সংখ্যা</th>
                            <th>নেই	</th>
                            <th>বৃৃদ্ধি</th>
                            <th>ঘাটতি</th>
                            <th>শাখা</th>
                            <th>থানা পূর্ব</th>
                            <th>থানা বর্তমান</th>
                            <th>ওয়ার্ড পূর্ব</th>
                            <th>ওয়ার্ড বর্তমান</th>
                            <th>উপশাখা পূর্ব</th>
                            <th>উপশাখা বর্তমান</th>
                            <th>উপশাখা বৃদ্ধি</th>
                            <th>উপশাখা ঘাটতি</th>
                            <th>পূর্ব</th>
                            <th>বর্তমান</th>
                            <th>বৃৃদ্ধি</th>
                            <th>ঘাটতি</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach ($institutiontype as $institution_type) { ?>


                            <tr style="background: aqua;">
                                <td><?php echo $institution_type->institution_type; ?> </td>
                                <?php for ($i = 1; $i <= 22; $i++) {
                                    echo '<td class="type_"' . $i . '>  </td>';

                                } ?>


                            </tr>

                            <?php foreach ($institutions as $institution)
                                if ($institution->type_id == $institution_type->id) { ?>
                                    <tr>
                                        <td><?php echo $institution->institution_type ?></td>


                                        <td class="type_1">
                                            <?php
                                            $institution_row = institution_row($institution->id, $institution_number);

                                            //var_dump($institution_row );
                                            if ($report_info['last_half'] != 1)
                                                echo $institution_row == null ? 0 : $institution_row['prev_institution'];
                                            ?>

                                        </td>
                                        <td class="type_2">
                                            <?php if ($report_info['last_half'] != 1)
                                                echo $institution_row == null ? 0 : $institution_row['prev_institution'] + $institution_row['increase'] - $institution_row['decrease']; ?>

                                        </td>
                                        <td class="type_3">
                                            <?php echo $institution_row == null ? 0 : $institution_row['increase']; ?>

                                        </td>
                                        <td class="type_4">
                                            <?php echo $institution_row == null ? 0 : $institution_row['decrease']; ?>

                                        </td>
                                        <td class="type_"></td>
                                        <td class="type_"></td>
                                        <td class="type_"></td>
                                        <td class="type_"></td>
                                        <td class="type_"></td>
                                        <td class="type_"></td>
                                        <td class="type_"></td>
                                        <td class="type_"></td>
                                        <td class="type_"></td>
                                        <td class="type_"></td>
                                        <td class="type_"></td>
                                        <td class="type_"></td>
                                        <td class="type_"></td>
                                        <td class="type_"></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                <?php } ?>
                        <?php } ?>

                        <tr>
                            <td>Total</td>
                            <?php for ($i = 1; $i <= 22; $i++) { ?>
                                <td class="total_<?php echo $i; ?>"><?php echo $i; ?></td>
                            <?php } ?>
                    </tbody>
                </table>

 

            </div>
        </div>
    </div>
</div>