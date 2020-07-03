<button type="button" class="btn btn-primary btn-md admin_tables_wrap-button">Таблица записей</button> 
	<div class="admin_tables_wrap">



		<?php
		echo '<table border="1">';

		$reception_see = R::getAll('select reception.id,
							services_name.name as serviceName,
							patients.surname as patientSurname,
							doctors.surname as doctorSurname,
							reception.date_receipt,
							reception.time_receipt 
							from reception
							inner join services_name on reception.id_service_name=services_name.id
							inner join patients on reception.id_patient=patients.id
							inner join doctors on reception.id_doctor=doctors.id');

		if($reception_see){
			echo '<table class="table table-sm table-hover table_admin" border = "1">';

			echo "<thead class = 'thead-dark'>";

			echo "<tr>";
			echo "<th>ID записи</th>" ;
			echo "<th>Название услуги</th>";
			echo "<th>Фамилия пациента</th>";
			echo "<th>Фамилия врача</th>";
			echo "<th>Дата записи</th>";
			echo "<th>Время записи</th>";
			echo "<th></th>";
			echo "</tr>";

			echo "</thead>";
			echo "<tbody>";
			foreach ($reception_see as $reception_see) {

			echo "<tr>";
			echo "<th>" . $reception_see['id'] . "</th>" ;
			echo "<td>" . $reception_see['serviceName'] . "</td>" ;
			echo "<td>" . $reception_see['patientSurname'] . "</td>" ;
			echo "<td>" . $reception_see['doctorSurname'] . "</td>" ;
			echo "<td>" . $reception_see['date_receipt'] . "</td>" ;
			echo "<td>" . $reception_see['time_receipt'] . "</td>" ;
			echo "<td>
								<a href='admin.php?del_id= ".$reception_see['id']."
												   &root1=".$root1."
							 					   &root2=".$root2."
							 					   &doctorId=".$doctorId."' title = 'Удалить?'>
									<i class='fas fa-trash-restore'></i>
				  </td>";
			echo "</tr>";							
				}
			echo "</tbody>";
			}

			echo "</table>";


			if (isset($_GET['del_id'])) {
				$del = R::exec('SET foreign_key_checks = 0; Delete from reception 
								where id = ?',array($_GET['del_id']));}?>
					
</div>
				