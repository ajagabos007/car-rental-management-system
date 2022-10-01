<div>
    {{-- The Master doesn't talk, he acts. --}}
    <div class="need-help bx-wrapper padding-20">
        <h5 class="text-custom-black">Need Help?.</h5>
        <p class="text-light-dark">We would be more than happy to help you. Our team advisor are 24/7 at your service to help you.</p>
        <ul class="custom">
            <li class="text-custom-blue fs-18">
                <i class="fas fa-phone-alt"></i>
                <a href="tel:+2344255645523" class="text-light-dark">(+234) 425 564 5523</a>
            </li>
           
            <li class="text-custom-blue fs-18">
                <i class="fas fa-envelope"></i>
                <a href="mailto:{{env('MAIL_FROM_ADDRESS')}}" class="text-sm">{{env('MAIL_FROM_ADDRESS')}}</a>
            </li>
            <li class="text-orange-300 fs-18 shadow w-fit px-2 rounded-full">
                <a href="#" class="text-light-dark">
                    <i class="fab fa-whatsapp"></i> Chat us
                </a>
            </li>
        </ul>
    </div>
</div>
