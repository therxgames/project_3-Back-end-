<?php require "database/db.php";?>
<!DOCTYPE html>
<html lang="en">
<head>

<?php
		$title = "Подтверждение записи";
		require_once "blocks/head.php" ;
?>

</head>
<body>
	
	<?php 
      require_once "blocks/form.php";
	  require_once "blocks/header.php";
      require_once "blocks/navigation.php";

	  $servicesId = $_GET['servicesId'];
	  $doctorId = $_GET['doctorId'];


	  $procedureTime = $_GET['time'];

		  // МАССИВ СО ВРЕМЕНЕМ
	  $arrTimeForWeekdays = array();
	  $arrTimeForWeekends = array();


		list($hours, $minutes, $seconds) = explode(':', $procedureTime);
		$totalMinutes = 60 * $hours + $minutes + (int) round($seconds / 60); 

       	$startProcedureForWeekdays = date('H:i',strtotime('8:00'));
       	$startProcedureForWeekends = date('H:i',strtotime('9:00'));

       	// ЦИКЛ ДЛЯ БУДНИХ ДНЕЙ

       	while(date('H:i',$endProcedure) < date('H:i',strtotime('18:00'))){

			$startProcedureForWeekdays = 
								date('H:i',strtotime($startProcedureForWeekdays.' + '.
													 $totalMinutes.' min'));
       		$endProcedureForWeekdays = 
       							strtotime($procedureTime) + strtotime($startProcedureForWeekdays) -
       							strtotime("00:00:00");
       		if(date('H:i',$endProcedureForWeekdays) > date('H:i',strtotime('18:00'))){
       			break;
       		}
       		array_push($arrTimeForWeekdays, $startProcedureForWeekdays);


       	}


       	//ЦИКЛ ДЛЯ ВЫХОДНЫХ

       	while(date('H:i',$endProcedureForWeekends) < date('H:i',strtotime('15:00'))){

			$startProcedureForWeekends = 
								date('H:i',strtotime($startProcedureForWeekends.' + '.
													 $totalMinutes.' min'));
       		$endProcedureForWeekends = 
       							strtotime($procedureTime) + strtotime($startProcedureForWeekends) -
       							strtotime("00:00:00");
       		if(date('H:i',$endProcedureForWeekends) > date('H:i',strtotime('15:00'))){
       			break;
       		}
       		array_push($arrTimeForWeekends, $startProcedureForWeekends);


       	}






	 	echo "<div class = 'record_confirmation'>";
	 			echo "<h1 class = 'record_confirmation-title'>Выберите дату и время записи</h1>";
	 			echo "<form action = '' method = 'POST'>";
	 			echo "<div class = 'record_confirmation-form' >";
 			// ВЫВЕСТИ 14 ДНЕЙ НА СТРАНИЦУ 
			  for($i = 0; $i<=14;$i++){ 
			  	echo "<div class = 'record_confirmation_wrap'>";
				  	$date =  date('d.m.Y', strtotime('+'.$i.' day')); // ДАТА В ФОРМАТЕ ДД.ММ.ГГ
				  	$date2 =  date('Y.m.d', strtotime('+'.$i.' day')); // ДАТА В ФОРМАТЕ ГГ.ММ.ДД
				  	$dayOfWeek = strftime("%a", strtotime($date));    // ДЕНЬ НЕДЕЛИ 
				    echo "<label for = 'date".$i."' class = 'record_confirmation-date-label'>". $date ."</label>";
					echo "<input type = 'radio' id = 'date".$i."'
						  class = 'record_confirmation-date-input' name = 'date' value = '".$date2."'></input>";
					echo "<div class = 'record_confirmation-time'>";
					if($dayOfWeek !== 'Sat' && $dayOfWeek !== 'Sun'){
						echo "<label><input type = 'radio' name = 'time'>08:00</input></label>";
						foreach($arrTimeForWeekdays as $weekDays){
						   echo "<label><input type = 'radio' name = 'time' value = '".$weekDays."'>".$weekDays."</label>";
						}
					}else{
						echo "<label><input type = 'radio' name = 'time'>08:00</input></label>";
						foreach($arrTimeForWeekends as $weekEnds){
							echo "<label><input type = 'radio' name = 'time' value = '".$weekEnds."'>".$weekEnds."</label>";
						}
					}
					echo "</div>";
				echo "</div>";

				}
			echo "</div>";
					?>

					<div class="record_confirmation-form_window">


						<p class="record_confirmation-form_window-title">Пожалуйста, подтвердите запись</p>

						<div class="record_confirmation-form_window-confirm">

							<input class="record_confirmation-form_window-input" 
								   type="email" placeholder="Введите ваш e-mail" name = 'email' required>						
							<input class="record_confirmation-form_window-input" 
								   type="phone" placeholder="Введите ваш номер телефона" name = 'number_phone' required>
							
							<div class="record_confirmation-form_window-notification">
								<input type="checkbox" name = 'email_notification'>
								<p>Получать уведомления на почту</p>
							</div>

							<div class="record_confirmation-form_window-notification">
								<input type="checkbox" name = 'phone_notification'>
								<p>Получать уведомления на телефон</p>
							</div>


							<button class="record_confirmation-form_window-button"  type="submit" name="do_reception">
								   Подтвердить запись
							</button>

						</div>
					</div>

					</form>

			</div>
						


<?php

		if(isset($_POST['do_reception'])){


				$reception = R::dispense('reception');
				$reception->id_service_name = $servicesId;
				$reception->id_patient = $_SESSION['logged_user'][0]['id'];
				$reception->id_doctor = $doctorId;
				$reception->time_receipt = $_POST['time'];
				$reception->date_receipt = $_POST['date'];
				R::store($reception);

				$history = R::dispense('histories');
				$history->id_reception = $reception['id'];
				R::store($history);

				$patients = R::load('patients', $_SESSION['logged_user'][0]['id']);
				$patients->email = $_POST['email'];
				$patients->number_phone = $_POST['number_phone'];
				R::store($patients);
				 

		}

		require_once "blocks/footer.php";
		require_once "blocks/scripts.php";
	?>


</body>