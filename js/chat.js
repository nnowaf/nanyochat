const form = document.querySelector(".typing-area"),
inputField = form.querySelector(".input-field"),
btnSend = form.querySelector("button"),
chatBox = document.querySelector(".chat-box");

form.onsubmit = (e)=> {
	e.preventDefault();
}

inputField.focus();
inputField.onkeyup = ()=> {
	if (inputField.value != "") {
		btnSend.classList.add("active");
	} else {
		btnSend.classList.remove("active");
	}
}
btnSend.onclick = ()=> {
	let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/insert-chat.php", true);
    xhr.onload = ()=>{
		if (xhr.readyState === XMLHttpRequest.DONE) {
			if (xhr.status === 200) {
				inputField.value = "";//kosongkan nilai input jika sudah terkirim 
				scrollKeBawah();
			}
		}
	}
	let formData = new FormData(form);  
	xhr.send(formData);//mengirim data data ke php
}

chatBox.onmouseenter = ()=> {
	chatBox.classList.add("active");
}

chatBox.onmouseleave = ()=> {
	chatBox.classList.remove("active");
}

setInterval(()=> { //ini untuk pengambilan kontak kontak yang telah tersedia dengan metode GET
	let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/get-chat.php", true);
    xhr.onload = ()=>{
		if (xhr.readyState === XMLHttpRequest.DONE) {
			if (xhr.status === 200) {
				let data = xhr.response;
				chatBox.innerHTML = data;
				
				if (!chatBox.classList.contains("active")) {
					scrollKeBawah();	
				}
			}
		}
	}

	let formData = new FormData(form);  
	xhr.send(formData);//mengirim data data ke php
}, 500); //dijalankan setelah 500ms delay

function scrollKeBawah() {
	chatBox.scrollTop = chatBox.scrollHeight;
}