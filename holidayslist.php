<?php require_once("st_inc/session.php"); ?>
<?php confirm_logged_in(); ?>
<?php require_once("st_inc/connection.php"); ?>
<?php require_once("st_inc/functions.php"); ?>
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <i class="fa fa-paper-plane fa-1x"></i> Holidays   
						<div class="pull-right"> <div class="btn-group"><?php echo date("H:i"); ?></div> </div>
                        </div>
                        <!-- /.panel-heading -->
 <div class="panel-body">
<p>Holidays Module isn’t implemented yet!!!! </p>
 <ul class="chat"> 
 				 <li class="left clearfix">
                     <a href="add_holidays.php" style="color: #777; cursor: pointer;" ><span class="chat-img pull-left">
                        <div class="circle orangesch"> <i class="ionicons ion-plus"></i> </div>
                     </span>
                     <div class="chat-body clearfix">
                         <div class="header">
                             <strong class="primary-font">   </strong> 
                             
							 <small class="pull-right text-muted">
								Add Holidays <i class="fa fa-chevron-right fa-fw"></i></a>
                             </small>
                         </div>
                     </div>
                </li>
<?php 
$query = "SELECT * FROM holidays ORDER BY start_date_time asc";
$results = mysql_query($query, $connection);
while ($row = mysql_fetch_assoc($results)) {
				echo '
				<li class="left clearfix scheduleli">
					<a href="javascript:active_holidays('.$row["id"].');">
					 <span class="chat-img pull-left">';
					if($row["active"]=="0"){ $shactive="bluesch"; }else{ $shactive="orangesch"; }

						
						$time = strtotime(date("G:i:s")); 
						$start_date_time = strtotime($row['start_date_time']);
						$end_date_time = strtotime($row['end_date_time']);
						if ($time >$start_date_time && $time <$end_date_time && $row["active"]=="1"){$shactive="redsch";}
					echo '<div class="circle '. $shactive.'"> <i class="fa fa-paper-plane"></i></div>
                     </span></a>

					 <a style="color: #333; cursor: pointer; text-decoration: none;" data-toggle="collapse" data-parent="#accordion" href="#collapse'.$row['id'].'">
					 <div class="chat-body clearfix">
                         <div class="header">
                             <strong class="primary-font">&nbsp;&nbsp;'. date('Y-m-d', $start_date_time).' - '.date('Y-m-d', $end_date_time).' </strong></a> 
<a class="btn btn-danger btn-xs" href="holidays.php?id=' . $row['id'] . '" ><span class="glyphicon glyphicon-trash"></span></a>
							 
							 </div></div>';
}
		include("model.php");					 
?>
</ul>
                        </div>
                        <!-- /.panel-body -->
						<div class="panel-footer">
<?php 
$query="select * from weather";
$result = mysql_query($query, $connection);
$weather = mysql_fetch_array($result);
?>

Outside: <?php //$weather = getWeather(); ?><?php echo $weather['c'] ;?>&deg;C
<span><img border="0" width="24" src="images/<?php echo $weather['img'];?>.png" title="<?php echo $weather['title'];?> - 
<?php echo $weather['description'];?>"></span> <span><?php echo $weather['title'];?> - 
<?php echo $weather['description'];?></span>


                            <div class="pull-right">
                                <div class="btn-group">
*
                                </div>
                            </div>
							


                        </div>
                    </div>
                </div>
<?php if(isset($connection)) { mysql_close($connection); } ?>