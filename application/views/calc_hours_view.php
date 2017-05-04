<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Hours Calculator</title>

    <!-- Bootstrap 3.3.7-->
    <link href="<?php echo base_url();?>bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url();?>bootstrap/js/bootstrap.min.js"></script>

  </head>
  <body>
    <div class="col-lg-12">
    	<h1>Hours Calculator</h1>
      <form action="<?php echo base_url('Calc_hours/check_hours')?>" method="get">
		<label for="txt_h_start_monday">(Insert the value per hours) 1 hour = </label>
    	<input type="text" name="txt_money_per_h" id="txt_money_per_h" value="9.25"/>
	
    </div>
   	<div class="col-lg-12">
    	<div class="form-group col-xs-2">
    		Monday
    		<input type="time" name="txt_h_start_monday" id="txt_h_start_monday" placeholder="starts 00:00" class="form-control col-xs-2"/>
    		<input type="time" name="txt_h_end_monday" id="txt_h_end_monday" placeholder="finishes 00:00" class="form-control col-xs-2"/>
    	</div>
    	<div class="form-group col-xs-2">
    		Tuesday
    		<input type="time" name="txt_h_start_tuesday" id="txt_h_start_tuesday" placeholder="starts 00:00" class="form-control col-xs-2"/>
    		<input type="time" name="txt_h_end_tuesday" id="txt_h_end_tuesday" placeholder="finishes 00:00" class="form-control col-xs-2"/>
    	</div>
    	<div class="form-group col-xs-2">
    		Wednesday
    		<input type="text" name="txt_h_start_wednesday" id="txt_h_start_wednesday" placeholder="starts 00:00" class="form-control col-xs-2"/>
    		<input type="text" name="txt_h_end_wednesday" id="txt_h_end_wednesday" placeholder="finishes 00:00" class="form-control col-xs-2"/>
    	</div>
    	<div class="form-group col-xs-2">
    		Thursday
    		<input type="text" name="txt_h_start_thursday" id="txt_h_start_thursday" placeholder="starts 00:00" class="form-control col-xs-2"/>
    		<input type="text" name="txt_h_end_thursday" id="txt_h_end_thursday" placeholder="finishes 00:00" class="form-control col-xs-2"/>
    	</div>
    	<div class="form-group col-xs-2">
    		Fridady
    		<input type="text" name="txt_h_start_friday" id="txt_h_start_friday" placeholder="starts 00:00" class="form-control col-xs-2"/>
    		<input type="text" name="txt_h_end_friday" id="txt_h_end_friday" placeholder="finishes 00:00" class="form-control col-xs-2"/>
    	</div>
    	<div class="form-group col-xs-2">
    		Saturday
    		<input type="text" name="txt_h_start_saturday" id="txt_h_start_saturday" placeholder="starts 00:00" class="form-control col-xs-2"/>
    		<input type="text" name="txt_h_end_saturday" id="txt_h_end_saturday" placeholder="finishes 00:00" class="form-control col-xs-2"/>
    	</div>
    	<div class="form-group col-xs-2">
    		Sunday
    		<input type="text" name="txt_h_start_sunday" id="txt_h_start_sunday" placeholder="starts 00:00" class="form-control col-xs-2"/>
    		<input type="text" name="txt_h_end_sunday" id="txt_h_end_sunday" placeholder="finishes 00:00" class="form-control col-xs-2"/>
    	</div>
    	<div class="col-lg-12">
    		<input type="submit" name="btn_submit" id="btn_submit" value="Calculate" class="btn btn-default">
    	</div>
    	</form>
    </div>
    <div class="col-lg-12">
    <table class="table table-bordered table-striped">
    	<tr>
    		<td>
    			Monday
    		</td>
    		<td>
    			Tuesday
    		</td>
    		<td>
    			Wednesday
    		</td>
    		<td>
    			Thursday
    		</td>
    		<td>
    			Friday
    		</td>
    		<td>
    			Saturday
    		</td>
    		<td>
    			Sunday
    		</td>
    		<td>
    			Total of Hours
    		</td>
    	</tr>
    	<tr>
    		<td>
    			<?php 

    				if(!empty($tot_h_monday)){
    				echo $tot_h_monday; 
    			}
    			?>
    		</td>
    		<td>
    			<?php 

    				if(!empty($tot_h_tuesday)){
    				echo $tot_h_tuesday;
    			}
    			?>
    		</td>
    		<td>
    		   	<?php 

    				if(!empty($tot_h_tuesday)){
    				echo $tot_h_wednesday;
    			}
    			?>
    		</td>	
    		<td>
    		    <?php 

    			if(!empty($tot_h_tuesday)){
    				echo $tot_h_thursday;
    			}
    			?>
    		</td>	
    		<td>
    		    <?php 

    			if(!empty($tot_h_tuesday)){
    				echo $tot_h_friday;
    			}
    			?>
    		</td>	
    		<td>
    		    <?php 

    			if(!empty($tot_h_tuesday)){
    				echo $tot_h_saturday;
    			}
    			?>
    		</td>	
    		<td>
    		    <?php 

    			if(!empty($tot_h_tuesday)){
    				echo $tot_h_sunday;
    			}
    			?>
    		</td>
    		<td>
    			<?php 
    			if(!empty($tot_h)){
    				echo $tot_h;
    			}
    			?>
    		</td>
    	</tr>
    	<tr>
    		<td>...</td>
    		<td>
    			...
    		</td>
    	</tr>
    	<tr>
    		<td>
    			Payment
    		</td>
    		<td>
    			<?php 
    			if(!empty($salary_weekly)){
    				echo $salary_weekly;
    			}
    			?>
    		</td>
    	</tr>
    </table>
    </div>
    <?php echo validation_errors(); ?>

    


  </body>
</html>
