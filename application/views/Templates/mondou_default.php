<?php
$controller = $this->router->fetch_class();
$actions = $this->router->fetch_method();

if ($controller == 'client_news') {
    $client_news = "active";
    $quality = " ";
    $suggestion = "";
} else if ($controller == 'quality') {
    $client_news = " ";
    $quality = "active";
    $suggestion = "";
} else if ($controller == 'suggestion') {
    $client_news = " ";
    $quality = "";
    $suggestion = "active";
} else {
    $client_news = " ";
    $quality = "";
    $suggestion = "";
}

if (!empty($this->session->userdata('client_username'))) {
    $client_username = $this->session->userdata('client_username');
} else {
    $client_username = '';
}
?>
<!DOCTYPE html>
<html>
    <head>
        <base href="<?php echo base_url(); ?>">
        <title>Dashboard | </title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <meta content='text/html;charset=utf-8' http-equiv='content-type'>
        <meta content='Flat administration template for Twitter Bootstrap. Twitter Bootstrap 3 template with Ruby on Rails support.' name='description'>
        <link href='assets/images/meta_icons/favicon.ico' rel='shortcut icon' type='image/x-icon'>
        <link href='assets/images/meta_icons/apple-touch-icon.png' rel='apple-touch-icon-precomposed'>
        <link href='assets/images/meta_icons/apple-touch-icon-57x57.png' rel='apple-touch-icon-precomposed' sizes='57x57'>
        <link href='assets/images/meta_icons/apple-touch-icon-72x72.png' rel='apple-touch-icon-precomposed' sizes='72x72'>
        <link href='assets/images/meta_icons/apple-touch-icon-114x114.png' rel='apple-touch-icon-precomposed' sizes='114x114'>
        <link href='assets/images/meta_icons/apple-touch-icon-144x144.png' rel='apple-touch-icon-precomposed' sizes='144x144'>
        <!-- / START - page related stylesheets [optional] -->
        <link href="assets/stylesheets/plugins/bootstrap_daterangepicker/bootstrap-daterangepicker.css" media="all" rel="stylesheet" type="text/css" />
        <link href="assets/stylesheets/plugins/fullcalendar/fullcalendar.css" media="all" rel="stylesheet" type="text/css" />
        <link href="assets/stylesheets/plugins/common/bootstrap-wysihtml5.css" media="all" rel="stylesheet" type="text/css" />
        <link href="assets/stylesheets/plugins/datatables/bootstrap-datatable.css" media="all" rel="stylesheet" type="text/css" />
        <link href="assets/stylesheets/plugins/bootstrap_daterangepicker/bootstrap-daterangepicker.css" media="all" rel="stylesheet" type="text/css" />
        <link href="assets/stylesheets/plugins/bootstrap_datetimepicker/bootstrap-datetimepicker.min.css" media="all" rel="stylesheet" type="text/css" />
        <link href="assets/stylesheets/plugins/fuelux/wizard.css" media="all" rel="stylesheet" type="text/css" />


        <link href='assets/images/meta_icons/favicon.ico' rel='shortcut icon' type='image/x-icon'>
        <link href='assets/images/meta_icons/apple-touch-icon.png' rel='apple-touch-icon-precomposed'>
        <link href='assets/images/meta_icons/apple-touch-icon-57x57.png' rel='apple-touch-icon-precomposed' sizes='57x57'>
        <link href='assets/images/meta_icons/apple-touch-icon-72x72.png' rel='apple-touch-icon-precomposed' sizes='72x72'>
        <link href='assets/images/meta_icons/apple-touch-icon-114x114.png' rel='apple-touch-icon-precomposed' sizes='114x114'>
        <link href='assets/images/meta_icons/apple-touch-icon-144x144.png' rel='apple-touch-icon-precomposed' sizes='144x144'>

        <link href="assets/stylesheets/plugins/tabdrop/tabdrop.css" media="all" rel="stylesheet" type="text/css" />
        <link href="assets/stylesheets/plugins/jgrowl/jquery.jgrowl.min.css" media="all" rel="stylesheet" type="text/css" />
        <link href="assets/stylesheets/jquery/jquery_ui.css" media="all" rel="stylesheet" type="text/css" />



        <script src="assets/javascripts/jquery/jquery.min.js" type="text/javascript"></script>
         <!--<script src="assets/javascripts/bootstrap/bootstrap.js" type="text/javascript"></script>-->

        <link href="assets/stylesheets/plugins/jquery_fileupload/jquery.fileupload-ui.css" media="all" rel="stylesheet" type="text/css" />
        <!-- / END - page related stylesheets [optional] -->
        <!-- / bootstrap [required] -->
        <link href="assets/stylesheets/bootstrap/bootstrap.css" media="all" rel="stylesheet" type="text/css" />
        <!-- / theme file [required] -->
        <link href="assets/stylesheets/light-theme.css" media="all" id="color-settings-body-color" rel="stylesheet" type="text/css" />
        <!-- / coloring file [optional] (if you are going to use custom contrast color) -->
        <link href="assets/stylesheets/theme-colors.css" media="all" rel="stylesheet" type="text/css" />
        <!-- / demo file [not required!] -->
        <link href="assets/stylesheets/demo.css" media="all" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="assets/stylesheets/toastr.min.css" type="text/css" />
        <link rel="stylesheet" href="assets/stylesheets/custom_theme.css" type="text/css" />
        <!-- Add fancyBox -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" type="text/css" media="screen" />
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>

        <script type="text/javascript" src="assets/javascripts/jquery.tokeninput.js"></script>
        <link rel="stylesheet" href="assets/stylesheets/token-input.css" type="text/css" />
        <link rel="stylesheet" href="assets/stylesheets/token-input-facebook.css" type="text/css" />

        <link href="css/smoothness/jquery-ui-1.9.0.custom.css" rel="stylesheet">
        <link href="assets/stylesheets/plugins/select2/select2.css" media="all" rel="stylesheet" type="text/css" />
        <link href="assets/stylesheets/plugins/bootstrap_colorpicker/bootstrap-colorpicker.css" media="all" rel="stylesheet" type="text/css" />
        <link href="assets/stylesheets/plugins/bootstrap_daterangepicker/bootstrap-daterangepicker.css" media="all" rel="stylesheet" type="text/css" />
        <link href="assets/stylesheets/plugins/bootstrap_datetimepicker/bootstrap-datetimepicker.min.css" media="all" rel="stylesheet" type="text/css" />
        <link href="assets/stylesheets/plugins/bootstrap_switch/bootstrap-switch.css" media="all" rel="stylesheet" type="text/css" />
        <link href="assets/stylesheets/plugins/common/bootstrap-wysihtml5.css" media="all" rel="stylesheet" type="text/css" />
        <!--[if lt IE 9]>
          <script src="assets/javascripts/ie/html5shiv.js" type="text/javascript"></script>
          <script src="assets/javascripts/ie/respond.min.js" type="text/javascript"></script>
        <![endif]-->
    </head>
    <body class='contrast-banana '>
        <header>
            <nav class='navbar navbar-default'>

                <a class='navbar-brand' href='index.html'>
                  <!-- <img width="81" height="21" class="logo" alt="Flatty" src="assets/images/logo.png" />
                  <img  width="21" height="21" class="logo-xs" alt="Flatty" src="assets/images/logo_xs.png" /> -->
                    <img  width="96" height="30" class="" alt="Flatty" src="assets/images/BOB-logo.png" />
                </a>
                <a class='toggle-nav btn pull-left' href='#'>
                    <i class='icon-reorder'></i>
                </a> 
                <ul class='nav'>
                    <li class='dropdown light only-icon'>
                        <!--
                  <a class='dropdown-toggle' data-toggle='dropdown' href='#'>
                    <i class='icon-cog'></i>
                  </a>-->
                        <ul class='dropdown-menu color-settings'>
                            <!--
                  <li class='color-settings-body-color'>
                    <div class='color-title'>Body color</div>
                    <a data-change-to='assets/stylesheets/light-theme.css' href='#'>
                      Light
                      <small>(default)</small>
                    </a>
                    <a data-change-to='assets/stylesheets/dark-theme.css' href='#'>
                      Dark
                    </a>
                    <a data-change-to='assets/stylesheets/dark-blue-theme.css' href='#'>
                      Dark blue
                    </a>
                  </li>-->
                            <li class='divider'></li>
                            <!--
                     <li class='color-settings-contrast-color'>
            <div class='color-title'>Contrast color</div>
                        <a data-change-to="contrast-red" href="#"><i class='icon-cog text-red'></i>
            Red
            <small>(default)</small>
            </a>

                        <a data-change-to="contrast-blue" href="#"><i class='icon-cog text-blue'></i>
            Blue
            </a>

                        <a data-change-to="contrast-orange" href="#"><i class='icon-cog text-orange'></i>
            Orange
            </a>

                        <a data-change-to="contrast-purple" href="#"><i class='icon-cog text-purple'></i>
            Purple
            </a>

                        <a data-change-to="contrast-green" href="#"><i class='icon-cog text-green'></i>
            Green
            </a>

                        <a data-change-to="contrast-muted" href="#"><i class='icon-cog text-muted'></i>
            Muted
            </a>

                        <a data-change-to="contrast-fb" href="#"><i class='icon-cog text-fb'></i>
            Facebook
            </a>

                        <a data-change-to="contrast-dark" href="#"><i class='icon-cog text-dark'></i>
            Dark
            </a>

                        <a data-change-to="contrast-pink" href="#"><i class='icon-cog text-pink'></i>
            Pink
            </a>

                        <a data-change-to="contrast-grass-green" href="#"><i class='icon-cog text-grass-green'></i>
            Grass green
            </a>

                        <a data-change-to="contrast-sea-blue" href="#"><i class='icon-cog text-sea-blue'></i>
            Sea blue
            </a>

                        <a data-change-to="contrast-banana" href="#"><i class='icon-cog text-banana'></i>
            Banana
            </a>

                        <a data-change-to="contrast-dark-orange" href="#"><i class='icon-cog text-dark-orange'></i>
            Dark orange
            </a>

                        <a data-change-to="contrast-brown" href="#"><i class='icon-cog text-brown'></i>
            Brown
            </a>

          </li>-->
                        </ul>
                    </li>

                    <li class='dropdown medium only-icon widget'>
                        <!-- <a class='dropdown-toggle' data-toggle='dropdown' href='#'>
                           <i class='icon-rss'></i>
                           <div class='label'>5</div>
                         </a>-->
                        <ul class='dropdown-menu'>
                            <li>
                                <a href='#'>
                                    <div class='widget-body'>
                                        <div class='pull-left icon'>
                                            <i class='icon-user text-success'></i>
                                        </div>
                                        <div class='pull-left text'>
                                            John Doe signed up
                                            <small class='text-muted'>just now</small>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class='divider'></li>
                            <li>
                                <a href='#'>
                                    <div class='widget-body'>
                                        <div class='pull-left icon'>
                                            <i class='icon-inbox text-error'></i>
                                        </div>
                                        <div class='pull-left text'>
                                            New Order #002
                                            <small class='text-muted'>3 minutes ago</small>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class='divider'></li>
                            <li>
                                <a href='#'>
                                    <div class='widget-body'>
                                        <div class='pull-left icon'>
                                            <i class='icon-comment text-warning'></i>
                                        </div>
                                        <div class='pull-left text'>
                                            America Leannon commented Flatty with veeery long text.
                                            <small class='text-muted'>1 hour ago</small>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class='divider'></li>
                            <li>
                                <a href='#'>
                                    <div class='widget-body'>
                                        <div class='pull-left icon'>
                                            <i class='icon-user text-success'></i>
                                        </div>
                                        <div class='pull-left text'>
                                            Jane Doe signed up
                                            <small class='text-muted'>last week</small>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class='divider'></li>
                            <li>
                                <a href='#'>
                                    <div class='widget-body'>
                                        <div class='pull-left icon'>
                                            <i class='icon-inbox text-error'></i>
                                        </div>
                                        <div class='pull-left text'>
                                            New Order #001
                                            <small class='text-muted'>1 year ago</small>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class='widget-footer'>
                                <a href='#'>All notifications</a>
                            </li>
                        </ul>
                    </li>
                    
                    
                    <li class='dropdown dark user-menu'>
                        <a class='dropdown-toggle' data-toggle='dropdown' href='#'>
                          <!--<img width="23" height="23" alt="Mila Kunis" src="assets/images/avatar.jpg" />-->
                            <span class='user-name'>Switch Language</span>
                            <b class='caret'></b>
                        </a>
                        <ul class='dropdown-menu'>
                          
                            <li>
                                <?php echo anchor($this->lang->switch_uri('en'), 'English'); ?>
                                    
                            </li>
                            <li>
                                <?php echo anchor($this->lang->switch_uri('fr'), 'French'); ?>
                                    
                            </li>
                        </ul>
                    </li>
                    <li class='dropdown dark user-menu'>
                        <a class='dropdown-toggle' data-toggle='dropdown' href='#'>
                          <!--<img width="23" height="23" alt="Mila Kunis" src="assets/images/avatar.jpg" />-->
                            <span class='user-name'><?php if (!empty($this->session->userdata('username'))) {
    echo $this->session->userdata('username');
} ?></span>
                            <b class='caret'></b>
                        </a>
                        <ul class='dropdown-menu'>
                            <!--
                                        <li>
                              <a href='user_profile.html'>
                                <i class='icon-user'></i>
                                Profile
                              </a>
                            </li>
                            <li>
                              <a href='user_profile.html'>
                                <i class='icon-cog'></i>
                                Settings
                              </a>
                            </li>-->

                            <li>

                                    <?php if (!empty($client_username)) { ?>
                                    <a href='<?php echo site_url($client_username . '/login/logout') ?>'>
                                        <?php } else { ?>	
                                        <a href='<?php echo site_url('login/logout') ?>'>
<?php } ?>			
                                        <i class='icon-signout'></i>
                                        <?=lang('sign_out')?>
                                    </a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!--
        <form action='search_results.html' class='navbar-form navbar-right hidden-xs' method='get'>
          <button class='btn btn-link icon-search' name='button' type='submit'></button>
          <div class='form-group'>
            <input value="" class="form-control" placeholder="Search..." autocomplete="off" id="q_header" name="q" type="text" />
          </div>
        </form>-->
            </nav>
        </header>
        <div id='wrapper'>
            <div id='main-nav-bg'></div>
            <nav id='main-nav'>

                <div class='navigation'>
                    <div class='search'>
                        <form action='search_results.html' method='get'>
                            <div class='search-wrapper'>
                                <input value="" class="search-query form-control" placeholder="Search..." autocomplete="off" name="q" type="text" />
                                <button class='btn btn-link icon-search' name='button' type='submit'></button>
                            </div>
                        </form>
                    </div>
                    <ul class='nav nav-stacked'>
                        <li class='<?php echo $client_news; ?>' >
                            <a href='<?php echo site_url('client_news') ?>'>
                                <i class='icon-foursquare'></i>
                                <span><?=lang('news_heading')?> B1B</span>
                            </a>
                        </li>
                        <li class='<?php echo $quality; ?>'>
                            <a href='<?php echo site_url('client_quality') ?>'>
                                <i class='icon-bookmark '></i>
                                <span><?=lang('quality_heading')?></span>
                            </a>
                        </li>
                        <li class='<?php echo $suggestion; ?>'>
                            <a href='<?php echo site_url('client_suggestion') ?>'>
                                <i class='icon-trello'></i>
                                <span><?=lang('idea_sub_heading')?></span>
                            </a>
                        </li>

                    </ul>
                </div>
            </nav>
            <section id='content'>
                <div class='container'>

<?php echo $body; ?>

                    <!--
                  <footer id='footer'>
                    <div class='footer-wrapper'>
                      <div class='row'>
                        <div class='col-sm-6 text'>
                         Copyright © 2013
                        
                      </div>
                    </div>
                  </footer>-->
                </div>
            </section>
        </div>
        <!-- / jquery [required] -->

        <!-- / jquery mobile (for touch events) -->
        <script src="assets/javascripts/jquery/jquery.mobile.custom.min.js" type="text/javascript"></script>
        <!-- / jquery migrate (for compatibility with new jquery) [required] -->
        <script src="assets/javascripts/jquery/jquery-migrate.min.js" type="text/javascript"></script>
        <!-- / jquery ui -->
        <script src="assets/javascripts/jquery/jquery-ui.min.js" type="text/javascript"></script>
        <!-- / jQuery UI Touch Punch -->
        <script src="assets/javascripts/plugins/jquery_ui_touch_punch/jquery.ui.touch-punch.min.js" type="text/javascript"></script>
        <!-- / bootstrap [required] -->
        <script src="assets/javascripts/bootstrap/bootstrap.js" type="text/javascript"></script>
        <!-- / modernizr -->
        <script src="assets/javascripts/plugins/modernizr/modernizr.min.js" type="text/javascript"></script>
        <!-- / retina -->
        <script src="assets/javascripts/plugins/retina/retina.js" type="text/javascript"></script>
        <!-- / theme file [required] -->
        <script src="assets/javascripts/theme.js" type="text/javascript"></script>
        <!-- / demo file [not required!] -->
        <script src="assets/javascripts/demo.js" type="text/javascript"></script>
        <!-- / START - page related files and scripts [optional] -->
        <script src="assets/javascripts/plugins/flot/excanvas.js" type="text/javascript"></script>
        <script src="assets/javascripts/plugins/flot/flot.min.js" type="text/javascript"></script>
        <script src="assets/javascripts/plugins/flot/flot.resize.js" type="text/javascript"></script>
        <script src="assets/javascripts/plugins/fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
        <script src="assets/javascripts/plugins/select2/select2.js" type="text/javascript"></script>
        <!--
         <script src="assets/javascripts/plugins/bootstrap_colorpicker/bootstrap-colorpicker.min.js" type="text/javascript"></script>
         <script src="assets/javascripts/plugins/bootstrap_daterangepicker/bootstrap-daterangepicker.js" type="text/javascript"></script>
         <script src="assets/javascripts/plugins/common/moment.min.js" type="text/javascript"></script>
        <!--
        <script src="assets/javascripts/plugins/bootstrap_datetimepicker/bootstrap-datetimepicker.js" type="text/javascript"></script>
        <script src="assets/javascripts/plugins/input_mask/bootstrap-inputmask.min.js" type="text/javascript"></script>
        <script src="assets/javascripts/plugins/bootstrap_maxlength/bootstrap-maxlength.min.js" type="text/javascript"></script>
        <script src="assets/javascripts/plugins/charCount/charCount.js" type="text/javascript"></script>
        <script src="assets/javascripts/plugins/autosize/jquery.autosize-min.js" type="text/javascript"></script>
        <script src="assets/javascripts/plugins/bootstrap_switch/bootstrapSwitch.min.js" type="text/javascript"></script>
        <script src="assets/javascripts/plugins/naked_password/naked_password-0.2.4.min.js" type="text/javascript"></script>
        <script src="assets/javascripts/plugins/mention/mention.min.js" type="text/javascript"></script>
        <script src="assets/javascripts/plugins/typeahead/typeahead.js" type="text/javascript"></script>
        <script src="assets/javascripts/plugins/common/wysihtml5.min.js" type="text/javascript"></script>
        <script src="assets/javascripts/plugins/common/bootstrap-wysihtml5.js" type="text/javascript"></script>
        <script src="assets/javascripts/plugins/pwstrength/pwstrength.js" type="text/javascript"></script>-->
        <script>
            var data, dataset, gd, options, previousLabel, previousPoint, showTooltip, ticks;
            var blue, data, datareal, getRandomData, green, i, newOrders, options, orange, orders, placeholder, plot, purple, randNumber, randSmallerNumber, red, series, totalPoints, update, updateInterval;
            var red = "#f34541";
            var orange = "#f8a326";
            var blue = "#00acec";
            var purple = "#9564e2";
            var green = "#49bf67";
            randNumber = function() {
                return ((Math.floor(Math.random() * (1 + 50 - 20))) + 20) * 800;
            };
            randSmallerNumber = function() {
                return ((Math.floor(Math.random() * (1 + 40 - 20))) + 10) * 200;
            };
            if ($("#stats-chart1").length !== 0) {
                orders = [[1, randNumber() - 10], [2, randNumber() - 10], [3, randNumber() - 10], [4, randNumber()], [5, randNumber()], [6, 4 + randNumber()], [7, 5 + randNumber()], [8, 6 + randNumber()], [9, 6 + randNumber()], [10, 8 + randNumber()], [11, 9 + randNumber()], [12, 10 + randNumber()], [13, 11 + randNumber()], [14, 12 + randNumber()], [15, 13 + randNumber()], [16, 14 + randNumber()], [17, 15 + randNumber()], [18, 15 + randNumber()], [19, 16 + randNumber()], [20, 17 + randNumber()], [21, 18 + randNumber()], [22, 19 + randNumber()], [23, 20 + randNumber()], [24, 21 + randNumber()], [25, 14 + randNumber()], [26, 24 + randNumber()], [27, 25 + randNumber()], [28, 26 + randNumber()], [29, 27 + randNumber()], [30, 31 + randNumber()]];
                newOrders = [[1, randSmallerNumber() - 10], [2, randSmallerNumber() - 10], [3, randSmallerNumber() - 10], [4, randSmallerNumber()], [5, randSmallerNumber()], [6, 4 + randSmallerNumber()], [7, 5 + randSmallerNumber()], [8, 6 + randSmallerNumber()], [9, 6 + randSmallerNumber()], [10, 8 + randSmallerNumber()], [11, 9 + randSmallerNumber()], [12, 10 + randSmallerNumber()], [13, 11 + randSmallerNumber()], [14, 12 + randSmallerNumber()], [15, 13 + randSmallerNumber()], [16, 14 + randSmallerNumber()], [17, 15 + randSmallerNumber()], [18, 15 + randSmallerNumber()], [19, 16 + randSmallerNumber()], [20, 17 + randSmallerNumber()], [21, 18 + randSmallerNumber()], [22, 19 + randSmallerNumber()], [23, 20 + randSmallerNumber()], [24, 21 + randSmallerNumber()], [25, 14 + randSmallerNumber()], [26, 24 + randSmallerNumber()], [27, 25 + randSmallerNumber()], [28, 26 + randSmallerNumber()], [29, 27 + randSmallerNumber()], [30, 31 + randSmallerNumber()]];
                plot = $.plot($("#stats-chart1"), [
                    {
                        data: orders,
                        label: "Orders"
                    }, {
                        data: newOrders,
                        label: "New rders"
                    }
                ], {
                    series: {
                        lines: {
                            show: true,
                            lineWidth: 3
                        },
                        shadowSize: 0
                    },
                    legend: {
                        show: false
                    },
                    grid: {
                        clickable: true,
                        hoverable: true,
                        borderWidth: 0,
                        tickColor: "#f4f7f9"
                    },
                    colors: ["#00acec", "#f8a326"]
                });
            }
            if ($("#stats-chart2").length !== 0) {
                orders = [[1, randNumber() - 5], [2, randNumber() - 6], [3, randNumber() - 10], [4, randNumber()], [5, randNumber()], [6, 4 + randNumber()], [7, 10 + randNumber()], [8, 12 + randNumber()], [9, 6 + randNumber()], [10, 8 + randNumber()], [11, 9 + randNumber()], [12, 10 + randNumber()], [13, 11 + randNumber()], [14, 12 + randNumber()], [15, 3 + randNumber()], [16, 14 + randNumber()], [17, 14 + randNumber()], [18, 15 + randNumber()], [19, 16 + randNumber()], [20, 17 + randNumber()], [21, 18 + randNumber()], [22, 19 + randNumber()], [23, 20 + randNumber()], [24, 21 + randNumber()], [25, 14 + randNumber()], [26, 24 + randNumber()], [27, 25 + randNumber()], [28, 26 + randNumber()], [29, 27 + randNumber()], [30, 31 + randNumber()]];
                newOrders = [[1, randSmallerNumber() - 10], [2, randSmallerNumber() - 10], [3, randSmallerNumber() - 10], [4, randSmallerNumber()], [5, randSmallerNumber()], [6, 4 + randSmallerNumber()], [7, 5 + randSmallerNumber()], [8, 6 + randSmallerNumber()], [9, 6 + randSmallerNumber()], [10, 8 + randSmallerNumber()], [11, 9 + randSmallerNumber()], [12, 10 + randSmallerNumber()], [13, 11 + randSmallerNumber()], [14, 12 + randSmallerNumber()], [15, 13 + randSmallerNumber()], [16, 14 + randSmallerNumber()], [17, 15 + randSmallerNumber()], [18, 15 + randSmallerNumber()], [19, 16 + randSmallerNumber()], [20, 17 + randSmallerNumber()], [21, 18 + randSmallerNumber()], [22, 19 + randSmallerNumber()], [23, 20 + randSmallerNumber()], [24, 21 + randSmallerNumber()], [25, 14 + randSmallerNumber()], [26, 24 + randSmallerNumber()], [27, 25 + randSmallerNumber()], [28, 26 + randSmallerNumber()], [29, 27 + randSmallerNumber()], [30, 31 + randSmallerNumber()]];
                plot = $.plot($("#stats-chart2"), [
                    {
                        data: orders,
                        label: "Orders"
                    }, {
                        data: newOrders,
                        label: "New orders"
                    }
                ], {
                    series: {
                        lines: {
                            show: true,
                            lineWidth: 3
                        },
                        shadowSize: 0
                    },
                    legend: {
                        show: false
                    },
                    grid: {
                        clickable: true,
                        hoverable: true,
                        borderWidth: 0,
                        tickColor: "#f4f7f9"
                    },
                    colors: ["#f34541", "#49bf67"]
                });
                $("#stats-chart2").bind("plotclick", function(event, pos, item) {
                    if (item) {
                        return alert("Yeah! You just clicked on point " + item.dataIndex + " in " + item.series.label + ".");
                    }
                });
            }
        </script>
        <script src="assets/javascripts/plugins/bootstrap_daterangepicker/bootstrap-daterangepicker.js" type="text/javascript"></script>
        <script src="assets/javascripts/plugins/bootstrap_datetimepicker/bootstrap-datetimepicker.js" type="text/javascript"></script>	
        <script src="assets/javascripts/plugins/common/moment.min.js" type="text/javascript"></script>
        <script src="assets/javascripts/plugins/bootbox/bootbox.min.js" type="text/javascript"></script>
        <script src="assets/javascripts/plugins/slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="assets/javascripts/plugins/timeago/jquery.timeago.js" type="text/javascript"></script>
        <script src="assets/javascripts/plugins/common/wysihtml5.min.js" type="text/javascript"></script>
        <script src="assets/javascripts/plugins/common/bootstrap-wysihtml5.js" type="text/javascript"></script>
        <script src="assets/javascripts/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
        <script src="assets/javascripts/plugins/bootbox/bootbox.min.js" type="text/javascript"></script>
        <script src="assets/javascripts/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>
        <script src="assets/javascripts/plugins/datatables/jquery.dataTables.columnFilter.js" type="text/javascript"></script>
        <script src="assets/javascripts/plugins/datatables/dataTables.overrides.js" type="text/javascript"></script>
        <script src="assets/javascripts/toastr.min.js"></script>
        <script src="assets/javascripts/plugins/fileupload/tmpl.min.js" type="text/javascript"></script>
        <script src="assets/javascripts/plugins/fileupload/load-image.min.js" type="text/javascript"></script>
        <script src="assets/javascripts/plugins/fileupload/canvas-to-blob.min.js" type="text/javascript"></script>
        <script src="assets/javascripts/plugins/fileupload/jquery.iframe-transport.min.js" type="text/javascript"></script>
        <script src="assets/javascripts/plugins/fileupload/jquery.fileupload.min.js" type="text/javascript"></script>
        <script src="assets/javascripts/plugins/fileupload/jquery.fileupload-fp.min.js" type="text/javascript"></script>
        <script src="assets/javascripts/plugins/fileupload/jquery.fileupload-ui.min.js" type="text/javascript"></script>
        <script src="assets/javascripts/plugins/fileupload/jquery.fileupload-init.js" type="text/javascript"></script>
        <script src="assets/javascripts/plugins/fuelux/wizard.js" type="text/javascript"></script>
        <script src="assets/javascripts/plugins/tabdrop/bootstrap-tabdrop.js" type="text/javascript"></script>
        <script src="assets/javascripts/plugins/bootbox/bootbox.min.js" type="text/javascript"></script>
        <script src="assets/javascripts/plugins/jgrowl/jquery.jgrowl.min.js" type="text/javascript"></script>
        <script src="assets/javascripts/plugins/typeahead/typeahead.js" type="text/javascript"></script>
        <script src="assets/javascripts/plugins/timeago/jquery.timeago.js" type="text/javascript"></script>
        <script src="assets/javascripts/plugins/nestable/jquery.nestable.js" type="text/javascript"></script>

        <script>
            (function() {
                var cal, calendarDate, d, m, y;

                this.setDraggableEvents = function() {
                    return $("#events .external-event").each(function() {
                        var eventObject;
                        eventObject = {
                            title: $.trim($(this).text())
                        };
                        $(this).data("eventObject", eventObject);
                        return $(this).draggable({
                            zIndex: 999,
                            revert: true,
                            revertDuration: 0
                        });
                    });
                };

                setDraggableEvents();

                calendarDate = new Date();

                d = calendarDate.getDate();

                m = calendarDate.getMonth();

                y = calendarDate.getFullYear();

                cal = $(".full-calendar-demo").fullCalendar({
                    header: {
                        center: "title",
                        left: "basicDay,basicWeek,month",
                        right: "prev,today,next"
                    },
                    buttonText: {
                        prev: "<span class=\"icon-chevron-left\"></span>",
                        next: "<span class=\"icon-chevron-right\"></span>",
                        today: "Today",
                        basicDay: "Day",
                        basicWeek: "Week",
                        month: "Month"
                    },
                    droppable: true,
                    editable: true,
                    selectable: true,
                    select: function(start, end, allDay) {
                        return bootbox.prompt("Event title", function(title) {
                            if (title !== null) {
                                cal.fullCalendar("renderEvent", {
                                    title: title,
                                    start: start,
                                    end: end,
                                    allDay: allDay
                                }, true);
                                return cal.fullCalendar('unselect');
                            }
                        });
                    },
                    eventClick: function(calEvent, jsEvent, view) {
                        return bootbox.dialog({
                            message: $("<form class='form'><label>Change event name</label></form><input id='new-event-title' class='form-control' type='text' value='" + calEvent.title + "' /> "),
                            buttons: {
                                "delete": {
                                    label: "<i class='icon-trash'></i> Delete Event",
                                    className: "pull-left",
                                    callback: function() {
                                        return cal.fullCalendar("removeEvents", function(ev) {
                                            return ev._id === calEvent._id;
                                        });
                                    }
                                },
                                success: {
                                    label: "<i class='icon-save'></i> Save",
                                    className: "btn-success",
                                    callback: function() {
                                        calEvent.title = $("#new-event-title").val();
                                        return cal.fullCalendar('updateEvent', calEvent);
                                    }
                                }
                            }
                        });
                    },
                    drop: function(date, allDay) {
                        var copiedEventObject, eventClass, originalEventObject;
                        originalEventObject = $(this).data("eventObject");
                        originalEventObject.id = Math.floor(Math.random() * 99999);
                        eventClass = $(this).attr('data-event-class');
                        console.log(originalEventObject);
                        copiedEventObject = $.extend({}, originalEventObject);
                        copiedEventObject.start = date;
                        copiedEventObject.allDay = allDay;
                        if (eventClass) {
                            copiedEventObject["className"] = [eventClass];
                        }
                        $(".full-calendar-demo").fullCalendar("renderEvent", copiedEventObject, true);
                        if ($("#calendar-remove-after-drop").is(":checked")) {
                            return $(this).remove();
                        }
                    },
                    events: [
                        {
                            id: "event1",
                            title: "All Day Event",
                            start: new Date(y, m, 1),
                            className: 'event-orange'
                        }, {
                            id: "event2",
                            title: "Long Event",
                            start: new Date(y, m, d - 5),
                            end: new Date(y, m, d - 2),
                            className: "event-red"
                        }, {
                            id: 999,
                            id: "event3",
                                    title: "Repeating Event",
                            start: new Date(y, m, d - 3, 16, 0),
                            allDay: false,
                            className: "event-blue"
                        }, {
                            id: 999,
                            id: "event3",
                                    title: "Repeating Event",
                            start: new Date(y, m, d + 4, 16, 0),
                            allDay: false,
                            className: "event-green"
                        }, {
                            id: "event4",
                            title: "Meeting",
                            start: new Date(y, m, d, 10, 30),
                            allDay: false,
                            className: "event-orange"
                        }, {
                            id: "event5",
                            title: "Lunch",
                            start: new Date(y, m, d, 12, 0),
                            end: new Date(y, m, d, 14, 0),
                            allDay: false,
                            className: "event-red"
                        }, {
                            id: "event6",
                            title: "Birthday Party",
                            start: new Date(y, m, d + 1, 19, 0),
                            end: new Date(y, m, d + 1, 22, 30),
                            allDay: false,
                            className: "event-purple"
                        }
                    ]
                });

            }).call(this);
        </script>
        <script>
            $(".chat .new-message").live('submit', function(e) {
                var chat, date, li, message, months, reply, scrollable, sender, timeago;
                date = new Date();
                months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
                chat = $(this).parents(".chat");
                message = $(this).find("#message_body").val();
                $(this).find("#message_body").val("");
                if (message.length !== 0) {
                    li = chat.find("li.message").first().clone();
                    li.find(".body").text(message);
                    timeago = li.find(".timeago");
                    timeago.removeClass("in");
                    var month = (date.getMonth() + 1);
                    var date_day = (date.getDate());
                    timeago.attr("title", "" + (date.getFullYear()) + "-" + (month < 10 ? '0' : '') + month + "-" + (date_day < 10 ? '0' : '') + date_day + " " + (date.getHours()) + ":" + (date.getMinutes()) + ":" + (date.getSeconds()) + " +0200");
                    timeago.text("" + months[date.getMonth()] + " " + (date.getDate()) + ", " + (date.getFullYear()) + " " + (date.getHours()) + ":" + (date.getMinutes()));
                    setTimeAgo(timeago);
                    sender = li.find(".name").text().trim();
                    chat.find("ul").append(li);
                    scrollable = li.parents(".scrollable");
                    $(scrollable).slimScroll({
                        scrollTo: scrollable.prop('scrollHeight') + "px"
                    });
                    li.effect("highlight", {}, 500);
                    reply = scrollable.find("li").not(":contains('" + sender + "')").first().clone();
                    setTimeout((function() {
                        date = new Date();
                        timeago = reply.find(".timeago");
                        timeago.attr("title", "" + (date.getFullYear()) + "-" + (month < 10 ? '0' : '') + month + "-" + (date_day < 10 ? '0' : '') + date_day + " " + (date.getHours()) + ":" + (date.getMinutes()) + ":" + (date.getSeconds()) + " +0200");
                        timeago.text("" + months[date.getMonth()] + " " + (date.getDate()) + ", " + (date.getFullYear()) + " " + (date.getHours()) + ":" + (date.getMinutes()));
                        setTimeAgo(timeago);
                        scrollable.find("ul").append(reply);
                        $(scrollable).slimScroll({
                            scrollTo: scrollable.prop('scrollHeight') + "px"
                        });
                        return reply.effect("highlight", {}, 500);
                    }), 1000);
                }
                return e.preventDefault();
            });
        </script>
        <script>
            $(".recent-activity .ok").live("click", function(e) {
                $(this).tooltip("hide");
                $(this).parents("li").fadeOut(500, function() {
                    return $(this).remove();
                });
                return e.preventDefault();
            });
            $(".recent-activity .remove").live("click", function(e) {
                $(this).tooltip("hide");
                $(this).parents("li").fadeOut(500, function() {
                    return $(this).remove();
                });
                return e.preventDefault();
            });
            $("#comments-more-activity").live("click", function(e) {
                $(this).button("loading");
                setTimeout((function() {
                    var list;
                    list = $("#comments-more-activity").parent().parent().find("ul");
                    list.append(list.find("li:not(:first)").clone().effect("highlight", {}, 500));
                    return $("#comments-more-activity").button("reset");
                }), 1000);
                e.preventDefault();
                return false;
            });
            $("#users-more-activity").live("click", function(e) {
                $(this).button("loading");
                setTimeout((function() {
                    var list;
                    list = $("#users-more-activity").parent().parent().find("ul");
                    list.append(list.find("li:not(:first)").clone().effect("highlight", {}, 500));
                    return $("#users-more-activity").button("reset");
                }), 1000);
                e.preventDefault();
                return false;
            });
        </script>
        <script>
            (function() {
                $("#daterange").daterangepicker({
                    ranges: {
                        Yesterday: [moment().subtract("days", 1), moment().subtract("days", 1)],
                        "Last 30 Days": [moment().subtract("days", 29), moment()],
                        "This Month": [moment().startOf("month"), moment().endOf("month")]
                    },
                    startDate: moment().subtract("days", 29),
                    endDate: moment(),
                    opens: "left",
                    cancelClass: "btn-danger",
                    buttonClasses: ['btn', 'btn-sm']
                }, function(start, end) {
                    return $("#daterange span").html(start.format("MMMM D, YYYY") + " - " + end.format("MMMM D, YYYY"));
                });

            }).call(this);
        </script>
        <script>
            $(".todo-list .new-todo").live('submit', function(e) {
                var li, todo_name;
                todo_name = $(this).find("#todo_name").val();
                $(this).find("#todo_name").val("");
                if (todo_name.length !== 0) {
                    li = $(this).parents(".todo-list").find("li.item").first().clone();
                    li.find("input[type='checkbox']").attr("checked", false);
                    li.removeClass("important").removeClass("done");
                    li.find("label.todo span").text(todo_name);
                    $(".todo-list ul").first().prepend(li);
                    li.effect("highlight", {}, 500);
                }
                return e.preventDefault();
            });

            $(".todo-list .actions .remove").live("click", function(e) {
                $(this).tooltip("hide");
                $(this).parents("li").fadeOut(500, function() {
                    return $(this).remove();
                });
                e.stopPropagation();
                e.preventDefault();
                return false;
            });

            $(".todo-list .actions .important").live("click", function(e) {
                $(this).parents("li").toggleClass("important");
                e.stopPropagation();
                e.preventDefault();
                return false;
            });

            $(".todo-list .check").live("click", function() {
                var checkbox;
                checkbox = $(this).find("input[type='checkbox']");
                if (checkbox.is(":checked")) {
                    return $(this).parents("li").addClass("done");
                } else {
                    return $(this).parents("li").removeClass("done");
                }
            });

            $("#slider-example > span").each(function() {
                var value;
                value = parseInt($(this).text(), 10);
                return $(this).empty().slider({
                    value: value,
                    range: "min",
                    animate: true,
                    orientation: "vertical"
                });
            });

            $(".slider-example1").slider({
                value: 1,
                min: 0,
                max: 100,
                step: 1,
                slide: function(event, ui) {

                    return $(".slider-example1-amount").text(ui.value + "%");
                }
            });




            $(".slider").each(function() {


                var estimate_value = $(this).data("value");
                var slider = this;
                $(slider).slider({
                    value: estimate_value,
                    min: 1,
                    max: 100,
                    step: 1,
                    slide: function(event, ui) {
                        var id = $(this).attr('id');
                        var slider_value = 0;
                        slider_value = ui.value;
                        $.ajax({
                            url: '<?php echo base_url() . "project/updates_estimate_level"; ?>',
                            type: 'post',
                            data: {id: id, s_value: slider_value},
                            dataType: 'json',
                            success: function(data) {

                            }
                        });
                        $(this).next().find('span.slider-value').html(ui.value + "%");
                    }
                });
            });
            $(document).ready(function() {
                $(".js-example-data-array-selected").select2();
                setTimeout(function() {
                        $('.alert').fadeOut('fast');
                }, 3000);
            });
            
            /*        
             $("#select2-tags").select2({  
             tags: ["today", "tomorrow", "toyota"],
             tokenSeparators: [","," "],
             placeholder: "Type your Project Manager... "
             });*/
        </script>

        <!-- / END - page related files and scripts [optional] -->
    </body>
</html>
