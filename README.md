# PayHere Opencart Payment Gateway Plugin

Tested on OpenCart 2.2.0.2

## Download

Download the latest release from the releases section or download it from the OpenCart Extensions website.

For auto-installation rename the file to use the extension ocmod.zip, for example: payhere-opencart-2.x.ocmod.zip.

## Installation

#### Automatic Installation

1. Go to Extensions > Extension installer.
2. Click on upload and select payHere-opencart-2.x.ocmod.zip from your download directory
3. Click on Continue button.
4. You will get the success notification if extension is properly installed.

***Note: if automatic installation fails you can try further manual installation steps.***

#### Manual Installation:

1. Copy the contents of upload directory(the folders inside upload directory in plugin) into your OpenCart installation root directory.
2. Navigate to Extensions > Payment from admin panel menu.
3. Look for the Instamojo in Payment List.
4. Click on green Install button(the button have + icon).

## Configuration

1. After installation click on edit button corresponding to PayHere plugin.
2. Fill the following details:

    -  **Status:** This is the current status of the module. To use PayHere during checkout make sure to change it to enabled.
     
    - **Merchant ID** and **Merchant Secret** - Merchant ID can be found at your PayHere Account and Merchant Secret can be configured at your PayHere Account Settings. 
    
    - **Sandbox Mode:** If enabled you can use our [Sandbox environment](https://sandbox.payhere.lk) to test payments. Note that in this case you should use `Merchant ID` and `Merchant Secret` from the Sandbox Account not Live Account. Related support article: [Sandbox & Testing](https://support.payhere.lk/faq/sandbox-and-testing)

    - **Order Status :** This is the order of the status that you would like to set after a successful payment.

    - **Display Name:** This is the label users will see during checkout, its default value is "Pay with PayHere". You can change it to something more generic like "Pay using Credit/Debit Card or Online Banking".
      

Migrating from older version

If you were already using older version of our plugin then follow these steps:

1. Uninstall the old Instamojo extension first from Extensions -> Payments.
2. Now remove the following files:
    - admin/controller/payment/payhere.php
    - admin/language/english/payment/payhere.php
    - admin/view/template/payment/payhere.tpl
    - catalog/controller/payment/payhere.php
    - catalog/model/payment/payhere.php
    - catalog/view/theme/default/template/payment/payhere.tpl

## Support

For any help please contact our Live Support Channel on http://m.me/PayHereLK
