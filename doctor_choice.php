<?php require "database/db.php";?>
<!DOCTYPE html>
<html lang="en">
<head>

<?php
		$title = "Выбор врача";
		require_once "blocks/head.php" ;
?>

</head>
<body>
	
	<?php 
	      require_once "blocks/form.php";
		  require_once "blocks/header.php";
	      require_once "blocks/navigation.php";

	      $servicesId = $_GET['servicesId'];


	      $servicesName = $_GET['servicesName'];
	      $servicesType = $_GET['servicesType'];
	      $description = $_GET['description'];
	      $price = $_GET['price'];


	      $time = R::getAll('select id,name,procedure_time from services_name where name = ?',
	      array($servicesName));

		  $doctor = R::getAll("select id,name,surname,id_profession,id_service_type,experience,
		  						cabinet
	      				  from doctors where id_service_type = ?", array($servicesType)
	      				  );

		   echo "<div class = 'available_doctors'>";
		   	    echo "<div class = 'available_doctors_wrap'>";
			      echo "<h2 class = 'available_doctors-service'>" . $servicesName . "</h2>";
			      echo "<span class = 'available_doctors-description'>	&nbsp;	&nbsp;" 
			      				. $description . 
			      		"</span>";
			      echo "<p class = 'available_doctors-price'>Цена услуги: " . $price . " рублей</p>";
			      echo "<p class = 'available_doctors-price'>Длительность услуги: ";
					foreach ($time as $time) {
						list($hours, $minutes, $seconds) = explode(':', $time['procedure_time']);
			 			$totalMinutes = 60 * $hours + $minutes + (int) round($seconds / 60); 
						echo $totalMinutes;
						      				} 
			      echo  " минут</p>";
			      echo "<h1 class = 'available_doctors-doctors'>
			      				Выберите врача из доступных в данный момент
			      		</h1>";
			      echo "<div class = 'doctor_description'>";
				      foreach ($doctor as $doctor) {
				      	echo "<div class = 'doctor_description_wrap'>";
					      	echo "<span class = 'available_doctors-price'>Доктор " 
					      				. $doctor['name'] . " " . $doctor['surname'] . 
					      		 "</span>";
					        echo "<br>";

					        echo "<span class = 'available_doctors-price'>Опыт работы </span>" ;
					      	echo "<span class = 'available_doctors-price'>
										". $doctor['experience'] . "
					      		  </span>";
					      	echo "<span class = 'available_doctors-price'> лет</span>";

					        echo "<br>";

					      	echo "<span class = 'available_doctors-price'>Работает в </span>"; 
					      	echo "<span class = 'available_doctors-price'>
										". $doctor['cabinet'] . "
					      		</span>";
					      	echo "<span class = 'available_doctors-price'> кабинете</span>";
					        echo "<br>";
				        	echo "<div class = 'services_name-button'>";
					      	echo "<a href = 'record_confirmation.php
					      						?time=".$time['procedure_time']."
					      						&servicesId=". $servicesId ."
					      						&doctorId=".$doctor['id']."' 
					      						style = 'text-align:center'>

					      				Выбрать этого врача
					      		  </a>";
					      	echo "</div>";
				      	echo "</div>";
				      }
					 echo "</div>";
				   echo "</div>";
				echo "</div>";

		 
				      
			?>



	<?php 
		require_once "blocks/footer.php";
		require_once "blocks/scripts.php";
	?>


</body>