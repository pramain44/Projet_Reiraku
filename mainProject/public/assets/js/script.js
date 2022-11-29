// let htmlStructureOfCard = (manga) => {
//     document.querySelector('.cards').innerHTML += 
//     `
//         <div class="card ${manga.category}">
//         <div class="textContainer">
//             <h3 class="titleProducts">${manga.title}</h3>
//         </div>
//         <a class="ficheLink" href="ficheController.php"><img class="img${manga.category}" src="${manga.img}" alt="${manga.title}"></a>
//         </div>
//     `
// }

// let putCardInsideDom = (element) => {
//     if (element.category ==='Banger') {
//         htmlStructureOfCard(element);
//     } else if (element.category === 'Classique') {
//         htmlStructureOfCard(element);
//     } else {
//         htmlStructureOfCard(element);
//     }
// }
// // tri au click sur les boutons

// let sortCardByCategoryOnClick = () => {
//     let bangerCard = document.querySelectorAll('.banger');
//     let classiqueCard = document.querySelectorAll('.classique');
//     let hiddenGemCard = document.querySelectorAll('.hiddenGem');

//     document.querySelectorAll('.btn').forEach(btn => {
//         btn.addEventListener('click', (e) => {
//             if (e.target.dataset.sort == 'banger') {
//             classiqueCard.forEach(element => {
//                 element.classList.toggle('visible');
//             });
//             hiddenGemCard.forEach(element => {
//                 element.classList.toggle('visible');
//             });
//         }
//         })
//     })

//     document.querySelectorAll('.btn').forEach(btn => {
//         btn.addEventListener('click', (e) => {
//             if (e.target.dataset.sort == 'classique') {
//             bangerCard.forEach(element => {
//                 element.classList.toggle('visible');
//             });
//             hiddenGemCard.forEach(element => {
//                 element.classList.toggle('visible');
//             });
//         }
//         })
//     })

//     document.querySelectorAll('.btn').forEach(btn => {
//         btn.addEventListener('click', (e) => {
//             if (e.target.dataset.sort == 'hiddenGem') {
//             bangerCard.forEach(element => {
//                 element.classList.toggle('visible');
//             });
//             classiqueCard.forEach(element => {
//                 element.classList.toggle('visible');
//             });
//         }
//         })
//     })
// }
// fetching des data sur la home page

// fetch('/mainProject/public/assets/js/mangas.json')
// .then(response => response.json())
// .then(json => {
//     json.mangas.forEach(manga => {
//         putCardInsideDom(manga);
//     });
//     sortCardByCategoryOnClick();
// })

// //----------- to another page ---------//
// setTimeout(()=>{
//     let card = document.querySelectorAll('.card');
//     card.forEach(element => {
//         element.addEventListener('click', ()=>{
//             localStorage.setItem('img',element.getAttribute('data-img'));
//             localStorage.setItem('title',element.getAttribute('data-title'));
//             localStorage.setItem('desc',element.getAttribute('data-description'));
//             localStorage.setItem('author',element.getAttribute('data-author'));
//             localStorage.setItem('anime',element.getAttribute('data-anime'));
//             window.location.href ="fiche.php";
//     })
//         })
// },500)

// over des boutons Home 

let overColor = document.querySelectorAll('.inherit')
overColor.forEach(element =>{
    element.addEventListener('mouseenter', (event)=>{
        event.target.style.color = "hotpink";
    element.addEventListener('mouseleave', (event)=>{
        event.target.style.color = "black";
    })
    })
})

let colorChange = document.querySelectorAll('.footerHref')
colorChange.forEach(element =>{
    element.addEventListener('mouseenter', (event)=>{
        event.target.style.color = "hotpink";
    element.addEventListener('mouseleave', (event)=>{
        event.target.style.color = "white";
    })
    })
})