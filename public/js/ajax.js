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

// const houseitem = document.querySelectorAll('.house-item');
// houseitem.forEach(element => {
//     element.addEventListener('click', (e) => {
//         window.location = 'detail';
//     })
// });

var province_select = document.getElementById('province-select');
var district_select = document.getElementById('district-select');
var ward_select = document.getElementById('ward-select');
var street_select = document.getElementById('street-select');
province_select.addEventListener('change', (e) => {
    LoadDistricts(province_select.value);
});

async function LoadDistricts(id) {
    const url = './api/district/' + id;
    const response = await fetch(url);
    //console.log(response.json());
    const result = await response.json();
    //console.log(result);
    district_select.innerHTML = `<option value="0" selected>All District</option>`;
    result.forEach(element => {
        district_select.innerHTML += `<option value="` + element.id + `" >` + element._prefix + ` ` + element._name + `</option>`;

    })
    district_select.addEventListener('change', (e) => {
        LoadWards(district_select.value);
        LoadStreets(district_select.value);
        //console.log(district_select.value);
    });
}

async function LoadWards(id) {
    const url = './api/ward/' + id;
    const response = await fetch(url);
    //console.log(response.json());
    const result = await response.json();
    //console.log(result);
    ward_select.innerHTML = `<option value="0" selected>All Ward</option>`;
    result.forEach(element => {
        ward_select.innerHTML += `<option value="` + element.id + `" >` + element._prefix + ` ` + element._name + `</option>`;

    });
    ward_select.addEventListener('change', (e) => {
        console.log(ward_select.value);
    });
}

async function LoadStreets(id) {
    const url = './api/street/' + id;
    const response = await fetch(url);
    //console.log(response.json());
    const result = await response.json();
    //console.log(result);
    street_select.innerHTML = `<option value="0" selected>All Street</option>`;
    result.forEach(element => {
        street_select.innerHTML += `<option value="` + element.id + `" >` + element._prefix + ` ` + element._name + `</option>`;
    });
    street_select.addEventListener('change', (e) => {
        console.log(street_select.value);
    });

}