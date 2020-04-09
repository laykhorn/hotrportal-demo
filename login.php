<?php
require 'library/config/general_config.php';
if(isset($_SESSION['authenticUser'])!="")
{
	header("Location: home");
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login</title>


	<?php require 'public/mvc_required_script/meta_header/mh_general.php' ;?>
	
		<!-- iCheck -->
    <link href="public/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    <link href="public/vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">
    <!-- Select2 -->
    <link href="public/vendors/select2/dist/css/select2.min.css" rel="stylesheet">
    <!-- Switchery -->
    <link href="public/vendors/switchery/dist/switchery.min.css" rel="stylesheet">
    <!-- starrr -->
    <link href="public/vendors/starrr/dist/starrr.css" rel="stylesheet">
  </head>

  <body class="nav-md"><!-- footer_fixed-->
    <div class="container body">
      <div class="main_container">

		<?php require 'library/views/extras/index/general_header/general_header_index.php' ;?>
		
        <!-- page content -->
        <div class="right_col_sidebar_remove" role="main">
          <div class="">

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
					
					<div class="signup-form-container">
    
         <!-- form start -->
         <form method="post" role="form" id="login-form" autocomplete="off">
         
         <div class="form-header centered">
         	<h3 class="form-title"><i class="fa fa-user"></i><span class="glyphicon glyphicon-user"></span> LOGIN</h3>
                      
         </div>
                  
         <div class="form-body">

			  <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
				<input name="user_id" id="user_id" type="text" class="form-control has-feedback-left" placeholder="Email or Username or Phone Number" required="required">
				<span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
				<span class="help-block" id="error"></span>
			  </div>

              
			  <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                        <input name="password" id="password" type="password" class="form-control has-feedback-left" placeholder="Password" required="required">
                        <span class="fa fa-lock form-control-feedback left" aria-hidden="true"></span>
						<span class="help-block" id="error"></span>
                      </div>
      
                        
            </div>
                <center>
				
                    <div class="form-footer">
                         <button type="submit" class="btn btn-default" id="btn-login" name="btn-login">
                         <span class="glyphicon glyphicon-log-in"></span> Login
                         </button>
                    </div>
                </center>

            </form>
            
           </div>
			  
			  
			  
	  <div class="modal fade" id="errorAccountModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
		<button type="button" class="close" id="error_page" data-dismiss="modal">&times;</button>
			<center>
				<h4 class="modal-title">An error just occured</h4>
			</center>
        </div>
        <div class="modal-body">
          <p> If the error please contact the admin</p>
        </div>
      </div>
      
    </div>
  </div>		  
			  

  
  <!-- Modal -->
  <div class="modal fade" id="errorLoginModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
		<button type="button" class="close" id="error_login" data-dismiss="modal">&times;</button>
			<center>
				<h4 class="modal-title">Login Error</h4>
			</center>
        </div>
        <div class="modal-body">
          <p> The Email, Username or Phone Number and Password you entered did not match our records Please double-check and try again !!!</p>
        </div>
      </div>
      
    </div>
  </div>
  

			  
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

		<?php require 'library/views/extras/general_footer/general_footer.php' ;?>
		
		
      </div>
    </div>

    
     <?php require 'public/mvc_required_script/meta_footer/mf_general.php' ;?>

	<!-- bootstrap-wysiwyg -->
    <script src="public/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
    <script src="public/vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
    <script src="public/vendors/google-code-prettify/src/prettify.js"></script>
    <!-- jQuery Tags Input -->
    <script src="public/vendors/jquery.tagsinput/src/jquery.tagsinput.js"></script>
    <!-- Switchery -->
    <script src="public/vendors/switchery/dist/switchery.min.js"></script>
 
    <!-- Parsley -->
    <script src="public/vendors/parsleyjs/dist/parsley.min.js"></script>
    <!-- Autosize -->
    <script src="public/vendors/autosize/dist/autosize.min.js"></script>
    <!-- jQuery autocomplete -->
    <script src="public/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js"></script>
    <!-- starrr -->
    <script src="public/vendors/starrr/dist/starrr.js"></script>
	
	<script src="public/js/function/jquery.validate.min.js"></script>
	<script src="public/js/function/login.js"></script>
	


    <script>
      $(function() {
        Morris.Bar({
          element: 'graph_bar',
          data: [
            { "period": "Jan", "Hours worked": 80 }, 
            { "period": "Feb", "Hours worked": 125 }, 
            { "period": "Mar", "Hours worked": 176 }, 
            { "period": "Apr", "Hours worked": 224 }, 
            { "period": "May", "Hours worked": 265 }, 
            { "period": "Jun", "Hours worked": 314 }, 
            { "period": "Jul", "Hours worked": 347 }, 
            { "period": "Aug", "Hours worked": 287 }, 
            { "period": "Sep", "Hours worked": 240 }, 
            { "period": "Oct", "Hours worked": 211 }
          ],
          xkey: 'period',
          hideHover: 'auto',
          barColors: ['#26B99A', '#34495E', '#ACADAC', '#3498DB'],
          ykeys: ['Hours worked', 'sorned'],
          labels: ['Hours worked', 'SORN'],
          xLabelAngle: 60,
          resize: true
        });

        $MENU_TOGGLE.on('click', function() {
          $(window).resize();
        });
      });
    </script>

    <!-- datepicker -->
    <script type="text/javascript">
      $(document).ready(function() {

        var cb = function(start, end, label) {
          console.log(start.toISOString(), end.toISOString(), label);
          $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
          //alert("Callback has fired: [" + start.format('MMMM D, YYYY') + " to " + end.format('MMMM D, YYYY') + ", label = " + label + "]");
        }

        var optionSet1 = {
          startDate: moment().subtract(29, 'days'),
          endDate: moment(),
          minDate: '01/01/2012',
          maxDate: '12/31/2015',
          dateLimit: {
            days: 60
          },
          showDropdowns: true,
          showWeekNumbers: true,
          timePicker: false,
          timePickerIncrement: 1,
          timePicker12Hour: true,
          ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          opens: 'left',
          buttonClasses: ['btn btn-default'],
          applyClass: 'btn-small btn-primary',
          cancelClass: 'btn-small',
          format: 'MM/DD/YYYY',
          separator: ' to ',
          locale: {
            applyLabel: 'Submit',
            cancelLabel: 'Clear',
            fromLabel: 'From',
            toLabel: 'To',
            customRangeLabel: 'Custom',
            daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
            monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            firstDay: 1
          }
        };
        $('#reportrange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));
        $('#reportrange').daterangepicker(optionSet1, cb);
        $('#reportrange').on('show.daterangepicker', function() {
          console.log("show event fired");
        });
        $('#reportrange').on('hide.daterangepicker', function() {
          console.log("hide event fired");
        });
        $('#reportrange').on('apply.daterangepicker', function(ev, picker) {
          console.log("apply event fired, start/end dates are " + picker.startDate.format('MMMM D, YYYY') + " to " + picker.endDate.format('MMMM D, YYYY'));
        });
        $('#reportrange').on('cancel.daterangepicker', function(ev, picker) {
          console.log("cancel event fired");
        });
        $('#options1').click(function() {
          $('#reportrange').data('daterangepicker').setOptions(optionSet1, cb);
        });
        $('#options2').click(function() {
          $('#reportrange').data('daterangepicker').setOptions(optionSet2, cb);
        });
        $('#destroy').click(function() {
          $('#reportrange').data('daterangepicker').remove();
        });
      });
    </script>
	
	    <!-- Select2 -->
    <script>
      $(document).ready(function() {
        $(".select2_single").select2({
          placeholder: "Select a state",
          allowClear: true
        });
        $(".select2_group").select2({});
        $(".select2_multiple").select2({
          maximumSelectionLength: 4,
          placeholder: "With Max Selection limit 4",
          allowClear: true
        });
      });
    </script>
    <!-- /Select2 -->
    <!-- /datepicker -->
  </body>
</html>