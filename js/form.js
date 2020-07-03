function autorizeWin() {
 
                let button = document.querySelectorAll('.autorize-btn');
                let container = document.querySelector('.form_container');
                let form = document.querySelector('.form-wrapper');
                let come = document.querySelector('.contact-form__title');



                button.forEach(item => {
                    item.addEventListener('click', function(){
                    form.style.display = "block";
                    container.style.display = "block";
                    item.innerHTML.trim() == "Войти" ? come.innerHTML = "Авторизуйтесь" 
                    :come.innerHTML = "Для записи на прием нужно авторизоваться";
                    

                });
                } );


                container.addEventListener('click', function(){
                	form.style.display = "none";
                    container.style.display = "none";
                })
                
            }

autorizeWin();