const form = document.querySelector(".login form"),
continueBtn = form.querySelector(".tombol input"),
errorText = form.querySelector(".error-txt");


form.onsubmit = (e)=> {
	e.preventDefault();
}

continueBtn.onclick = ()=> {
	let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/login.php", true);
    xhr.onload = ()=>{
		if (xhr.readyState === XMLHttpRequest.DONE) {
			if (xhr.status === 200) {
				let data = xhr.response;
				console.log(data);
				
				if (data == "berhasil") {
					location.href = "user.php"
				} else {
					errorText.style.display = "block";
					errorText.textContent = data;
				}
				
			}
		}
	}
	let formData = new FormData(form);  
	xhr.send(formData);//mengirim data data ke php
}