# R6Stats - PHP SDK

<p align="center">
	Welcome to Software development kit for R6Stats API
<center>

<div align="center">
  <kbd>
    <img src="https://avatars.githubusercontent.com/u/19493503?s=200&v=4" />
  </kbd>
</div>

## Installation
using composer
```bash
composer require yzpeedro/r6-php-sdk
```
## Basic Usage
```php
<?php  

// get psr-4 autoload
require_once "vendor/autoload.php";  

// get RainbowStats classes
use RainbowStats\RainbowStats\Auth\Authentication;  
use RainbowStats\RainbowStats\Stats\Player;  
  
// set yor API_KEY  
$authentication = new Authentication('YOUR_API_KEY');  
  
// get player object  
$player = new Player($authentication, [  
  'username' => 'Mumiia661',  
  'platform' => 'pc'  
]);  
  
// get all player information  
$all = $player->all();  
  
// get player stats  
$stats = $player->stats();  
  
// get all player aliases  
$aliases = $player->aliases();  
  
// get player seasonal progression  
$progression = $player->progression();
```
## Documentation
> You can see more about in [Documentation](https://github.com/yzPeedro/r6-php-sdk/wiki)

##

### Disclaimer
> If you are a tech lead or copyright owner of the R6Stats API and would like this repository removed, please contact me at: pedrocruzpessoa16@gmail.com
