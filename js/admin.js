let addButton = document.querySelectorAll('.admin_tables_add-button');
let addForm = document.querySelectorAll('.admin_form-add');


let changeButton = document.querySelectorAll('.admin_tables_change-button');
let changeForm = document.querySelectorAll('.admin_form-change');


const changeOnClickFromBlock = (button,div) =>{

	button.forEach((item,index) => {
	item.addEventListener('click',()  => {
		div[index].style.display == 'block' ? div[index].style.display = 'none' 
											   	  : div[index].style.display = 'block'});
	});
}

let addDateButton = document.querySelectorAll('.record_confirmation-date-label');
let addTimeDiv = document.querySelectorAll('.record_confirmation-time');

function changeOnClickFromFlex(button,div){

	button.forEach((item,index) => {
	item.addEventListener('click',()  => {
		div[index].style.display == 'flex' ? div[index].style.display = 'none' 
											   	  : div[index].style.display = 'flex'});
	});
}

changeOnClickFromBlock(addButton, addForm);
changeOnClickFromBlock(changeButton, changeForm);
changeOnClickFromFlex(addDateButton, addTimeDiv);

