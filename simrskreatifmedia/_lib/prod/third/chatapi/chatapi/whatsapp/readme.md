PHP library for WhatsApp api
=======================

[![Latest Version](https://img.shields.io/github/release/chatapi/whatsApp-php.svg?style=flat-square)](https://github.com/chatapi/whatsApp-php/releases)
[![Total Downloads](https://img.shields.io/packagist/dt/chatapi/whatsApp.svg?style=flat-square)](https://packagist.org/packages/chatapi/whatsApp)

Light PHP library for interact with WhatsApp api.

## Installing

The recommended way to install is through
[Composer](http://getcomposer.org).

```bash
# Install Composer
curl -sS https://getcomposer.org/installer | php
```

Next, run the Composer command to install the latest stable version:

```bash
php composer.phar require chatapi/whatsApp
```

After installing, you need to require Composer's autoloader:

```php
require 'vendor/autoload.php';
```

You can then later update library using composer:

 ```bash
composer.phar update
 ```
 
## Usage
 
Create client instance
 
```php
$client = Client::getInstance([
   'url' => 'your_url',
   'token' => 'your_token'
]);
```
 
Send message

```php
$client->sendMessage([
   'phone' => '78005553535',
   'body' => 'Hi there!'
]);
```

Send file

```php
$data = $client->sendFile([
   'phone' => '78005553535', 
   'body' => 'some_file',      // file in base64
   'filename' => 'sample.jpg'
]);
```
 
Create group

```php
$client->createGroup(
   'New chat', ['78005553535'], 'First message'
);
```
 
Get list of all incoming messages

```php
$data = $client->getMessages();
```

Get not sent messages queue

```php
$data = $client->getMessagesQueue();
```
 
Clear not sent messages queue

```php
$data = $client->clearMessagesQueue();
```

Get account status

```php
$data = $client->getStatus();
```
 
Get QR-code

```php
$data = $client->getQrCode();
```
 
Set webhook

```php
$data = $client->setWebHook('http://<some_url>');
```
 
Get webhook

```php
$data = $client->getWebHook();
```

Reboot application

```php
$data = $client->reboot();
```

Logout

```php
$data = $client->logout();
```
