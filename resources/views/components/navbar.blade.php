<link rel="stylesheet" href="{{asset('css/nav-style.css')}}">
<nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-navbg">
  <div class="container">
    <a class="navbar-brand" href="/"><img id="ithomelogo" src="{{asset('image/ithomelogo.jpg')}}"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/apartment">Apartment</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/house">House</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/motel">Motel</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/post">Post</a>
        </li>
        @if($user != null)
        <li class="nav-item dropdown">
          <a class="nav-link  dropdown-toggle" href="#" data-bs-toggle="dropdown">My Acccount</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/user">Account Information</a></li>
            <li><a class="dropdown-item" href="/myposts">My Posts</a></li>
            <li><a class="dropdown-item" href="/myfavorite">My Favorite Posts</a></li>
            <li><a class="dropdown-item" href="/logout">Logout</a></li>
          </ul>
        </li>
        @else
        <li class="nav-item">
          <a class="nav-link" href="/login">Login</a>
        </li>
        @endif
      </ul>
    </div>
  </div>
</nav>
@if (session()->has('msg'))
                <div class="alert alert-success">
                    {{ session()->get('msg') }}
                </div>
                @endif