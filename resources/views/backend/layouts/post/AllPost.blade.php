<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Bài đăng | ITHome!</title>

    <!-- Bootstrap -->
    <link href="{{ url('cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css')}}">
    <link href="{{ url('vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ url('vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ url('vendors/nprogress/nprogress.css')}}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{ url('vendors/iCheck/skins/flat/green.css')}}" rel="stylesheet">
    <!-- Datatables -->
    
    <link href="{{ url('vendors/datatables.net-bs/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ url('vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ url('vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ url('vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ url('vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom Theme Style -->
    
    <link href="{{ url('build/css/custom.min.css')}}" rel="stylesheet">
  </head>

  <body class="nav-md">
    
  @include('backend.partial.header')
  @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
                @endif
               
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Quản lí Motel<small>    </small></h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-secondary" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Danh sách Motel </h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Settings 1</a>
                            <a class="dropdown-item" href="#">Settings 2</a>
                          </div>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                    <p class="text-muted font-13 m-b-30">
                   
                    </p>
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                        <th>ID</th>
                        <th>Hình ảnh</th>
                         
                          <th>Loại</th>
                          <th>Tiêu đề</th>
                          <th>Địa chỉ</th>
                          <th>Nội thất</th>
                          <th>Số lượng nhà vệ sinh</th>
                          <th>Số lượng phòng ngủ</th>
                          <th>Giá</th>
                          <th>Mô tả</th>
                          <th>username người đăng</th>
                          <th>Thời gian đăng</th>
                          <th style="width:50px;">Lựa chọn</th>
                          
                        </tr>
                      </thead>


                      <tbody>
                      <?php
                        $stt = 1;
                    ?>  
                         
                          <?php 
                         ?>
                         @foreach($house as $house)
                        <tr>
                     
                         
                          <td> {{$house->id}}</td>
                          <!-- Lấy chuỗi img và xử đẩy 1 hình đầu tiên -->
                          <?php
                            $arr = explode(';',$house->img);
                            
                          ?>
                          <td><img src="./image/{{$arr[0]}}" height="100" width="100" alt=""></td>
                          
                          <td>{{$house->category->cate_name}}</td>
                          <td>{{$house->title	}}</td>
                          
                          <td>{{$house->address_number}} ,{{$house->street->_prefix}} {{$house->street->_name}}, {{$house->ward->_prefix}} {{$house->ward->_name}}, {{$house->district->_prefix}} {{$house->district->_name}}, {{$house->province->_name}}</td>
                          <td>
                            <?php 
                              if($house->furniture  ==1)
                              {
                                $noithat = 'Có';
                              }
                              else{
                                $noithat = 'Không';
                              }
                              echo htmlentities($noithat);
                            ?>

                          </td>
                      
                          <td>{{$house->restroom_amount}}</td>
                          <td>{{$house->bedroom_amount}}</td>
                          <td>{{$house->price}}</td>
                          <td>{{$house->description}}</td>
                          <td>{{$house->user->username}}</td>
                          <td>{{$house->created_at}}</td>
                          <?php 
                            $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
                            $rand = rand(10000,99999);
                            $size = strlen( $chars );
                            $length = rand(1,30);
                            $str='';
                            for( $i = 0; $i <  $length; $i++ ) {
                              $str .= $chars[ rand( 0, $size - 1 ) ];
                            }
                            $str = substr( str_shuffle( $chars ), 0, $length );
                            $id_security = base64_encode($house['id']).'_'.$rand.'_'.$str;
                           
                            ?>
                          <td >
                              <div class="fa-hover col-md-3 col-sm-4  "><a onclick="return comfirm('Bạn có chắc muốn xóa sản phẩm này không?')" href="/posts/delete/{{$id_security}}"><i class="fa fa-trash"></i></a>
                        </div>
                         
                        </td>
                        </tr>
                        @endforeach
                        <?php
        $stt++;
        ?>
                      
                      </tbody>
                    
                    </table>
                 
                  </div>
                  </div>
              </div>
            </div>
                </div>
              </div>

              
            </div>
                </div>
              </div>

            
            </div>
                </div>
              </div>

              
            </div>
                </div>
              </div>

              

              
            </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

     @include('backend.partial.footer')

  </body>
</html>