namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;

class StripePaymentController extends Controller
{
    public function index()
    {
        return view('payment');
    }

    public function makePayment(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        Charge::create([
            'amount' => 100 * 100
            'currency' => 'usd',
            'source' => $request->stripeToken,
            'description' => 'Test payment from Laravel app',
        ]);

        return back()->with('success', 'Payment successful!');
    }
}