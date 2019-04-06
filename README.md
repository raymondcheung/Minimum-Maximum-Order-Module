# Minimum Maximum Order

## CONTENTS OF THIS FILE

  * Introduction
  * Requirements
  * Installation
  * Configuration
  * Author

## INTRODUCTION

This module is for setting a minimum and/or a maximum order amount that will
block the user from clicking checkout on the cart form page.  Both minimum
and maximum are optional settings.

On the /admin/config/minimum_maximum_order/adminsettings you can set these
values.  To use this module you need to have Drupal Commerce 2.x installed.
This module was created for a website of mine because I couldn't find this
module published elsewhere.

It is still in development phase and I am looking
for help especially in the minimum_maximum_order_form_alter(...) function in
the minimum_maximum_order.module.  This function needs cleanup and to be made
more efficient in obtaining the order total.

## REQUIREMENTS

Drupal Commerce 2.x.

## INSTALLATION

1. Install module as usual via Drush, Drupal UI or Composer.
2. Go to "Extend" and enable the Minimum Maximum Order module.
3. Alternatively, if you have Drupal CLI installed, run `drupal module:install minimum_maximum_order`

## CONFIGURATION

Go to /admin/config/minimum_maximum_order/adminsettings and set values for
either minimum or maximum, whichever you want to use to limit the orders.

### AUTHOR

Raymond Cheung
Email: darkray16@gmail.com


Goran Nikolovski
Website: (http://www.gorannikolovski.com)
Drupal: (https://www.drupal.org/u/gnikolovski)
Email: nikolovski84@gmail.com

Company: Studio Present, Subotica, Serbia
Website: (http://www.studiopresent.com)
Drupal: (https://www.drupal.org/studio-present)
Email: info@studiopresent.com

