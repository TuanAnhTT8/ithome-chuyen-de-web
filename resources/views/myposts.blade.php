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
        @if (session()->has('msg'))
        <div class="alert alert-success">
            {{ session()->get('msg') }}
        </div>
        @endif
        <div style="padding:10px 0px" class="row">
            <link rel="stylesheet" href="./css/userinfo-style.css">
            <meta name=csrf-token content="{{csrf_token()}}">
            <div class="col-3">
                <div class="post-author">
                    <div class="basic-info">
                        <div class="avatar">
                            <?php
                            if ($user->avatar == NULL or !file_exists(public_path('image/' . $user->avatar))) {
                                $user->avatar = "avatar.jpg";
                            }
                            ?>
                            <img src="<?php echo (asset('image/' . $user->avatar)) ?>" alt="" class="avt">
                            </div>
                        <div class="user-name">
                            <p>{{$user->name}}</p>
                            <p>Registered date: <span>{{date('d/m/Y', strtotime($user->created_at))}}</span></p>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-9">
                <div class="house-list">
                    <ul>
                        @foreach ($houses as $house)
                        <li class="house-item">
                            <div class="row">
                                <div class="col-4 house-img">
                                    <a href="{{ route('house.viewPost', $house->id) }}">
                                        <?php $img = explode(";", $house->img)[0] ?>
                                        <img class="img-fluid" src="./image/<?php echo ($img) ?>" alt="">
                                    </a>
                                </div>
                                <div class="col-8">
                                    <h4 class="house-title"><?php echo ($house->title . $house->id); ?></h4>
                                    <p class="house-address"><?php echo ($house->province->_name); ?></p>
                                    <div class="house-info">
                                        <ul>
                                            <li>
                                                <p class="area"><?php echo ($house->area); ?> <span>m<sup>2</sup></span></p>
                                            </li>
                                            <li>
                                                <p class="bedroom"><?php echo ($house->bedroom_amount); ?> <span>Bedroom</span></p>
                                            </li>
                                            <li>
                                                <p class="bedroom"><?php echo ($house->restroom_amount); ?> <span>Restroom</span></p>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="price">
                                        <p><?php echo (number_format($house->price)); ?><span> VND</span></p>
                                    </div>
                                    <div class="upload-time">
                                        <p>Upload time: <?php if (date('d/m/Y', strtotime($house->created_at)) == date('d/m/Y')) {
                                                            echo ('Today');
                                                        } else {
                                                            echo (date('d/m/Y', strtotime($house->created_at)));
                                                        } ?></p>
                                        <a class="update-post" href="{{route('post.updatePost',$house->id)}}"><i class="fas fa-edit"></i></a>
                                        <a class="remove-post" href="{{route('post.removePost',$house->id)}}"><i class="fas fa-trash-alt"></i></a>

                                    </div>

                                </div>
                            </div>
                        </li>
                        @endforeach
                        {{$houses->links();}}
                    </ul>
                </div>

            </div>
        </div>

    </div>
    <x-footer></x-footer>
    <script src="./js/ajax.js"></script>
</body>

</html>