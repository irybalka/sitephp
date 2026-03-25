const currentDate = new Date();
const currentYear = currentDate.getFullYear();
function StartAnimation(){
	document.getElementById("css-test").classList.add('anim');
}

function ChangeText(){
	document.getElementById("last-block").textContent = "Новий текст";
}

document.getElementById("current-year").textContent = currentYear;






document.getElementById("contactForm").addEventListener("submit", function(event){

    event.preventDefault();   // забороняє перезавантаження сторінки

    let formData = new FormData(this);

    fetch("insert.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        document.getElementById("main-block").innerHTML = data;
    });

});