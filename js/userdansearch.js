const kolomSearch = document.querySelector(".search input"),
btnSearch = document.querySelector(".search button"),
userList = document.querySelector(".user-list");


btnSearch.onclick = ()=> {
	kolomSearch.classList.toggle("show");
	btnSearch.classList.toggle("active");
	kolomSearch.focus();

	if (kolomSearch.classList.contains("active")) {
		kolomSearch.value = "";
		kolomSearch.classList.remove("active");
	}
}

kolomSearch.onkeyup = ()=>{ //untuk search nama
  let searchTerm = kolomSearch.value;

  if (searchTerm != "") {
  	kolomSearch.classList.add("active");
  } else {
  	kolomSearch.classList.remove("active");
  }

  let xhr = new XMLHttpRequest();
  xhr.open("POST", "php/search.php", true);
  xhr.onload = ()=>{
    if(xhr.readyState === XMLHttpRequest.DONE){
        if(xhr.status === 200){
          let data = xhr.response;
          userList.innerHTML = data;		
        }
    }
  }
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send("searchTerm=" + searchTerm);
}

setInterval(()=> { //ini untuk pengambilan kontak kontak yang telah tersedia dengan metode GET
	let xhr = new XMLHttpRequest();
    xhr.open("GET", "php/user.php", true);
    xhr.onload = ()=>{
		if (xhr.readyState === XMLHttpRequest.DONE) {
			if (xhr.status === 200) {
				let data = xhr.response;
				if (!kolomSearch.classList.contains("active")) {
					userList.innerHTML = data;
				}		
			}
		}
	}
	xhr.send();
}, 500); //dijalankan setelah 500ms delay