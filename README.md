## Stock Availability

**Short Version:**

Fixes Magento's Stock Availability issue (out of stock / in stock) when creating a Credit Memo with returned items. Will put Stock Availability status to "In Stock" if items are returned from "Out of Stock" status

**Long(er) Version**

The Stock Availability Magento module was created to _fix_ something that many people have wanted for a long time. When the quantity of a certain product reaches 0, through sale of that product, the Stock Availability goes to "Out of Stock" automatically. When doing a Credit Memo (Return), Magento will put the quantity of that item back in stock but neglect to put the Stock Availability back to "In Stock". This module changes that.

Now, when you do a Credit Memo (Return) with this module installed, if the product's Stock Availability was set to "Out of Stock", then the product will reset to "In Stock" automatically.

Additional credit goes to [Ovidiu](http://stackoverflow.com/users/281258/ovidiu) from [Stackoverflow](http://stackoverflow.com) for helping make this work.

## Versions Tested

- MAGENTO CE 1.5.1.0
- MAGENTO CE 1.6.2.0
- MAGENTO CE 1.7.0.2


## Instructions for Stock Availability Module

Please backup your site and test on a test site/server first!

Ok, so you'd like to downloaded the Stock Availability module but you don't have a clue how to get and use it. Well, here are the instructions to get you through the thick of it…

1. Retrieve the module code from Github however you desire. _Hint: You can always click on "Download ZIP"._
2. Upload (via FTP client, such as [FileZilla](http://filezilla-project.org/)) the **app** directory to the root of your Magento install.
3. If you're logged into your admin panel, please log out and then log back in. Otherwise you will get that pesky _**404, not found**_ message when trying to view the **config** area.

Then navigate to

```bash
System >  Configuration > [GSC Modules] Stock Availability`
```

for additional information.

That is all. When you initiate a _**Credit Memo**_, Magento will now return the "Stock Availability" to "in stock" if you're returning products from a 0 quantity (to anything greater than 0).

_**Note:**_ There are no additional settings provided with this module.
