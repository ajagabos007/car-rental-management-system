<div >
    {{-- In work, do what you enjoy. --}}
    <form method="POST" action="https://checkout.flutterwave.com/v3/hosted/pay">    
        <input type="hidden" name="public_key" value="{{env('FLUTTERWAVE_PUBLIC_KEY')}}" />
        <input type="hidden" name="customer[email]" value="{{$payment->paymentable->user->email}}" />
        <input type="hidden" name="customer[phone_number]" value="{{$payment->paymentable->user->phone_number}}" />
        <input type="hidden" name="customer[name]" value="{{$payment->paymentable->user->name}}" />
        <input type="hidden" name="tx_ref" value="{{$payment->transaction_reference}}" />
        <input type="hidden" name="amount" value="{{$payment->amount}}" />
        <input type="hidden" name="currency" value="NGN" />
        <input type="hidden" name="meta[token]" value="54" />
        <input type="hidden" name="redirect_url" value="{{route('payments.verify', $payment)}}" />
        <button type="submit" class="btn-first btn-submit"> {{$text? $text: 'Pay Now'}}</button>
    </form>
</div>
