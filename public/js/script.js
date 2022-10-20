//Jquery that change favourite icon while click
const favourite = document.querySelectorAll('.favourite');
favourite.forEach(element => {
    element.addEventListener('click', (e) => {
        if (element.firstChild.classList.contains("fas")) {
            element.firstChild.classList.replace("fas", "far");
        } else {
            element.firstChild.classList.replace("far", "fas");
        }
    })
});

const houseitem = document.querySelectorAll('.house-item');
houseitem.forEach(element => {
    element.addEventListener('click', (e) => {
        window.location = 'detail';
    })
});