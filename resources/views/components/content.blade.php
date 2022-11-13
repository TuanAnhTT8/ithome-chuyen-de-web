<link rel="stylesheet" href="./css/content-style.css">
<div class="col-9">
  <div class="house-list">
    <ul>
      <?php for ($i = 1; $i <= 5; $i++) { ?>
        <li class="house-item">
        <div class="row">
          <div class="col-4 house-img">
            <img class="img-fluid" src="./image/house{{$i}}.jpg" alt="">
          </div>
          <div class="col-8">
            <h4 class="house-title">High end Apartment at Thu Duc City {{$i}}</h4>
            <p class="house-address">TPHCM</p>
            <div class="house-info">
              <ul>
              <li>
                <p class="area">40 <span>m<sup>2</sup></span></p>
              </li>
              <li>
                <p class="bedroom">1 <span>Bedroom</span></p>
              </li>
              <li>
                <p class="bedroom">1 <span>Restroom</span></p>
              </li>
            </ul>
            </div>
            <div class="price">
              <p>6,000,000 <span>VND</span></p>
            </div>
            <div class="upload-time">
              <p>To day</p>
              <div class="favourite"><i class="far fa-heart"></i></i></div>
            </div>
            
          </div>
        </div>
      </li>
      <?php
      }
      ?>

    </ul>
  </div>
  <nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
      <li class="page-item"><a class="page-link" href="#">Previous</a></li>
      <li class="page-item"><a class="page-link" href="#">1</a></li>
      <li class="page-item"><a class="page-link" href="#">2</a></li>
      <li class="page-item"><a class="page-link" href="#">3</a></li>
      <li class="page-item"><a class="page-link" href="#">Next</a></li>
    </ul>
  </nav>
</div>
<script src="../js/script.js"></script>