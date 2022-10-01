<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <x-slot name="title">
        Payments
    </x-slot>   
    <x-slot name="subheader">
        Payments
    </x-slot>
    <x-slot name="subheader_links">
        <li class="fw-500">
            <a href="{{route('payments.index')}}" class="text-custom-white">Payments</a>
        </li>
        <li class="active fw-500">
            {{$payment->transaction_reference}}
        </li>
    </x-slot>
    <div class="container">
        <div class=" form p-4 shadow">
            
            <h2 class="text-custom-blue">
                {{ env('APP_CODE', 'APP_CODE')}} INVOICE 
                <span class="border-bottom border-1 border-success text-custom-black">{{$payment->transaction_reference}}</span>
            </h2>
            <h4 class="text-custom-black float-right">Invoice <span class="text-custom-blue">{{$payment->paid_on?'Paid':$payment->status}}</span></h4>
            <h5 class="text-custom-black">Beneficial Information</h5>
            <div class="row mb-md-80">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="fs-14 text-custom-black fw-500">Full Name</label>
                        <input disabled="" class="form-control form-control form-control-custom" type="text" id="name" name="customer[name]" wire:model.lazy="user.name" autocomplete="user.name" placeholder="Full Name" required="required">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="fs-14 text-custom-black fw-500">Phone Number</label>
                        <input disabled="" class="form-control form-control form-control-custom" type="tel" id="name" name="customer[phone_number]" wire:model.lazy="user.phone_number" autocomplete="user.phone_number" placeholder="Phone Number" required="required">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="fs-14 text-custom-black fw-500">Email</label>
                        <input disabled="" class="form-control form-control form-control-custom" type="text" id="email" name="customer[email]" wire:model.lazy="user.email" autocomplete="user.email" placeholder="Full Name" required="required">
                    </div>
                </div>  
                <div class="col-md-12 " hidden>
                    <input type="hidden" name="customer[email]" value="{{$payment->paymentable->user->email}}" />
                    <input type="hidden" name="public_key" value="{{env('FLUTTERWAVE_PUBLIC_KEY')}}" />
                    <input type="hidden" name="tx_ref" value="{{$payment->transaction_reference}}" />
                    <input type="hidden" name="amount" value="{{$payment->amount}}" />
                    <input type="hidden" name="currency" value="NGN" />
                    <input type="hidden" name="meta[token]" value="54" />
                    <input type="hidden" name="redirect_url" value="{{route('payments.verify', $payment)}}" />
                </div>          
                <div class="col-12">
                    <hr>
                </div>
            </div>
            <h5 class="text-custom-black">Payment Information</h5>
            <div class="row mb-md-80">
                <div class="col-12">
                    <div class="hotel-type mb-xl-20 bg-light-white">
                        <table class="table table-borderless border-0 table-collapse">
                            <tbody>
                                <tr>
                                    <th>Payment Transaction Reference:</th>
                                    <td class="text-custom-blue">{{$payment->transaction_reference}}</td>
                                </tr>
                                <tr>
                                    <th>Item:</th>
                                    <td class="text-custom-blue">{{$payment->for}}</td>
                                </tr>
                                <tr>
                                    <th>Item code:</th>
                                    <td class="text-custom-blue"> <a href="{{$payment->paymentable_url}}" class="border-bottom border-1 border-success">{{$payment->paymentable->code}}</a></td>
                                </tr>
                                <tr>
                                    <th>Paid on:</th>
                                    <td class="text-custom-blue"> {{$payment->paid_on? $payment->paid_on: "NILL"}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                
            </div>

            <h5 class="text-custom-black">Amount Information</h5>
            <div class="row mb-md-80 ">
                <div class="col-12 ">
                    <table class="table table-borderless border-0 table-collapse mb-xl-20 bg-light-white">
                        <tbody>
                            <tr class="border text-custom-blue">

                                <th>Amount:</th>
                                <td>₦ {{$payment->amount}}</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
            @if($payment->status != "successful")
                <livewire:payment.flutterwave-checkout :payment="$payment" />
            @endif
        </div>
    </div>
    
</div>
