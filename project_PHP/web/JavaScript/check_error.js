
var cus = [
	{
		name: 'namdang',
		pass: '12345'
	},
	{
		name: 'vinhtran',
		pass: '12345'
	}
]

function account() {
	var name = document.getElementById("input_name").value;
	sessionStorage.setItem('ten', name);

}


function Check_Login() {
	var name = document.getElementById('input_name').value;
	var password = document.getElementById('input_pass').value;
	var j = 0;
	for (var i = 0; i < 2; i++) {
		if (name == cus[i].name && password == cus[i].pass) {
			j++;
			account();
			top.location.href ='t-sport.html';
		}

	}
	if (j == 0) {

		document.getElementById('errname').style.color = 'red';
		document.getElementById('errpass').style.color = 'red';
	}

}


function Check_New_User() {
	var newName = document.getElementById('nameNew').value;
	var phone = document.getElementById('phone').value;
	var email = document.getElementById('email').value;
	var day = document.getElementById('day').value;
	var month = document.getElementById('month').value;
	var year = document.getElementById('year').value;
	var pass = document.getElementById('pass').value;
	var address = document.getElementById('add').value;
	var confirm_pass = document.getElementById('pass-confirm').value;
	
	if (day == "" || month == "" || year == "") {
		document.getElementById('errorBirth-day').style.color = 'red';
	} else if (day != "" || month != "" || year != "") {
		document.getElementById('errorBirth-day').style.coler = 'black';
	}
	if (newName == "") {
		document.getElementById('errorName').style.color = 'red';
	}
	else if (newName != "") {
		document.getElementById('errorName').style.color = 'black';
	}
	if (phone == "") {
		document.getElementById('errorPhone').style.color = 'red';
	} else if (phone != "") {
		document.getElementById('errorPhone').style.color = 'black';
	}
	if (email == "") {


		document.getElementById('errorEmail').style.color = 'red';
	}
	else if (email != "") {
		document.getElementById('errorEmail').style.color = 'black';
	}
	if (day == "") {
		document.getElementById('errorDay').style.color = 'red';
	} else if (day != "") {
		document.getElementById('errorDay').style.color = 'black';
	}
	if (month == "") {
		document.getElementById('errorMonth').style.color = 'red';
	} else if (month != "") {
		document.getElementById('errorMonth').style.color = 'black';
	}
	if (year == "") {
		document.getElementById('errorYear').style.color = 'red';
	} else if (year != "") {
		document.getElementById('errorYear').style.color = 'black';
	}
	if (pass == "") {
		document.getElementById('errorPassword').style.color = 'red';
	} else if (pass != "") {
		document.getElementById('errorPassword').style.color = 'black';
	}
	if (address == "") {
		document.getElementById('errorAddress').style.color = 'red';
	} else if (address != "") {
		document.getElementById('errorAddress').style.color = 'black';
	}
	if (confirm_pass == "") {
		document.getElementById('errorPassword-confirm').style.color = 'red';
	} else if (confirm_pass != "") {
		document.getElementById('errorPassword-confirm').style.color = 'black';
	}
	else {
		alert("bạn đã đăng ký thành công.")
	}
}



