function openTab(evt, cityName) {
	var i, tabcontent, tablinks;
	tabcontent = document.getElementsByClassName("tab-content");
	for (i = 0; i < tabcontent.length; i++) {
		tabcontent[i].style.display = "none";
	}
	tablinks = document.getElementsByClassName("tab-links");
	for (i = 0; i < tablinks.length; i++) {
		tablinks[i].className = tablinks[i].className.replace(" active", "");
	}
	document.getElementById(cityName).style.display = "block";
	evt.currentTarget.className += " active";
}

function openDetails(el) {
	var el = document.getElementById(el);
	el.style.display = "block";
}

function openForm(el) {
	var el = document.getElementById(el);
	// console.log(el);
	el.style.display = "block";
}

function openEditForm(el) {
	var el = document.getElementById(el);
	// console.log(el);
	el.style.display = "block";
}

function Close(el) {
	var el = document.getElementById(el);
	el.style.display = "none";
}

function CloseForm(el) {
	var el = document.getElementById(el);
	el.style.display = "none";
}

function CloseEditForm(el) {
	var el = document.getElementById(el);
	el.style.display = "none";
}

function openMenu(el){
    var x = document.getElementById(el);
    if (x.style.display === "block") {
      x.style.display = "none";
      document.getElementById('angle').classList.add('far', 'fa-angle-down');
    } else {
      x.style.display = "block";
      document.getElementById('angle').classList.add('far', 'fa-angle-up');
    }


}

