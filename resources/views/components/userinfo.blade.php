<link rel="stylesheet" href="{{asset('css/userinfo-style.css')}}">
<div class="col-4">
    <div class="post-author">
        <div class="basic-info">
            <div class="avatar">
                <img src="<?php echo(asset('image/'.$user->avatar))?>" alt="" class="avt">
            </div>
            <div class="user-name">
                <p>{{$user->name}}</p>
                <p>Registered date: <span>{{date('d/m/Y', strtotime($user->created_at));}}</span></p>
            </div>
        </div>
        <div class="contact">
            <ul>
                <li>
                    <a class="phone" href="tel:{{$user->phone}}"><i class="fas fa-phone"></i></i> {{$user->phone}}</a>
                </li>
                <li>
                    <a class="email" href="mailto:{{$user->email}}"><i class="fas fa-envelope"></i> Send Email</a>
                </li>
            </ul>
        </div>
    </div>
</div>