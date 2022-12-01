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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="{{asset('css/newpost-style.css')}}">

</head>

<body>
    <x-header></x-header>
    <br><br>
    <br><br>
    <div class="container">
        @if (session()->has('msg'))
        <div class="alert alert-success">
            {{ session()->get('msg') }}
        </div>
        @endif
        <h1>Update Post</h1>

        <form method="post" action="{{ route('post.update',$house->id)}}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="category-selector">
                <label class="form-label" for="category-select">Category</label>
                <select id="category-select" name="category" class="form-select" aria-label="Default select example" required>
                    <option value="0">---Select category---</option>
                    @foreach($categories as $categories)
                    @if($categories->id==$house->_category_id)
                    <option selected value="{{$categories->id}}">{{$categories->cate_name}}</option>
                    @else
                    <option value="{{$categories->id}}">{{$categories->cate_name}}</option>
                    @endif
                    @endforeach

                </select>

            </div>
            <div class="form-outline mb-4 title">
                <label class="form-label" for="form3Example3">Title</label>
                <input value="{{$house->title}}" type="text" name="title" id="form3Example3" class="form-control form-control-lg" placeholder="Title" required />
            </div>
            <div class="image-upload container col-md-6">
                <div class="mb-5">
                    <label for="Image" class="form-label">Chosse your picture</label>
                    <input class="form-control" type="file" id="formFiles" name="formFiles[]" multiple>
                    <button onclick="clearImage()" class="btn btn-primary mt-3">Remove all images</button>
                </div>
                <div id="carouselIndicators" class="carousel slide" data-bs-ride="carousel">
                    <?php $imgarr = explode(";", $house->img) ?>
                    <div class="carousel-inner" id="preview-list">
                        @foreach($imgarr as $img)
                            @if($img!="")
                            <div class="carousel-item">
                                <img src="<?php echo (asset('image/' . $img)) ?>" class="d-block w-100" alt="...">
                            </div>
                            @endif
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselIndicators" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselIndicators" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>

                </script>
            </div>
            <div class="location-picker">
                <div class="location location-item">

                    <label class="form-label" for="category-select">Location</label>
                    <select id="province-select" name="province" class="form-select" aria-label="Default select example">
                        <option value="0">--Select Province--</option>
                        @foreach ($provinces as $province){
                            @if($province->id==$house->_province_id)
                            <option selected value="{{$province -> id}}">{{$province -> _name}}</option>
                            @else
                            <option value="{{$province -> id}}">{{$province -> _name}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="distric location-item">
                    <label class="form-label" for="category-select">Distric</label>
                    <select id="district-select" name="district" class="form-select" aria-label="Default select example">
                        <option value="0">--Select Distrcit--</option>
                        @foreach ($districts as $district){
                            @if($district->id==$house->_district_id)
                            <option selected value="{{$district -> id}}">{{$district -> _prefix.' '.$district -> _name}}</option>
                            @else
                            <option value="{{$district -> id}}">{{$district -> _prefix.' '.$district -> _name}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="ward location-item">
                    <label class="form-label" for="category-select">Ward</label>
                    <select id="ward-select" name="ward" class="form-select" aria-label="Default select example">
                        <option value="0">--Select Ward--</option>
                        @foreach ($wards as $ward){
                            @if($ward->id==$house->_ward_id)
                            <option selected value="{{$ward -> id}}">{{$ward -> _prefix.' '.$ward -> _name}}</option>
                            @else
                            <option value="{{$ward -> id}}">{{$ward -> _prefix.' '.$ward -> _name}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="street location-item">
                    <label class="form-label" for="category-select">Street</label>
                    <select id="street-select" name="street" class="form-select" aria-label="Default select example">
                        <option value="0">--Select Street--</option>
                        @foreach ($streets as $street){
                            @if($street->id==$house->_street_id)
                            <option selected value="{{$street -> id}}">{{$street -> _prefix.' '.$street -> _name}}</option>
                            @else
                            <option value="{{$street -> id}}">{{$street -> _prefix.' '.$street -> _name}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="address form-outline mb-4 location-item">
                    <label class="form-label" for="form3Example3">Address</label>
                    <input type="text" value="{{$house -> address_number}}" id="form3Example3" name="address" class="form-control form-control-lg" placeholder="Address" required />

                </div>
            </div>
            <div class="map-picker map-content clearfix">
                <label class="form-label" for="map">Chosse your location in the map</label>
                <input value="{{$house -> map}}" type="text" id="map-location" name="maplocation" class="form-control form-control-lg" />
                <iframe title="map" frameborder="0" 
                src="https://www.google.com/maps/embed/v1/place?key=AIzaSyAYhAQ8OZ64kCDMxSiuZtUTlwRDCh4gWHs&amp;language=vi&amp;q={{$house->map}}" allowfullscreen=""></iframe>
            </div>
            Furniture
            <div class="house-stat">
                <div class="house-stat-item">
                    @if($house->furniture==1)
                    <div class="form-check">
                        <input checked class="form-check-input" type="radio" value="1" name="furniture" id="flexRadioDefault1" required>
                        <label class="form-check-label" for="flexRadioDefault1">
                            Yes
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="0" name="furniture" id="flexRadioDefault2" required>
                        <label class="form-check-label" for="flexRadioDefault2">
                            No
                        </label>
                    </div>
                    @else
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="1" name="furniture" id="flexRadioDefault1" required>
                        <label class="form-check-label" for="flexRadioDefault1">
                            Yes
                        </label>
                    </div>
                    <div class="form-check">
                        <input checked class="form-check-input" type="radio" value="0" name="furniture" id="flexRadioDefault2" required>
                        <label class="form-check-label" for="flexRadioDefault2">
                            No
                        </label>
                    </div>
                    @endif
                </div>
                <div class="house-stat-item">
                    <div class="restroom-amount">
                        <label class="form-label" for="price">Restroom Amount</label>
                        <input value="{{$house->restroom_amount}}" type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57" id="restroom" name="restroom" class="form-control form-control-lg" require />
                    </div>
                </div>
                <div class="house-stat-item">
                    <div class="bedroom-amount">
                        <label class="form-label" for="price">Bedroom Amount</label>
                        <input value="{{$house->bedroom_amount}}" type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57" id="bedroom" name="bedroom" class="form-control form-control-lg" require />
                    </div>
                </div>
                <div class="house-stat-item">
                    <div class="bedroom-amount">
                        <label class="form-label" for="price">Area <span>(m<sup>2</sup>)</span></label>
                        <input value="{{$house->area}}" type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57" name="area" id="area" class="form-control form-control-lg" require />
                    </div>
                </div>
            </div>
            <div class="price">
                <label class="form-label" for="price">Price <span>(VND)</span></label>
                <input value="{{$house->price}}" type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57" id="price" name="price" class="form-control form-control-lg" placeholder="" required />
            </div>
            <div class="additional-information">
                <label for="additional-info" class="form-label">Additional Infomation</label>
                <textarea class="form-control" id="additional-info" name="description" rows="10" required>{{$house->description}}</textarea>
            </div>
            <button type="submit" class="btn btn-primary" data-dismiss="modal">Save</button>

        </form>
    </div>
    <x-footer></x-footer>
    <script src="{{asset('js/ajax.js')}}"></script>
    <script src="{{asset('js/detailscript.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>


</html>