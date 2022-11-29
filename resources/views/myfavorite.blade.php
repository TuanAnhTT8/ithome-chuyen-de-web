<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IT Home - Motel</title>
    <meta name=csrf-token content="{{csrf_token()}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="stylesheet" href="{{asset('css/content-style.css')}}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>

<body>
    <x-header></x-header>
    <br><br>
    <br><br>
    <div class="container">
        <div style="padding:10px 0px" class="row">
            <link rel="stylesheet" href="./css/userinfo-style.css">
            <meta name=csrf-token content="{{csrf_token()}}">
            <div class="col-3">
                <div class="post-author">
                    <div class="basic-info">
                        <div class="avatar">
                            <img src="./image/avatar.jpg" alt="" class="avt">
                        </div>
                        <div class="user-name">
                            <p>{{$user->name}}</p>
                            <p>Registered date: <span>{{date('d/m/Y', strtotime($user->created_at))}}</span></p>
                        </div>
                    </div>

                </div>
            </div>
            <!-- <x-content :id="0"></x-content> -->
            <div class="col-9">
                <div class="house-list">
                    <ul>
                        @foreach ($likes as $like)
                        <li class="house-item">
                            <div class="row">
                                <div class="col-4 house-img">
                                    <a href="{{ route('house.viewPost', $like->house->id) }}">
                                        <?php $img = explode(";", $like->house->img)[0] ?>
                                        <img class="img-fluid" src="./image/<?php echo ($img) ?>" alt="">
                                    </a>
                                </div>
                                <div class="col-8">
                                    <h4 class="house-title"><?php echo ($like->house->title . $like->house->id); ?></h4>
                                    <p class="house-address"><?php echo ($like->house->province->_name); ?></p>
                                    <div class="house-info">
                                        <ul>
                                            <li>
                                                <p class="area"><?php echo ($like->house->area); ?> <span>m<sup>2</sup></span></p>
                                            </li>
                                            <li>
                                                <p class="bedroom"><?php echo ($like->house->bedroom_amount); ?> <span>Bedroom</span></p>
                                            </li>
                                            <li>
                                                <p class="bedroom"><?php echo ($like->house->restroom_amount); ?> <span>Restroom</span></p>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="price">
                                        <p><?php echo (number_format($like->house->price)); ?><span> VND</span></p>
                                    </div>
                                    <div class="upload-time">
                                        <p>Upload time: <?php if (date('d/m/Y', strtotime($like->house->create_at)) == date('d/m/Y')) {
                                                            echo ('Today');
                                                        } else {
                                                            echo (date('d/m/Y', strtotime($like->house->create_at)));
                                                        } ?></p>
                                        <a href="{{route('post.likePost',$like->house->id)}}" class="favourite"><i class="fas fa-heart"></i></a>
                                    </div>

                                </div>
                            </div>
                        </li>
                        @endforeach
                        {{$likes->links();}}
                    </ul>
                </div>

            </div>
        </div>

    </div>
    <x-footer></x-footer>
    <script src="./js/ajax.js"></script>
</body>

</html>