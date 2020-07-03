<?php require "../database/dbAdmin.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Админ панель</title>


	<link rel="stylesheet" type="text/css" href="../css/admin.css">
	<link rel="stylesheet" type="text/css" href="../css/404.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>



<div class="admin">
	<div class="container col-xl-11">


		
		<?php 
		$root1 = $_GET['root1'];
		$root2 = $_GET['root2'];
		$doctorId = $_GET['doctorId'];
		

		if($root1 == 1){
		echo '<div class="row">
					<div class="col-xl-12 d-flex justify-content-end">
						<a class="btn btn-danger btn-sm" href="admin_logout.php">Выход</a>
					</div>
			 </div>';
		echo "<div class='row'>";	
			echo '<div class="d-flex flex-column">';
			echo   '<div class="flex-column">';
				
					require_once "./doctorsTable.php";
					require_once "./professionTable.php";
					require_once "./servicesTypeTable.php";
					require_once "./servicesNameTable.php";
					require_once "./receptionTable.php";
					require_once "./blackListTable.php";

			echo    "</div>";
			echo  "</div>";
		}
		if($root2 == 2){
			$futureReceipts = R::getAll('select services_name.name as servicesName,services_name.price,
									 patients.name as patientName,patients.surname,patients.patronymic,patients.birthday,
									 reception.date_receipt,reception.time_receipt
									 from reception
									 inner join patients on reception.id_patient = patients.id
									 inner join services_name on reception.id_service_name = services_name.id
									 where reception.id_doctor = ? && reception.date_receipt >= ?
									 order by reception.date_receipt' ,
									 array($doctorId, date('Y-m-d')));	

			$pastReceipts = R::getAll('select services_name.name as servicesName,services_name.price,
									 patients.name as patientName,patients.surname,patients.patronymic,patients.birthday,
									 reception.date_receipt,reception.time_receipt
									 from reception
									 inner join patients on reception.id_patient = patients.id
									 inner join services_name on reception.id_service_name = services_name.id
									 where reception.id_doctor = ? && reception.date_receipt < ? 
									 order by reception.date_receipt' ,
									 array($doctorId, date('Y-m-d')));	

			echo '<div class="row">
					<div class="col-xl-12 d-flex justify-content-end">
						<a class="btn btn-danger btn-sm" href="admin_logout.php">Выход</a>
					</div>
			 </div>';
			echo "<div class='d-flex justify-content-center'>";
			echo "<form action = '' method='post'>";

			echo "<button type='submit' class='btn btn-primary btn-lg doctor_history-button' name = 'futureReceipts'>
				  		Будущие записи
				  </button>";

			echo "<button type='submit' class='btn btn-primary btn-lg doctor_history-button' name = 'pastReceipts'>
				 		Прошлые записи
				 </button>";


			echo "</form>";
			echo "</div>";

			if(isset($_POST['futureReceipts'])){
				echo '<table class="table table-hover table-sm table_admin" border = "1">';
					echo "<thead class='thead-dark'";
					echo "<tr>";
					echo "<th style = 'vertical-align:middle'>Название услуги</th>" ;
					echo "<th style = 'vertical-align:middle'>Ф.И.О. пациента</th>";
					echo "<th>День рождения пациента</th>"; 
					echo "<th>Дата приема</th>";
					echo "<th>Время приема</th>";
					echo "</tr>";
					echo "</thead>";

					echo "<tbody>";
					foreach ($futureReceipts as $futureReceipts) {

						echo "<tr>";
						echo "<th>" . $futureReceipts['servicesName'] . "</th>" ;					
						echo "<td>" . $futureReceipts['surname'] . ' ' . $futureReceipts['patientName'] . ' ' . 
									  $futureReceipts['patronymic'] . "</td>" ; 
						echo "<td>" . $futureReceipts['birthday'] . "</td>";
						echo "<td>" . date('d-m-Y', strtotime($futureReceipts['date_receipt'])) . "</td>"; 
						echo "<td>" . date('H:i',strtotime($futureReceipts['time_receipt'])) . "</td>";						

						
					echo "</tbody>";

					}

				echo "</table>";

			}

			if(isset($_POST['pastReceipts'])){
					echo '<table class="table table-hover table-sm table_admin" border = "1">';
					echo "<thead class='thead-dark'>";
					echo "<tr>";
					echo "<th style = 'vertical-align:middle'>Название услуги</th>" ;
					echo "<th style = 'vertical-align:middle'>Ф.И.О. пациента</th>";
					echo "<th>День рождения пациента</th>"; 
					echo "<th>Дата приема</th>";
					echo "<th>Время приема</th>";
					echo "<th>Пациент пришел?</th>";
					echo "</tr>";
					echo "</thead>";

					echo "<tbody>";
					foreach ($pastReceipts as $pastReceipts) {

						echo "<tr>";
						echo "<th>" . $pastReceipts['servicesName'] . "</th>" ;					
						echo "<td>" . $pastReceipts['surname'] . ' ' . $reception['patientName'] . ' ' . 
									  $pastReceipts['patronymic'] . "</td>" ; 
						echo "<td>" . $pastReceipts['birthday'] . "</td>";
						echo "<td>" . date('d-m-Y', strtotime($pastReceipts['date_receipt'])) . "</td>"; 
						echo "<td>" . date('H:i',strtotime($pastReceipts['time_receipt'])) . "</td>";					
						echo "<td>
									<input type = 'radio' name = 'patient_pass'>Да
							 		<input type = 'radio' name = 'patient_pass'>Нет
							 </td>";
						
					echo "</tbody>";

					}

				echo "</table>";

			}
			echo "</div>";
		echo "</div>";
		}

		if(empty($root1) && empty($root2)){
			require_once('./404.php');
		}


		
		?>





  <script src="https://kit.fontawesome.com/13d658ad06.js" crossorigin="anonymous"></script>
  <script type="text/javascript" src="../js/admin.js"></script>
</body>
</html>