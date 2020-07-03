	<button type="button" class="btn btn-primary btn-md admin_tables_wrap-button">Таблица врачи</button>
		<div class="admin_tables_wrap">

			<div class="admin_tables_add-div">
				<button type="button" class="btn btn-danger btn-sm admin_tables_add-button">
					Добавить врача
				</button>
			</div>
			
			<?php
			echo "<div class='admin_form admin_form-add'>";
			echo "<form action = '' method='post'>";
				

				echo "<div>";
				echo "<label class = 'admin_form-label'>Логин врача</label>";
				echo "<input type= 'text' id = 'doctor_login'  name= 'doctor_login' required />";
				echo "</div>";

				echo "<div>";
				echo "<label class = 'admin_form-label'>Пароль врача</label>";
				echo "<input type= 'password' name= 'doctor_password' required />";
				echo "</div>";

				echo "<div>";
				echo "<label class = 'admin_form-label'>Имя врача</label>";
				echo "<input type= 'text' name= 'doctor_name' required />";
				echo "</div>";

				echo "<div>";
				echo "<label class = 'admin_form-label'>Фамилия врача</label>";
				echo "<input type= 'text' name= 'doctor_surname' required />";
				echo "</div>";

				echo "<div>";
				echo "<label class = 'admin_form-label'>Отчество врача</label>";
				echo "<input type= 'text' name= 'doctor_patronymic' required />";
				echo "</div>";

				echo "<div>";
				echo "<label class = 'admin_form-label'>Фото врача</label>";
				echo "<input type= 'file' name= 'doctor_photo' required />";
				echo "</div>";

				echo "<div>";
				echo "<label class = 'admin_form-label'>Профессия врача</label>";
				echo "<select name = doctor_profession class = 'form-control-sm'>";
				$profession =  R::getALL('select  profession.name,profession.id from profession');

				    foreach ($profession as $profession) {
				      	echo "<option value = ".$profession['id'].">" .$profession['name']. "</option>";
				      }	

				echo "</select>";
				echo "</div>";

				echo "<div>";
				echo "<label class = 'admin_form-label'>Тип услуги, которую предоставляет врач</label>";
				echo "<select name = doctor_service_type class = 'form-control-sm'>";
				$service_type =  R::getALL('select  services_type.type, services_type.id from services_type');

				    foreach ($service_type as $service_type) {
				      	echo "<option value = ".$service_type['id'].">" .$service_type['type']. "</option>";
				      }
						 
				echo "</select>";
				echo "</div>";

				echo "<div>";
				echo "<label class = 'admin_form-label'>Опыт работы врача</label>";
				echo "<input type= 'number' name= 'doctor_experience' required />";
				echo "</div>";

				echo "<div>";
				echo "<label class = 'admin_form-label'>Кабинет врача</label>";
				echo "<input type= 'number' name= 'doctor_cabinet' required />";
				echo "</div>";


				echo "<div class='admin_form-div'>";
				echo "<input type = submit value = 'Добавить' name = 'doctor_exet' class='btn btn-success'><br>";
				echo "</div>";

			echo "</form>";
			echo "</div>";

				if(isset($_POST['doctor_exet'])){

						$doctor = R::dispense('doctors');
						$doctor->login = $_POST['doctor_login'];
						$doctor->password = $_POST['doctor_password'];
						$doctor->name = $_POST['doctor_name'];
						$doctor->surname = $_POST['doctor_surname'];
						$doctor->patronymic = $_POST['doctor_patronymic'];
						$doctor->id_profession = $_POST['doctor_profession'];
						$doctor->id_service_type = $_POST['doctor_service_type'];
						$doctor->experience = $_POST['doctor_experience'];
						$doctor->cabinet = $_POST['doctor_cabinet'];


						R::store($doctor);}

					?>
						

				<div class="admin_tables_change-div">
					<button type="button" class="btn btn-danger btn-sm admin_tables_change-button">Изменить врача</button>
				</div>

				<?php

				$doctor_change = R::exec('select doctors.login,doctors.password,doctors.name,doctors.surname,
					doctors.patronymic,doctors.photo,profession.name,services_type.type,doctors.experience,
					doctors.cabinet
							from doctors 
							inner join profession on doctors.id_profession=profession.id 
							inner join services_type on doctors.id_service_type=services_type.id');

				echo "<div class='admin_form admin_form-change'>";
				echo "<form action = '' method='post'>";	



				echo "<div>";
				echo "<label class = 'admin_form-label'>ID врача</label>";
				echo "<select name = doctor_id_change class = 'form-control-sm'>";
				$doctor_id_change=  R::getALL('select  id from doctors');

				    foreach ($doctor_id_change as $doctor_id) {
				      	echo "<option value = ".$doctor_id['id'].">" .$doctor_id['id']. "</option>";
				      }			

				echo "</select>";
				echo "</div>";


				echo "<div>";
				echo "<label class = 'admin_form-label'>Логин врача</label>";
				echo "<input type= 'text' name= 'doctor_login_change' required />";
				echo "</div>";


				echo "<div>";
				echo "<label class = 'admin_form-label'>Пароль врача</label>";
				echo "<input type= 'password' name= 'doctor_password_change' required />";
				echo "</div>";

				echo "<div>";
				echo "<label class = 'admin_form-label'>Имя врача</label>";
				echo "<input type= 'text' name= 'doctor_name_change' required />";
				echo "</div>";

				echo "<div>";
				echo "<label class = 'admin_form-label'>Фамилия врача</label>";
				echo "<input type= 'text' name= 'doctor_surname_change' required />";
				echo "</div>";

				echo "<div>";
				echo "<label class = 'admin_form-label'>Отчество врача</label>";
				echo "<input type= 'text' name= 'doctor_patronymic_change' required />";
				echo "</div>";

				echo "<div>";
				echo "<label class = 'admin_form-label'>Фото врача</label>";
				echo "<input type= 'file' name= 'doctor_photo_change' required />";
				echo "</div>";

				echo "<div>";
				echo "<label class = 'admin_form-label'>Профессия врача</label>";
				echo "<select name = doctor_profession_change class = 'form-control-sm'>";
				$doctor_profession_change =  R::getALL('select  profession.name,profession.id from profession');


				    foreach ($doctor_profession_change as $doctor_profession_change) {
				      	echo "<option value = ".$doctor_profession_change['id'].">" 
				      					.$doctor_profession_change['name']. 
				      		 "</option>";
				      }
				  

				echo "</select>";
				echo "</div>";


				echo "<div>";
				echo "<label class = 'admin_form-label'>Тип услуги, которую предоставляет врач</label>";
				echo "<select name = doctor_service_type_change class = 'form-control-sm'>";
				$service_type_change =  R::getALL('select  services_type.type, services_type.id from services_type');


				    foreach ($service_type_change as $service_type_change) {
				      	echo "<option value = ".$service_type_change['id'].">" 
				      				.$service_type_change['type']. 
				      		 "</option>";
				      }
				  

				echo "</select>";
				echo "</div>";

				echo "<div>";
				echo "<label class = 'admin_form-label'>Опыт работы врача</label>";
				echo "<input type= 'number' name= 'doctor_experience_change' required />";
				echo "</div>";

				echo "<div>";
				echo "<label class = 'admin_form-label'>Кабинет врача</label>";
				echo "<input type= 'number' name= 'doctor_cabinet_change' required />";
				echo "</div>";

				echo "<div class='admin_tables_change-div'>";
				echo "<input type = submit value = 'Изменить' name = 'doctor_change' class='btn btn-warning'>";
				echo "</div>";

				echo "</form>";
				echo "</div>";

				if(isset($_POST['doctor_change'])){

				$doctor_change = R::load('doctors',$_POST['doctor_id_change']);
				$doctor_change->login = $_POST['doctor_login_change'];
				$doctor_change->password = $_POST['doctor_password_change'];
				$doctor_change->name= $_POST['doctor_name_change'];
				$doctor_change->surname = $_POST['doctor_surname_change'];
				$doctor_change->patronymic = $_POST['doctor_patronymic_change'];
				$doctor_change->photo = $_POST['doctor_photo_change'];
				$doctor_change->id_profession = $_POST['doctor_profession_change'];
				$doctor_change->id_service_type = $_POST['doctor_service_type_change'];
				$doctor_change->experience = $_POST['doctor_experience_change'];
				$doctor_change->cabinet = $_POST['doctor_cabinet_change'];
					R::store($doctor_change);
		}






				$doctor_see = R::getAll('select doctors.id,doctors.login,doctors.password,
										 doctors.name as doctorName,doctors.surname,
										 doctors.patronymic,doctors.photo,
										 profession.name as professionName,services_type.type,doctors.experience,
										 doctors.cabinet
										 from doctors 
										 inner join profession on doctors.id_profession=profession.id 
										 inner join services_type on doctors.id_service_type=services_type.id');
				
			if($doctor_see){
				echo '<table class="table table-sm table-hover table_admin" border = "1">';
					echo "<thead class='thead-dark'>";
					echo "<tr>";
					echo "<th>ID</th>" ;
					echo "<th>Логин</th>";
					echo "<th>Пароль</th>"; 
					echo "<th>Имя</th>";
					echo "<th>Фамилия</th>"; 
					echo "<th>Отчество</th>";
					echo "<th>Фото</th>";
					echo "<th>Профессия</th>";
					echo "<th>Тип услуги</th>";
					echo "<th>Опыт работы</th>";
					echo "<th>Кабинет</th>";
					echo "<th></th>";
					echo "</tr>";
					echo "</thead>";

					echo "<tbody>";
					foreach ($doctor_see as $doctor_see) {

						echo "<tr>";
						echo "<th>" . $doctor_see['id'] . "</th>" ;
						echo "<td>" . $doctor_see['login'] . "</td>" ;
						echo "<td>" . $doctor_see['password'] . "</td>";
						echo "<td>" . $doctor_see['doctorName'] . "</td>"; 
						echo "<td>" . $doctor_see['surname'] . "</td>";
						echo "<td>" . $doctor_see['patronymic'] . "</td>"; 
						echo "<td>" . $doctor_see['photo'] . "</td>";
						echo "<td>" . $doctor_see['professionName'] . "</td>"; 
						echo "<td>" . $doctor_see['type'] . "</td>";
						echo "<td>" . $doctor_see['experience'] . "</td>";
						echo "<td>" . $doctor_see['cabinet'] . "</td>";
						echo "<td>
								<a href='admin.php?delDoctor_id= ".$doctor_see['id']."
												   &root1=".$root1."
							 					   &root2=".$root2."
							 					   &doctorId=".$doctorId."' title = 'Удалить?'>
									<i class='fas fa-trash-restore'></i>
								</a>
							  </td>";
						echo "</tr>";
							

						}
					echo "</tbody>";

					}

				echo "</table>";



				if (isset($_GET['delDoctor_id'])) {
					$del = R::exec('SET foreign_key_checks = 0; Delete from doctors where id = ?'
						   ,array($_GET['delDoctor_id']));

				 }?>
	</div>


