<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Inventory System') }}
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                    <li><a class="nav-link" href="http://localhost/MyCRUDApplication/public/add_product"><span class="glyphicon glyphicon-save"></span> New Product</a></li>
                    <li><a class="nav-link" href="http://localhost/MyCRUDApplication/public/show_products"><span class="glyphicon glyphicon-eye-open"></span> All Products</a></li>               
            </ul>
        </div>
    </div>
</nav>