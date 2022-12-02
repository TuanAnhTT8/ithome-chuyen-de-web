<link rel="stylesheet" href="{{asset('css/detailinfo-style.css')}}">
<div class="col-8">
    <div id="carouselIndicators" class="carousel slide" data-bs-ride="carousel">
        <?php $imgarr = explode(";", $house->img) ?>
        <div class="carousel-inner">
            @foreach($imgarr as $img)
                @if($img!="")
                <div class="carousel-item">
                    <img src="<?php echo(asset('image/'.$img))?>" class="d-block w-100 center" alt="...">
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
    <h4 class="detail-title">{{$house->title.$house->id}}</h4>
    <p class="detail-address">Address: {{$house->address_number.', '
        .$house->street->_prefix.' '.$house->street->_name.', '
        .$house->ward->_prefix.' '.$house->ward->_name.', '
        .$house->district->_prefix.' '.$house->district->_name.', '
        .$house->province->_name}}</p>
    <p class="detail-price">Price: {{number_format($house->price)}}<span> VND</span></p>
    <h4>Main Information</h4>
    <div class="main-info">
        <table>
            <tr>
                <td>Area: </td>
                <td>{{$house->area}} <span>m<sup>2</sup></span></td>
            </tr>
            <tr>
                <td>Upload Time: </td>
                <td>{{date('d/m/Y', strtotime($house->created_at))}}</td>
            </tr>
            <tr>
                <td>Furniture: </td>
                <?php
                if ($house->furniture == 1) {
                    echo ('<td>Yes</td>');
                } else {
                    echo ('<td>No</td>');
                }
                ?>

            </tr>
        </table>
    </div>
    <h4>Description</h4>
    <p>{{$house->description}}</p>
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
                    <form id="form_report" method="post" action="/report" >
                    {{ csrf_field() }}
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="This post is scaming">
                        <label class="form-check-label" for="flexRadioDefault1">
                            This post is scaming
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value="This post in unreal">
                        <label class="form-check-label" for="flexRadioDefault2">
                            This post in unreal
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3" value="This post is spam">
                        <label class="form-check-label" for="flexRadioDefault3">
                            This post is spam
                        </label>
                    </div>
                    <input type="hidden" name="id_house" value="{{$house->id}}">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" data-dismiss="modal">Report</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <h4>Near Location</h4>
    <div class="map-content clearfix">
        <iframe title="map" frameborder="0" 
        src="https://www.google.com/maps/embed/v1/place?key=AIzaSyAYhAQ8OZ64kCDMxSiuZtUTlwRDCh4gWHs&amp;language=vi&amp;q={{$house->map}}" allowfullscreen=""></iframe>
    </div>
</div>