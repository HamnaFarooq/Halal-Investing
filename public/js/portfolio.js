paypal.Buttons({
    style : {
        color: 'blue',
        shape: 'pill',
        label: 'subscribe'
    },
    createOrder: function (data, actions) {
        return actions.order.create({
            purchase_units: [{
                description: 'Subscribe to Portfolio',
                amount: {
                    value: 300
                }
            }],
            application_context: {
              shipping_preference: 'NO_SHIPPING'
            }
        });
    },
    onApprove: function (data, actions) {
        return actions.order.capture().then(function (details) {
            window.location.replace("/portfoliosubscribed")
        })
    },
    onCancel: function (data) {
        // window.location.replace("/paypal/Oncancel")
    }
}).render('#paypal-payment-button');