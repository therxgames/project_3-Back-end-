	<button type="button" class="btn btn-primary btn-sm">Таблица названия услуг</button>
		<div class="admin_tables_wrap">

			<div class="admin_tables_add-div">
				<button type="button" class="btn btn-danger btn-sm admin_tables_add-button">
					Добавить название услуги
				</button>
			</div>

					
			<?php
			echo "<div class='admin_form admin_form-add'>";
			echo "<form action = '' method='post'>";
				
			echo "<div>";
			echo "<label class = 'admin_form-label'>Название услуги</label>";
			echo "<input type= 'text' name= 'service_name_name' required />";
			echo "</div>";

			echo "<div>";
			echo "<label class = 'admin_form-label'>Описание услуги</label>";
			echo "<input type= 'text' name= 'service_name_description' required />";
			echo "</div>";

			echo "<div>";
			echo "<label class = 'admin_form-label'>Тип услуги</label>";
			echo "<select name = 'service_name_type' class = 'form-control-sm'>";
			$service_type =  R::getALL('select  services_type.type, services_type.id from services_type');


			    foreach ($service_type as $service_type) {
			      	echo "<option value = ".$service_type['id'].">" .$service_type['type']. "</option>";
			      }
					 

			echo "</select>";
			echo "</div>";

			echo "<div>";
			echo "<label class = 'admin_form-label'>Цена услуги</label>";
			echo "<input type= 'number' name= 'service_name_price' required />";
			echo "</div>";

			echo "<div>";
			echo "<label class = 'admin_form-label'>Длительность услуги</label>";
			echo "<input type= 'time' name= 'service_name_procedure_time' required />";
			echo "</div>";

			echo "<div class='admin_tables_change-div'>";
			echo "<input type = submit value = 'Добавить' name = 'service_name_exet' class='btn btn-warning'><br>";
			echo "</div>";

			echo "</form>";
			echo "</div>";

			if(isset($_POST['service_name_exet'])){

					R::ext('xdispense', function($table_name){
					return R::getRedBean()->dispense($table_name);
					});


					$service_name = R::xdispense('services_name');
					$service_name->name = $_POST['service_name_name'];
					$service_name->description = $_POST['service_name_description'];
					$service_name->id_type = $_POST['service_name_type'];
					$service_name->price = $_POST['service_name_price'];
					$service_name->procedure_time = $_POST['service_name_procedure_time'];
					R::store($service_name);
				}?>



				<div class="admin_tables_change-div">
					<button type="button" class="btn btn-danger btn-sm admin_tables_change-button">Изменить название услуги</button>
				</div>


			<?php

			$service_name_change = R::exec('select 
									id,name,description,id_type,price,procedure_time from services_name');


			echo "<div class='admin_form admin_form-change'>";
			echo "<form action = '' method='post'>";	

			echo "<div>";
			echo "<label class = 'admin_form-label'>ID названия услуги</label>";
			echo "<select name = service_name_id_change class = 'form-control-sm'>";
			$service_name_id_change=  R::getALL('select  id from services_name');

			    foreach ($service_name_id_change as $service_name_id_change) {
			      	echo "<option value = ".$service_name_id_change['id'].">" .$service_name_id_change['id']. "</option>";
			      }		

			echo "</select>";
			echo "</div>";

			echo "<div>";
			echo "<label class = 'admin_form-label'>Название услуги</label>";
			echo "<input type= 'text' name= 'services_name_name_change' required />";
			echo "</div>";

			echo "<div>";
			echo "<label class = 'admin_form-label'>Описание услуги</label>";
			echo "<input type= 'text' name= 'services_name_description_change' required />";
			echo "</div>";

			echo "<div>";
			echo "<label class = 'admin_form-label'>Тип услуги</label>";
			echo "<select name = 'service_name_type_change' class = 'form-control-sm'>";
			$service_name_type =  R::getALL('select  services_type.type, services_type.id from services_type');


			    foreach ($service_name_type as $service_name_type) {
			      	echo "<option value = ".$service_name_type['id'].">" .$service_name_type['type']. "</option>";
			      }
			  
			echo "</select><br>";
			echo "</div>";

			echo "<div>";
			echo "<label class = 'admin_form-label'>Цена услуги</label>";
			echo "<input type= 'number' name= 'services_name_price_change' required />";
			echo "</div>";

			echo "<div>";
			echo "<label class = 'admin_form-label'>Длительность услуги</label>";
			echo "<input type= 'time' name= 'services_name_procedure_time_change' required />";
			echo "</div>";

			echo "<div class='admin_tables_change-div'>"; 
			echo "<input type = submit value = 'Изменить' name = 'services_name_change' class='btn btn-warning'><br>";
			echo "</div>";

			echo "</form>";
			echo "</div>";


			if(isset($_POST['services_name_change'])){

			$services_name_change = R::load('services_name',$_POST['service_name_id_change']);
			$services_name_change->name = $_POST['services_name_name_change'];
			$services_name_change->description = $_POST['services_name_description_change'];
			$services_name_change->id_type = $_POST['service_name_type_change'];
			$services_name_change->price = $_POST['services_name_price_change'];
			$services_name_change->procedure_time = $_POST['services_name_procedure_time_change'];

			R::store($services_name_change);}





			$services_name_see = R::getAll('select 
								services_name.id,services_name.name,services_name.description,services_type.type,
								services_name.price,services_name.procedure_time from services_name
								inner join services_type on services_name.id_type=services_type.id ');
			
			if($services_name_see){
				echo '<table class="table table-sm table-hover table_admin" border = "1">';

				echo "<thead class = 'thead-dark'>";

				echo "<tr>";
				echo "<th>ID</th>" ;
				echo "<th>Название услуги</th>";
				echo "<th>Описание услуги</th>";
				echo "<th>Тип услуги</th>";
				echo "<th>Цена услуги</th>";
				echo "<th>Длительность услуги</th>";
				echo "<th></th>";
				echo "</tr>";

				echo "</thead>";
				echo "<tbody>";
				foreach ($services_name_see as $services_name_see) {

					echo "<tr>";
					echo "<th>" . $services_name_see['id'] . "</th>" ;
					echo "<td>" . $services_name_see['name'] . "</td>" ;
					echo "<td>" . $services_name_see['description'] . "</td>" ;
					echo "<td>" . $services_name_see['type'] . "</td>" ;
					echo "<td>" . $services_name_see['price'] . "</td>" ;
					echo "<td>" . $services_name_see['procedure_time'] . "</td>" ;
					echo "<td>
								<a href='admin.php?delServiceName_id= ".$services_name_see['id']."
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

			if (isset($_GET['delServiceName_id'])) {
				$del = R::exec('SET foreign_key_checks = 0; Delete from services_name 
								where id = ?',array($_GET['delServiceName_id']));}?>
</div>