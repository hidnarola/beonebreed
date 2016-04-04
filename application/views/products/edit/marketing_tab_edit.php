<?php
    // p($marketing_part1_title['en_title']);
    // die();
    $m_part1_class = '';
    $m_part2_class = '';
    $m_part3_class = '';
    $m_part4_class = '';
    $m_part5_class = '';

    $m_part1_check = '';
    $m_part2_check = '';
    $m_part3_check = '';
    $m_part4_check = '';
    $m_part5_check = '';
    $marketing_complete_part = array();
   if(!empty($data_admin_part_1['marketing_complete'])){

        $marketing_complete_part = json_decode($data_admin_part_1['marketing_complete'],true);     
        
        if($marketing_complete_part['part_1'] != '0') { $m_part1_class = 'active'; $m_part1_check = 'checked="checked" disabled="disabled"'; }
        if($marketing_complete_part['part_2'] != '0') { $m_part2_class = 'active'; $m_part2_check = 'checked="checked" disabled="disabled"'; }
        if($marketing_complete_part['part_3'] != '0') { $m_part3_class = 'active'; $m_part3_check = 'checked="checked" disabled="disabled"'; }
        if($marketing_complete_part['part_4'] != '0') { $m_part4_class = 'active'; $m_part4_check = 'checked="checked" disabled="disabled"'; }
        if($marketing_complete_part['part_5'] != '0') { $m_part5_class = 'active'; $m_part5_check = 'checked="checked" disabled="disabled"'; }
   }

?>

<div class="complete-level">
    <h5>COMPLETE LEVEL</h5>
    <div class="inline-block complete-level-ul"> 
        <ul>
            <li class="part_1_marketting <?php echo $m_part1_class; ?>">
                <span></span>
                <span>PART 1</span>
            </li>
            <li class="part_2_marketting <?php echo $m_part2_class; ?>">
                <span></span>
                <span>PART 2</span>
            </li>
            <li class="part_3_marketting <?php echo $m_part3_class; ?>">
                <span></span>
                <span>PART 3</span>
            </li>
            <li class="part_4_marketting <?php echo $m_part4_class; ?>">
                <span></span>
                <span>PART 4</span>
            </li>
            <li class="part_5_marketting <?php echo $m_part5_class; ?>">
                <span></span>
                <span>PART 5</span>
            </li>
        </ul>
    </div>
    <div class="inline-block complete-level-action">
        <h1 class="marketting_load_percentage"> 
            <?php 
                if(!empty($marketing_complete_part)){
                    echo array_sum(
                                array(
                                        $marketing_complete_part['part_1'],
                                        $marketing_complete_part['part_2'],
                                        $marketing_complete_part['part_3'],
                                        $marketing_complete_part['part_4'],
                                        $marketing_complete_part['part_5']
                                    )
                                ).'%';
                }else{
                    echo '0%';
                }
            ?>
        </h1>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <div class="box-main-scroll">
            <!-- Strat of part - 1  By Parth Viramgama pav-->
            <form class="form" style="margin-bottom: 0;" method="post" action="#" id="marketing_part1">
                <div class="box col-sm-12">
                    <div class="box-header gray-bg">
                        PART - 1 
                    </div>
                    <div class="box-content">
                        <h5>PRODUCT TITLE: Brand, product and sub brand, name and specification, size in KG and dimensions in cm.</h5>
                        <div class="row">
                            <div class="col-md-1">
                                
                            </div>
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-2">
                                         <label class='control-label' for='product_name_en'>EN</label>
                                     </div>
                                     <div class="col-md-8">
                                         <div class='controls margin-bottom-10'>
                                         <input class='form-control' id='product_name_en' name="product_name_en" 
                                            type='text' onkeyup="$('.error_product_name_en').addClass('hide');"
                                            value="<?php echo (!empty($marketing_part1_title)) ? htmlentities($marketing_part1_title['en_title']) :''; ?>" >
                                            <span class="color_red hide error_product_name_en" >Field Is Required </span>
                                          </div>
                                     </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                         <label class='control-label' for='product_name_fr'>FR</label>
                                     </div>
                                     <div class="col-md-8">
                                         <div class='controls margin-bottom-10'>
                                         <input class='form-control' id='product_name_fr' name="product_name_fr" 
                                            type='text' onkeyup="$('.error_product_name_fr').addClass('hide');"
                                            value="<?php echo (!empty($marketing_part1_title)) ? htmlentities($marketing_part1_title['fr_title']) :''; ?>" >
                                            <span class="color_red hide error_product_name_fr" >Field Is Required </span>
                                          </div>
                                     </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <h5>3 HIGHLIGHTS (60 charaters)</h5>
                        <div class="row">
                            <div class="col-md-1">
                                1
                            </div>
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-2">
                                         <label class='control-label' for='product_highlight1_en'>EN</label>
                                     </div>
                                     <div class="col-md-8">
                                         <div class='controls margin-bottom-10'>
                                         <input class='form-control' id='product_highlight1_en' name="product_highlight1_en" 
                                            type='text' onkeyup="$('.error_product_highlight1_en').addClass('hide');"
                                            value="<?php echo (!empty($marketing_part1_highlight)) ? htmlentities($marketing_part1_highlight[0]['en_title']) :''; ?>" >
                                         <span class="color_red hide error_product_highlight1_en" >Field Is Required </span>
                                          </div>
                                     </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                         <label class='control-label' for='product_highlight1_fr'>FR</label>
                                     </div>
                                     <div class="col-md-8">
                                         <div class='controls margin-bottom-10'>
                                         <input class='form-control' id='product_highlight1_fr' name="product_highlight1_fr" 
                                            type='text' onkeyup="$('.error_product_highlight1_fr').addClass('hide');"
                                            value="<?php echo (!empty($marketing_part1_highlight)) ? htmlentities($marketing_part1_highlight[0]['fr_title']) :''; ?>" >
                                            <span class="color_red hide error_product_highlight1_fr" >Field Is Required </span>
                                          </div>
                                     </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-1">
                                2
                            </div>
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-2">
                                         <label class='control-label' for='product_highlight2_en'>EN</label>
                                     </div>
                                     <div class="col-md-8">
                                         <div class='controls margin-bottom-10'>
                                         <input class='form-control' id='product_highlight2_en' name="product_highlight2_en" 
                                            type='text' onkeyup="$('.error_product_highlight2_en').addClass('hide');"
                                            value="<?php echo (!empty($marketing_part1_highlight)) ? htmlentities($marketing_part1_highlight[1]['en_title']) :''; ?>">
                                            <span class="color_red hide error_product_highlight2_en" >Field Is Required</span>
                                          </div>
                                     </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                         <label class='control-label' for='product_highlight2_fr'>FR</label>
                                     </div>
                                     <div class="col-md-8">
                                         <div class='controls margin-bottom-10'>
                                         <input class='form-control' id='product_highlight2_fr' name="product_highlight2_fr" 
                                            type='text' onkeyup="$('.error_product_highlight2_fr').addClass('hide');"
                                            value="<?php echo (!empty($marketing_part1_highlight)) ? htmlentities($marketing_part1_highlight[1]['fr_title']) :''; ?>">
                                            <span class="color_red hide error_product_highlight2_fr" >Field Is Required </span>
                                          </div>
                                     </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-1">
                                3
                            </div>
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-2">
                                         <label class='control-label' for='product_highlight3_en'>EN</label>
                                     </div>
                                     <div class="col-md-8">
                                         <div class='controls margin-bottom-10'>
                                         <input class='form-control' id='product_highlight3_en' name="product_highlight3_en" 
                                            type='text' onkeyup="$('.error_product_highlight3_en').addClass('hide');"
                                            value="<?php echo (!empty($marketing_part1_highlight)) ? htmlentities($marketing_part1_highlight[2]['en_title']) :''; ?>" >
                                            <span class="color_red hide error_product_highlight3_en" >Field Is Required </span>
                                          </div>
                                     </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                         <label class='control-label' for='product_highlight3_fr'>FR</label>
                                     </div>
                                     <div class="col-md-8">
                                         <div class='controls margin-bottom-10'>
                                         <input class='form-control' id='product_highlight3_fr' name="product_highlight3_fr" 
                                            type='text' onkeyup="$('.error_product_highlight3_fr').addClass('hide');"
                                            value="<?php echo (!empty($marketing_part1_highlight)) ? htmlentities($marketing_part1_highlight[2]['fr_title']) :''; ?>" >
                                         <span class="color_red hide error_product_highlight3_fr" >Field Is Required </span>
                                          </div>
                                     </div>
                                </div>
                            </div>
                        </div>
                         
                        <hr>
                        <h5>IN PARAGRAPH HIGHLIGHT (200 charaters)</h5>
                        <div class="row">
                            <div class="col-md-1">
                                
                            </div>
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-2">
                                         <label class='control-label' for='product_paragraph_en'>EN</label>
                                     </div>
                                     <div class="col-md-8">
                                         <div class='controls margin-bottom-10'>
                                         <input class='form-control' id='product_paragraph_en' name="product_paragraph_en" 
                                            type='text' onkeyup="$('.error_product_paragraph_en').addClass('hide');"
                                            value="<?php echo (!empty($marketing_part1_paragraph)) ? htmlentities($marketing_part1_paragraph['en_title']) :''; ?>" >
                                            <span class="color_red hide error_product_paragraph_en" >Field Is Required </span>
                                          </div>
                                     </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                         <label class='control-label' for='product_paragraph_fr'>FR</label>
                                     </div>
                                     <div class="col-md-8">
                                         <div class='controls margin-bottom-10'>
                                         <input class='form-control' id='product_paragraph_fr' name="product_paragraph_fr" 
                                            type='text' onkeyup="$('.error_product_paragraph_fr').addClass('hide');"
                                            value="<?php echo (!empty($marketing_part1_paragraph)) ? htmlentities($marketing_part1_paragraph['fr_title']) :''; ?>" >
                                            <span class="color_red hide error_product_paragraph_fr" >Field Is Required </span>
                                          </div>
                                     </div>
                                </div>
                            </div>
                        </div>

                        <hr>
                        <h5>PRODUCT INTRODUCTION (800 charaters)</h5>
                        <div class="row">
                            <div class="col-md-1">
                                
                            </div>
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-2">
                                         <label class='control-label' for='product_introduction_en'>EN</label>
                                     </div>
                                     <div class="col-md-8">
                                         <div class='controls margin-bottom-10'>
                                         <textarea class='form-control' id='product_introduction_en' name="product_introduction_en" 
                                            type='text' onkeyup="$('.error_product_introduction_en').addClass('hide');"><?php echo (!empty($marketing_part1_introduction)) ? $marketing_part1_introduction['en_title'] :''; ?></textarea>
                                            <span class="color_red hide error_product_introduction_en" >Field Is Required </span>
                                          </div>
                                     </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                         <label class='control-label' for='product_introduction_fr'>FR</label>
                                     </div>
                                     <div class="col-md-8">
                                         <div class='controls margin-bottom-10'>
                                         <textarea class='form-control' id='product_introduction_fr' name="product_introduction_fr" 
                                            type='text' onkeyup="$('.error_product_introduction_fr').addClass('hide');"><?php echo (!empty($marketing_part1_introduction)) ? $marketing_part1_introduction['fr_title'] :''; ?></textarea>
                                            <span class="color_red hide error_product_introduction_fr" >Field Is Required </span>
                                          </div>
                                     </div>
                                </div>
                            </div>

                            <div class="col-sm-8 col-sm-offset-0">
                                <div class='form-group col-sm-6 text-left'>
                                        <div class='controls'>
                                            <label class='control-label check-box-margin'>
                                                <input type="checkbox" <?php echo $m_part1_check; ?> name="chkbox_marketing_part1" id="chkbox_marketing_part1" > 
                                                <span>PART 1 COMPLETED (20%)</span>
                                            </label>
                                            
                                        </div>    
                                    <span class="color_red error_marketing_part1 hide">Please Check this checkbox to procced further.</span>
                                    </div>
                                
                                <div class='form-group pull-right'>
                                    <div class='controls'>
                                        <input type="hidden" name="marketing_part1_1" id="marketing_part1_1" value="<?php echo (!empty($marketing_part1_title)) ? $marketing_part1_title['id'] : ''; ?>" >
                                        <input type="hidden" name="marketing_part1_2" id="marketing_part1_2" value="<?php echo (!empty($marketing_part1_highlight)) ? $marketing_part1_highlight[0]['id'] : ''; ?>" >
                                        <input type="hidden" name="marketing_part1_3" id="marketing_part1_3" value="<?php echo (!empty($marketing_part1_highlight)) ? $marketing_part1_highlight[1]['id'] : ''; ?>" >
                                        <input type="hidden" name="marketing_part1_4" id="marketing_part1_4" value="<?php echo (!empty($marketing_part1_highlight)) ? $marketing_part1_highlight[2]['id'] : ''; ?>" >
                                        <input type="hidden" name="marketing_part1_5" id="marketing_part1_5" value="<?php echo (!empty($marketing_part1_paragraph)) ? $marketing_part1_paragraph['id'] : ''; ?>" >
                                        <input type="hidden" name="marketing_part1_6" id="marketing_part1_6" value="<?php echo (!empty($marketing_part1_introduction)) ? $marketing_part1_introduction['id'] : ''; ?>" >
                                        <a class="btn btn-success"  onclick="validate_marketing_part_1()">
                                            <i class='icon-save'></i> Save
                                        </a>
                                        <a href="" class="btn btn-default" >Cancel</a>
                                    </div>
                                </div>
                            </div>          
                        </div>
                    </div> <!-- END of box-content -->
                </div>
            </form>
              <!-- End of part1 -->  
              
              <!-- Strat of part -2  -->
               <form class="form" style="margin-bottom: 0;" method="post" action="#" id="marketing_part2">
                    <div class="box col-sm-12">
                        <div class="box-header gray-bg">
                            PART 2 SELLING POINTS
                        </div>
                        <div class="box-content">
                            
                            <h5>SELLING POINTS (60 charaters for the tittle and 300 for the body)</h5>
                            <!-- ROW SELLING POINTS BLOCK 1-->
                            <div class="row">
                                <div class="col-md-1">
                                    1
                                </div>
                                <div class="col-md-5">
                                    <div class="row">
                                        <div class="col-md-2">
                                             <label class='control-label' for='marketing_part2_en_title1'>EN</label>
                                         </div>
                                         <div class="col-md-8">
                                             <div class='controls margin-bottom-10'>
                                             <input class='form-control' id='marketing_part2_en_title1' name="marketing_part2_en_title1" 
                                                type='text' onkeyup="$('.error_marketing_part2_en_title1').addClass('hide');"
                                                value="<?php echo (!empty($marketing_part2_data)) ? $marketing_part2_data[0]['en_title'] :''; ?>">
                                                <span class="color_red hide error_marketing_part2_en_title1" >Field Is Required </span>
                                              </div>
                                              <div class='controls margin-bottom-10'>
                                                <textarea class='form-control' id='marketing_part2_en_desc1' name="marketing_part2_en_desc1" 
                                                type='text' onkeyup="$('.error_marketing_part2_en_desc1').addClass('hide');"><?php echo (!empty($marketing_part2_data)) ? $marketing_part2_data[0]['en_description'] :''; ?></textarea>
                                                <span class="color_red hide error_marketing_part2_en_desc1" >Field Is Required </span>
                                              </div>
                                         </div>
                                    </div>
                                   
                                </div>

                                <div class="col-md-5">
                                    <div class="row">
                                        <div class="col-md-2">
                                             <label class='control-label' for='marketing_part2_fr_title1'>FR</label>
                                         </div>
                                         <div class="col-md-8">
                                             <div class='controls margin-bottom-10'>
                                             <input class='form-control' id='marketing_part2_fr_title1' name="marketing_part2_fr_title1" 
                                                type='text' onkeyup="$('.error_marketing_part2_fr_title1').addClass('hide');"
                                                value="<?php echo (!empty($marketing_part2_data)) ? $marketing_part2_data[0]['fr_title'] :''; ?>" >
                                                <span class="color_red hide error_marketing_part2_fr_title1" >Field Is Required </span>
                                              </div>
                                              <div class='controls margin-bottom-10'>
                                                <textarea class='form-control' id='marketing_part2_fr_desc1' name="marketing_part2_fr_desc1" 
                                                type='text' onkeyup="$('.error_marketing_part2_fr_desc1').addClass('hide');"><?php echo (!empty($marketing_part2_data)) ? $marketing_part2_data[0]['fr_description'] :''; ?></textarea>
                                                <span class="color_red hide error_marketing_part2_fr_desc1" >Field Is Required </span>
                                              </div>
                                         </div>
                                    </div>
                                   
                                </div>
                            </div>
                            <br />
                            <!-- //ROW SELLING POINTS BLOCK 1-->
                            
                            <!-- ROW SELLING POINTS BLOCK 2-->
                            <div class="row">
                                <div class="col-md-1">
                                    2
                                </div>
                                <div class="col-md-5">
                                    <div class="row">
                                        <div class="col-md-2">
                                             <label class='control-label' for='marketing_part2_en_title2'>EN</label>
                                         </div>
                                         <div class="col-md-8">
                                             <div class='controls margin-bottom-10'>
                                             <input class='form-control' id='marketing_part2_en_title2' name="marketing_part2_en_title2" 
                                                type='text' onkeyup="$('.error_marketing_part2_en_title2').addClass('hide');"
                                                value="<?php echo (!empty($marketing_part2_data)) ? $marketing_part2_data[1]['en_title'] :''; ?>">
                                                <span class="color_red hide error_marketing_part2_en_title2" >Field Is Required</span>
                                              </div>
                                              <div class='controls margin-bottom-10'>
                                                <textarea class='form-control' id='marketing_part2_en_desc2' name="marketing_part2_en_desc2" 
                                                type='text' onkeyup="$('.error_marketing_part2_en_desc2').addClass('hide');"><?php echo (!empty($marketing_part2_data)) ? $marketing_part2_data[1]['en_description'] :''; ?></textarea>
                                                <span class="color_red hide error_marketing_part2_en_desc2" >Field Is Required </span>
                                              </div>
                                         </div>
                                    </div>
                                   
                                </div>

                                <div class="col-md-5">
                                    <div class="row">
                                        <div class="col-md-2">
                                             <label class='control-label' for='marketing_part2_fr_title2'>FR</label>
                                         </div>
                                         <div class="col-md-8">
                                             <div class='controls margin-bottom-10'>
                                             <input class='form-control' id='marketing_part2_fr_title2' name="marketing_part2_fr_title2" 
                                                type='text' onkeyup="$('.error_marketing_part2_fr_title2').addClass('hide');"
                                                value="<?php echo (!empty($marketing_part2_data)) ? $marketing_part2_data[1]['fr_title'] :''; ?>" >
                                                <span class="color_red hide error_marketing_part2_fr_title2" >Field Is Required </span>
                                              </div>
                                              <div class='controls margin-bottom-10'>
                                                <textarea class='form-control' id='marketing_part2_fr_desc2' name="marketing_part2_fr_desc2" 
                                                type='text' onkeyup="$('.error_marketing_part2_fr_desc2').addClass('hide');"><?php echo (!empty($marketing_part2_data)) ? $marketing_part2_data[1]['fr_description'] :''; ?></textarea>
                                                <span class="color_red hide error_marketing_part2_fr_desc2" >Field Is Required </span>
                                              </div>
                                         </div>
                                    </div>
                                   
                                </div>
                            </div>
                            <br />
                            <!-- //ROW SELLING POINTS BLOCK 2-->
                            
                            <!-- ROW SELLING POINTS BLOCK 3-->
                            <div class="row">
                                <div class="col-md-1">
                                    3
                                </div>
                                <div class="col-md-5">
                                    <div class="row">
                                        <div class="col-md-2">
                                             <label class='control-label' for='marketing_part2_en_title3'>EN</label>
                                         </div>
                                         <div class="col-md-8">
                                             <div class='controls margin-bottom-10'>
                                             <input class='form-control' id='marketing_part2_en_title3' name="marketing_part2_en_title3" 
                                                type='text' onkeyup="$('.error_marketing_part2_en_title3').addClass('hide');"
                                                value="<?php echo (!empty($marketing_part2_data)) ? $marketing_part2_data[2]['en_title'] :''; ?>">
                                                <span class="color_red hide error_marketing_part2_en_title3" >Field is Required </span>
                                              </div>
                                              <div class='controls margin-bottom-10'>
                                                <textarea class='form-control' id='marketing_part2_en_desc3' name="marketing_part2_en_desc3" 
                                                type='text' onkeyup="$('.error_marketing_part2_en_desc3').addClass('hide');"><?php echo (!empty($marketing_part2_data)) ? $marketing_part2_data[2]['en_description'] :''; ?></textarea>
                                                <span class="color_red hide error_marketing_part2_en_desc3" >Field is Required </span>
                                              </div>
                                         </div>
                                    </div>
                                   
                                </div>

                                <div class="col-md-5">
                                    <div class="row">
                                        <div class="col-md-2">
                                             <label class='control-label' for='marketing_part2_fr_title3'>FR</label>
                                         </div>
                                         <div class="col-md-8">
                                             <div class='controls margin-bottom-10'>
                                             <input class='form-control' id='marketing_part2_fr_title3' name="marketing_part2_fr_title3" 
                                                type='text' onkeyup="$('.error_marketing_part2_fr_title3').addClass('hide');"
                                                value="<?php echo (!empty($marketing_part2_data)) ? $marketing_part2_data[2]['fr_title'] :''; ?>" >
                                                <span class="color_red hide error_marketing_part2_fr_title3" >Field is Required </span>
                                              </div>
                                              <div class='controls margin-bottom-10'>
                                                <textarea class='form-control' id='marketing_part2_fr_desc3' name="marketing_part2_fr_desc3" 
                                                type='text' onkeyup="$('.error_marketing_part2_fr_desc3').addClass('hide');"><?php echo (!empty($marketing_part2_data)) ? $marketing_part2_data[2]['fr_description'] :''; ?></textarea>
                                                <span class="color_red hide error_marketing_part2_fr_desc3" >Field is Required </span>
                                              </div>
                                         </div>
                                    </div>                              
                                </div>
                            </div>
                            <br />
                            <!-- //ROW SELLING POINTS BLOCK 3-->
                            
                            <!-- ROW SELLING POINTS BLOCK 4-->
                            <div class="row">
                                <div class="col-md-1">
                                    4
                                </div>
                                <div class="col-md-5">
                                    <div class="row">
                                        <div class="col-md-2">
                                             <label class='control-label' for='marketing_part2_en_title4'>EN</label>
                                         </div>
                                         <div class="col-md-8">
                                             <div class='controls margin-bottom-10'>
                                             <input class='form-control' id='marketing_part2_en_title4' name="marketing_part2_en_title4" 
                                                type='text' onkeyup="$('.error_marketing_part2_en_title4').addClass('hide');"
                                                value="<?php echo (!empty($marketing_part2_data)) ? $marketing_part2_data[3]['en_title'] :''; ?>" >
                                              </div>
                                              <div class='controls margin-bottom-10'>
                                                <textarea class='form-control' id='marketing_part2_en_desc4' name="marketing_part2_en_desc4" 
                                                type='text' onkeyup="$('.error_marketing_part2_en_desc4').addClass('hide');"><?php echo (!empty($marketing_part2_data)) ? $marketing_part2_data[3]['en_description'] :''; ?></textarea>
                                              </div>
                                         </div>
                                    </div>
                                   
                                </div>

                                <div class="col-md-5">
                                    <div class="row">
                                        <div class="col-md-2">
                                             <label class='control-label' for='marketing_part2_fr_title4'>FR</label>
                                         </div>
                                         <div class="col-md-8">
                                             <div class='controls margin-bottom-10'>
                                             <input class='form-control' id='marketing_part2_fr_title4' name="marketing_part2_fr_title4" 
                                                type='text' onkeyup="$('.error_marketing_part2_fr_title4').addClass('hide');"
                                                value="<?php echo (!empty($marketing_part2_data)) ? $marketing_part2_data[3]['fr_title'] :''; ?>" >
                                                <span class="color_red hide error_marketing_part2_fr_title4" >Field Is Required </span>
                                              </div>
                                              <div class='controls margin-bottom-10'>
                                                <textarea class='form-control' id='marketing_part2_fr_desc4' name="marketing_part2_fr_desc4" 
                                                type='text' onkeyup="$('.error_marketing_part2_fr_desc4').addClass('hide');"><?php echo (!empty($marketing_part2_data)) ? $marketing_part2_data[3]['fr_description'] :''; ?></textarea>
                                                <span class="color_red hide error_marketing_part2_fr_desc4" >Field Is Required </span>
                                              </div>
                                         </div>
                                    </div>
                                   
                                </div>
                            </div>
                            <br />
                            <!-- //ROW SELLING POINTS BLOCK 4-->
                            
                            <!-- ROW SELLING POINTS BLOCK 5-->
                            <div class="row">
                                <div class="col-md-1">
                                    5
                                </div>
                                <div class="col-md-5">
                                    <div class="row">
                                        <div class="col-md-2">
                                             <label class='control-label' for='marketing_part2_en_title5'>EN</label>
                                         </div>
                                         <div class="col-md-8">
                                             <div class='controls margin-bottom-10'>
                                             <input class='form-control' id='marketing_part2_en_title5' name="marketing_part2_en_title5" 
                                                type='text' onkeyup="$('.error_marketing_part2_en_title5').addClass('hide');"
                                                value="<?php echo (!empty($marketing_part2_data)) ? $marketing_part2_data[4]['en_title'] :''; ?>">
                                                <span class="color_red hide error_marketing_part2_en_title5" >Field Is Required </span>
                                              </div>
                                              <div class='controls margin-bottom-10'>
                                                <textarea class='form-control' id='marketing_part2_en_desc5' name="marketing_part2_en_desc5" 
                                                type='text' onkeyup="$('.error_marketing_part2_en_desc5').addClass('hide');"><?php echo (!empty($marketing_part2_data)) ? $marketing_part2_data[4]['en_description'] :''; ?></textarea>
                                                <span class="color_red hide error_marketing_part2_en_desc5" >Field Is Required </span>
                                              </div>
                                         </div>
                                    </div>
                                   
                                </div>

                                <div class="col-md-5">
                                    <div class="row">
                                        <div class="col-md-2">
                                             <label class='control-label' for='marketing_part2_fr_title5'>FR</label>
                                         </div>
                                         <div class="col-md-8">
                                             <div class='controls margin-bottom-10'>
                                             <input class='form-control' id='marketing_part2_fr_title5' name="marketing_part2_fr_title5" 
                                                type='text' onkeyup="$('.error_marketing_part2_fr_title5').addClass('hide');"
                                                value="<?php echo (!empty($marketing_part2_data)) ? $marketing_part2_data[4]['fr_title'] :''; ?>" >
                                                <span class="color_red hide error_marketing_part2_fr_title5" >Field Is Required </span>
                                              </div>
                                              <div class='controls margin-bottom-10'>
                                                <textarea class='form-control' id='marketing_part2_fr_desc5' name="marketing_part2_fr_desc5" 
                                                type='text' onkeyup="$('.error_marketing_part2_fr_desc5').addClass('hide');"><?php echo (!empty($marketing_part2_data)) ? $marketing_part2_data[4]['fr_description'] :''; ?></textarea>
                                                <span class="color_red hide error_marketing_part2_fr_desc5" >Field Is Required </span>
                                              </div>
                                         </div>
                                    </div>
                                   
                                </div>
                            </div>
                            <br />
                            <!-- //ROW SELLING POINTS BLOCK 5-->
                            
                            <!-- ROW SELLING POINTS BLOCK 6-->
                            <div class="row">
                                <div class="col-md-1">
                                    6
                                </div>
                                <div class="col-md-5">
                                    <div class="row">
                                        <div class="col-md-2">
                                             <label class='control-label' for='marketing_part2_en_title6'>EN</label>
                                         </div>
                                         <div class="col-md-8">
                                            <div class='controls margin-bottom-10'>
                                             <input class='form-control' id='marketing_part2_en_title6' name="marketing_part2_en_title6" 
                                                type='text' onkeyup="$('.error_pmarketing_part2_en_title6').addClass('hide');"
                                                value="<?php echo (!empty($marketing_part2_data)) ? $marketing_part2_data[5]['en_title'] :''; ?>" >
                                            </div>
                                            <div class='controls margin-bottom-10'>
                                                <textarea class='form-control' id='marketing_part2_en_desc6' name="marketing_part2_en_desc6" 
                                                type='text' onkeyup="$('.error_marketing_part2_en_desc6').addClass('hide');"><?php echo (!empty($marketing_part2_data)) ? $marketing_part2_data[5]['en_description'] :''; ?></textarea>
                                            </div>
                                         </div>
                                    </div>
                                   
                                </div>

                                <div class="col-md-5">
                                    <div class="row">
                                        <div class="col-md-2">
                                             <label class='control-label' for='marketing_part2_fr_title6'>FR</label>
                                         </div>
                                         <div class="col-md-8">
                                             <div class='controls margin-bottom-10'>
                                             <input class='form-control' id='marketing_part2_fr_title6' name="marketing_part2_fr_title6" 
                                                type='text' onkeyup="$('.error_marketing_part2_fr_title6').addClass('hide');"
                                                value="<?php echo (!empty($marketing_part2_data)) ? $marketing_part2_data[5]['fr_title'] :''; ?>" >
                                              </div>
                                              <div class='controls margin-bottom-10'>
                                                <textarea class='form-control' id='marketing_part2_fr_desc6' name="marketing_part2_fr_desc6" 
                                                type='text' onkeyup="$('.error_marketing_part2_fr_desc6').addClass('hide');"><?php echo (!empty($marketing_part2_data)) ? $marketing_part2_data[5]['fr_description'] :''; ?></textarea>
                                              </div>
                                         </div>
                                    </div>
                                   
                                </div>
                            </div>
                            <br />
                            <!-- //ROW SELLING POINTS BLOCK 6-->
                            
                            <!-- ROW SELLING POINTS BLOCK 7-->
                            <div class="row">
                                <div class="col-md-1">
                                    7
                                </div>
                                <div class="col-md-5">
                                    <div class="row">
                                        <div class="col-md-2">
                                             <label class='control-label' for='marketing_part2_en_title7'>EN</label>
                                         </div>
                                         <div class="col-md-8">
                                             <div class='controls margin-bottom-10'>
                                             <input class='form-control' id='marketing_part2_en_title7' name="marketing_part2_en_title7" 
                                                type='text' onkeyup="$('.error_marketing_part2_en_title7').addClass('hide');"
                                                value="<?php echo (!empty($marketing_part2_data)) ? $marketing_part2_data[6]['en_title'] :''; ?>" >
                                             </div>
                                              <div class='controls margin-bottom-10'>
                                                <textarea class='form-control' id='marketing_part2_en_desc7' name="marketing_part2_en_desc7" 
                                                type='text' onkeyup="$('.error_marketing_part2_en_desc7').addClass('hide');"><?php echo (!empty($marketing_part2_data)) ? $marketing_part2_data[6]['en_description'] :''; ?></textarea>
                                              </div>
                                         </div>
                                    </div>
                                   
                                </div>

                                <div class="col-md-5">
                                    <div class="row">
                                        <div class="col-md-2">
                                             <label class='control-label' for='marketing_part2_fr_title7'>FR</label>
                                         </div>
                                         <div class="col-md-8">
                                             <div class='controls margin-bottom-10'>
                                                <input class='form-control' id='marketing_part2_fr_title7' name="marketing_part2_fr_title7" 
                                                       type='text' onkeyup="$('.error_marketing_part2_fr_title7').addClass('hide');"
                                                        value="<?php echo (!empty($marketing_part2_data)) ? $marketing_part2_data[6]['fr_title'] :''; ?>" >
                                              </div>
                                              <div class='controls margin-bottom-10'>
                                                <textarea class='form-control' id='marketing_part2_fr_desc7' name="marketing_part2_fr_desc7" 
                                                type='text' onkeyup="$('.error_marketing_part2_fr_desc7').addClass('hide');"><?php echo (!empty($marketing_part2_data)) ? $marketing_part2_data[6]['fr_description'] :''; ?></textarea>
                                              </div>
                                         </div>
                                    </div>
                                   
                                </div>
                            </div>
                            <br />
                            <!-- //ROW SELLING POINTS BLOCK 7-->
                            
                            <!-- ROW SELLING POINTS BLOCK 8-->
                            <div class="row">
                                <div class="col-md-1">
                                    8
                                </div>
                                <div class="col-md-5">
                                    <div class="row">
                                        <div class="col-md-2">
                                             <label class='control-label' for='marketing_part2_en_title8'>EN</label>
                                         </div>
                                         <div class="col-md-8">
                                            <div class='controls margin-bottom-10'>
                                                 <input class='form-control' id='marketing_part2_en_title8' name="marketing_part2_en_title8" 
                                                    type='text' onkeyup="$('.error_marketing_part2_en_title8').addClass('hide');"
                                                    value="<?php echo (!empty($marketing_part2_data)) ? $marketing_part2_data[7]['en_title'] :''; ?>" >
                                            </div>
                                            <div class='controls margin-bottom-10'>
                                                <textarea class='form-control' id='marketing_part2_en_desc8' name="marketing_part2_en_desc8" 
                                                type='text' onkeyup="$('.error_marketing_part2_en_desc8').addClass('hide');"><?php echo (!empty($marketing_part2_data)) ? $marketing_part2_data[7]['en_description'] :''; ?></textarea>
                                            </div>
                                         </div>
                                    </div>
                                   
                                </div>

                                <div class="col-md-5">
                                    <div class="row">
                                        <div class="col-md-2">
                                             <label class='control-label' for='marketing_part2_fr_title8'>FR</label>
                                         </div>
                                         <div class="col-md-8">
                                             <div class='controls margin-bottom-10'>
                                             <input class='form-control' id='marketing_part2_fr_title8' name="marketing_part2_fr_title8" 
                                                type='text' onkeyup="$('.error_marketing_part2_fr_title8').addClass('hide');"
                                                value="<?php echo (!empty($marketing_part2_data)) ? $marketing_part2_data[7]['fr_title'] :''; ?>" >
                                                
                                              </div>
                                              <div class='controls margin-bottom-10'>
                                                <textarea class='form-control' id='marketing_part2_fr_desc8' name="marketing_part2_fr_desc8" 
                                                type='text' onkeyup="$('.error_marketing_part2_fr_desc8').addClass('hide');"><?php echo (!empty($marketing_part2_data)) ? $marketing_part2_data[7]['fr_description'] :''; ?></textarea>
                                                
                                              </div>
                                         </div>
                                    </div>
                                   
                                </div>
                            </div>
                            <br />
                            <!-- //ROW SELLING POINTS BLOCK 8-->

                            <div class="col-sm-8 col-sm-offset-0">
                                    <div class='form-group col-sm-6 text-left'>
                                            <div class='controls'>
                                                <label class='control-label check-box-margin'>
                                                    <input type="checkbox" <?php echo $m_part2_check; ?> name="chkbox_marketing_part2" id="chkbox_marketing_part2"> <span>PART 2 COMPLETED (20%)</span>
                                                </label>
                                            </div>    
                                            <span class="color_red error_marketing_part2 hide">Please Check this checkbox to procced further.</span>
                                        </div>
                                    
                                    <div class='form-group pull-right'>
                                        <div class='controls'>
                                            <input type="hidden" name="marketing_part2_1" id="marketing_part2_1" value="<?php echo (!empty($marketing_part2_data)) ? $marketing_part2_data[0]['id'] :''; ?>" >
                                            <input type="hidden" name="marketing_part2_2" id="marketing_part2_2" value="<?php echo (!empty($marketing_part2_data)) ? $marketing_part2_data[1]['id'] :''; ?>" >
                                            <input type="hidden" name="marketing_part2_3" id="marketing_part2_3" value="<?php echo (!empty($marketing_part2_data)) ? $marketing_part2_data[2]['id'] :''; ?>" >
                                            <input type="hidden" name="marketing_part2_4" id="marketing_part2_4" value="<?php echo (!empty($marketing_part2_data)) ? $marketing_part2_data[3]['id'] :''; ?>" >
                                            <input type="hidden" name="marketing_part2_5" id="marketing_part2_5" value="<?php echo (!empty($marketing_part2_data)) ? $marketing_part2_data[4]['id'] :''; ?>" >
                                            <input type="hidden" name="marketing_part2_6" id="marketing_part2_6" value="<?php echo (!empty($marketing_part2_data)) ? $marketing_part2_data[5]['id'] :''; ?>" >
                                            <input type="hidden" name="marketing_part2_7" id="marketing_part2_7" value="<?php echo (!empty($marketing_part2_data)) ? $marketing_part2_data[6]['id'] :''; ?>" >
                                            <input type="hidden" name="marketing_part2_8" id="marketing_part2_8" value="<?php echo (!empty($marketing_part2_data)) ? $marketing_part2_data[7]['id'] :''; ?>" >
                                            <a class="btn btn-success" onclick="validate_marketing_part_2()" >
                                                <i class='icon-save'></i> Save
                                            </a>
                                            <a href="" class="btn btn-default" >Cancel</a>
                                        </div>
                                    </div>
                            </div> 
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </form>
              <!-- //part -2  -->
                
               <!-- part -3 start -->
                <form class="form" style="margin-bottom: 0;" method="post" action="#" accept-charset="UTF-8" id="marketting_part_3">
                 
                 <?php $m_part3_d = $this->products_model->getfrom('product_question',false,array('where'=>array('question_id'=>'1','product_id'=>$product_id))); ?> 
                 <input type="hidden" name="update_marketting" id="update_marketting" value="<?php if(!empty($m_part3_d)){ echo 'update'; } ?>">
                 <input type="hidden" name="hdn_marketting_part_3" id="hdn_marketting_part_3" value="<?php echo $product_id; ?>">
                    <div class="row">
                    <div class="col-sm-12 pull-left"> 
                        <span class="">
                            <h3 class="color_grey"> PART - 3 </h3>
                        </span>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-sm-12">
                        <h4> CHECKLIST PACKAGING </h4>
						<?php 
                            $i=1;
                            foreach($question_list_3 as $u_key) { 

                                $m_part3_data = $this->products_model->getfrom('product_question',
                                                                   false,
                                                                   array('where'=>array('product_id'=>$product_id,'question_id'=>$u_key->id)),
                                                                   array('single'=>true)
                                                                   );

                                ?>	
							<div class="row check-list">
								<div class="col-sm-6">
									<span class="check-list-number"><?php echo $i; ?></span>
									<label class='control-label'><?php echo $u_key->question; ?></label>
 								</div>
								<div class="col-sm-4">
									<div class='make-switch switch' data-off-label='&lt;i class="icon-remove"&gt;&lt;/i&gt;' data-on-label='&lt;i class="icon-ok"&gt;&lt;/i&gt;'>
									  <input type='hidden' name='check_list[<?php echo $u_key->id;?>]'>
									  <input type='checkbox' name='check_list[<?php echo $u_key->id;?>]' 
                                            <?php if(!empty($m_part3_data)){ if($m_part3_data['answer']=='1'){ echo 'checked="checked"';}} ?> >
									</div>
								</div>
								<div class="clearfix"></div>
							</div>
                            <?php if($u_key->description_required=="yes"){ ?>
                                <div class="row check-list">
                                    <div class="col-sm-6">
                                        <label class='control-label'><?php echo $u_key->description_label; ?></label>
                                    </div>
          
                                    <div class="col-sm-4">
                                        <input type='hidden' name='txt_list[<?php echo $u_key->id;?>]' >
                                        <input class='form-control'  type='text' name='txt_list[<?php echo $u_key->id;?>]'
                                        value="<?php if(!empty($m_part3_data)){ echo $m_part3_data['notes']; }?>">
                                    </div>

                                    <div class="clearfix"></div>
                                </div>
          
                            <?php } $i++; } ?>	
                    </div>

                    <div class="col-sm-6">

                    </div>
                    <div class="col-sm-6">
                        <div class="row">
                            <div class="col-sm-6">
                                <input type="checkbox" <?php echo $m_part3_check; ?> name="marketting_step_3" id="marketting_step_3" > Part-3 Completed (20%)
                                <br/><span class="color_red color_red_part_3 error_admin_part_3 hide">Please Check this checkbox for procced further.</span>
                            </div>
                            <div class="col-sm-6">
                                <div class='form-group pull-right'>
                                    <div class='controls'>
                                    <input type="hidden" name="" id="" value="">
                                    <!--
                                    <a class="btn btn-success" onclick="validate_admin_part_3()" >
                                        <i class='icon-save'></i> Save
                                    </a> -->
                                    <a class="btn btn-success" onclick="validate_marketting_part()" >
                                        <i class='icon-save'></i> Save
                                    </a>
                                    <a href="" class="btn btn-default" >Cancel</a>
                                    </div>
                                </div>
                            </div>
                        </div>        
                        <div class="clearfix"></div>
                    </div>   
                    </div>                                                
                </form>
               <!-- part 3 end -->
               
               <!-- part 4 start -->           
                <form class="form" style="margin-bottom: 0;" method="post" action="#" accept-charset="UTF-8" id="marketting_part_4">
                    <?php $m_part4_d = $this->products_model->getfrom('product_question',false,array('where'=>array('question_id'=>'7','product_id'=>$product_id))); ?> 
                    <input type="hidden" name="update_marketting_part_4" id="update_marketting_part_4" value="<?php if(!empty($m_part4_d)){echo 'update';} ?>">
                    <input type="hidden" name="hdn_marketting_part_4" id="hdn_marketting_part_4" value="<?php echo $product_id; ?>">
                   <div class="row">
                       <div class="col-sm-12 pull-left"> 
                           <span class="">
                               <h3 class="color_grey"> PART - 4 </h3>
                           </span>
                       </div>
                       <div class="clearfix"></div>
                       <div class="col-sm-12">
                           <h4> CHECKLIST PRODUCT IMAGE </h4>
                           <?php 
                               $k=1;
                               foreach($question_list_4 as $u_key) { 

                                $m_part4_data = $this->products_model->getfrom('product_question',
                                                                   false,
                                                                   array('where'=>array('product_id'=>$product_id,'question_id'=>$u_key->id)),
                                                                   array('single'=>true)
                                                                   );
                                ?>	
                               <div class="row check-list">
                                   <div class="col-sm-6">
                                       <span class="check-list-number"><?php echo $k; ?></span>
                                       <label class='control-label'><?php echo $u_key->question; ?></label>
                                   </div>
                                   <div class="col-sm-4">
                                        <div class='make-switch switch' data-off-label='&lt;i class="icon-remove"&gt;&lt;/i&gt;' data-on-label='&lt;i class="icon-ok"&gt;&lt;/i&gt;'>
                                           <input type='hidden' name='check_list[<?php echo $u_key->id;?>]' >
                                           <input type='checkbox' name='check_list[<?php echo $u_key->id;?>]' 
                                            <?php if(!empty($m_part4_data)){ if($m_part4_data['answer']=='1'){ echo 'checked="checked"';}} ?> >
                                        </div>
                                   </div>
                                   <div class="clearfix"></div>
                               </div>
                           <?php $k++; } ?>	
                       </div>

                       <div class="col-sm-6">

                       </div>
                       <div class="col-sm-6">
                           <div class="row">
                               <div class="col-sm-6">
                                   <input type="checkbox" <?php echo $m_part4_check; ?> name="complete_admin_part_1" id="marketting_step_4" > Part-4 Completed (20%)
                                   <span class="color_red error_admin_part_3 hide color_red4">Please Check this checkbox for procced further.</span>
                               </div>
                               <div class="col-sm-6">
                                   <div class='form-group pull-right'>
                                       <div class='controls'>
                                       <input type="hidden" name="" id="" value="">
                                       <a class="btn btn-success" onclick="validate_marketting_part_4()" >
                                           <i class='icon-save'></i> Save
                                       </a>
                                       <a href="" class="btn btn-default" >Cancel</a>
                                       </div>
                                   </div>
                               </div>
                           </div>        
                           <div class="clearfix"></div>
                       </div>  


                   </div>                                                
                 </form>
               <!-- part 4 ends -->

               <!-- part 5 start -->
                <form class="form" style="margin-bottom: 0;" method="post" action="#" accept-charset="UTF-8" id="marketing_part5" name="marketing_part5">
                 <div class="row">
                   <div class="col-sm-12 pull-left"> 
                       <span class="">
                           <h3 class="color_grey"> PART - 5 </h3>
                       </span>
                   </div>

                    <div class="clearfix"></div>
                    <div class="col-sm-6">    
                        <div class="part-five-block">
                            <font style="font-size:15px;font-weight:bold;color:black">DISPLAY USED </font>&nbsp;
                            <div class='make-switch  pull-right switch' data-off-label='&lt;i class="icon-remove"&gt;&lt;/i&gt;' data-on-label='&lt;i class="icon-ok"&gt;&lt;/i&gt;'>
                                <input type='checkbox' name="marketing_part5_switch1" id="marketing_part5_switch1" 
                                      value="display_used" 
                                        <?php 
                                            if(!empty($marketing_part5_data)){
                                               if($marketing_part5_data['display_used'] == '1'){ echo 'checked="checked"'; }     
                                            }
                                        ?> >
                            </div>
                            <br /><br />
                            <label class='control-label' for='marketing_part5_cost1'>COST</label>
                            <div class='controls margin-bottom-10'>
                                <input class='form-control' id='marketing_part5_cost1' name="marketing_part5_cost1" 
                                type='text' onkeyup="$('.error_marketing_part5_cost1').addClass('hide');$('.error_marketing_part5_cost1_num').addClass('hide');"
                                 value="<?php echo (!empty($marketing_part5_data)) ? $marketing_part5_data['cost1'] : ''; ?>" >
                                <span class="color_red hide error_marketing_part5_cost1" >Field Is Required</span>
                                <span class="color_red hide error_marketing_part5_cost1_num" >Enter Only Number</span>
                            </div>

                            <label class='control-label' for='marketing_part5_supplier1'>SUPPLIER NAME</label>
                            <div class='controls margin-bottom-10'>
                                <input class='form-control' id='marketing_part5_supplier1' name="marketing_part5_supplier1" 
                                type='text' onkeyup="$('.error_marketing_part5_supplier1').addClass('hide');"
                                value="<?php echo (!empty($marketing_part5_data)) ? $marketing_part5_data['supplier1'] : ''; ?>">
                                <span class="color_red hide error_marketing_part5_supplier1" >Field Is Required</span>
                            </div>

                            <label class='control-label' for='marketing_part5_upc1'>UPC</label>
                            <div class='controls margin-bottom-10'>
                                <input class='form-control' id='marketing_part5_upc1' name="marketing_part5_upc1" 
                                type='text' onkeyup="$('.error_marketing_part5_upc1').addClass('hide');" readonly
                                value="<?php echo (!empty($marketing_part5_data)) ? $marketing_part5_data['upc1'] : ''; ?>" >
                                <span class="color_red hide error_marketing_part5_upc1" >Please Generate UPC Code </span>
                            </div>
                            <div class="pull-right">
                                <a onClick="cost1_upc_get();" class="btn btn-success">GENERATE</a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>


                    <div class="col-sm-6">
                        <div class="part-five-block">
                            <font style="font-size:15px;font-weight:bold;color:black">PLV IN STORE USED</font>&nbsp;
                            
                            <div class='make-switch pull-right switch' data-off-label='&lt;i class="icon-remove"&gt;&lt;/i&gt;' data-on-label='&lt;i class="icon-ok"&gt;&lt;/i&gt;'>
                                <input type='checkbox' name="marketing_part5_switch2" id="marketing_part5_switch2" value="plv_used"
                                <?php 
                                    if(!empty($marketing_part5_data)){
                                       if($marketing_part5_data['plv_store_used'] == '1'){ echo 'checked="checked"'; }     
                                    }
                                ?>>
                            </div>
                            <br /><br />
                            <label class='control-label' for='marketing_part5_cost2'>COST</label>
                            <div class='controls margin-bottom-10'>
                                <input class='form-control' id='marketing_part5_cost2' name="marketing_part5_cost2" 
                                type='text' onkeyup="$('.error_marketing_part5_cost2').addClass('hide');$('.error_marketing_part5_cost2_num').addClass('hide');"
                                value="<?php echo (!empty($marketing_part5_data)) ? $marketing_part5_data['cost2'] : ''; ?>">
                                <span class="color_red hide error_marketing_part5_cost2" >Field Is Required </span>
                                <span class="color_red hide error_marketing_part5_cost2_num" >Enter Only Number</span>
                            </div>

                            <label class='control-label' for='marketing_part5_supplier2'>SUPPLIER NAME</label>
                            <div class='controls margin-bottom-10'>
                                <input class='form-control' id='marketing_part5_supplier2' name="marketing_part5_supplier2" 
                                type='text' onkeyup="$('.error_marketing_part5_supplier2').addClass('hide');"
                                value="<?php echo (!empty($marketing_part5_data)) ? $marketing_part5_data['supplier2'] : ''; ?>">
                                <span class="color_red hide error_marketing_part5_supplier2" >Field Is Required </span>
                            </div>

                            <label class='control-label' for='marketing_part5_upc2'>UPC</label>
                            <div class='controls margin-bottom-10'>
                                <input class='form-control' id='marketing_part5_upc2' name="marketing_part5_upc2" 
                                type='text' onkeyup="$('.error_marketing_part5_upc2').addClass('hide');" readonly
                                value="<?php echo (!empty($marketing_part5_data)) ? $marketing_part5_data['upc2'] : ''; ?>">
                                <span class="color_red hide error_marketing_part5_upc2" >Please Generate UPC Code </span>
                            </div>
                            <div class="pull-right">
                                <a onClick="cost2_upc_get();" class="btn btn-success">GENERATE</a>
                            </div>
                            <div class="clearfix"></div>

                        </div>
                    </div>

                    <div class="col-sm-6">
                        <label class='control-label' for='marketing_part5_notes1'>Notes</label>
                        <div class='controls margin-bottom-10'>
                        <textarea class='form-control' id='marketing_part5_notes1' name="marketing_part5_notes1" 
                        type='text' onkeyup="$('.error_marketing_part5_notes1').addClass('hide');"><?php echo (!empty($marketing_part5_data)) ? $marketing_part5_data['notes1'] : ''; ?></textarea>
                        <span class="color_red hide error_marketing_part5_notes1" >Field Is Required </span>
                      </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="row part-five-top-margin">
                           <div class="col-sm-6">
                               <input type="checkbox" <?php echo $m_part5_check; ?> name="chkbox_marketing_part5" id="chkbox_marketing_part5" > Part-5 Completed (20%)
                           </div>
                           <span class="color_red error_marketing_part5 hide">Check this checkbox to procced further.</span>
                           <div class="col-sm-6">
                               <div class='form-group pull-right'>
                                   <div class='controls'>
                                   <input type="hidden" name="marketing_part5_1" value="<?php echo (!empty($marketing_part5_data)) ? $marketing_part5_data['id'] : ''; ?>" id="marketing_part5_1">
                                   <a class="btn btn-success" onclick="validate_marketing_part_5()" >
                                       <i class='icon-save'></i> Save
                                   </a>
                                   <a href="" class="btn btn-default" >Cancel</a>
                                   </div>
                               </div>
                           </div>
                       </div>
                    </div>

                 </div>
                 
                </form>
                <!-- part 5 ends -->    
            <!-- End of part5 -->  
            </div>
     </div>
</div>

<script type="text/javascript">

    //Validation for marketing_tab part1-----Parth Viramgama pav
    function validate_marketing_part_1(){
        var error_cnt = 0;
        var product_id = $('#product_id').val();
     
        var product_name_en = $('#product_name_en').val();
        var product_name_fr = $('#product_name_fr').val();
        
        var product_highlight1_en = $('#product_highlight1_en').val();
        var product_highlight1_fr = $('#product_highlight1_fr').val();
        
        var product_highlight2_en = $('#product_highlight2_en').val();
        var product_highlight2_fr = $('#product_highlight2_fr').val();
        
        var product_highlight3_en = $('#product_highlight3_en').val();
        var product_highlight3_fr = $('#product_highlight3_fr').val();
        
        var product_paragraph_en = $('#product_paragraph_en').val();
        var product_paragraph_fr = $('#product_paragraph_fr').val();
        
        var product_introduction_en = $('#product_introduction_en').val();
        var product_introduction_fr = $('#product_introduction_fr').val();
        
        var complete_marketing_part1 = validate_checkbox('chkbox_marketing_part1');
        
        
        if(product_id == ''){
            //uncomment below line for validate Part-1 Required Part
            $(function(){ bootbox.alert('Please create product in Part-1.');  });
            return false;
        }
        
        if(product_name_en === ''){ $('.error_product_name_en').removeClass('hide'); error_cnt++; }else{ $('.error_product_name_en').addClass('hide'); }
        if(product_name_fr === ''){ $('.error_product_name_fr').removeClass('hide'); error_cnt++; }else{ $('.error_product_name_fr').addClass('hide'); }
        
        if(product_highlight1_en === ''){ $('.error_product_highlight1_en').removeClass('hide'); error_cnt++; }else{ $('.error_product_highlight1_en').addClass('hide'); }
        if(product_highlight1_fr === ''){ $('.error_product_highlight1_fr').removeClass('hide'); error_cnt++; }else{ $('.error_product_highlight1_fr').addClass('hide'); }
        
        if(product_highlight2_en === ''){ $('.error_product_highlight2_en').removeClass('hide'); error_cnt++; }else{ $('.error_product_highlight2_en').addClass('hide'); }
        if(product_highlight2_fr === ''){ $('.error_product_highlight2_fr').removeClass('hide'); error_cnt++; }else{ $('.error_product_highlight2_fr').addClass('hide'); }
        
        if(product_highlight3_en === ''){ $('.error_product_highlight3_en').removeClass('hide'); error_cnt++; }else{ $('.error_product_highlight3_en').addClass('hide'); }
        if(product_highlight3_fr === ''){ $('.error_product_highlight3_fr').removeClass('hide'); error_cnt++; }else{ $('.error_product_highlight3_fr').addClass('hide'); }
        
        if(product_paragraph_en === ''){ $('.error_product_paragraph_en').removeClass('hide'); error_cnt++; }else{ $('.error_product_paragraph_en').addClass('hide'); }
        if(product_paragraph_fr === ''){ $('.error_product_paragraph_fr').removeClass('hide'); error_cnt++; }else{ $('.error_product_paragraph_fr').addClass('hide'); }
    
        if(product_introduction_en === ''){ $('.error_product_introduction_en').removeClass('hide'); error_cnt++; }else{ $('.error_product_introduction_en').addClass('hide'); }
        if(product_introduction_fr === ''){ $('.error_product_introduction_fr').removeClass('hide'); error_cnt++; }else{ $('.error_product_introduction_fr').addClass('hide'); }

        if(complete_marketing_part1 == false){ $('.error_marketing_part1').removeClass('hide'); error_cnt++; }else{ $('.error_marketing_part1').addClass('hide');}
    
        if(error_cnt != '0'){
            return false;
        }else{

            $("#fakeLoader").attr('style',''); // Remove Style Attribute for reuse
            $("#fakeLoader").fakeLoader({
                timeToHide:1200,
                bgColor:"#2ecc71",
                spinner:"spinner7"
            }); // Fakeloader plugin
            
            var form_data = $("#marketing_part1").serializeArray();
                
            form_data.push({name:"product_id",value:product_id}); 

            $.ajax({
               url: '<?php echo base_url()."products/marketing_part1"; ?>',
               type: 'POST',
               dataType: 'json',
               data: form_data,
               success:function(data){
                   if(data.status=="success"){
                    $('#marketing_part1_1').val(data.marketing_part1_1);
                    $('#marketing_part1_2').val(data.marketing_part1_2);
                    $('#marketing_part1_3').val(data.marketing_part1_3);
                    $('#marketing_part1_4').val(data.marketing_part1_4);
                    $('#marketing_part1_5').val(data.marketing_part1_5);
                    $('#marketing_part1_6').val(data.marketing_part1_6);
                    $('#chkbox_marketing_part1').attr('disabled',true); // Disable Checkbox
                    $('.marketting_load_percentage').html(data.complete_bar_no+'%'); // Update Percentage for product update
                    $('.part_1_marketting').addClass('active'); 
                    return false;
                   }
               }
            });
        }
    }
    
    //Validation for marketing_tab part2-----Parth Viramgama pav
    function validate_marketing_part_2(){
        var error_cnt = 0;
        var product_id = $('#product_id').val();
        
        var marketing_part2_en_title1 = $('#marketing_part2_en_title1').val();
        var marketing_part2_en_desc1 = $('#marketing_part2_en_desc1').val();
        var marketing_part2_fr_title1 = $('#marketing_part2_fr_title1').val();
        var marketing_part2_fr_desc1 = $('#marketing_part2_fr_desc1').val();
        
        var marketing_part2_en_title2 = $('#marketing_part2_en_title2').val();
        var marketing_part2_en_desc2 = $('#marketing_part2_en_desc2').val();
        var marketing_part2_fr_title2 = $('#marketing_part2_fr_title2').val();
        var marketing_part2_fr_desc2 = $('#marketing_part2_fr_desc2').val();
        
        var marketing_part2_en_title3 = $('#marketing_part2_en_title3').val();
        var marketing_part2_en_desc3 = $('#marketing_part2_en_desc3').val();
        var marketing_part2_fr_title3 = $('#marketing_part2_fr_title3').val();
        var marketing_part2_fr_desc3 = $('#marketing_part2_fr_desc3').val();

        var complete_marketing_part2 = validate_checkbox('chkbox_marketing_part2');

        if(product_id == ''){
            //uncommetn below line for validate Part-1 Required Part
            $(function(){ bootbox.alert('Please create product in Part-1.');  });
            return false;
        }
        
        if(marketing_part2_en_title1 === ''){ $('.error_marketing_part2_en_title1').removeClass('hide'); error_cnt++; }else{ $('.error_marketing_part2_en_title1').addClass('hide'); }
        if(marketing_part2_en_desc1 === ''){ $('.error_marketing_part2_en_desc1').removeClass('hide'); error_cnt++; }else{ $('.error_marketing_part2_en_desc1').addClass('hide'); }
        if(marketing_part2_fr_title1 === ''){ $('.error_marketing_part2_fr_title1').removeClass('hide'); error_cnt++; }else{ $('.error_marketing_part2_fr_title1').addClass('hide'); }
        if(marketing_part2_fr_desc1 === ''){ $('.error_marketing_part2_fr_desc1').removeClass('hide'); error_cnt++; }else{ $('.error_marketing_part2_fr_desc1').addClass('hide'); }
        
        if(marketing_part2_en_title2 === ''){ $('.error_marketing_part2_en_title2').removeClass('hide'); error_cnt++; }else{ $('.error_marketing_part2_en_title2').addClass('hide'); }
        if(marketing_part2_en_desc2 === ''){ $('.error_marketing_part2_en_desc2').removeClass('hide'); error_cnt++; }else{ $('.error_marketing_part2_en_desc2').addClass('hide'); }
        if(marketing_part2_fr_title2 === ''){ $('.error_marketing_part2_fr_title2').removeClass('hide'); error_cnt++; }else{ $('.error_marketing_part2_fr_title2').addClass('hide'); }
        if(marketing_part2_fr_desc2 === ''){ $('.error_marketing_part2_fr_desc2').removeClass('hide'); error_cnt++; }else{ $('.error_marketing_part2_fr_desc2').addClass('hide'); }
        
        if(marketing_part2_en_title3 === ''){ $('.error_marketing_part2_en_title3').removeClass('hide'); error_cnt++; }else{ $('.error_marketing_part2_en_title3').addClass('hide'); }
        if(marketing_part2_en_desc3 === ''){ $('.error_marketing_part2_en_desc3').removeClass('hide'); error_cnt++; }else{ $('.error_marketing_part2_en_desc3').addClass('hide'); }
        if(marketing_part2_fr_title3 === ''){ $('.error_marketing_part2_fr_title3').removeClass('hide'); error_cnt++; }else{ $('.error_marketing_part2_fr_title3').addClass('hide'); }
        if(marketing_part2_fr_desc3 === ''){ $('.error_marketing_part2_fr_desc3').removeClass('hide'); error_cnt++; }else{ $('.error_marketing_part2_fr_desc3').addClass('hide'); }
        

        if(complete_marketing_part2 == false){ $('.error_marketing_part2').removeClass('hide'); error_cnt++; }else{ $('.error_marketing_part2').addClass('hide');}
    
        if(error_cnt != '0'){
            return false;
        }else{

            $("#fakeLoader").attr('style',''); // Remove Style Attribute for reuse
            $("#fakeLoader").fakeLoader({
                timeToHide:1200,
                bgColor:"#2ecc71",
                spinner:"spinner7"
            }); // Fakeloader plugin
            
            var form_data = $("#marketing_part2").serializeArray();
                
            form_data.push({name:"product_id",value:product_id}); 

            $.ajax({
               url: '<?php echo base_url()."products/marketing_part2"; ?>',
               type: 'POST',
               dataType: 'json',
               data: form_data,
               success:function(data){
                   if(data.status=="success"){
                    $('#marketing_part2_1').val(data.marketing_part2_1);
                    $('#marketing_part2_2').val(data.marketing_part2_2);
                    $('#marketing_part2_3').val(data.marketing_part2_3);
                    $('#marketing_part2_4').val(data.marketing_part2_4);
                    $('#marketing_part2_5').val(data.marketing_part2_5);
                    $('#marketing_part2_6').val(data.marketing_part2_6);
                    $('#marketing_part2_7').val(data.marketing_part2_7);
                    $('#marketing_part2_8').val(data.marketing_part2_8);
                    $('#chkbox_marketing_part2').attr('disabled',true); // Disable Checkbox
                    $('.marketting_load_percentage').html(data.complete_bar_no+'%'); // Update Percentage for product update
                    $('.part_2_marketting').addClass('active'); 
                    return false;
                   }
               }
            });
        }
    }
    

    function validate_marketting_part(){
        
        var product_id = $('#product_id').val();
        if(product_id == ''){
            //uncommetn below line for validate Part-1 Required Part
            $(function(){ bootbox.alert('Please create product in Part-1.');  });
            return false;
        }

        if(!$("#marketting_step_3").is(':checked')){
            $( ".color_red_part_3" ).removeClass( "hide");
            return false;
        }
        $("#fakeLoader").attr('style',''); // Remove Style Attribute for reuse
        $("#fakeLoader").fakeLoader({
            timeToHide:1200,
            bgColor:"#2ecc71",
            spinner:"spinner7"
        }); // Fakeloader plugin
        var data = new FormData($("#marketting_part_3")[0]);
        $.ajax({
            url: '<?php echo base_url()."products/marketting_part_3"; ?>',
            processData: false, 
            type: 'post',
            dataType: 'json',
            data: data,
            contentType: false,
            success:function(response){
                if(response.status=="success"){
                    $("#marketting_step_3").prop('disabled', true);
                    $( ".color_red" ).addClass( "hide");
                    $('.marketting_load_percentage').html(response.complete_bar_no+'%');
                    $('.part_3_marketting').addClass('active');
                    $('#update_marketting').val('update');
                }
           }
        });      
    }
   
   
    function validate_marketting_part_4(){
        
        if(!$("#marketting_step_4").is(':checked')){
            $( ".color_red4" ).removeClass( "hide");
            return false;
        }
        $("#fakeLoader").attr('style',''); // Remove Style Attribute for reuse
            $("#fakeLoader").fakeLoader({
                timeToHide:1200,
                bgColor:"#2ecc71",
                spinner:"spinner7"
            }); // Fakeloader plugin
        var data = new FormData($("#marketting_part_4")[0]);
            $.ajax({
                url: '<?php echo base_url()."products/marketting_part_4"; ?>',
                processData: false, 
                type: 'post',
                dataType: 'json',
                data: data,
                contentType: false,
               success:function(response){
                    if(response.status=="success"){
                        $("#marketting_step_4").prop('disabled', true);
                        $( ".color_red" ).addClass( "hide");
                        $('.marketting_load_percentage').html(response.complete_bar_no+'%');
                        $('.part_4_marketting').addClass('active');
                        $('#update_marketting_part_4').val('update');
                    }
               }
            });    
    }

    //Validation for marketing_tab part5-----Parth Viramgama pav
    function validate_marketing_part_5(){
        var error_cnt = 0;
        var product_id = $('#product_id').val();
       
        var marketing_part5_cost1 = $('#marketing_part5_cost1').val();
        var marketing_part5_supplier1 = $('#marketing_part5_supplier1').val();
        var marketing_part5_upc1 = $('#marketing_part5_upc1').val();

        var marketing_part5_cost2 = $('#marketing_part5_cost2').val();
        var marketing_part5_supplier2 = $('#marketing_part5_supplier2').val();
        var marketing_part5_upc2 = $('#marketing_part5_upc2').val();

        var marketing_part5_notes1 = $('#marketing_part5_notes1').val();
        var complete_marketing_part5 = validate_checkbox('chkbox_marketing_part5');

        if(product_id == ''){
            //uncommetn below line for validate Part-1 Required Part
            $(function(){ bootbox.alert('Please create product in Part-1.');  });
            return false;
        }

        if(marketing_part5_cost1 === ''){ $('.error_marketing_part5_cost1').removeClass('hide'); error_cnt++; }else{ $('.error_marketing_part5_cost1').addClass('hide'); }
        if (!/^\d{0,6}(?:\.\d{0,5})?$/.test(marketing_part5_cost1)) { $('.error_marketing_part5_cost1_num').removeClass('hide'); error_cnt++; }else{ $('.error_marketing_part5_cost1_num').addClass('hide'); }
        if(marketing_part5_supplier1 === ''){ $('.error_marketing_part5_supplier1').removeClass('hide'); error_cnt++; }else{ $('.error_marketing_part5_supplier1').addClass('hide'); }
        if(marketing_part5_upc1 === ''){ $('.error_marketing_part5_upc1').removeClass('hide'); error_cnt++; }else{ $('.error_marketing_part5_upc1').addClass('hide'); }


        if(marketing_part5_cost2 === ''){ $('.error_marketing_part5_cost2').removeClass('hide'); error_cnt++; }else{ $('.error_marketing_part5_cost2').addClass('hide'); }
        if (!/^\d{0,6}(?:\.\d{0,5})?$/.test(marketing_part5_cost2)) { $('.error_marketing_part5_cost2_num').removeClass('hide'); error_cnt++; }else{ $('.error_marketing_part5_cost2_num').addClass('hide'); }
        if(marketing_part5_supplier2 === ''){ $('.error_marketing_part5_supplier2').removeClass('hide'); error_cnt++; }else{ $('.error_marketing_part5_supplier2').addClass('hide'); }
        if(marketing_part5_upc2 === ''){ $('.error_marketing_part5_upc2').removeClass('hide'); error_cnt++; }else{ $('.error_marketing_part5_upc2').addClass('hide'); }
    
        if(marketing_part5_notes1 === ''){ $('.error_marketing_part5_notes1').removeClass('hide'); error_cnt++; }else{ $('.error_marketing_part5_notes1').addClass('hide'); }
        if(complete_marketing_part5 === false){ $('.error_marketing_part5').removeClass('hide'); error_cnt++; }else{ $('.error_marketing_part5').addClass('hide'); }
    
        if(error_cnt != '0'){
            return false;
        }else{

            $("#fakeLoader").attr('style',''); // Remove Style Attribute for reuse
            $("#fakeLoader").fakeLoader({
                timeToHide:1200,
                bgColor:"#2ecc71",
                spinner:"spinner7"
            }); // Fakeloader plugin
            
            var form_data = $("#marketing_part5").serializeArray();
                
            form_data.push({name:"product_id",value:product_id}); 

            $.ajax({
               url: '<?php echo base_url()."products/marketing_part5"; ?>',
               type: 'POST',
               dataType: 'json',
               data: form_data,
               success:function(data){
                   if(data.status=="success"){
                    $('#marketing_part5_1').val(data.marketing_part5_1);
                    $('#chkbox_marketing_part5').attr('disabled',true); // Disable Checkbox
                    $('.marketting_load_percentage').html(data.complete_bar_no+'%'); // Update Percentage for product update
                    $('.part_5_marketting').addClass('active'); 
                    return false;
                   }
               }
            });
        }
    }

    //This Function Generate UPC Code For Cost1-----Parth Viramgama pav
    function cost1_upc_get(){
        $("#fakeLoader").attr('style',''); // Remove Style Attribute for reuse
        $("#fakeLoader").fakeLoader({
            timeToHide:300,
            bgColor:"#2ecc71",
            spinner:"spinner7"
        });
        $('.error_marketing_part5_upc1').addClass('hide');
        $.ajax({
            url: '<?php echo base_url()."products/upc_get"; ?>',
            type: 'GET',
            success:function(data){
                $('#marketing_part5_upc1').val(data);
            }
        });
    }

    //This Function Generate UPC Code For Cost2-----Parth Viramgama pav
    function cost2_upc_get(){
        $("#fakeLoader").attr('style',''); // Remove Style Attribute for reuse
        $("#fakeLoader").fakeLoader({
            timeToHide:300,
            bgColor:"#2ecc71",
            spinner:"spinner7"
        });
        $('.error_marketing_part5_upc2').addClass('hide');
        $.ajax({
            url: '<?php echo base_url()."products/upc_get"; ?>',
            type: 'GET',
            success:function(data){
                $('#marketing_part5_upc2').val(data);
            }
        });
    }
   
</script>
