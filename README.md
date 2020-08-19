Secure Cookies Extension for Magento 1
=======================================

Facts
-----
- Extension key: `Vianetz_SecureCookies`

Description
-----------
This extension for the Magento 1 online shop software improves the default Magento session cookies:
- The `frontend` cookie will be set to `Secure` and `SameSite=Lax`
- The `adminhtml` cookie will be set to `SameSite=Strict` (this cookie is by default set to `Secure` already)

This is required e.g. in Chrome and Firefox as described in [this Google blog post](https://web.dev/samesite-cookies-explained/).

Requirements
------------
- PHP >= 7.3.0 (because of the new `setcookie()` parameter to allow `SameSite` attribute setting)
- Magento >= 1.9

Installation Instructions
-------------------------

For installation notes please see also [our FAQ](https://www.vianetz.com/en/faq/how-to-install-the-magento-extension.html).

#### Preparations
1. Do a backup of your Magento installation for safety reasons.
2. Disable Magento compilation feature (if activated): _System > Tools > Compiler_

#### a) Installation with composer (recommended)
3. Run `composer install vianetz/secure-cookies-magento1`

#### or b) Installation with modman
3. Clone this repository into your modman folder and run `modman deploy-all`

#### or c) Manual Installation
3. Unzip the setup package and copy the contents of the `src/` folder into the Magento root folder. (The folder structure
   is the same as in your Magento installation. No files will be overwritten.)
   Please assure that the files are uploaded with the same file user permissions as the Magento installation!

#### Final Tasks
4. Clear the Magento cache (and related caches like APC/FPC/Opcache if available)
5. Logout from the admin panel and then login again
6. Enable the Magento compilation feature (if it was activated before): _System > Tools > Compiler_

We also offer paid installation services. If you are interested please [contact me](https://www.vianetz.com/en/contacts).

Uninstallation
--------------
1. Remove the folder `app/code/community/Vianetz/SecureCookies`
2. Remove the file `app/etc/modules/Vianetz_SecureCookies.xml`

Frequently Asked Questions
--------------------------
Please find the [Frequently Asked Questions on our website](https://www.vianetz.com/en/faq).

Support
-------
If you have any issues or suggestions with this extension, please do not hesitate to [contact me](https://www.vianetz.com/en/contacts).

Developer
---------
Christoph Massmann  
[https://www.vianetz.com](https://www.vianetz.com)  
[@vianetz](https://twitter.com/vianetz)

License
-------
[![GPLv3 License](https://img.shields.io/badge/License-GPL%20v3-yellow.svg)](https://opensource.org/licenses/)

This Magento Extension uses Semantic Versioning - please find more information at http://semver.org.
