let modal = document.querySelector(".modal");
let modalContent = document.querySelector('.modalContent');

let closeBtn = document.getElementById("closeBtn");
closeBtn.onclick = function() {
    modal.style.display = "none";
}


// fermeture si on click en dehors de la modal

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
} 
    
  
let btn = document.querySelectorAll('.myBtn');

btn.forEach(element =>{
    element.addEventListener('click', (event)=>{
        modal.style.display = "block";
        modalContent.style.display = "block";
        let id = event.target.dataset.id
        document.querySelector('.deleteComment').href = `deleteController.php?Id_comments=${id}`;

    })
})

// let className = document.getElementById("confirmDelete").className;


