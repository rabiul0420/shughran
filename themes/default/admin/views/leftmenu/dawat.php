<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container" id="container">
        <div class="row" id="main-con">
        <table class="lt"><tr><td class="sidebar-con">
            <div id="sidebar-left">
                <div class="sidebar-nav nav-collapse collapse navbar-collapse" id="sidebar_menu">
                    <ul class="nav main-menu">
                        <li class="mm_welcome">
                            <a href="<?= admin_url() ?>">
                                <i class="fa fa-dashboard"></i>
                                <span class="text"> <?= lang('dashboard'); ?></span>
                            </a>
                        </li>

                        
				 

                            

                         

                      
					 
                            <li class="mm_auth mm_dawatsummary <?php  echo ($this->uri->segment(2)=='dawat' &&  ($this->uri->segment(3) == '' || is_numeric($this->uri->segment(3)) ) )? 'active':'' ?>">
                                <a class="submenu" href="<?= admin_url('dawat'); ?>">
                                <i class="fa fa-users"></i>
                                <span class="text"> <?= lang('একনজরে '); ?> </span>
                                
                                </a>
                                 
                            </li>

                            <li  class="<?php  echo ($this->uri->segment(2)=='dawat' && $this->uri->segment(3) == 'other')? 'active':'' ?>">
                                            <a href="<?= admin_url('dawat/other') ?>">
                                                <i class="fa fa-cogs"></i><span class="text"> <?= "অন্যান্য দাওয়াত"; ?></span>
                                            </a>
                             </li>
				 
							
							 <li id="" class="<?php  echo ($this->uri->segment(2)=='dawat' && $this->uri->segment(3) == 'element')? 'active':'' ?>">
                                            <a href="<?= admin_url('dawat/element') ?>">
                                                <i class="fa fa-cogs"></i><span class="text"> <?= "দাওয়াতী উপকরণ "; ?></span>
                                            </a>
                             </li>
                             
							<!--
                             
							 <li id="" class="<?php  echo ($this->uri->segment(2)=='dawat' && $this->uri->segment(3) == 'mosque')? 'active':'' ?>">
                                            <a href="<?= admin_url('dawat/mosque') ?>">
                                                <i class="fa fa-cogs"></i><span class="text"> <?= "মসজিদ ভিত্তিক কাজ "; ?></span>
                                            </a>
                             </li>
							 
							 <li id="" class="<?php  echo ($this->uri->segment(2)=='dawat' && $this->uri->segment(3) == 'extra')? 'active':'' ?>">
                                            <a href="<?= admin_url('dawat/extra') ?>">
                                                <i class="fa fa-cogs"></i><span class="text"> <?= "অতিরিক্ত দাওয়াত "; ?></span>
                                            </a>
                             </li>
							 
							 <li id="" class="<?php  echo ($this->uri->segment(2)=='dawat' && $this->uri->segment(3) == 'detail')? 'active':'' ?>" >
                                            <a href="<?= admin_url('dawat/detail') ?>">
                                                <i class="fa fa-cogs"></i><span class="text"> <?= "বিস্তারিত  দাওয়াত "; ?></span>
                                            </a>
                             </li> -->
                            
                            
                             
 
                    </ul>
                </div>
                <a href="#" id="main-menu-act" class="full visible-md visible-lg">
                    <i class="fa fa-angle-double-left"></i>
                </a>
            </div>
            </td><td class="content-con">
            <div id="content">
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <ul class="breadcrumb">
                            <?php
                            foreach ($bc as $b) {
                                if ($b['link'] === '#') {
                                    echo '<li class="active">' . $b['page'] . '</li>';
                                } else {
                                    echo '<li><a href="' . $b['link'] . '">' . $b['page'] . '</a></li>';
                                }
                            }
                            ?>
                            <li class="right_log hidden-xs">
                                <?= lang('your_ip') . ' ' . $ip_address . " <span class='hidden-sm'>( " . lang('last_login_at') . ": " . date($dateFormats['php_ldate'], $this->session->userdata('old_last_login')) . " " . ($this->session->userdata('last_ip') != $ip_address ? lang('ip:') . ' ' . $this->session->userdata('last_ip') : '') . " )</span>" ?>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <?php if ($message) { ?>
                            <div class="alert alert-success">
                                <button data-dismiss="alert" class="close" type="button">×</button>
                                <?= $message; ?>
                            </div>
                        <?php } ?>
                        <?php if ($error) { ?>
                            <div class="alert alert-danger">
                                <button data-dismiss="alert" class="close" type="button">×</button>
                                <?= $error; ?>
                            </div>
                        <?php } ?>
                        <?php if ($warning) { ?>
                            <div class="alert alert-warning">
                                <button data-dismiss="alert" class="close" type="button">×</button>
                                <?= $warning; ?>
                            </div>
                        <?php } ?>
                        <?php
                        if ($info) {
                            foreach ($info as $n) {
                                if (!$this->session->userdata('hidden' . $n->id)) {
                                    ?>
                                    <div class="alert alert-info">
                                        <a href="#" id="<?= $n->id ?>" class="close hideComment external"
                                           data-dismiss="alert">&times;</a>
                                        <?= $n->comment; ?>
                                    </div>
                                <?php }
                            }
                        } ?>
                        <div class="alerts-con"></div>

