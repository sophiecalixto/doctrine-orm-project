# Doctrine ORM Project

**This project aims to study the ORM doctrine**


## Add client

### Linux
``` bash
php bin/insert-client.php 000.000.000-00 "John Doe" 
```
``` bash
php bin/insert-client.php 000.000.000-00 "John Doe" 999999999
```

### Windows
``` bash
php ./bin/insert-client.php 000.000.000-00 "John Doe"
```

## Get all client info

``` bash
php bin/get-all-client.php
```

## Get client info

``` bash
php bin/get-client.php 000.000.000-00
```

## Update client name

``` bash
php bin/update-client.php 000.000.000-00 "John Doe new"
```
``` bash
php bin/update-client.php 000.000.000-00 "John Doe new" 999999999
```

## Remove client

``` bash
php bin/remove-client.php 000.000.000-00
```