# Maintenance Mode

This class has three main components:

- **$status** is a boolean variable indicating whether maintenance mode is enabled or not.
- **$allowedIps** is an array of IP addresses that are allowed to access the site during maintenance mode.
- **$message** is a string containing the message that will be displayed to users when maintenance mode is enabled.

The **check** method first checks if maintenance mode is enabled. If it is, it then checks if the client's IP address is in the **$allowedIps** array. If it is, the method simply returns and the user is granted access. If the IP address is not in the list, a **503 Service Unavailable** HTTP response is sent, along with a **Retry-After** header set to **3600** (one hour), and the **$message** is displayed to the user.

The **isIpAllowed** method retrieves the client's IP address from the **$_SERVER['REMOTE_ADDR']** variable and checks if it is in the **$allowedIps** array. If it is, the method returns **true**, otherwise it returns **false**.

## Here's an example of how you might use this class:
```php
$maintenanceMode = new MaintenanceMode(true, ['192.168.0.1', '127.0.0.1'], 'Our site is undergoing maintenance. Please check back soon.');
$maintenanceMode->check();
```

In this example, maintenance mode is enabled and access is granted only for IP addresses **192.168.0.1** and **127.0.0.1**. All other clients will receive a **503 Service Unavailable** HTTP response with the specified message.

### Authors

**Ramazan Çetinkaya**

- [github/ramazancetinkaya](https://github.com/ramazancetinkaya)

### License

Copyright © 2023, [Ramazan Çetinkaya](https://github.com/ramazancetinkaya).
