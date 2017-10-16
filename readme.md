# Cryptocurrency Dashboard

Cryptocurrency Dashboard lets you monitor the top 100 currencies based on market cap size.  It uses the coinmarketcap.com API to fetch crypto data.  It uses the Twitter API to monitor the latest and most popular tweets about a Cryptocurrency.

![Cryptocurrency Dashboard](https://i.imgur.com/3a0ILCS.png)

## Features

### General
1. Live Data ( No need to refresh )
1. Bootstrap 4
1. Dashboard with 100 cryptocurrencies
1. Search other coins not in the top 100

### Twitter API Data
1. Latest Tweets Feed
1. Popular Tweets Feed

### Coinmarketcap API Data
1. Coin Rank
1. Price
1. Coin Symbol
1. Market Cap
1. 24 Hour Volume
1. Last Updated
1. % Change 1 Hour
1. % Change 1 Day
1. % Change 1 Week

## Installation Instructions


1. Git Clone the repo

```
git clone https://github.com/christ0ph3r/cryptocurrency-dashboard/
```

2. Copy the config-sample.php file and name it config.php

```
cd cryptocurrency-dashboard && cp config-sample.php config.php
```

3. Edit config.php and put in your [Twitter API](https://developer.twitter.com/) credentials

```php
<?php
$consumer_key = "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx";
$consumer_secret = "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx";
$access_token = "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx";
$access_token_secret = "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx";
```

## Like my work? Donate some coin!


| Coin     | Address                                    |
| -------- |:------------------------------------------:|
| Bitcoin  | 1LFTccjYHbiVekdm8XYC1ucNqdGsAC3frc         |
| Ethereum | 0x071Fe2Bb50430A3f6af398A410a78B67e1A783AE |
| Litecoin | Lh9eV96yhTyrkv2VkWG7RZvas9TzFuYZbR         |
