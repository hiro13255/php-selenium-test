<?php
require_once __DIR__ . '/vendor/autoload.php';

use Facebook\WebDriver\Chrome\ChromeOptions;
use Facebook\WebDriver\Chrome\ChromeDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\WebDriverExpectedCondition;
use Facebook\WebDriver\WebDriverBy;

$driverPath = realpath('./chromedriver');
putenv('webdriver.chrome.driver=' . $driverPath);

$options = new ChromeOptions();
$options->addArguments(['--headless']);

$capabilities = Facebook\WebDriver\Remote\DesiredCapabilities::chrome();
$capabilities->setCapability(ChromeOptions::CAPABILITY, $options);

$driver = ChromeDriver::start($capabilities);

$driver->get('https://www.rentio.jp/matome/2019/07/sony-ilce-7m3-review/');

$driver->wait(2);
print($driver->getTitle());

$file = './sample.png';
$driver->takeScreenshot($file);

$driver->quit();
