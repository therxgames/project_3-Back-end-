<?php require "database/db.php";?>
<!DOCTYPE html>
<html lang="en">
<head>

<?php
		$title = "Главная";
		require_once "blocks/head.php" ;
?>

</head>
<body>
	
	<?php 
	      require_once "blocks/form.php";
		  require_once "blocks/header.php";
	      require_once "blocks/navigation.php";

	      $services_type = R::getAll('select distinct 
	      							services_type.type,services_type.id,services_type.img
                                    from services_type inner join services_name
                                    on services_type.id = services_name.id_type');

          $services_name = R::getAll('select 
          					   services_name.id,services_name.description,
                               services_name.name,services_name.id_type,services_name.price 
                               from services_type
                               inner join services_name on services_type.id = services_name.id_type');?>
    
    <div class="services"> 
	
		<div class = "services_wrap">

			<?php
		          foreach($services_type as $servicesType){
		          	echo "<div class = 'qwer'>";
		          	echo "<h3 class = 'services_type-type'>" . $servicesType['type'] . "</h3>";
		          	
		          	echo "<div class = 'services_wrap_content'>";

		          	echo "<div class = 'services_type'>";
					echo "<img src = '". $servicesType['img'] ."' width = '325px' height = '250px' />";
					echo "</div>";


					echo "<div class = 'services_name'>";

					foreach($services_name as $servicesName){
						echo "<div class = 'services_name_content'>";
						if($servicesName['id_type'] == $servicesType['id']){


								echo "<div class = 'services_name-name'>";
									echo "<p>" . $servicesName['name'] .  "</p>"; 
								echo "</div>";

								echo "<div class = 'services_name-button'>";
								echo "<a class = 'services_name-button-href' href='doctor_choice.php
													?servicesId=". $servicesName['id'] ."
													&servicesName=".$servicesName['name']."
													&servicesType=".$servicesType['id']."
													&price=".$servicesName['price']."
													&description=".$servicesName['description']."' >
														Подробнее об услуге
												</a>";
								echo "</div>";			
						}
						echo "</div>";
					 }
					 echo "</div>";
					 echo "</div>";
					 echo "</div>";
		        }
			?>

		</div>

	</div>

	



	<?php 
		require_once "blocks/footer.php";
		require_once "blocks/scripts.php";
	?>


</body>