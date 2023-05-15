@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h2 class="text-center">{{ __('IMPROVE YOUR TECHNIQUE') }}</h2>
                        </div>
                        <div style="display: flex; flex-wrap: nowrap;">
                            <img src="{{ asset('progresSurf.jpg') }}" alt="Wingfoil image" class="card-img-top" style="width: 100%;">
                        </div>
                    </div>
                </div>
                <!--bloc1 section1--->
                <div class="col-md-4">
                    <section class="text-center">
                        <img src="{{ asset('surf.jpg') }}" alt="surf" class="card-img-top card mb-4">
                        <article class="card-body">
                            <h2 class="">{{ __('Surf') }}</h2>
                        </article>
                        <aside class="card-body">
                            <p>{{ __('Lorem ipsum dolor sit amet, consectetur adipiscing elit.') }}</p>
                        </aside>
                    </section>
                </div>
                <!--bloc2 section2--->
                <div class="col-md-4">
                    <section class=" text-center">
                        <img src="{{ asset('kitesurf.jpg') }}" alt="planches" class="card-img-top card mb-4">
                        <article class="card-body">
                            <h2>{{ __('KiteSurf') }}</h2>
                            <p>{{ __('Lorem ipsum dolor sit amet, consectetur adipiscing elit.') }}</p>
                        </article>
                    </section>
                </div>
                <!--bloc3 section3 article1--->
                <div class="col-md-4 ">
                    <section class="text-center">
                        <img src="{{ asset('wingfoil.jpg') }}" alt="surf" class="card-img-top card mb-4">
                        <article class="card-body">
                            <h2>{{ __('WingFoil') }}</h2>
                            <p>{{ __('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.') }}</p>
                        </article>
                        <aside class="card-body">
                            <p>{{ __('Lorem ipsum dolor sit amet, consectetur adipiscing elit.') }}</p>
                        </aside>
                    </section>
                </div>
                <!--fin--->
                <div class="col-md-6">
                    <section class="">
                        <article class="card-body">
                            <img src="{{ asset('cahierprogres.jpg') }}" alt="surf" class="card-img-top card mb-4">
                        </article>
                    </section>
                </div>
                <div class="col-md-6">
                    <section class="text-center" style="position:relative;top:65px;">
                        <article class="card-body">
                            <h2>{{ __('Progress by chapter and levels') }}</h2>
                            <p>{{ __('Record your progress in a note sheet') }}</p>
                        </article>
                        <aside class="card-body">
                            <p>{{ __('Lorem ipsum dolor sit amet, consectetur adipiscing elit.') }}</p>
                        </aside>
                    </section>
                </div>
                <div class="col-md-6" style="position:relative;top:90px;">
                    <section class="text-center" style="">
                        <article class="card-body">
                            <h2>{{ __('Videos included to improve your technique') }}</h2>
                            <p>{{ __('Log in to access your grade sheet and videos.') }}</p>
                        </article>
                        <aside class="card-body">
                            <p>{{ __('Lorem ipsum dolor sit amet, consectetur adipiscing elit.') }}</p>
                        </aside>
                    </section>
                </div>
                <div class="col-md-6">
                    <section class="">
                        <article class="card-body">
                            <img src="{{ asset('video.jpg') }}" alt="surf" class="card-img-top card mb-4">
                        </article>
                    </section>
                </div>
                <!--    -->
                <div class="col-md-6">
                    <section class="card mb-4">
                        <article class="card-body">
                            <h2>{{ __('article4') }}</h2>
                            <p>{{ __('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.') }}</p>

                        </article>
                        <aside class="card-body">
                            <p>{{ __('Lorem ipsum dolor sit amet, consectetur adipiscing elit.') }}</p>
                        </aside>
                    </section>
                </div>
                <div class="col-md-6">
                    <section class="card mb-4">
                        <article class="card-body">
                            <h2>{{ __('article5') }}</h2>
                            <p>{{ __('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.') }}</p>
                        </article>
                        <aside class="card-body">
                            <p>{{ __('Lorem ipsum dolor sit amet, consectetur adipiscing elit.') }}</p>
                        </aside>
                    </section>
                </div>
                <div class="co8l-md-4">
                    <section class="text-center">
                        <img src="{{ asset('ocean.png') }}" alt="surf" class="card-img-top rounded-circle mx-auto d-block mb-4" style="max-width: 50%; margin: 0 auto;">
                        <article class="card-body">
                            <h2 class="">{{ __('Surf') }}</h2>
                        </article>
                        <aside class="card-body">
                            <p>{{ __('Lorem ipsum dolor sit amet, consectetur adipiscing elit.') }}</p>
                        </aside>
                    </section>
                </div>

                <!--bloc4 section2--->
                <div class="col-md-4">
                    <section class=" text-center">
                        <img src="{{ asset('planches.jpg') }}" alt="planches" class="card-img-top rounded-circle mx-auto d-block mb-4" style="max-width: 50%; margin: 0 auto;">
                        <article class="card-body">
                            <h2>{{ __('Lorem ipsum ') }}</h2>
                            <p>{{ __('Lorem ipsum dolor sit amet, consectetur adipiscing elit.') }}</p>
                        </article>
                    </section>
                </div>
                <!--bloc3 section3 article1--->
                <div class="col-md-4 ">
                    <section class="text-center">
                        <img src="{{ asset('plage.jpg') }}" alt="surf" class="card-img-top rounded-circle mx-auto d-block mb-4"style="max-width: 50%; margin: 0 auto;">
                        <article class="card-body">
                            <h2>{{ __('Lorem ipsum ') }}</h2>
                            <p>{{ __('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.') }}</p>
                        </article>
                        <aside class="card-body">
                            <p>{{ __('Lorem ipsum dolor sit amet, consectetur adipiscing elit.') }}</p>
                        </aside>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <footer class="pt-5 pb-4 card mb-4">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h3 class="text-center mb-4">Contact Us</h3>
                    <p>+33 XX XX XX XX </p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                        aliqua.
                    </p>
                </div>
                <div class="col-md-4">
                    <h3 class="text-center mb-4">About us</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <ul>
                                <li><a href="#">Our society</a></li>
                                <li><a href="#">contact us</a></li>
                                <li><a href="#">Events</a></li>
                                <li><a href="#">Clients</a></li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul>
                                <li><a href="#">legal information</a></li>
                                <li><a href="#">Privacy</a></li>
                                <li><a href="#">Security</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <h3 class="text-center mb-4">Subscribe</h3>
                    <form>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Your Name">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Your Email">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" rows="3" placeholder="Your Message"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="text-center text-muted mt-5">
            © 2023 Website made with Laravel | All Rights Reserved | Powered by Jean-Jonathan
        </div>
    </footer>
@endsection
