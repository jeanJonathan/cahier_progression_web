@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h2>{{ __('Améliorez votre technique') }}</h2>
                        </div>
                        <img src="{{ asset('enfant-surf.jpg') }}" alt="Wingfoil image" class="card-img-top">
                    </div>
                </div>
                <div class="col-md-4">
                    <section class="card mb-4">
                        <article class="card-body">
                            <h2>{{ __('Progressez par chapitre et niveau') }}</h2>
                            <p>{{ __('Consigner votre progression dans une feuille de notes') }}</p>
                        </article>
                    </section>
                </div>
                <div class="col-md-4">
                    <section class="card mb-4">
                        <article class="card-body">
                            <h2>{{ __('Des vidéos incluses pour améliorer votre technique') }}</h2>
                            <p>{{ __('Connectez-vous pour accéder à votre feuille de note et aux vidéos') }}</p>
                        </article>
                    </section>
                </div>

                <div class="col-md-4">
                    <section class="card mb-4">
                        <article class="card-body">
                            <h2>{{ __('article1') }}</h2>
                            <p>{{ __('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.') }}</p>
                        </article>
                        <aside class="card-body">
                            <p>{{ __('Lorem ipsum dolor sit amet, consectetur adipiscing elit.') }}</p>
                        </aside>
                    </section>
                </div>
                <!--fin--->
            <div class="col-md-6">
                <section class="card mb-4">
                    <article class="card-body">
                        <h2>{{ __('article2') }}</h2>
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
                        <h2>{{ __('article3') }}</h2>
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
@endsection
