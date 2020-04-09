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
         <form method="post" role="form" id="register-form" autocomplete="off">
         
         <div class="form-header centered">
         	<h3 class="form-title"><i class="fa fa-user"></i><span class="glyphicon glyphicon-user"></span> CREATE ACCOUNT</h3>
                      
         </div>
                  
         <div class="form-body">
         
         	  
              <div class="row">
         	  <div class="form-group col-md-6">
                      <div class="form-group has-feedback">  
                   <div class="input-group">
                   <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
                   <input name="txtuname" id="user_username" type="text" class="form-control" placeholder="Username" maxlength="15" required="required"></input>
                   </div>
                   <span class="help-block" id="error"></span>
                      </div>
              </div>
                  
                  <div class="form-group col-md-6">
                      <div class="form-group has-feedback">  
                   <div class="input-group">
                   <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
                   <input name="txtfname" type="text" class="form-control" placeholder="Firstname" maxlength="15" required="required"></input>
                   </div>
                   <span class="help-block" id="error"></span>
                      </div>
              </div>
              </div>  
                    
              <!-- BEGIN LASTNAME AND EMAIL-->
              <div class="row">
         	  <div class="form-group col-md-6">
                      <div class="form-group has-feedback">  
                   <div class="input-group">
                   <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
                   <input name="txtlname" type="text" class="form-control" placeholder="Lastname" maxlength="15" required="required"></input>
                   </div>
                   <span class="help-block" id="error"></span>
                      </div>
              </div>
                  
                  <div class="form-group col-md-6">
                      <div class="form-group has-feedback">  
                   <div class="input-group">
                   <div class="input-group-addon"><span class="glyphicon glyphicon-bitcoin"></span></div>
                   <input name="txtuemail" id="user_email" type="text" class="form-control" placeholder="Email">
                   </div>
                   <span class="help-block" id="error"></span>
                      </div>
              </div>
              </div>  
              <!-- END LASTNAME AND EMAIL-->
              
              <!-- BEGIN COUNTRY AND PHONE NUMBER-->
              <div class="row">
			  
			  <div class="form-group col-md-6">
                      <div class="form-group has-feedback">  
                   <div class="input-group">
                   <div class="input-group-addon"><span class="glyphicon glyphicon-user"></span></div>
                   <select id="basic" class="form-control selectpicker has-feedback" data-live-search="true" data-style="btn-info" name="txtgender" required="required">
                                           <option value="" selected> Gender</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                         </select>
                   </div>
                   <span class="help-block" id="error"></span>
                      </div>
              </div>
         	
                  <div class="form-group col-md-6">
                      <div class="form-group has-feedback">  
                   <div class="input-group">
                   <div class="input-group-addon"><span class="glyphicon glyphicon-phone-alt"></span></div>
                   <input name="txtuphone" id="user_phone" type="text" class="form-control" placeholder="Phone Number">
                   </div>
                   <span class="help-block" id="error"></span>
                      </div>
              </div>
              </div>  
              <!-- END COUNTRY AND PHONE NUMBER-->
              
              <!-- BEGIN GENDER AND BIRTHDAY-->
              <div class="row hidden">
         	  
					  <div class="form-group col-md-6">
                      <div class="form-group has-feedback">  
                   <div class="input-group">
                   <div class="input-group-addon"><span class="glyphicon glyphicon-flag"></span></div>
                   <select id="basic" class="form-control selectpicker has-feedback" data-live-search="true" data-style="btn-info" name="txtcountry" required="required">
                                            <option value="" selected="selected">Select your country</option>
                                            <?php
                                            
                                            $stmt = $gn_db->prepare("SELECT * FROM tbl_country ORDER BY `country_name_1` ASC");
                                            //$stmt->execute();
                                            if ($stmt->rowCount() > 0) {
                                                while ($signupcountryRow=$stmt->fetch(PDO::FETCH_ASSOC)) {
                                                extract($signupcountryRow);
                                                
                                            ?>
                                            <option class="get-class" value="<?php echo $signupcountryRow['country_name_1']; ?>"><?php echo $signupcountryRow['country_name_1']; ?></option>
                                            <?php
                                            }
                                            }
                                            ?>
                                         </select>
                   </div>
                   <span class="help-block" id="error"></span>
                      </div>
              </div>
                  
			  
			  
                  
                  <div class="form-group col-md-6 hidden">
                      <div class="form-group has-feedback">  
                   <div class="input-group">
                   <div class="input-group-addon"><span class="glyphicon glyphicon-phone"></span></div>
                   <!--<input name="txtuphone" id="user_phone" type="text" class="form-control" placeholder="phone Number"></input>-->
                   </div>
                   <span class="help-block" id="error"></span>
                      </div>
              </div>
              </div>  
              <!-- END GENDER AND BIRTHDAY-->
              
               <!-- BEGIN PASSWORD -->
              <div class="row">
                        
                   <div class="form-group col-md-6">
                       <div class="form-group has-feedback">  
                        <div class="input-group">
                        <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                        <input name="password" id="password" type="password" class="form-control" placeholder="Password">
                        </div>  
                        <span class="help-block" id="error"></span>                    
                   </div>
                   </div>
                            
                   <div class="form-group col-md-6">
                       <div class="form-group has-feedback">  
                        <div class="input-group">
                        <div class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></div>
                        <input name="cpassword" type="password" class="form-control" placeholder="Retype Password">
                        </div>  
                        <span class="help-block" id="error"></span>                    
                   </div>
                   </div>
                            
             </div>
              <!-- END PASSWORD -->
              
               <!-- BEGIN ACCEPT -->
              <div class="row">
                                <div class="form-group col-md-12">
                                    <div class="checkbox m-b-30 centered">
                                        <label>
                                            <input type="checkbox" name="txtaccept" required="required"/> By clicking Sign Up, you agree to our 
                                            <a href="#" style="text-decoration: underline; font-weight: bold;">Terms</a> and that you have read our 
                                            <a href="#" style="text-decoration: underline; font-weight: bold;">Data Policy</a>, including our 
                                            <a href="#" style="text-decoration: underline; font-weight: bold;">Cookie Use</a>.
                                        </label>
                                <span class="help-block" id="error"></span>
                                    </div>
                                </div>
                            </div>
                 <!-- END ACCEPT -->        
                        
            </div>
                <center>
                    <div class="form-footer">
                         <button type="submit" class="btn btn-default" id="btn-signup" name="create_account">
                         <span class="glyphicon glyphicon-log-in"></span> Sign Me Up !
                         </button>
                    </div>
                </center>

            </form>
            
           </div>
			  
			  

			  
			  
			  
			  
			  
			  
			  
			  
			  		<!-- Modal -->
  <div class="modal fade" id="successAccountModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
		<button type="button" class="close" id="login_page" data-dismiss="modal">&times;</button>
			<center>
				<h4 class="modal-title">Account Created successfully</h4>
			</center>
        </div>
        <div class="modal-body">
          <p> Kindly login to proceed</p>
        </div>
      </div>
      
    </div>
  </div>
  
  <!-- Modal -->
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
  <div class="modal fade" id="nosuccessAccountModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
		<button type="button" class="close" id="nosuccessbutton" data-dismiss="modal">&times;</button>
			<center>
				<h4 class="modal-title">Registration not successful</h4>
			</center>
        </div>
        <div class="modal-body">
          <p> If this error persist, contact the admin</p>
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

   
	<script src="public/js/function/jquery.validate.min.js"></script>
	<script src="public/js/function/register.js"></script>
<?php require 'public/mvc_required_script/meta_footer/mf_general.php' ;?>

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
    <!-- /datepicker -->
  </body>
</html>