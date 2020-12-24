paypal.Buttons({
    style : {
        color: 'blue',
        shape: 'pill',
        label: 'subscribe'
    },
    createOrder: function (data, actions) {
        return actions.order.create({
            purchase_units: [{
                description: 'Subscribe to Research Reports',
                amount: {
                    value: 200
                }
            }],
            application_context: {
                shipping_preference: 'NO_SHIPPING'
            }
        });
    },
    onApprove: function (data, actions) {
        return actions.order.capture().then(function (details) {
            window.location.assign("/reportssubscribed")
        })
    },
    onCancel: function (data) {
        window.location.assign("/paypal_error")
    }
}).render('#paypal-payment-button');