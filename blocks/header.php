		<div class="header_top">	
			<div class ="header_top_wrap">
				
				<div class ="header_social">
						<ul>
							<li>
								<a href="#">
									<img width="25px" height="25px" src="img/twitter.png" alt=""
									class="icon">
								</a>
							</li>
							<li>
								<a href="#">
									<img width="35px" height="35px" src="img/google+.png" alt=""
									class="icon">
								</a>
							</li>
							<li>
								<a href="#">
									<img width="30px" height="30px" src="img/youtube.png" alt=""
									class="icon">
								</a>
							</li>
							<li>
								<a href="#">
									<img width="35px" height="35px" src="img/vk.png" alt=""
									class="icon">
								</a>
							</li>
							
						</ul>
				</div>


			<?php if (isset($_SESSION['logged_user'])) : 

		       echo "<h2 class = 'header_greeting'>
		       				Здравствуйте " . $_SESSION['logged_user'][0]['name'] . " " . $_SESSION['logged_user'][0]['surname'] . 
		       		"</h2>";
		    ?>

				<div class = "header_record">
								<button>
									<a href="history.php" >Моя история</a>
								</button>
								<button>
									<a href="logout.php">Выйти</a>
								</button>
				</div>
						
			</div>

			<?php else : ?>
						<div class = "header_record">
								<button>
									<a href="#" class="autorize-btn">Войти</a>
								</button>
							</div>
						
						</div>
			<?php endif;  ?>

			

		</div>

		<div class="header_bot">
			<div class="logo">
				<img src="img/logo.jpg" width="50px" height="70px">
			</div>
			<div class="info">

					<div class="info-block">
						<img src="img/phone.jpg" width="40px" height="40px" class="icon-phone">
						<div class="info-block-text block-one">
							<p class="info-block-text-title">
								Наши телефоны:</p>
							<p>
								<span>555–123–2323</span>; 
								<span>555–123–2323</span>
							</p>
						</div>
					</div>

					<div class="info-block ">
						<img src="img/clock.jpg" width="45px" height="45px" class="icon-phone">
						<div class="info-block-text">
							<p class="info-block-text-title">
								Время работы:</p>
							<p>
								<span>Пн-Вт: 8:00-18:00</span>; 
								<span>Сб-Вс: 9:00-15:00</span>
							</p>
						</div>
					</div>

			</div>	
		</div>

	</header>