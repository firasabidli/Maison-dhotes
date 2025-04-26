<div class="container-fluid bg-dark text-secondary  pt-5" id="contact">
    <div class="row px-xl-5 ">
        <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5" >
            <h5 class="text-secondary text-uppercase mb-4">Nous Contacter</h5>
            <p class="mb-4">Profitez d'un séjour inoubliable dans nos maisons d'hôtes. Découvrez des lieux uniques et un service de qualité.</p>
            
        </div>
        <div class="container-fluid">
            <div class="row px-xl-5">
                <div class="col-lg-7 ">
                    <div class="contact-form bg-dark ">
                        <div id="success"></div>
                        <form name="sentMessage" id="contactForm" novalidate="novalidate">
                            <div class="control-group">
                                <input type="text" class="form-control" id="name" placeholder="Your Name"
                                    required="required" data-validation-required-message="Please enter your name" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <input type="email" class="form-control" id="email" placeholder="Your Email"
                                    required="required" data-validation-required-message="Please enter your email" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <input type="text" class="form-control" id="subject" placeholder="Subject"
                                    required="required" data-validation-required-message="Please enter a subject" />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <textarea class="form-control" rows="8" id="message" placeholder="Message"
                                    required="required"
                                    data-validation-required-message="Please enter your message"></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                            <div>
                                <button class="btn btn--primary py-2 px-4" type="submit" id="sendMessageButton">Send
                                    Message</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-5 ">
                    
                    <div class="bg-dark p-30 ">
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4145978.663705896!2d9.180013128989484!3d33.88691702148562!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12fd3365e9b4b9b9%3A0x9c2b30d5f2e6e2b9!2sTunisie!5e0!3m2!1sfr!2stn!4v1603794290143!5m2!1sfr!2stn" 
                            width="100%" height="350" aria-hidden="false" tabindex="0" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                     </div>
                    <div class="bg-dark p-30 mb-3">
                        <p class="mb-2"><i class="fa fa-map-marker-alt text--primary mr-3"></i>123 Rue, Tunis, Tunisie</p>
                        <p class="mb-2"><i class="fa fa-envelope text--primary mr-3"></i>maison.d'hôtes@gmail.com</p>
                        <p class="mb-2"><i class="fa fa-phone-alt text--primary mr-3"></i>+216 12 345 678</p>
                    </div>
                </div>
            </div>
        </div>
       
   
    <div class="row border-top mx-xl-5 py-4" style="border-color: rgba(256, 256, 256, .1) !important;">
        <div class="col-md-6 px-xl-0">
            <p class="mb-md-0 text-center text-md-left text-secondary">
                &copy; <a class="text--primary" href="#">maison.d'hôtes@gmail.com</a> 
            </p>
        </div>
        <div class="col-md-6 px-xl-0 text-center text-md-right">
            <img class="img-fluid" src="{{ asset('img/payments.png') }}" alt="Paiements">
        </div>
    </div>
    </div>
</div>