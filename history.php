<?php require "database/db.php";?>
<!DOCTYPE html>
<html lang="en">
<head>

<?php
		$title = "История";
		require_once "blocks/head.php" ;
?>

</head>
<body>



	<?php 

	if(count($_SESSION['logged_user'][0]['id']) > 0)  { 
		  require_once "blocks/form.php";
		  require_once "blocks/header.php";
	      require_once "blocks/navigation.php";		?> <!-- ЕСЛИ ЧЕЛОВЕК АВТОРИЗОВАЛСЯ ПОКАЗЫВАТЬ СТРАНИЦУ --> 
	

	<div class="history">
		<div class="history_wrap">
	
		<h1 class="history_wrap-title">История ваших записей</h1>
		<?php

	    $reception = R::getAll('select reception.id,reception.id_service_name,reception.id_doctor,
	    							   reception.id_patient,reception.date_receipt,reception.time_receipt,
	    							   histories.doctor_opinion,histories.pass
	    						 	   from histories
	    						 	   inner join reception on
	    						 	   histories.id_reception = reception.id
	    						 	   where reception.id_patient = ?', array('1'));

	    echo "<div class = 'history_block'>";
		   	foreach ($reception as $key => $reception) {

		   		echo "<div  class = 'history_block_wrap'>";

		   			echo "<div class = 'history_block_main'>";
			   		echo "<span class = 'history_block-text'>Дата записи: </span>";
			   		echo "<span>" . date('d-m-Y', strtotime($reception['date_receipt'])) . "</span><br>";
			   		echo "</div>";

		   			echo "<div class = 'history_block_main'>";
			   		echo "<span class = 'history_block-text'>Время записи: </span>"; 
			   		echo "<span>" . date('H:i',strtotime($reception['time_receipt'])) . "</span><br>";
			   		echo "</div>";

			   		$doctor = R::getAll('select doctors.id,doctors.name 
					   							 from reception 
					   							 inner join doctors on
					   							 reception.id_doctor = doctors.id
					   							 where doctors.id = ?', array($reception['id_doctor']));

			   		$service_name = R::getAll('select services_name.id,services_name.name,services_name.price 
							   							 from reception 
							   							 inner join services_name on
							   							 reception.id_service_name = services_name.id
							   							 where services_name.id = ?', 
							   							 			array($reception['id_service_name']));

		   			echo "<div class = 'history_block_main'>";
			   		echo "<span class = 'history_block-text'>Услуга: </span>";
			   		echo "<span>" . $service_name[$key]['name'] . "</span><br>";
			   		echo "</div>";

		   			echo "<div class = 'history_block_main'>";
			   		echo "<span class = 'history_block-text'>Цена услуги - </span>";
			   		echo "<span>" . $service_name[$key]['price'] . " рублей</span><br>";
			   		echo "</div>";


			   		if(date('d-m-Y') <  date('d-m-Y', strtotime($reception['date_receipt']))){	?>


					   		<a href="history.php?id=<?php echo $reception['id']?>"  
					   			onclick="return confirm('Вы действительно хотите отменить запись?')"
					   			class = 'cancel_record'>
					   			Отменить запись
					   		</a>

					<?php


			   			if (isset($_GET['id'])) {
							$delRec = R::exec('SET foreign_key_checks = 0; Delete from reception
											where id = ?',array($_GET['id']));
							$delHis = R::exec('SET foreign_key_checks = 0; Delete from histories
											where id_reception = ?',array($_GET['id']));
							echo "<p>Назначение врача: " . $reception['doctor_opinion'] . "</p>";
						 }
						}


				   		else{
				   			echo "<p class = 'history_block-no'>К сожалению вы не пришли(</p>";
				   		
				   		}

			   	echo "</div>";
		   	}

	     echo "</div>";


	    ?>
		</div>
	</div>


	
	<?php  require_once "blocks/footer.php";
		   require_once "blocks/scripts.php";
	 }
	 else require_once "admin/404.php"; ?> <!-- ЕСЛИ ЧЕЛОВЕК НЕ АВТОРИЗОВАЛСЯ ОШИБКА 404 --> 


</body>