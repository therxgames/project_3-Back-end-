<?php require "../database/dbAdmin.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Авторизация</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="../css/admin.css">
</head>
<body>






<?php


	if(isset($_POST['autorize'])){
					
			$operator = R::getAll( 'select id,login,password,id_root from operator
										   where login = ? && password = ?' , 
										   array($_POST['login'], $_POST['password']));

			$doctor = R::getAll( 'select id,login, password,id_root from doctors
										   where login = ? && password = ?' , 
										   array($_POST['login'], $_POST['password']));
			if($operator || $doctor){

				$_SESSION['logged_admin'] = $admin_log;
				$done =  "<h4 style='text-align:center'>Вы успешно авторизовались<br>
							 <a href = 'admin.php?root1=".$operator[0]['id_root']."
							 					  &root2=".$doctor[0]['id_root']."
							 					  &doctorId=".$doctor[0]['id']."'>
								Перейти в админ панель
							 </a>
						  </h4>";

			}

			else{
				$errors = "<h4 style='text-align:center'>Пользователь с таким логином не найден!</h4>"; }
			}
?>



		<div class='container'>
				 <div class='row'>

					 <div class='col-md-offset-3 col-md-6'>
						 <form class='form-horizontal' action='admin_autorization.php' method='POST'>
							 <span class='heading'>Войти</span>

								 <div class='form-group'>
									 <input type='text' class='form-control' id='inputEmail' name='login' placeholder='Логин' value = "<?php echo @$_POST['login'];?>">
									 <i class='fa fa-user'></i>
								 </div>

								 <div class='form-group help'>
									 <input type='password' class='form-control' id='inputPassword' 
									 		name= 'password' placeholder='Пароль' 
									 		value = "<?php echo @$_POST['password'];?>">
									 <i class='fa fa-lock'></i>
								 </div>
								 <img src="Screenshot_2.jpg">
								 <div class="form-group" style="display:flex;justify-content: center">
									 <button type='submit' class='btn btn-default' name = 'autorize'>
									 		ВХОД
									 </button>
								 </div>
							 	<?php echo $errors; ?>
							 	<?php echo $done; ?>
							 </div>
						 </form>
					 </div>

				 </div>
		</div>";
		<!-- добавление элемента div -->



</body>
</html>