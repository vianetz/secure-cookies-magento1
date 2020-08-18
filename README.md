Secure Cookies Extension for Magento 1
=======================================

Facts
-----
- Extension key: `Vianetz_SecureCookies`

Description
-----------
This module for the Magento 1 online shop software improves the default Magento session cookies:
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

1. Do a backup of your Magento installation for safety reasons.
1. Disable Magento compilation feature (if activated): System > Tools > Compiler
1. Unzip the setup package and copy the contents of the src/ folder into the Magento root folder. (The folder structure
   is the same as in your Magento installation. No files will be overwritten.)
   Please assure that the files are uploaded with the same file user permissions as the Magento installation!
1. Clear the Magento cache (and related caches like APC if available)
1. Logout from the admin panel and then login again
1. Enable the Magento compilation feature (if it was activated before): System > Tools > Compiler

As an alternative you can install the module via modman.
Please find [more information](https://github.com/colinmollenhour/modman) about that installation method
(thanks @colinmollenhour).

We also offer paid installation services. If you are interested please contact me at support@vianetz.com.

Uninstallation
--------------
1. Remove the folder `app/code/community/Vianetz/SecureCookies`
2. Remove the file `app/etc/modules/Vianetz_SecureCookies.xml`

Frequently Asked Questions
--------------------------
Please find the Frequently Asked Questions on our website www.vianetz.com/en/faq.

Support
-------
If you have any issues or suggestions with this extension, please do not hesitate to
contact me at https://www.vianetz.com/en/contacts or support@vianetz.com.

Developer
---------
Christoph Massmann
[https://www.vianetz.com](https://www.vianetz.com)
[@vianetz](https://twitter.com/vianetz)

Licence
-------
[GNU GENERAL PUBLIC LICENSE](http://www.gnu.org/licenses/gpl-3.0.txt)

Copyright
---------
(c) since 2008 vianetz

This Magento Extension uses Semantic Versioning - please find more information at http://semver.org.
