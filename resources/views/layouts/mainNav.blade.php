    <!--Navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark sky-gradient mb-5">
        <div class="container">

            <!-- Navbar brand -->
            <a class="font-weight-bold white-text mr-4" href="{{ route('main') }}">Home</a>

            <!-- Collapse button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Collapsible content -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent1">

                <!-- Links -->
                <ul class="navbar-nav mr-auto">

                    <li class="nav-item">
                        <a class="nav-link font-weight-bold white-text mr-4" href="{{ route('hospitals') }}">Hospitals</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link font-weight-bold white-text mr-4" href="{{ route('clinics') }}">Clinics</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link font-weight-bold white-text mr-4" href="{{ route('pharmacies') }}">Pharmacies</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link font-weight-bold white-text mr-4" href="{{ route('cosmetics') }}">Cosmetic Clinics</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link font-weight-bold white-text mr-4" href="{{ route('products') }}">Products</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link font-weight-bold white-text mr-4" href="{{ route('jobs') }}">Jobs</a>
                    </li>


                </ul>
                <!-- Links -->
                <!--
                <form class="search-form" role="search">
                    <div class="form-group md-form my-0 waves-light">
                        <input type="text" class="form-control" placeholder="Search">
                    </div>
                </form>
                -->
            </div>
            <!-- Collapsible content -->
        </div>
    </nav>
    <!--/.Navbar-->