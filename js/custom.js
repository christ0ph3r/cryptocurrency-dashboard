// Coin market API All Coins
function getAllCoins() {
  $.get("https://api.coinmarketcap.com/v1/ticker/?limit=100", function(data, status){
    var newHTML = [];
    $.each(data, function( index, value ) {
      if (index === 0) {
        getCoinTweets(value.name);
        getCoinData(value.id);
        newHTML.push('<li class="nav-item"><a class="nav-link active" href="#">' + value.rank + '. ' + '<span class="coin-name" data-coin-id="' + value.id + '">' + value.name + '<span class="text-muted text-right float-right">$' + value.price_usd + '</span></span></a></li>');
      } else {
        newHTML.push('<li class="nav-item"><a class="nav-link" href="#">' + value.rank + '. ' + '<span class="coin-name" data-coin-id="' + value.id + '">' + value.name + ' <span class="text-muted text-right float-right">$' + value.price_usd + '</span></span></a></li>');
      }
    });
    $("#coins-menu").html(newHTML.join(""));
  });
}

// Init all coins
getAllCoins();

// Coin market API Specific Coins
// Pass in coinmarketcap id (example: bitcoin)
function getCoinData(coin) {
  var url = "https://api.coinmarketcap.com/v1/ticker/" + coin + '/';
  $.get(url, function(data, status){
    $("#rank .card-text").text('#' + data[0].rank);
    $("#price-usd .card-text").text('$' + data[0].price_usd);
    $("#symbol .card-text").text(data[0].symbol);
    $("#24h-volume-usd .card-text").text('$' + addZeroes(data[0]['24h_volume_usd']));
    $("#market-cap-usd .card-text").text('$' + addZeroes(data[0].market_cap_usd));
    $("#change-hour .card-text").text('%' + data[0].percent_change_1h);
    $("#change-day .card-text").text('%' + data[0].percent_change_24h);
    $("#change-week .card-text").text('%' + data[0].percent_change_7d);
    $("#last-updated .card-text").text(timeSince(new Date(data[0].last_updated * 1000)) + ' ago');
    $("#current-coin").val(data[0].id);
    $("#coin-title").text(data[0].name);
    $(".number-comma").addCommas();

    if (data[0].percent_change_1h < 0) {
      $("#change-hour span").removeClass('oi-arrow-top');
      $("#change-hour span").addClass('oi-arrow-bottom');
    } else {
      $("#change-hour span").removeClass('oi-arrow-bottom');
      $("#change-hour span").addClass('oi-arrow-top');
    }

    if (data[0].percent_change_24h < 0) {
      $("#change-day span").removeClass('oi-arrow-top');
      $("#change-day span").addClass('oi-arrow-bottom');
    } else {
      $("#change-day span").removeClass('oi-arrow-bottom');
      $("#change-day span").addClass('oi-arrow-top');
    }

    if (data[0].percent_change_7d < 0) {
      $("#change-week span").removeClass('oi-arrow-top');
      $("#change-week span").addClass('oi-arrow-bottom');
    } else {
      $("#change-week span").removeClass('oi-arrow-bottom');
      $("#change-week span").addClass('oi-arrow-top');
    }

  });
}

/**
* Add zero if number only has one zero
* Example: $666,888.0 >> $666,888.00
* Fixes coinmarketcap API issues for market caps
* https://stackoverflow.com/a/24039448
*/

function addZeroes( num ) {
  var value = Number(num);
  var res = num.split(".");
  if(num.indexOf('.') === -1) {
    value = value.toFixed(2);
    num = value.toString();
  } else if (res[1].length < 3) {
    value = value.toFixed(2);
    num = value.toString();
  }
  return num
}

// Comma seperate big numbers
// Took multiple answers
// from https://stackoverflow.com/questions/1990512/add-comma-to-numbers-every-three-digits/
// This work with small coins like dogecoin and does not comma seperate AFTER decimals
// Like many functions do
$.fn.addCommas = function() {
  $(this).each(function(){
    $(this).text(addCommas($(this).text()));
  });
};
addCommas = function(nStr){
  nStr += '';
  x = nStr.split('.');
  x1 = x[0];
  x2 = x.length > 1 ? '.' + x[1] : '';
  var rgx = /(\d+)(\d{3})/;
  while (rgx.test(x1)) {
      x1 = x1.replace(rgx, '$1' + ',' + '$2');
  }
  return x1 + x2;
};

// Active menu class handling
$(document).on('click','.sidebar-left .nav-link',function() {
  $(".sidebar-left .nav-link").removeClass('active');
  $(this).addClass('active');
});

// Twitter API get tweets
function getCoinTweets(coin) {
  $.get("ajax/tweets.php", { coin: coin, type: 'popular' }, function(data, status){
    data = JSON.parse(data);
    var newHTML2 = [];
    $.each(data, function( index, value ) {
      if (value.text) {
        newHTML2.push('<p class="text-primary"><img class="rounded-circle mr-2" src="'
          + value.user.profile_image_url_https + '"><a href="https://twitter.com/' + value.user.screen_name + '" target="_blank">' + '@'
          + value.user.screen_name + '</a></p><span>' + value.text + '</span><br><span class="oi oi-heart mr-2"></span>' + value.favorite_count
          + '<span class="oi oi-aperture ml-4 mr-2"></span>' + value.retweet_count + '<hr>');
      }
    });
    $("#tweets-popular").html(newHTML2);
  });
  $.get("ajax/tweets.php", { coin: coin, type: 'recent' }, function(data, status){
    data = JSON.parse(data);
    var newHTML2 = [];
    $.each(data, function( index, value ) {
      if (value.text) {
        newHTML2.push('<p class="text-primary"><img class="rounded-circle mr-2" src="'
          + value.user.profile_image_url_https + '"><a href="https://twitter.com/' + value.user.screen_name + '" target="_blank">' + '@'
          + value.user.screen_name + '</a></p><span>' + value.text + '</span><br><span class="oi oi-heart mr-2"></span>' + value.favorite_count
          + '<span class="oi oi-aperture ml-4 mr-2"></span>' + value.retweet_count + '<hr>');
      }
    });
    $("#tweets-recent").html(newHTML2);
  });
}

// Call tweets function when coin menu item clicked
$(document).on('click','.sidebar-left .nav-link',function() {
  var coinName = $(this).find('.coin-name');
  getCoinData($(coinName).data('coin-id'));
  getCoinTweets($(coinName).data('coin-id'));
});

// Dynamic Modal Data For Donations
$(document).on('click','.footer-donate',function() {
  var coinName = $(this).data('coin-id');
  var donateAddress = $('#donate-address');
  var donateQr = $('#donate-qr');
  if (coinName === 'bitcoin') {
    donateAddress.text('1LFTccjYHbiVekdm8XYC1ucNqdGsAC3frc');
    donateQr.attr('src', 'img/qr-btc.png')
  }
  if (coinName === 'ethereum') {
    donateAddress.text('0x071Fe2Bb50430A3f6af398A410a78B67e1A783AE');
    donateQr.attr('src', 'img/qr-eth.png')
  }
  if (coinName === 'litecoin') {
    donateAddress.text('Lh9eV96yhTyrkv2VkWG7RZvas9TzFuYZbR');
    donateQr.attr('src', 'img/qr-ltc.png')
  }
});

/**
* Pretty time format X ago function
*
* https://stackoverflow.com/a/3177838
*/

function timeSince(date) {

  var seconds = Math.floor((new Date() - date) / 1000);

  var interval = Math.floor(seconds / 31536000);

  if (interval > 1) {
    return interval + " years";
  }
  interval = Math.floor(seconds / 2592000);
  if (interval > 1) {
    return interval + " months";
  }
  interval = Math.floor(seconds / 86400);
  if (interval > 1) {
    return interval + " days";
  }
  interval = Math.floor(seconds / 3600);
  if (interval > 1) {
    return interval + " hours";
  }
  interval = Math.floor(seconds / 60);
  if (interval > 1) {
    return interval + " minutes";
  }
  return Math.floor(seconds) + " seconds";
}

//$("#search-form").on("submit", function(){
$("#search-form").submit(function(e) {
  e.preventDefault();
  $(".sidebar-left .nav-link").removeClass('active');
  var coinName = $("#search-term").val().toLowerCase();
  if (coinName) {
    var tweets = getCoinTweets(coinName);
    var coindata = getCoinData(coinName);
    $('[data-coin-id="' + coinName +  '"]').parent().addClass('active');
  }
})

// Refresh data
window.setInterval(function(){
  var coin = $("#current-coin").val();
  getCoinTweets(coin);
  getCoinData(coin);
  // getAllCoins();
}, 10000);
