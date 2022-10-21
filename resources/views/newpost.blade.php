<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IT Home - Motel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/newpost-style.css">
</head>

<body>
    <x-header></x-header>
    <br><br>
    <br><br>
    <div class="container">
        <h1>New Post</h1>
        <form action="">
            <div class="category-selector">
                <label class="form-label" for="category-select">Category</label>
                <select id="category-select" class="form-select" aria-label="Default select example">
                    <option selected></i>Hotel</option>
                    <option value="1">House</option>
                    <option value="2">Apartment</option>
                </select>

            </div>
            <div class="form-outline mb-4 title">
                <label class="form-label" for="form3Example3">Title</label>
                <input type="username" id="form3Example3" class="form-control form-control-lg" placeholder="Enter user name" />

            </div>
            <div class="image-upload">
                <label class="form-label" for="customFile">Choose your pictures</label>
                <input type="file" class="form-control" id="customFile" />

            </div>
            <div class="location-picker">
                <div class="location location-item">
                    <label class="form-label" for="category-select">Location</label>
                    <select id="category-select" class="form-select" aria-label="Default select example">
                        <option selected></i>TPHCM</option>
                        <option value="1">Ha Noi</option>
                        <option value="2">Quang Nam</option>
                    </select>

                </div>
                <div class="distric location-item">
                    <label class="form-label" for="category-select">Distric</label>
                    <select id="category-select" class="form-select" aria-label="Default select example">
                        <option selected></i>Quan 1</option>
                        <option value="1">Quan 2</option>
                        <option value="2">Quan 3</option>
                    </select>

                </div>
                <div class="address form-outline mb-4 location-item">
                    <label class="form-label" for="form3Example3">Address</label>
                    <input type="username" id="form3Example3" class="form-control form-control-lg" placeholder="Enter user name" />

                </div>
            </div>
            <div class="map-picker map-content clearfix">
                <label class="form-label" for="map">Chosse your location in the map</label>
                <iframe title="map" frameborder="0" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyAYhAQ8OZ64kCDMxSiuZtUTlwRDCh4gWHs&amp;language=vi&amp;q=10.781393529999999,106.64632034499994" allowfullscreen=""></iframe>

            </div>
            Furniture
            <div class="house-stat">
                <div class="house-stat-item">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                    <label class="form-check-label" for="flexRadioDefault1">
                        Yes
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                    <label class="form-check-label" for="flexRadioDefault2">
                        No
                    </label>
                </div>
                </div>
                <div class="house-stat-item">
                <div class="restroom-amount">
                    <label class="form-label" for="price">Restroom Amount</label>
                    <input type="number" id="restroom" class="form-control form-control-lg" placeholder="" />
                </div>
                </div>
                <div class="house-stat-item">
                <div class="bedroom-amount">
                    <label class="form-label" for="price">Bedroom Amount</label>
                    <input type="number" id="bedroom" class="form-control form-control-lg" placeholder="" />
                </div>
                </div>
            </div>
            <div class="price">
                <label class="form-label" for="price">Price</label>
                <input type="number" id="price" class="form-control form-control-lg" placeholder="" />
            </div>
            <div class="additional-information">
                <label for="additional-info" class="form-label">Additional Infomation</label>
                <textarea class="form-control" id="additional-info" rows="10"></textarea>
            </div>
            <button type="submit" class="btn btn-primary" data-dismiss="modal">Post</button>

        </form>
    </div>
    <x-footer></x-footer>
</body>

</html>