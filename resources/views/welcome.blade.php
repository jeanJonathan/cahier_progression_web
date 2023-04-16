@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h2>{{ __('AMELIORER VOTRE TECHNIQUE') }}</h2>
                        </div>
                        <div style="display: flex; flex-wrap: nowrap;">
                            <img src="{{ asset('progresSurf.jpg') }}" alt="Wingfoil image" class="card-img-top" style="width: 100%;">
                        </div>
                    </div>
                </div>
                <!--bloc1 section1--->
                <div class="col-md-4">
                    <section class="card mb-4 text-center">
                        <img src="{{ asset('surf.jpg') }}" alt="surf" class="card-img-top">
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
                    <section class="card mb-4 text-center">
                        <img src="{{ asset('kitesurf.jpg') }}" alt="planches" class="card-img-top">
                        <article class="card-body">
                            <h2>{{ __('KiteSurf') }}</h2>
                            <p>{{ __('Lorem ipsum dolor sit amet, consectetur adipiscing elit.') }}</p>
                        </article>
                    </section>
                </div>
                <!--bloc3 section3 article1--->
                <div class="col-md-4">
                    <section class="card mb-4 text-center">
                        <img src="{{ asset('wingfoil.jpg') }}" alt="surf" class="card-img-top">
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
                <!--bloc4 section4-->
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <section class="card mb-4">
                            <img src="{{ asset('cahierprogres.jpg') }}" alt="surf" class="card-img-top">
                        </section>
                    </div>
                    <!--bloc 4 article 2-->
                    <div class="col-md-6 text-center text-md-left">
                        <section>
                            <article class="card-body">
                                <h2 class="font-size-md-35px" style="font-size: 35px">{{ __('Progressez par chapitre et niveau') }}</h2>
                                <p class="font-size-md-25px" style="font-size: 25px">{{ __('Consigner votre progression dans une feuille de notes.') }}</p>
                            </article>
                            <aside class="card-body font-size-md-18px">
                                <p class="d-none d-md-block">{{ __('Des vidéos incluses pour améliorer votre technique.') }}</p>
                            </aside>
                        </section>
                    </div>
                </div>

                <!---bloc4 section5---->
                <div class="row align-items-center">
                    <div class="col-md-6 text-center text-md-left">
                        <section>
                            <article class="card-body">
                                <h2 class="font-size-md-35px" style="font-size: 35px">{{ __('Des vidéos incluses pour améliorer votre technique') }}</h2>
                                <p class="font-size-md-25px" style="font-size: 25px">{{ __('Connectez-vous pour accéder à votre feuille de note et aux vidéos.') }}</p>
                            </article>
                            <aside class="card-body font-size-md-18px">
                                <p class="d-none d-md-block">{{ __('Lorem ipsum dolor sit amet, consectetur adipiscing elit.') }}</p>
                            </aside>
                        </section>
                    </div>
                    <div class="col-md-6">
                        <section class="card mb-4">
                            <img src="{{ asset('video.jpg') }}" alt="surf" class="card-img-top">
                        </section>
                    </div>
                    <!--bloc 4 article 2-->
                </div>

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
        </div>
    </div>
        <footer class="pt-5 pb-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <h3>Contact Us</h3>
                        <p>+33 XX XX XX XX </p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
                            aliqua.
                        </p>
                    </div>
                    <div class="col-md-4">
                        <h3>About us</h3>
                        <ul>
                            <li>Notre société</li>
                            <li>Contactez-nous</li>
                            <li>Événements</li>
                            <li>Clients</li>
                            <li>Informations légales • Confidentialité</li>
                            <li>Sécurité</li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <h3>Subscribe</h3>
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
