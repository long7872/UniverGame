@extends('layouts.app')

@section('content')
    <div class="contact-page section mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 align-self-center">
                    <div class="left-text">
                        <div class="section-heading">
                            <h6>Contact Us</h6>
                            <h2>Get in Touch!</h2>
                        </div>
                        <p>UniverGame is your ultimate online gaming platform, where you can play a variety of fun and
                            exciting games. Whether you're into action, strategy, or puzzles, we have something for
                            everyone. Feel free to explore and enjoy! Thank you for being a part of our community.</p>
                        <ul>
                            <li><span>Address</span> Trường Sa, Hoà Hải, Ngũ Hành Sơn, Đà Nẵng, Việt Nam</li>
                            <li><span>Phone</span> +123 456 7890</li>
                            <li><span>Email</span> long77872@gmail.com</li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="right-content">
                        <div class="row">
                            <div class="col-lg-12">
                                <div id="map">
                                    <iframe
                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d43897.915764010635!2d108.23631771944089!3d15.972112859338948!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314210f9acfb76a1%3A0x55c05d34f3e7b9fd!2sLegend%20Danang%20Golf%20Resort!5e1!3m2!1svi!2s!4v1735098367907!5m2!1svi!2s"
                                        width="100%" height="325px" frameborder="0" style="border:0; border-radius: 23px;"
                                        allowfullscreen=""></iframe>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <form id="contact-form" action="{{ route('contact.send') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <fieldset>
                                                <input type="text" name="name" id="name"
                                                    placeholder="Your Name..." autocomplete="on" required>
                                            </fieldset>
                                        </div>
                                        <div class="col-lg-6">
                                            <fieldset>
                                                <input type="text" name="surname" id="surname"
                                                    placeholder="Your Surname..." autocomplete="on" required>
                                            </fieldset>
                                        </div>
                                        <div class="col-lg-6">
                                            <fieldset>
                                                <input type="email" name="email" id="email"
                                                    placeholder="Your E-mail..." required>
                                            </fieldset>
                                        </div>
                                        <div class="col-lg-6">
                                            <fieldset>
                                                <input type="text" name="subject" id="subject" placeholder="Subject..."
                                                    autocomplete="on">
                                            </fieldset>
                                        </div>
                                        <div class="col-lg-12">
                                            <fieldset>
                                                <textarea name="messages" id="message" placeholder="Your Message"></textarea>
                                            </fieldset>
                                        </div>
                                        <div class="col-lg-12">
                                            <fieldset>
                                                <button type="submit" id="form-submit" class="orange-button">Send Message
                                                    Now</button>
                                            </fieldset>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
