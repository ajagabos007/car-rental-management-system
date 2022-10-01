<div>
    {{-- In work, do what you enjoy. --}}
    <x-slot name="title">
        Payments
    </x-slot>   
    <x-slot name="subheader">
        Payments
    </x-slot>
    <x-slot name="subheader_links">
        <li class="active fw-500">
            Payments
        </li>
    </x-slot>
    <section class="section-padding bg-light-white booking-form">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="tabs">
                        <ul class="custom-flex nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#payments">Payments ({{$payments->count()}})</a>
                            </li>
                        </ul>
                        <div class="tab-content bg-custom-white bx-wrapper padding-20">

                            <div class="tab-pane fade active show" id="payments">
                                <div class="tab-inner">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="table-responsive">
                                            <table class="table table-hover table-striped table-dark">
                                                <caption class="fs-6 text-custom-blue">List of Payment</caption>
                                                <thead>
                                                    <tr>
                                                        <th scope="col" class="text-nowrap">#</th>
                                                        <th scope="col" class="text-nowrap">Transaction Reference</th>
                                                        <th scope="col" class="text-nowrap">Payment For</th>
                                                        <th scope="col" class="text-nowrap">Amount</th>
                                                        <th scope="col" class="text-nowrap">Paid on</th>
                                                        <th scope="col" class="text-nowrap">Verified on</th>
                                                        <th scope="col" class="text-nowrap">Status</th>
                                                        <th scope="col" class="text-nowrap">Actions</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach ($payments as $payment)
                                                        <tr>
                                                            <th scope="row">{{$loop->index + 1}}</th>
                                                            <td class="text-nowrap">{{$payment->transaction_reference}}</td>
                                                            <td class="text-nowrap">
                                                                <a href="{{$payment->paymentable_url}}">{{$payment->for}}</a>
                                                            </td>
                                                            <td class="text-nowrap active">
                                                                <a href="#">{{$payment->amount}}</a>
                                                            </td>
                                                            <td class="text-nowrap">{{$payment->paid_on? $payment->paid_on :'NILL'}}</td>
                                                            <td class="text-nowrap">{{$payment->verified_on ? $payment->verified_on: "NILL"}}</td>
                                                            <td class="text-nowrap">
                                                                @if($payment and $payment->status != 'successful')
                                                                    <span class="bg-warning text-dark p-2">
                                                                        {{$payment->status}}
                                                                    </span> 
                                                                    @else
                                                                    <span class="bg-custom-blue p-2">
                                                                        {{$payment->status}}
                                                                    </span> 
                                                                @endif
                                                            </td>
                                                            <td class="text-nowrap">
                                                                <div class="action">
                                                                    @if($payment and $payment->status != 'successful')
                                                                        <livewire:payment.flutterwave-checkout :payment="$payment" />
                                                                        @else
                                                                        <a href="{{route('payments.show', $payment)}}" class="btn-second btn-submit bg-primary">View</a>
                                                                    @endif
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
