// setTimeout(()=>{
// let card = document.querySelectorAll('.card');
// card.forEach(element => {
//     element.addEventListener('click', ()=>{
//         localStorage.setItem('img',element.getAttribute('data-img'));
//         localStorage.setItem('title',element.getAttribute('data-title'));
//         localStorage.setItem('desc',element.getAttribute('data-description'));
//         localStorage.setItem('author',element.getAttribute('data-author'));
//         localStorage.setItem('anime',element.getAttribute('data-anime'));
//         window.location.href ="fiche.php";
//     })
//     element.addEventListener('click', ()=>{
//         const image = localStorage.getItem('img');
//         const title = localStorage.getItem('title');
//         const desc = localStorage.getItem('desc');
//         const author = localStorage.getItem('author');
//         const anime = localStorage.getItem('anime');
//         document.querySelector('cardContent').innerHTML +=
//         `
//         <div>
//             <img src=\"image\" alt="Image de title">
//             <p class="cardTitle">title</p>
//         </div>
//         <div>
//             <p>desc</p>
//             <p>author</p>
//             <p>anime</p>
//         </div>
//         `
// });
// })
// console.log(card);
// },500)

addEventListener('load',()=>{
    let x = document.querySelector('.cardContent')
    const image = localStorage.getItem('img');
    const title = localStorage.getItem('title');
    const desc = localStorage.getItem('desc');
    const author = localStorage.getItem('author');
    const anime = localStorage.getItem('anime');
    document.querySelector('cardContent').innerHTML +=
    `
    <div>
        <img src=\"image\" alt="Image de title">
        <p class="cardTitle">title</p>
    </div>
    <div>
        <p>desc</p>
        <p>author</p>
        <p>anime</p>
    </div>
    `
})

