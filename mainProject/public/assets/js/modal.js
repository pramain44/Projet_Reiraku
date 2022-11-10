let modal = document.querySelector(".modal");
let btn = document.getElementById("myBtn");

btn.onclick = function() {
    modal.style.display = "block";
}

// gestion des boutons de fermeture de la modal

let closeBtn = document.querySelectorAll('.close');
closeBtn.forEach(element =>{
    element.addEventListener('click', (event)=>{
        modal.style.display = "none";
    })
})


let submit = document.querySelector(".modalBtn2");
submit.addEventListener('click', ()=>{
    document.querySelector('.modalForm').submit();
})
