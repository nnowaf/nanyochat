const password = document.querySelector(".form  input[type='password']"),
toggleBtn = document.querySelector(".form .field i");

toggleBtn.onclick = ()=>{ //ketika tag i dengan gambar mata itu dipencet maka menjalankan kondisi di bawah ini
	if(password.type == "password") { //jika mau melihat password menjadi text
		password.type = "text";
		toggleBtn.classList.add("active");
	} else { //jika mau melihat text menjadi password lagi
		password.type = "password";
		toggleBtn.classList.remove("active");
	}
}