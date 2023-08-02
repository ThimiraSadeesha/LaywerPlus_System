<!DOCTYPE html>
<html lang="">
<head>
    <title>Modern Stripe Payment</title>
    <!-- Stripe.js script -->
    <script src="https://js.stripe.com/v3/"></script>
    <style>
        /* Modern styling for the payment form */
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f7f7f7;
        }

        .payment-form {
            max-width: 100%;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-row {
            margin-bottom: 10px;
        }

        .stripe-input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .stripe-button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #1a73e8;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .stripe-button:hover {
            background-color: #0f64c7;
        }

        .message {
            margin-top: 10px;
            color: #666;
        }
    </style>
</head>
<body>
<div class="payment-form">
    <h2>Make a Payment</h2>
    <div class="form-row">
        <label for="card-element">Credit or Debit Card</label>
        <div id="card-element" class="stripe-input"></div>
        <div id="card-errors" class="message"></div>
    </div>
    <button id="submit-payment" class="stripe-button">Pay Now</button>
    <div id="payment-result" class="message"></div>

    <script>
        // Replace with your Stripe publishable key
        const stripePublicKey = 'pk_test_51NQJW3KTHX9f8CqeyS1mg8wyIdfgMEFJC7clYF8v5byFn1r9CDWFejGZLkmJFLuTT6EQLvsblPYSmH47t0MSmV1O00dgx10mod';
        const stripe = Stripe(stripePublicKey);
        const elements = stripe.elements();

        const cardElement = elements.create('card', {
            style: {
                base: {
                    iconColor: '#666',
                    color: '#333',
                    lineHeight: '40px',
                    fontWeight: 400,
                    fontFamily: 'Arial, sans-serif',
                    fontSize: '15px',
                    '::placeholder': {
                        color: '#ccc',
                    },
                },
            },
        });
        cardElement.mount('#card-element');

        const cardErrors = document.getElementById('card-errors');
        const paymentResult = document.getElementById('payment-result');

        const submitPaymentButton = document.getElementById('submit-payment');
        submitPaymentButton.addEventListener('click', async (event) => {
            event.preventDefault();
            submitPaymentButton.disabled = true;

            const { token, error } = await stripe.createToken(cardElement);

            if (error) {
                cardErrors.textContent = error.message;
            } else {
                cardErrors.textContent = '';
                const response = await fetch('process_payment.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({ token: token.id }),
                });
                const result = await response.json();
                paymentResult.textContent = result.message;
            }

            submitPaymentButton.disabled = false;
        });
    </script>
</div>
</body>
</html>
