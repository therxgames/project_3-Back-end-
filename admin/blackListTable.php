	<button type="button" class="btn btn-primary btn-sm">Таблица черный список</button>
		<div class="admin_tables_wrap">

			<div class="admin_tables_add-div">
				<button type="button" class="btn btn-danger btn-sm admin_tables_add-button">
					Добавить в черный список
				</button>
			</div>

					<?php
					echo "<div class='admin_form admin_form-add'>";
					echo "<form action = '' method='post'>";

					echo "<div>";
					echo "<label class = 'admin_form-label'>ID пациента</label>";
					echo "<select name = 'black_list_passport' class = 'form-control-sm'>";
					$black_list =  R::getALL('select  id from patients');


					    foreach ($black_list as $black_list) {
					      	echo "<option value = ".$black_list['id'].">" .$black_list['id']. "</option>";
					      }
					 

					echo "</select><br>";
					echo "</div>";


					echo "<div class='admin_tables_change-div'>";
					echo "<input type = submit value = 'Добавить' name = 'black_list_exet' class='btn btn-warning'><br>";
					echo "</div>";

					echo "</form>";
					echo "</div>";

					if(isset($_POST['black_list_exet'])){

							R::ext('xdispense', function($table_name){
							return R::getRedBean()->dispense($table_name);
							});


							$black_list = R::xdispense('black_list');
							$black_list->id_patient = $_POST['black_list_passport'];

							R::store($black_list);
							}?>



					<?php
					echo '<table border="1">';

					$black_list_see = R::getAll('select black_list.id,patients.name,patients.surname,
												patients.patronymic,patients.birthday
												from black_list
												inner join patients on black_list.id_patient = patients.id');

					if($black_list_see){
						echo '<table class="table table-sm table-hover table_admin" border = "1">';

						echo "<thead class = 'thead-dark'>";

						echo "<tr>";
						echo "<th>ID</th>" ;
						echo "<th>Имя пациента</th>";
						echo "<th>Фамилия пациента</th>";
						echo "<th>Отчество пациента</th>";
						echo "<th>День рождения пациента</th>";
						echo "<th></th>";
						echo "</tr>";

						echo "</thead>";
						echo "<tbody>";
						foreach ($black_list_see as $black_list_see) {

							echo "<tr>";
							echo "<th>" . $black_list_see['id'] . "</th>" ;
							echo "<td>" . $black_list_see['name'] . "</td>" ;
							echo "<td>" . $black_list_see['surname'] . "</td>" ;
							echo "<td>" . $black_list_see['patronymic'] . "</td>" ;
							echo "<td>" . $black_list_see['birthday'] . "</td>" ;
							echo "<td>
										<a href='admin.php?delBlackList_id= ".$black_list_see['id']."
														   &root1=".$root1."
									 					   &root2=".$root2."
									 					   &doctorId=".$doctorId."' title = 'Удалить?'>
											<i class='fas fa-trash-restore'></i>
								  </td>";
							echo "</tr>";							

							}

						}

					echo "</table>";
					echo "</div>";
					if (isset($_GET['delBlackList_id'])) {
						$del = R::exec('SET foreign_key_checks = 0; Delete from black_list
										where id = ?',array($_GET['delBlackList_id']));
					 }?>
					

			</div>