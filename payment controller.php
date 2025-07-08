use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;

public function showForm()
{
    return view('payment-form');
}

public function makePayment(Request $request)
{
    Stripe::setApiKey(env('STRIPE_SECRET'));

    Charge::create([
        "amount" => 100 * 100, // amount in cents
        "currency" => "usd",
        "source" => $request->stripeToken,
        "description" => "Test Payment"
    ]);

    return back()->with('success', 'Payment successful!');
}