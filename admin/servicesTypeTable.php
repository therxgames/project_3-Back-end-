	<button type="button" class="btn btn-primary btn-md admin_tables_wrap-button">Таблица виды услуг</button>
		<div class="admin_tables_wrap">

			<div class="admin_tables_add-div">
				<button type="button" class="btn btn-danger btn-sm admin_tables_add-button">
					Добавить вид услуги
				</button>
			</div>

			<?php
			echo "<div class='admin_form admin_form-add'>";
			echo "<form action = '' method='post'>";
				
			echo "<div>";
			echo "<label class = 'admin_form-label'>Название вида услуги</label>";
			echo "<input type= 'text' name= 'service_type_type' required />";
			echo "</div>";

			echo "<div>";
			echo "<label class = 'admin_form-label'>Изображение услуги</label>";
			echo "<input type= 'file' name= 'service_type_img' required />";
			echo "</div>";

			echo "<div class='admin_form-div'>";
			echo "<input type = submit value = 'Добавить' name = 'service_type_exet' class='btn btn-success'><br>";
			echo "</div>";

			echo "</form>";
			echo "</div>";

			if(isset($_POST['service_type_exet'])){

					R::ext('xdispense', function($table_name){
					return R::getRedBean()->dispense($table_name);
					});


					$service_type = R::xdispense('services_type');
					$service_type->type = $_POST['service_type_type'];
					$service_type->img = $_POST['service_type_img'];
					R::store($service_type);
					
				}?>



				<div class="admin_tables_change-div">
					<button type="button" class="btn btn-danger btn-sm admin_tables_change-button">Изменить вид услуги</button>
				</div>



			<?php

			$service_type_change = R::exec('select id,type,img from services_type');


			echo "<div class='admin_form admin_form-change'>";
			echo "<form action = '' method='post'>";


			echo "<div>";
			echo "<label class = 'admin_form-label'>ID вида услуги</label>";
			echo "<select name = service_type_id_change class = 'form-control-sm'>";
			$service_type_id_change=  R::getALL('select  id from services_type');
			    foreach ($service_type_id_change as $service_type_id) {
			      	echo "<option value = ".$service_type_id['id'].">" .$service_type_id['id']. "</option>";
			      }					
			echo "</select>";
			echo "</div>";

			echo "<div>";
			echo "<label class = 'admin_form-label'>Название вида услуги</label>";
			echo "<input type= 'text' name= 'services_type_type_change' required />";
			echo "</div>";

			echo "<div>";
			echo "<label class = 'admin_form-label'>Изображение услуги</label>";
			echo "<input type= 'file' name= 'services_type_img_change' required />";
			echo "</div>";

			echo "<div class='admin_tables_change-div'>";
			echo "<input type = submit value = 'Изменить' name = 'services_type_change' class='btn btn-warning'><br>";
			echo "</div>";

			echo "</form>";
			echo "</div>";


			if(isset($_POST['services_type_change'])){

			$services_type_change = R::load('services_type',$_POST['service_type_id_change']);
			$services_type_change->type = $_POST['services_type_type_change'];
			$services_type_change->img = $_POST['services_type_img_change'];

			R::store($services_type_change);
			}





			$services_type_see = R::getAll('select id,type,img from services_type');
			
			if($services_type_see){
				echo '<table class="table table-sm table-hover table_admin" border = "1">';
				
					echo "<thead class='thead-dark'>";

					echo "<tr>";
					echo "<th>ID</th>" ;
					echo "<th>Название вида услуги</th>";
					echo "<th>Изображение вида услуги</th>";
					echo "<th></th>";
					echo "</tr>";
					echo "</thead>";

					echo "<tbody>";
					foreach ($services_type_see as $services_type_see) {

						echo "<tr>";
						echo "<th>" . $services_type_see['id'] . "</th>" ;
						echo "<td>" . $services_type_see['type'] . "</td>" ;
						echo "<td>" . $services_type_see['img'] . "</td>" ;
						echo "<td>
								<a href='admin.php?delServiceType_id= ".$services_type_see['id']."
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


			if (isset($_GET['delServiceType_id'])) {
				$del = R::exec('SET foreign_key_checks = 0; Delete from services_type 
								where id = ?',array($_GET['delServiceType_id']));
			 }?>

</div>