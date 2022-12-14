<link rel="stylesheet" href="{{asset('css/content-style.css')}}">

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
              @if(!isset($user))
              <a href="{{route('post.likePost',$house->id)}}" class="favourite"><i class="far fa-heart"></i></a>
                @elseif(count($house->likes) != 0)
              <a href="{{route('post.likePost',$house->id)}}" class="favourite">
                  @foreach($likes as $like)
                    @if($like->house_id == $house->id)
                      <i class="fas fa-heart"></i>
                    @endif
                  @endforeach
              </a>
                @else
              <a href="{{route('post.likePost',$house->id)}}" class="favourite"><i class="far fa-heart"></i></a>
              @endif

            </div>

          </div>
        </div>
      </li>
      @endforeach
      {{$houses->links();}}
    </ul>
  </div>

</div>