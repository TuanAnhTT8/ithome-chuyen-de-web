//Jquery that change favourite icon while click
const favourite = document.querySelectorAll('.favourite');
favourite.forEach(element => {
    if (element.childElementCount == 0) {
        element.innerHTML = `<i class="far fa-heart"></i>`;
    }
    element.addEventListener('click', (e) => {
        if (element.firstChild.classList.contains("fas")) {
            element.firstChild.classList.replace("fas", "far");
        } else {
            element.firstChild.classList.replace("far", "fas");
        }
    })
});

const _close = document.querySelector('.close');
if (_close != null) {
    _close.addEventListener('click', () => {
        alert(1);
    });
}





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
if (province_select != null) {
    province_select.addEventListener('change', (e) => {
        LoadDistricts(province_select.value);
    });
}
async function LoadDistricts(id) {
    const url = '/api/district/' + id;
    const response = await fetch(url);
    //console.log(response.json());
    const result = await response.json();
    //console.log(result);
    district_select.innerHTML = `<option value="0" selected>All Districts</option>`;
    ward_select.innerHTML = `<option value="0" selected>All Wards</option>`;
    street_select.innerHTML = `<option value="0" selected>All Streets</option>`;
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
    const url = '/api/ward/' + id;
    const response = await fetch(url);
    //console.log(response.json());
    const result = await response.json();
    //console.log(result);
    ward_select.innerHTML = `<option value="0" selected>All Wards</option>`;
    result.forEach(element => {
        ward_select.innerHTML += `<option value="` + element.id + `" >` + element._prefix + ` ` + element._name + `</option>`;

    });
    // ward_select.addEventListener('change', (e) => {
    //     console.log(ward_select.value);
    // });
}

async function LoadStreets(id) {
    const url = '/api/street/' + id;
    const response = await fetch(url);
    //console.log(response.json());
    const result = await response.json();
    //console.log(result);
    street_select.innerHTML = `<option value="0" selected>All Streets</option>`;
    result.forEach(element => {
        street_select.innerHTML += `<option value="` + element.id + `" >` + element._prefix + ` ` + element._name + `</option>`;
    });
    // street_select.addEventListener('change', (e) => {
    //     console.log(street_select.value);
    // });

}
async function addLike(id, uid) {
    const url = '/api/like/' + id + '-' + uid;
    const response = await fetch(url);
    //console.log(response.json());
    const result = await response.json();
    //console.log(result);
    if (result == 0) {
        alert('House not exist');
    } else if (result == 1) {
        alert('Like Success');
    }
}
async function removeLike(id, uid) {
    const url = '/api/removelike/' + id + '-' + uid;
    const response = await fetch(url);
    //console.log(response.json());
    const result = await response.json();
    console.log(result);
    if (result == 0) {
        alert('House not exist');
    } else if (result == 1) {
        alert('UnLike Success');
    }
}

var limit = 10;

var imgList = document.getElementById('preview-list');
$(document).ready(function() {
    var readURL = function(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('.profile-pic').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#avatarupload").on('change', function() {
        readURL(this);
    });

    $('#formFiles').change(function() {
        var files = $(this)[0].files;
        if (files.length > limit) {
            alert("You can select max " + limit + " images.");
            $('#formFiles').val('');
            return false;
        } else {
            imgList.innerHTML = "";
            imgList.innerHTML += `<div class="carousel-item active"><img src="` + URL.createObjectURL(files[0]) + `" class="d-block w-100" alt="..."></div>`;
            if (files.length >= 2) {
                for (let i = 1; i < files.length; i++) {
                    imgList.innerHTML += `<div class="carousel-item"><img src="` + URL.createObjectURL(files[i]) + `" class="d-block w-100" alt="..."></div>`;
                }
            }
        }
    });

});

function clearImage() {
    document.getElementById('formFiles').value = null;
    imgList.innerHTML = "";
}