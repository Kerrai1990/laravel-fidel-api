<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Homewards - Build your home deposit automatically</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="css/landing-page.min.css" rel="stylesheet">

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-light bg-light static-top">
    <div class="container">
        <a class="navbar-brand" href="#"><img src="{{ "img/homewards-logo.png" }}" alt="Homewards" style="height:40px; margin-top:-10px; margin-bottom: -5px;"></a>
        @if(auth()->check())
            <a class="btn btn-default" href="{{ route('dashboard.index') }}"><i class="icon icon-user"></i> Hi, {{ auth()->user()->name }}</a>
        @else
            <a class="btn btn-primary" href="{{ route('login') }}">Sign In</a>
        @endif
    </div>
</nav>

<!-- Masthead -->
<header class="masthead text-white text-center">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-xl-9 mx-auto">
                <h1 class="mb-5">Never compromise between living today, or wealth tomorrow.</h1>
            </div>
            <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
                <form>
                    <div class="form-row">
                        <div class="col-12 col-md-9 mb-2 mb-md-0">
                            <input type="email" class="form-control form-control-lg" placeholder="Enter your email for early access...">
                        </div>
                        <div class="col-12 col-md-3">
                            <button type="submit" class="btn btn-block btn-lg btn-primary">Sign up!</button>
                        </div>
                    </div>
                </form>

                <br>
                <a class="btn btn-warning" onclick="Fidel.openForm();" id="link-card-button">Test Transactions</a>

                <script
                        type="text/javascript"
                        src="https://resources.fidel.uk/sdk/js/v1/fidel.js"
                        class="fidel-form"
                        data-company-name="Homewards"
                        data-key="pk_test_6446a8c0-40b2-4586-b731-1703d3daa1cb"
                        data-program-id="78fdee70-e611-4c24-a30d-5a57346cf4de"
                        data-callback="callback"
                        data-country-code="GBR"
                        data-auto-open="false"
                        data-overlay-close="false"
                        data-background-color="#ffffff"
                        data-button-color="#4dadea"
                        data-button-title="Link Card"
                        data-button-title-color="#ffffff"
                        data-lang="en"
                        data-subtitle="Earn 1 point for every £1 spent online or in-store"
                        data-subtitle-color="#000000"
                        data-privacy-url=""
                        data-terms-color="#000000"
                        data-title="Link Card"
                        data-title-color="#000000">
                </script>
                <script>
                    function callback(error, card) {

                        if(error) {
                            console.log('Card Link Error', error);
                            return false;
                        }

                        if(card) {
                            console.log('Card Linked Successfully', card);
                            request('api/cards', card);
                        }
                    }

                    var fetchingResource = null;

                    function request (url, formData) {
                        if(fetchingResource) {
                            fetchingResource.abort();
                        }
                        fetchingResource = $.ajax({
                            url: url,
                            data: formData,
                            cache: false,
                            timeout: 15000,
                            type: 'POST',
                            beforeSend: function () {},
                            complete: function () {
                                fetchingResource = null;
                            },
                            error: function (error) {
                                if (error.statusText !== "abort");
                            },
                            success: function (result) {
                                console.log(result);
                            }
                        });
                    }
                </script>

            </div>
        </div>
    </div>
</header>

<!-- Icons Grid -->
<section class="features-icons bg-light text-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                    <div class="features-icons-icon d-flex">
                        <i class="icon-credit-card m-auto text-primary"></i>
                    </div>
                    <h3>Purchase or Donate</h3>
                    <p class="lead mb-0">Use your card in stores or have family/friends drop you some dolla dolla bills yall.</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                    <div class="features-icons-icon d-flex">
                        <i class="icon-layers m-auto text-primary"></i>
                    </div>
                    <h3>Over 1000+ vendors</h3>
                    <p class="lead mb-0">We've partnered up with the most popular brands so you can benefit lots and lots.</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="features-icons-item mx-auto mb-0 mb-lg-3">
                    <div class="features-icons-icon d-flex">
                        <i class="icon-check m-auto text-primary"></i>
                    </div>
                    <h3>Easy to Use</h3>
                    <p class="lead mb-0">Tap your payment card in any of our vendors and receive some money.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Image Showcases -->
<section class="showcase">
    <div class="container-fluid p-0">
        <div class="row no-gutters">

            <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('img/bg-showcase-1.jpg');"></div>
            <div class="col-lg-6 order-lg-1 my-auto showcase-text">
                <h2>What is Homewards?</h2>
                <p class="lead mb-0">Homewards helps Millennials build a deposit for their first home as they (and their family) spend with retailers. We’ll be using card-linking technology to create a completely passive, collaborative and goal-based cash back platform. By removing all friction from the process, we can leverage the combined cash back potential of a group of people to help reach a goal that they all consider worthwhile.</p>
            </div>
        </div>
        <div class="row no-gutters">
            <div class="col-lg-6 text-white showcase-img" style="background-image: url('img/bg-showcase-2.jpg');"></div>
            <div class="col-lg-6 my-auto showcase-text">
                <h2>Fully Secure for Everyone</h2>
                <p class="lead mb-0">We have a dedicated team bringing you the latest offers, and top of the line security so you can rest easy knowing the money you gain is all yours. It's what we do baby...</p>
            </div>
        </div>
        <div class="row no-gutters">
            <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('img/bg-showcase-3.jpg');"></div>
            <div class="col-lg-6 order-lg-1 my-auto showcase-text">
                <h2>Build a future for you</h2>
                <p class="lead mb-0">Go beyond cash back on retail purchases and to offer a range of financial services at key life stages and to also incorporate other methods to increase the value of their pot, including saving more actively as they mature and have gained motivation through seeing their pot grow passively.</p>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials -->
<section class="testimonials text-center bg-light">
    <div class="container">
        <h2 class="mb-5">What people are saying...</h2>
        <div class="row">
            <div class="col-lg-4">
                <div class="testimonial-item mx-auto mb-5 mb-lg-0">
                    <img class="img-fluid rounded-circle mb-3" src="img/testimonials-1.jpg" alt="">
                    <h5>Margaret E.</h5>
                    <p class="font-weight-light mb-0">"I'm Rich Biiiaaatch!"</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="testimonial-item mx-auto mb-5 mb-lg-0">
                    <img class="img-fluid rounded-circle mb-3" src="img/testimonials-2.jpg" alt="">
                    <h5>Fred S.</h5>
                    <p class="font-weight-light mb-0">"Growing up in the hood is tough. Thanks to Homewards my peeps can drop me some dolla dolla bills so I can buy a house when I'm out of the pen."</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="testimonial-item mx-auto mb-5 mb-lg-0">
                    <img class="img-fluid rounded-circle mb-3" src="img/testimonials-3.jpg" alt="">
                    <h5>Sarah	W.</h5>
                    <p class="font-weight-light mb-0">"I love avocados too much to save money. So other people can do it for me."</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="call-to-action text-white text-center">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-xl-9 mx-auto">
                <h2 class="mb-4">Ready to get started? Sign up now!</h2>
            </div>
            <div class="col-md-10 col-lg-8 col-xl-7 mx-auto">
                <form>
                    <div class="form-row">
                        <div class="col-12 col-md-9 mb-2 mb-md-0">
                            <input type="email" class="form-control form-control-lg" placeholder="Enter your email...">
                        </div>
                        <div class="col-12 col-md-3">
                            <button type="submit" class="btn btn-block btn-lg btn-primary">Sign up!</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="footer bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 h-100 text-center text-lg-left my-auto">
                <ul class="list-inline mb-2">
                    <li class="list-inline-item">
                        <a href="#">About</a>
                    </li>
                    <li class="list-inline-item">&sdot;</li>
                    <li class="list-inline-item">
                        <a href="#">Contact</a>
                    </li>
                    <li class="list-inline-item">&sdot;</li>
                    <li class="list-inline-item">
                        <a href="#">Terms of Use</a>
                    </li>
                    <li class="list-inline-item">&sdot;</li>
                    <li class="list-inline-item">
                        <a href="#">Privacy Policy</a>
                    </li>
                </ul>
                <p class="text-muted small mb-4 mb-lg-0">&copy; Homewards 2019. All Rights Reserved.</p>
            </div>
            <div class="col-lg-6 h-100 text-center text-lg-right my-auto">
                <ul class="list-inline mb-0">
                    <li class="list-inline-item mr-3">
                        <a href="#">
                            <i class="fab fa-facebook fa-2x fa-fw"></i>
                        </a>
                    </li>
                    <li class="list-inline-item mr-3">
                        <a href="#">
                            <i class="fab fa-twitter-square fa-2x fa-fw"></i>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#">
                            <i class="fab fa-instagram fa-2x fa-fw"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
