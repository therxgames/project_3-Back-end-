<?php


	if(isset($_POST['do_login'])) // если была нажата кнопка
	{
		$errors = array();
		$patient = R::getAll('select id,name,surname,patronymic,birthday,police,passport
						      from patients where 
			                  name = ? && surname = ? && patronymic = ? && birthday = ? && police = ? &&
                              passport = ? ', 
                              array($_POST['name'] , $_POST['surname'], $_POST['patronymic'],
                              $_POST['birthday'],$_POST['police'],$_POST['passport']));
       
		if($patient)
		{	
				$_SESSION['logged_user'] = $patient;

		} else
		{
			echo'<div style="color:red; text-align:center">Такого пациента нету в базе данных больницы!!!</div><hr>';
		}


	}
	?>
<div class="form_container"></div>
    <div class="form-wrapper">

        <form class="contact-form" method="POST" action = 'index.php'>
            <p class="contact-form__title">Для записи на прием нужно авторизоваться</p>
            <div class="contact-form__input-wrapper">
                <input name="name" type="text" class="contact-form__input contact-form__input_name"
                    placeholder="Введите ваше имя" value = "<?php echo @$_POST['name'];?>" required>
            </div>

            <div class="contact-form__input-wrapper">
                <input name="surname" type="text" class="contact-form__input contact-form__input_name"
                    placeholder="Введите вашу фамилию" value = "<?php echo @$_POST['surname'];?>" required>

            </div>

            <div class="contact-form__input-wrapper">
                <input name="patronymic" type="text" class="contact-form__input contact-form__input_name"
                    placeholder="Введите ваше отчество" value = "<?php echo @$_POST['patronymic'];?>" required>
            </div>

            <div class="contact-form__input-wrapper">
                <input name="birthday" type="date" class="contact-form__input contact-form__input_name"
                    placeholder="Введите дату рождения ДД/ММ/ГГ" value = "<?php echo @$_POST['birthday'];?>" required>
            </div>         

            <div class="contact-form__input-wrapper">
                <input name="police" type="number" class="contact-form__input contact-form__input_name"
                    placeholder="Введите ваш номер полиса ОМС" value = "<?php echo @$_POST['police'];?>" required>
            </div>

            <div class="contact-form__input-wrapper">
                <input name="passport" type="number" class="contact-form__input contact-form__input_name"
                  placeholder="Введите номер паспорта" value = "<?php echo @$_POST['passport'];?>" required>
            </div>
            


            <button class="contact-form__button" type="submit" name="do_login"> Войти </button>
        </form>

        <div id="shadow"></div>
        
    </div>
