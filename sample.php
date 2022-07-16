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

$driver = ChromeDriver::start();

$driver->get('https://www.google.com');

$driver->wait(5);

$file = './sample.png';
$driver->takeScreenshot($file);

$driver->quit();


