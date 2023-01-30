# PHP-MaintenanceMode
Creating maintenance mode class using PHP

## Example usage of the class:
```php
$maintenanceMode = new MaintenanceMode(true, ['192.168.0.1', '127.0.0.1'], 'Our site is undergoing maintenance. Please check back soon.');
$maintenanceMode->check();
```
