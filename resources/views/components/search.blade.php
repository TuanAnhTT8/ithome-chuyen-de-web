<link rel="stylesheet" href="./css/search-style.css">
<div id="search-bar">
    <form action="">
        <ul class="navbar-nav">
            <li>
                <input class="form-control mr-sm-2" type="search" placeholder="Key word, Road, Distric,..." aria-label="Search">
            </li>
            <li>
                <select id="province-select" class="form-select" aria-label="Default select example">
                <option value="0" selected>All Province</option>
                    @foreach ($provinces as $province){
                        <option value="{{$province -> id}}">{{$province -> _name}}</option>
                    @endforeach                  
                </select>
            </li>
            <li>
                <select id="district-select" class="form-select" aria-label="Default select example">
                <option value="0" selected>All Province</option>
                                    
                </select>
            </li>
            <li>
                <select id="ward-select" class="form-select" aria-label="Default select example">
                <option value="0" selected>All Ward</option>
                                    
                </select>
            </li>
            <li>
                <select id="street-select" class="form-select" aria-label="Default select example">
                <option value="0" selected>All Street</option>
                                    
                </select>
            </li>
            <li>
                <select id="category-filter" class="form-select" aria-label="Default select example">
                    <option selected></i>Hotel</option>
                    <option value="1">House</option>
                    <option value="2">Apartment</option>
                </select>
            </li>
            <li>
                <select id="min-price" class="form-select" aria-label="Default select example">
                    <option selected></i>Min Price</option>
                    <option value="1">1,000,000</option>
                    <option value="2">2,000,000</option>
                    <option value="3">3,000,000</option>
                    <option value="3">4,000,000</option>
                    <option value="3">5,000,000</option>
                    <option value="3">6,000,000</option>
                    <option value="3">7,000,000</option>
                    <option value="3">8,000,000</option>
                    <option value="3">9,000,000</option>
                    <option value="3">10,000,000</option>
                </select>
            </li>
            <li>
                <select id="max-price" class="form-select" aria-label="Default select example">
                    <option selected></i>Max Price</option>
                    <option value="1">1,000,000</option>
                    <option value="2">2,000,000</option>
                    <option value="3">3,000,000</option>
                    <option value="3">4,000,000</option>
                    <option value="3">5,000,000</option>
                    <option value="3">6,000,000</option>
                    <option value="3">7,000,000</option>
                    <option value="3">8,000,000</option>
                    <option value="3">9,000,000</option>
                    <option value="3">10,000,000</option>
                </select>
            </li>
           
            <li>
            <input id="filter" class="btn btn-primary" type="submit" value="Filter">
            </li>
        </ul>

    </form>
</div>
