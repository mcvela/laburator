<?php
if ( basename(__FILE__) == basename($_SERVER["SCRIPT_FILENAME"]) ) { die('Not allowed'); }

?>

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                    

					<a  href="/tripas"><img src="../<?php echo $conf['logo_file']; ?>" alt="Laburator.com"  title="Laburator.com"> <?php //echo Yii::app()->name; ?></a>
					<span style="width:100px">&nbsp;&nbsp;&nbsp;&nbsp;</span>  
					 
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
            </div>
			<div class="collapse navbar-collapse navbar-ex1-collapse">
			  <ul id="yw3" class="nav navbar-nav navbar-right">
				<li><?php echo $lang['welcome_admin']; ?> </li>
				<li class='<?php echo $lang['menu_suscriptor']; ?>'><a href='index.php'><?php echo $lang['subscribers']; ?></a></li>
				<li class='<?php echo $lang['menu_databaseadminexec']; ?>'><a href="./selectdb.php"><?php echo $lang['databaseadminexec']; ?></a></li>
				<li class='<?php echo $lang['menu_databaseadmin']; ?>'><a href="./managerdb.php"><?php echo $lang['databaseadmin']; ?></a></li>
				<li class='<?php echo $lang['menu_logout']; ?>'><a href='index.php?admin=logout'><?php echo $lang['logout']; ?></a></li>
			  </ul>
			</div>
		</div>
		</nav>
		<br><br><br><br>