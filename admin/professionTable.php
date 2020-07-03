<button type="button" class="btn btn-primary btn-md admin_tables_wrap-button">Таблица профессий врачей</button> 
	<div class="admin_tables_wrap">

		<div class="admin_tables_add-div">
			<button type="button" class="btn btn-danger btn-sm admin_tables_add-button">
				Добавить профессию врача
			</button>
		</div>


		<?php
			echo "<div class='admin_form admin_form-add'>";
			echo "<form action = '' method='post'>";
				
				echo "<div>";
				echo "<label class = 'admin_form-label'>ID профессии врача</label>";
				echo "<input type= 'text' name= 'profession_id' required />";
				echo "</div>";

				echo "<div>";
				echo "<label class = 'admin_form-label'>Название профессии врача</label>";
				echo "<input type= 'text' name= 'profession_name' required />";
				echo "</div>";

				echo "<div class='admin_form-div'>";
				echo "<input type = submit class='btn btn-success' value = 'Добавить' name = 'profession_exet'><br>";
				echo "</div>";

			echo "</form>";
			echo "</div>";

			if(isset($_POST['profession_exet'])){

					$profession = R::dispense('profession');
					$profession->id = $_POST['profession_id'];
					$profession->name = $_POST['profession_name'];
					R::store($profession);
				}?>


				<div class="admin_tables_change-div">
					<button type="button" class="btn btn-danger btn-sm admin_tables_change-button">Изменить профессию</button>
				</div>


			<?php
			$profession_change = R::exec('select name from profession');


				echo "<div class='admin_form admin_form-change'>";
				echo "<form action = '' method='post'>";	

				echo "<div>";
				echo "<label class = 'admin_form-label'>ID профессии</label>";
				echo "<select name = profession_id_change class = 'form-control-sm'>";
				$profession_id_change=  R::getALL('select  id from profession');
				    foreach ($profession_id_change as $profession_id) {
				      	echo "<option value = ".$profession_id['id'].">" .$profession_id['id']. "</option>";
				      }					
				echo "</select>";
				echo "</div>";

				echo "<div>";
				echo "<label class = 'admin_form-label'>Название профессии врача</label>";
				echo "<input type= 'text' name= 'profession_name_change' required />";
				echo "</div>";

				echo "<div class='admin_tables_change-div'>";
				echo "<input type = submit value = 'Изменить' name = 'profession_change' class='btn btn-warning'><br>";
				echo "</div>";

				echo "</form>";
				echo "</div>";


				if(isset($_POST['profession_change'])){

				$profession_change = R::load('profession',$_POST['profession_id_change']);
				$profession_change->name = $_POST['profession_name_change'];

				R::store($profession_change);}




			$profession_see = R::getAll('select id,name from profession');
			
			if($profession_see){
				echo '<table class="table table-sm table-hover table_admin" border = "1">';
				echo "<thead class='thead-dark'>";
				echo "<tr>";
				echo "<th>ID</th>" ;
				echo "<th>Название профессии</th>";
				echo "<th></th>";
				echo "</tr>";
				echo "</thead>";


				echo "<tbody>";
				foreach ($profession_see as $profession_see) {

					echo "<tr>";
					echo "<td>" . $profession_see['id'] . "</td>" ;
					echo "<td>" . $profession_see['name'] . "</td>" ;
					echo "<td class = 'text-center'>
								<a href='admin.php?delProfession_id=".$profession_see['id']."
												   &root1=".$root1."
							 					   &root2=".$root2."
							 					   &doctorId=".$doctorId."' title = 'Удалить?'>
									<i class='fas fa-trash-restore'></i>
						  </a></td>";
					echo "</tr>";
						

					}
				echo "</tbody>";

				}

			echo "</table>";


			if (isset($_GET['delProfession_id'])) {
				$del = R::exec('SET foreign_key_checks = 0; Delete from profession where id = ?',array($_GET['delProfession_id']));
			 }?>

</div>