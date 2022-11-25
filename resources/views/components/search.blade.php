<link rel="stylesheet" href="{{asset('css/search-style.css')}}">
<div id="search-bar">
    <form action="">
        <ul class="navbar-nav">
            <li>
                <input class="form-control mr-sm-2" type="search" placeholder="Key word, Road, Distric,..." aria-label="Search">
            </li>
            <li>
                <select id="province-select" class="form-select" aria-label="Default select example">
                <option value="0" selected>All Provinces</option>
                    @foreach ($provinces as $province){
                        <option value="{{$province -> id}}">{{$province -> _name}}</option>
                    @endforeach                  
                </select>
            </li>
            <li>
                <select id="district-select" class="form-select" aria-label="Default select example">
                <option value="0" selected>All Districts</option>
                                    
                </select>
            </li>
            <li>
                <select id="ward-select" class="form-select" aria-label="Default select example">
                <option value="0" selected>All Wards</option>
                                    
                </select>
            </li>
            <li>
                <select id="street-select" class="form-select" aria-label="Default select example">
                <option value="0" selected>All Streets</option>
                                    
                </select>
            </li>
            <li>
                <select id="category-filter" class="form-select" aria-label="Default select example">
                    <option value="0" selected>All Categories</option>
                    <option value="1">Apartment</option>
                    <option value="2">Motel</option>
                    <option value="3">House</option>
                </select>
            </li>
            <li>
                <select id="min-price" class="form-select" aria-label="Default select example">
                    <option selected></i>Min Price</option>
                    <option value="1000000">1,000,000</option>
                    <option value="2000000">2,000,000</option>
                    <option value="3000000">3,000,000</option>
                    <option value="4000000">4,000,000</option>
                    <option value="5000000">5,000,000</option>
                    <option value="6000000">6,000,000</option>
                    <option value="7000000">7,000,000</option>
                    <option value="8000000">8,000,000</option>
                    <option value="9000000">9,000,000</option>
                    <option value="10000000">10,000,000</option>
                    <option value="20000000">20,000,000</option>
                    <option value="30000000">30,000,000</option>
                    <option value="50000000">50,000,000</option>
                </select>
            </li>
            <li>
                <select id="max-price" class="form-select" aria-label="Default select example">
                <option selected></i>Min Price</option>
                <option selected></i>Min Price</option>
                    <option value="1000000">1,000,000</option>
                    <option value="2000000">2,000,000</option>
                    <option value="3000000">3,000,000</option>
                    <option value="4000000">4,000,000</option>
                    <option value="5000000">5,000,000</option>
                    <option value="6000000">6,000,000</option>
                    <option value="7000000">7,000,000</option>
                    <option value="8000000">8,000,000</option>
                    <option value="9000000">9,000,000</option>
                    <option value="10000000">10,000,000</option>
                    <option value="20000000">20,000,000</option>
                    <option value="30000000">30,000,000</option>
                    <option value="50000000">50,000,000</option>
                </select>
            </li>
           
            <li>
            <input id="filter" class="btn btn-primary" type="submit" value="Filter">
            </li>
        </ul>

    </form>
</div>
