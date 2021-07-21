define([
    'Magento_Ui/js/form/element/abstract',
    'Magento_Checkout/js/model/shipping-rates-validator',
    'Magento_Customer/js/model/address-list'
], function (Abstract, shippingRatesValidator, addressList) {
    'use strict';

    return Abstract.extend({

        /**
         * Initializes observable properties of instance
         *
         * @returns {Abstract} Chainable
         */
        initObservable: function () {
            this._super();

            if (addressList().length == 0){
                shippingRatesValidator.bindHandler(this);
            }

            return this;
        }
    });
});
