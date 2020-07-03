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
	?>

<!-- СЛАЙДЕР -->
	<div class="slider">
		    <div class="slider__wrapper">
		      <div class="slider__items">
		        <div class="slider__item">
		        	<div class="slider__item__wrap__1">
		          		<div class="slider__item__1">
		          			<h1>Мы всегда доступны для клиентов<br> с зубными проблемами.</h1>
		          			<p>Вы можете легко связаться с нами по телефону, указанному ниже</p>
		          			<h2>555–123–2323</h2>
		          		</div>
		          	</div>
		        </div>
		        <div class="slider__item">
		        	<div class="slider__item__wrap__2">
		          		<div class="slider__item__2">
		          			<h1>Назначения</h1>
		          			<h2>Записаться на прием в нашей стоматологической клинике так же просто, как это возможно ...</h2>
		          			<h3>Вы сможете назначить удобное время для встречи с нашими стоматологами всего за 2 клика!</h3>
		          			<button class="autorize-btn book_appointment ">Записаться на прием</button>
		          		</div>
		          	</div>
		        </div>
		        <div class="slider__item">
		          <div class="slider__item__wrap__3">
		          		<div class="slider__item__3">
		          			<h1>Доктор<br> Леонид Брежнев</h1>

		          			<button class="book_appointment_2 autorize-btn">Записаться на прием</button>
		          		</div>
		          </div>
		        </div>

		      </div>
		    </div>

  	</div>


	<!-- НАШИ УСЛУГИ -->



  	<div class="our_services">
  			<div class="our_services_wrap">
  				<div class="our_services-title">
  					Наши услуги
  				</div>


  			<div class="services_list">
				<?php

					$servicesType= R::getALL('select  type,img from services_type where id < 5');
					foreach ($servicesType as $servicesType) {
						echo    "<div class='services_list-block'>";
		  				echo	  "<img src='" . $servicesType['img'] . "'alt='' 
		  							   class = 'services_list-image' 
		  							   width='280px' height='220px' /> "; 
		  				echo      "<div class='services_list-title'>";
		  				echo         "<a href='#'>" . $servicesType['type'] . "</a>";
		  				echo      "</div>";
	  					echo    "</div>";
					}
				?>
  			</div>
  					
  				<button class="services_list-btn">
  					<a href="/services.php">Посмотреть все услуги</a>
  				</button>
  			</div>
  	</div>


	<!-- ПОМОЩЬ И КНОПКА ЗАПИСАТЬСЯ К ВРАЧУ -->

	<div class="help">
		<div class="help_wrap">
			<div class="help_text">
				<div class="help_text-help">Как мы можем помочь ...</div>
				<div class="help_text-procedure">Мы предлагаем широкий спектр процедур, которые помогут вам получить идеальную улыбку.</div>
			</div>
			<div class="help_button">
				<button class = "help_button-btn autorize-btn"><a href="#">Записаться на прием</a></button>
			</div>
		</div>
	</div>


	<!-- ОТЗЫВЫ -->



	<div class="reviews">
			<div class="reviews_wrap">
				<h1 class="reviews-title">Что говорят наши пациенты</h1>
				<div class="reviews_list">

					<div class="reviews_list-block">
						<img width="100px" height="100px" src="img/youtube.png" alt=""
							 class="client-photo">
						<div class="review">Я срочно нуждался в стоматологической помощи 4 июля. И несмотря на то, что все другие клиники были закрыты, BeDentist принял мое назначение!</div>
						<div class="client-name">Herbert Wallace - May 10, 2016</div>
					</div>

					<div class="reviews_list-block">
						<img width="100px" height="100px" src="img/youtube.png" alt=""
							 class="client-photo">
						<p class="review">Сравнивая цены на отбеливание зубов здесь и в других местах, я выбрал BeDentist. Результат превзошел все мои ожидания!</p>
						<p class="client-name">Gary Growles – May 10, 2016</p>
					</div>

					<div class="reviews_list-block">
						<img width="100px" height="100px" src="'img/youtube.png" alt=""
							 class="client-photo">
						<p class="review">Отвести моих детей к стоматологу никогда не было так просто. Им просто понравилась гостеприимная и теплая атмосфера!</p>
						<p class="client-name">Daniela Robbery – May 10, 2016</p>
					</div>

				</div>
			</div>
	</div>



	<?php 
		require_once "blocks/footer.php";
		require_once "blocks/scripts.php";
	?>


</body>