# PlentyONE Plugin for integrating and renaming POS default payment methods

This plugin provides you with all necessary POS default payment methods by making them available in your PlentyONE back end:

* Cash payment (ID 4)
* Card payment (ID 11)
* Coupons (ID 1700)

In addition, you can customise the names of the POS default payment methods for PlentyONE POS.

<div class="alert alert-success" role="alert">
   This plugin has to be installed and activated in the plugin set that is used for the main client.
</div>

<div class="alert alert-warning" role="alert">
   Are you already using the <a href="https://marketplace.plentymarkets.com/en/payuponpickup_4757" target="_blank">Pay upon pickup</a> plugin for Ceres? In case both plugins are installed in the same plugin set, you have to assign a lower position for the present plugin than for the Pay upon pickup plugin.
</div>

## Renaming default payment methods

Do you wish to assign customised names to the default payment methods? The changed name will appear in the PlentyONE back end, on POS receipts, in the X and Z reports and in all exports generated in PlentyONE POS.

The default payment methods can be renamed by using an assistant in the PlentyONE back end. The assistant leads you through the necessary settings. Proceed as described below.

#### Renaming default payment methods:

1. Go to **Setup » Assistants » Plugins**.
2. Select the plugin set in which you have installed the plugin.
3. Open the assistant **POS payment methods**.
4. Complete the assistant.

## Integrating default payment methods

The necessary default payment methods are automatically available and activated in your PlentyONE back end after you have completed the assistant. You can then see these default payment methods in the **Setup » Orders » Payment » Payment methods** menu.

## License

This project is licensed under the AFFERO GENERAL PUBLIC LICENSE – find further information in the [LICENSE.md](https://github.com/plentymarkets/plugin-pos-payment-method-renaming/blob/master/LICENSE.md).