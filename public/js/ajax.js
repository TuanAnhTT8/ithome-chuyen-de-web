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

var province_select = document.getElementById('province-select');
var district_select = document.getElementById('district-select');
province_select.addEventListener('change', (e) => {
    // district_select.innerHTML = `<?php echo $districts;
    // ?>`;
    // alert(province_select.value)
    LoadDistricts(province_select.value);
});

async function LoadDistricts(id) {
    const url = './api/district/' + id;
    const response = await fetch(url);
    //console.log(response.json());
    const result = await response.json();
    console.log(result);
    district_select.innerHTML = `<option value="0" selected>All District</option>`;
    result.forEach(element => {
        district_select.innerHTML += `<option value="` + element.id + `" >` + element._name + `</option>`;
    })
}