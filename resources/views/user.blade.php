<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IT Home - Motel</title>
    <meta name=csrf-token content="{{csrf_token()}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="stylesheet" href="./css/userinfo-style.css">
    <link rel="stylesheet" href="./css/user-edit-style.css">
    <script src="{{asset('js/ajax.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/
    tWtIaxVXM" crossorigin="anonymous"></script>


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
        <div class="col-md-8 col-sm-12  mx-auto my-5 edit-user">
            <div class="mx-5 py-5">
                <div class="container">
                    <h4 class="text-center pt-5">Account Information</h4>
                    <form action="{{route('user.update')}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <?php
                        if ($user->avatar == NULL or !file_exists(public_path('image/'.$user->avatar))) {
                            $user->avatar = "avatar.jpg";
                        }
                        ?>
                        <div class="avatar-wrapper">
                            <img class="profile-pic" src="<?php echo (asset('image/' . $user->avatar)) ?>" />
                            <div class="upload-button">
                                <label for="avatarupload"><i id="avatar-upload" class="fa fa-arrow-circle-up" aria-hidden="true"></i></label>
                            </div>
                            <input hidden name="avatar" id="avatarupload" class="form-control" type="file" accept="image/*" />
                        </div>
                        <h5 class="text-center">{{$user->name}}</h5>
                        <label class="ml-0 form-label" for="name">Name</label>
                        <input type="text" value="{{$user->name}}" id="name" name="name" class="form-control form-control-lg" required />
                        <label class="form-label" for="phone">Phone</label>
                        <input type="text" onkeypress="return event.charCode >= 48 && event.charCode <= 57" value="{{$user->phone}}" id="phone" name="phone" class="form-control form-control-lg" required />
                        <label class="form-label" for="email">Email</label>
                        <input type="email" value="{{$user->email}}" id="email" name="email" class="form-control form-control-lg" required />
                        <button type="submit" class="btn btn-primary mt-2" data-dismiss="modal">Save</button>
                    </form>
                </div>

            </div>
        </div>

    </div>
    <x-footer></x-footer>
</body>

</html>