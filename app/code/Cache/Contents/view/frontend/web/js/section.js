define([
    'uiComponent',
    'Magento_Customer/js/customer-data'
], function (Component, customerData) {
    'use strict';

    return Component.extend({
        initialize: function () {
            this._super();

            customerData.reload('custom_section');

            this.customsection = customerData.get('custom_section');
        }
    });
});