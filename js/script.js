var checkboxes = document.getElementsByTagName('input');

for (var i=0; i<checkboxes.length; i++)  {
  if (checkboxes[i].type == 'checkbox')   {
    checkboxes[i].checked = false;
  }
}

function show_pass() {
  var x = document.getElementById('pwd');
  var y = document.getElementById('rpwd');
  var z = document.getElementById('opwd');
  if (x.type === 'password') {
    x.type = 'text';
  } else {
    x.type = 'password';
  }
  if (y.type === 'password') {
    y.type = 'text';
  } else {
    y.type = 'password';
  }
  if (z.type === 'password') {
    z.type = 'text';
  } else {
    z.type = 'password';
  }
}

function check_email() { 
	var email = document.getElementById('email');
	var valid_email = /^(([^<>()[\]\\.,;:\s@']+(\.[^<>()[\]\\.,;:\s@']+)*)|('.+'))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	if(email.value.match(valid_email))
		{
		document.getElementById('message0').style.color = 'green';
		document.getElementById('message0').innerHTML = 'Email valida.';
		return true;
	}
	else
	{
		document.getElementById('message0').style.color = '#EB0000';
		document.getElementById('message0').innerHTML = 'Email non valida.';
		return false;
	}
}

function check_pwd() { 
	var pwd = document.getElementById('pwd');
	var valid_pwd = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,50}$/;
	if(pwd.value.match(valid_pwd)) 
		{
		document.getElementById('message1').style.color = 'green';
		document.getElementById('message1').innerHTML = 'Password valida.</br>';
		return true;
	}
	else
	{
		document.getElementById('message1').style.color = '#EB0000';
		document.getElementById('message1').innerHTML = 'Password non valida: deve essere lunga almeno 8 caratteri, contenere almeno una lettera maiuscola, una minuscola e un numero.';
		return false;
	}
}

function confirm_pwd() {
	var pwd = document.getElementById('pwd');
	var rpwd = document.getElementById('rpwd');
	if(pwd.value == rpwd.value && pwd.value != "" && rpwd.value != "") 
		{
		document.getElementById('message2').style.color = 'green';
		document.getElementById('message2').innerHTML = 'Le password corrispondono.';
		return true;
	}
	else
	{
		document.getElementById('message2').style.color = '#EB0000';
		document.getElementById('message2').innerHTML = 'Le password non corrispondono.';
		return false;
	}
}

function check_all() {
	var button = document.getElementById('register_btn');
	if(check_email() && check_pwd() && confirm_pwd())	{
		button.disabled = false;
		button.tabIndex = 0;
	}
	else {
		button.disabled = true;
	}
}

function check_empty() {
	var button = document.getElementById('login_btn');
	var email = document.getElementById('email');
	var pwd = document.getElementById('pwd');
	if((email.value == '') || (pwd.value == ''))	{
		button.disabled = true;
	}
	else {
		button.disabled = false;
		button.tabIndex = 0;
	}
}

function check_empty_art() {
	var button = document.getElementById('submit');
	var description = document.getElementById('description');
	var keywords = document.getElementById('keywords');
	var file = document.getElementById('uploadImage');
	if((description.value == '') || (keywords.value == '') || (file.files.length == 0))	{
		button.disabled = true;
		document.getElementById('message').style.color = '#EB0000';
		document.getElementById('message').innerHTML = 'I campi descrizione, parole chiave ed immagine non possono essere vuoti';
	}
	else {
		button.disabled = false;
		document.getElementById('message').innerHTML = '';
		button.tabIndex = 0;
	}
}

function check_size() {
	var button = document.getElementById('submit');
	var file = document.getElementById('uploadImage');
	if(file.files[0].size > 5000000)	{
		file.value = "";
		button.disabled = true;
		document.getElementById('message').style.color = '#EB0000';
		document.getElementById('message').innerHTML = 'File troppo grande (massimo 5MB)';
	}
	else {
		button.disabled = false;
		document.getElementById('message').innerHTML = '';
	}
}

function show_file_name() {
	var file = document.getElementById('uploadImage');
	if (file.files.length == 0) {
		document.getElementById('file-selected').innerHTML = 'Nessuna immagine selezionata';
	}
	else {
		document.getElementById('file-selected').innerHTML = file.files[0].name;
	}
}