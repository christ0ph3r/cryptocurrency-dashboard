<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Cryptocurrency Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/custom.css" rel="stylesheet">

    <!-- Open iconic icons -->
    <link href="icons/open-iconic/font/css/open-iconic-bootstrap.css" rel="stylesheet">

  </head>

  <body class="bg-dark">

    <!-- Start of menu -->
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark bg-super-dark">
      <a class="navbar-brand" href="#">Crypto Currency Dashboard</a>
      <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
        </ul>
        <form id="search-form" class="form-inline mt-2 mt-md-0">
          <input id="search-term" class="form-control mr-sm-2 bg-dark text-muted" type="text" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav>
    <!-- End of menu -->

    <div class="container-fluid">
      <div class="row">

        <!-- Start of side nav coins menu -->
        <nav class="col-md-2 d-none d-sm-block sidebar sidebar-left">
          <ul id="coins-menu" class="nav nav-pills flex-column mb-5"></ul>
        </nav>
        <!-- End of side nav coins menu -->

        <!-- Start of main content -->
        <main class="col-md-8 m-sm-auto text-center px-0" role="main">

          <!-- Start of title -->
          <div class="col-lg-12 bg-gradient w-100 py-5 px-0">
            <h2 id="coin-title"></h2>
          </div>
          <!-- End of title -->

          <!-- Start of stats -->
          <div class="card-deck m-3">
            <div id="rank" class="card text-white bg-dark py-4 border-primary">
              <div class="card-body">
                <h5 class="card-title">Coin Rank</h5>
                <h3><span class="oi oi-signal mb-3 mt-2"></span></h3>
                <h5 class="card-text number-comma"></h5>
              </div>
            </div>
            <div id="price-usd" class="card text-white bg-dark py-4 border-primary">
              <div class="card-body">
                <h5 class="card-title">Price</h5>
                <h3><span class="oi oi-dollar mb-3 mt-2"></span></h3>
                <h5 class="card-text number-comma"></h5>
              </div>
            </div>
            <div id="symbol" class="card text-white bg-dark py-4 border-primary">
              <div class="card-body">
                <h5 class="card-title">Symbol</h5>
                <h3><span class="oi oi-info mb-3 mt-2"></span></h3>
                <h5 class="card-text number-comma"></h5>
              </div>
            </div>
          </div>
          <div class="card-deck m-3">
            <div id="market-cap-usd" class="card text-white bg-dark py-4 border-primary">
              <div class="card-body">
                <h5 class="card-title">Market Cap</h5>
                <h3><span class="oi oi-pie-chart mb-3 mt-2"></span></h3>
                <h5 class="card-text number-comma"></h5>
              </div>
            </div>
            <div id="24h-volume-usd" class="card text-white bg-dark py-4 border-primary">
              <div class="card-body">
                <h5 class="card-title">24 Hour Volume</h5>
                <h3><span class="oi oi-clock mb-3 mt-2"></span></h3>
                <h5 class="card-text number-comma"></h5>
              </div>
            </div>
            <div id="last-updated" class="card text-white bg-dark py-4 border-primary">
              <div class="card-body">
                <h5 class="card-title">Last Updated</h5>
                <h3><span class="oi oi-arrow-top mb-3 mt-2"></span></h3>
                <h5 class="card-text"></h5>
              </div>
            </div>
          </div>
          <div class="card-deck m-3">
            <div id="change-hour" class="card text-white bg-dark py-4 border-primary">
              <div class="card-body">
                <h5 class="card-title">Change (1 Hour)</h5>
                <h3><span class="oi oi-arrow-top mb-3 mt-2"></span></h3>
                <h5 class="card-text"></h5>
              </div>
            </div>
            <div id="change-day" class="card text-white bg-dark py-4 border-primary">
              <div class="card-body">
                <h5 class="card-title">Change (1 Day)</h5>
                <h3><span class="oi oi-arrow-top mb-3 mt-2"></span></h3>
                <h5 class="card-text"></h5>
              </div>
            </div>
            <div id="change-week" class="card text-white bg-dark py-4 border-primary">
              <div class="card-body">
                <h5 class="card-title">Change (1 Week)</h5>
                <h3><span class="oi oi-arrow-top mb-3 mt-2"></span></h3>
                <h5 class="card-text"></h5>
              </div>
            </div>
          </div>
          <!-- End of stats -->
          <input id="current-coin" type="hidden" value="">
        </main>
        <!-- End of main content -->

        <!-- Start of side nav tweets menu -->
        <nav class="col-md-2 d-none d-sm-block sidebar sidebar-right">
          <ul class="nav nav-pills nav-fill" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" data-toggle="tab" href="#tweets-popular-tab" role="tab">Popular Tweets</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#tweets-recent-tab" role="tab">Recent Tweets</a>
            </li>
          </ul>
          <!-- Start of tab panes -->
          <div class="tab-content">
            <!-- Start of popular tweets -->
            <div class="tab-pane active" id="tweets-popular-tab" role="tabpanel"><div id="tweets-popular" class="mb-5 text-muted"></div></div>
            <!-- End of popular tweets -->
            <!-- Start of recent tweets -->
            <div class="tab-pane" id="tweets-recent-tab" role="tabpanel"><div id="tweets-recent" class="mb-5 text-muted"></div></div>
            <!-- End of recent tweets -->
          </div>
          <!-- End of tab panes -->
        </nav>
        <!-- End of side nav tweets menu -->

      </div>
    </div>

    <!-- Start of footer -->
    <ul class="nav justify-content-center fixed-bottom text-muted bg-super-dark">
      <li class="nav-item">
        <a class="nav-link footer-donate" data-coin-id="bitcoin" data-toggle="modal" data-target="#donateModal">Donate BTC</a>
      </li>
      <li class="nav-item">
        <a class="nav-link footer-donate" data-coin-id="ethereum" data-toggle="modal" data-target="#donateModal">Donate ETH</a>
      </li>
      <li class="nav-item">
        <a class="nav-link footer-donate" data-coin-id="litecoin" data-toggle="modal" data-target="#donateModal">Donate LTC</a>
      </li>
    </ul>
    <!-- End of footer -->

    <!-- Start of donate Modal -->
    <div class="modal fade" id="donateModal" tabindex="-1" role="dialog" aria-labelledby="donateModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header justify-content-center text-center">
            <h5 class="modal-title" id="donateModalLabel">Like my work? Send a small donation.</h5>
          </div>
          <div class="modal-body modal-body-donate justify-content-center text-center">
            <img id="donate-qr" class="my-3" src="">
            <div id="donate-address" class="mb-2"></div>
          </div>
          <div class="modal-footer justify-content-center text-center">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <!-- End of donate modal -->

    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>

    <!-- Source code https://github.com/christ0ph3r/cryptocurrency-dashboard/ -->

  </body>
</html>
