Tracy Module for Laminas
=============
Tracy integration to Laminas.
The Lemo\Tracy module provides integration of Tracy to Laminas quickly and easily with many configuration options.

## Installation

Open terminal and go to your application directory

1. Run `composer require matycz/lemo-tracy`
2. Copy `lemotracy.local.php.dist` to `/config/autoload/` and rename it to `lemotracy.local.php`
3. Add `Lemo\Tracy` to `/config/application.ini` to section `modules` as one of the first modules
