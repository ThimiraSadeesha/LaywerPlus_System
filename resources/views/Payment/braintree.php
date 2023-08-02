<?php

require_once 'vendor/autoload.php';

use Stripe\StripeClient;

// Get your Stripe keys from the Stripe dashboard.
$stripe_secret_key = 'sk_test_YOUR_SECRET_KEY';
$stripe_publishable_key = 'pk_test_YOUR_PUBLISHABLE_KEY';

// Create a new Stripe client.
$stripe = new StripeClient($stripe_secret_key);

// Create a new customer.
$customer = $stripe->customers->create([
    'email' => 'johndoe@example.com',
    'name' => 'John Doe',
]);

// Create a new charge.
$charge = $stripe->charges->create([
    'amount' => 100,
    'currency' => 'USD',
    'customer' => $customer->id,
    'description' => 'Test charge',
]);

// Check the status of the charge.
if ($charge->status == 'paid') {
    echo 'The charge was successful!';
} else {
    echo 'The charge failed.';
}

?>
