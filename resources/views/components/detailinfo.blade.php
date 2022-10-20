<link rel="stylesheet" href="./css/detailinfo-style.css">
<div class="col-8">
    <div id="carouselIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="./image/house1.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="./image/house2.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="./image/house3.jpg" class="d-block w-100" alt="...">
            </div>
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
    <h4 class="detail-title">Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores, velit!</h4>
    <p class="detail-address">Address</p>
    <p class="detail-price">6,000,000 <span>VND</span></p>
    <h4>Main Information</h4>
    <div class="main-info">
    <table>
        <tr>
            <td>Area: </td>
            <td>40 <span>m<sup>2</sup></span></td>
        </tr>
        <tr>
            <td>Upload Time: </td>
            <td>19/10/2022</td>
        </tr>
        <tr>
            <td>Furniture: </td>
            <td>Yes</td>
        </tr>
    </table>
    </div>
    <h4>Description</h4>
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio, ea voluptatum est provident, minus dolore accusamus unde suscipit maiores, quis sequi amet sit illum inventore! Repudiandae nisi quidem numquam tempore.
    <button type="button" class="report btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Report this Post <i class="fas fa-exclamation-triangle"></i>
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                            This post is scaming
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                        <label class="form-check-label" for="flexRadioDefault2">
                            This post in unreal
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3">
                        <label class="form-check-label" for="flexRadioDefault3">
                            This post is spam
                        </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" data-dismiss="modal">Report</button>
                </div>
            </div>
        </div>
    </div>
    <h4>Near Location</h4>
    <div class="map-content clearfix">
        <iframe title="map" frameborder="0" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyAYhAQ8OZ64kCDMxSiuZtUTlwRDCh4gWHs&amp;language=vi&amp;q=10.781393529999999,106.64632034499994" allowfullscreen=""></iframe>
    </div>
</div>