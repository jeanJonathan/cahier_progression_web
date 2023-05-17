@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 style="text-align: center; margin-bottom: 20px; font-size: 36px; line-height: 1.2;">Formulaire de progression</h1>
        <!---la fonction open fournit une couche de sécurité supplémentaire en protégeant le formulaire de Cross-Site Request Forgery (CSRF) -->
        <!---afin que utilisateur soumet un formulaire, le jeton est également soumis et vérifié par le serveur. Si le jeton soumis n'est pas valide ou manquant, la requête est rejetée---->
        {!! Form::open(['route' => 'progressions.store', 'method' => 'POST', 'files' => true, 'class' => 'row g-3', 'enctype' => 'multipart/form-data', 'id' => 'progression-form']) !!}

        <div class="col-md-6">
            <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
                {!! Form::label('date', 'Date', ['class' => 'form-label']) !!}
                <!--on utilise old pour reafficher les valeur precedemment saisie en cas d'erreur de validation par le user--->
                <!--le champs est donc preremplir avec la derniere valeur saisie par l'utilisateur en cas d'erreur-->
                {!! Form::date('date', old('date'), ['class' => 'form-control', 'required','max' => today()->format('Y-m-d')]) !!}
                @if ($errors->has('date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('date') }}
                    </div>
                @endif
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group{{ $errors->has('location') ? ' has-error' : '' }}">
                {!! Form::label('location', 'Lieu', ['class' => 'form-label']) !!}
                {!! Form::text('location', old('location'), ['class' => 'form-control', 'required', 'id' => 'location-input']) !!}
                @if ($errors->has('location'))
                    <div class="invalid-feedback">
                        {{ $errors->first('location') }}
                    </div>
                @endif
                <!--implementation de la fonctionnalite d'auto completion-->
                <script src="//code.jquery.com/jquery-3.6.0.min.js"></script>
                <script src="//code.jquery.com/ui/1.13.0/jquery-ui.min.js"></script>

                <!-----
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> ----->
                <script>
                    $(document).ready(function() {
                        $(document).ready(function() {
                            var lieux = ['Ahangama', 'Açores', 'Arugam Bay', 'Bali', 'Biarritz', 'Bilbao', 'Boa Vista', 'Cabarete', 'Caparica', 'Capbreton', 'Conil', 'Dakhla', 'El Gouna', 'Ericeira', 'Essaouira', 'Fuerteventura', 'Galice', 'Hendaye', 'Herekitya', 'Hossegor', 'Imsouane', 'Jaco', 'Lacanau', 'Las Palmas', 'Lanzarote', 'Lisbonne', 'Madère', 'Madiha', 'Mentawai', 'Mirissa', 'Montezuma', 'Nazare', 'Nosara', 'Pavones', 'Peniche', 'Polhena', 'Porto', 'Quepos', 'Santa Teresa', 'Sicile', 'Sumbawa', 'Tamarindo', 'Taghazout', 'Tarifa', 'Toncones', 'Uvita', 'Vieux Boucau', 'Weligama', 'Zanzibar'];
                            $("#location-input").autocomplete({
                                source: function(request, response) {
                                    var matcher = new RegExp("^" + $.ui.autocomplete.escapeRegex(request.term), "i");
                                    response($.grep(lieux, function(item) {
                                        return matcher.test(item);
                                    }));
                                },
                                /*pour garantir la confidentialite des donnees des surf camp*/
                                minLength: 2,
                                autoFocus: true,
                                /*le délai en millisecondes avant de déclencher la recherche d'autocomplétion*/
                                delay: 0,
                                /*pour rechercher uniquement les termes commençant par la chaîne de caractères saisie*/
                                startsWith: true,
                                /* une option pour ignorer les différences de casse afin d'ameliorer l'experience utilisateur*/
                                ignoreCase: true
                            });
                            var meteos = [    'vent de terre off shore léger', 'ciel bleu', '1m de houle, personne à l\'eau',    'vent de nord est 15 noeuds', 'ciel brumeux', 'peu de monde sur la plage',    'vent de sud-est 10 noeuds', 'ciel couvert avec risque d\'averse', 'houle de 2m, conditions difficiles',    'vent d\'ouest 20 noeuds', 'ciel variable avec éclaircies', 'vagues de 1m à 1m50, conditions moyennes',    'vent de nord 5 noeuds', 'ciel dégagé', 'plage calme et tranquille',    'vent de sud-ouest 25 noeuds', 'ciel orageux', 'mer agitée avec des vagues de plus de 2m'];
                            $("#weather-input").autocomplete({
                                source: function(request, response) {
                                    var matcher = new RegExp("^" + $.ui.autocomplete.escapeRegex(request.term), "i");
                                    response($.grep(meteos, function(item) {
                                        return matcher.test(item);
                                    }));
                                },
                                autoFocus: true,
                                /*le délai en millisecondes avant de déclencher la recherche d'autocomplétion*/
                                delay: 0,
                                /*pour rechercher uniquement les termes commençant par la chaîne de caractères saisie*/
                                startsWith: true,
                                /* une option pour ignorer les différences de casse afin d'ameliorer l'experience utilisateur*/
                                ignoreCase: true
                            });
                        })
                    });
                </script>
            </div>
        </div>
        <div class="">
            <div class="form-group{{ $errors->has('weather') ? ' has-error' : '' }}">
                {!! Form::label('weather', 'Météo', ['class' => 'form-label']) !!}
                {!! Form::text('weather', old('weather'), ['class' => 'form-control', 'required', 'id' => 'weather-input']) !!}
                @if ($errors->has('weather'))
                    <div class="invalid-feedback">
                        {{ $errors->first('weather') }}
                    </div>
                @endif
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-12 col-md-4 text-center">
                {!! Form::label('envoyer une premiere photo', __('envoyer une premiere photo'), ['class' => 'col-form-label']) !!}
                <!---on a rajouter la propriete accept pour lire que l'utilisateur voir que des images lorsqu'il veut charger une photo-->
                {!! Form::file('photo1', ['class' => 'form-control-file','accept' => 'image/*']) !!}

                @if ($errors->has('photo1'))
                    <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('photo1') }}</strong>
            </span>
                @endif
            </div>

            <div class="col-sm-12 col-md-4 text-center">
                {!! Form::label('envoyer une seconde photo', __('envoyer une seconde photo'), ['class' => 'col-form-label']) !!}
                {!! Form::file('photo2', ['class' => 'form-control-file','accept' => 'image/*']) !!}

                @if ($errors->has('photo2'))
                    <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('photo2') }}</strong>
            </span>
                @endif
            </div>

            <div class="col-sm-12 col-md-4 text-center">
                {!! Form::label('envoyer une derniere photo', __('envoyer une derniere photo'), ['class' => 'col-form-label']) !!}
                {!! Form::file('photo3', ['class' => 'form-control-file','accept' => 'image/*']) !!}

                @if ($errors->has('photo3'))
                    <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('photo3') }}</strong>
            </span>
                @endif
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group{{ $errors->has('notes') ? ' has-error' : '' }}">
                {!! Form::label('notes', 'Notes', ['class' => 'form-label']) !!}
                {!! Form::textarea('notes', old('notes'), ['class' => 'form-control', 'rows' => 3]) !!}
                @if ($errors->has('notes'))
                    <div class="invalid-feedback">
                        {{ $errors->first('notes') }}
                    </div>
                @endif
            </div>
        </div>
        <!---ajoute d'un champ caché pour récupérer etape_id-->
        {!! Form::hidden('etape_id', $etape_id) !!}
        <div class="form-group d-flex justify-content-center">
            {!! Form::submit('Valider progression', ['class' => 'btn btn-primary', 'id' => 'valider-btn', 'onclick' => 'onValiderClicked(event)']) !!}
        </div>
        <script>
            function onValiderClicked(event) {
                event.preventDefault(); // empêche le formulaire d'être soumis

                // Création de la fenêtre modale
                var modal = document.createElement('div');
                modal.classList.add('modal');

                // Rendre la fenêtre modale déplaçable
                var isDragging = false;
                var offsetX = 0;
                var offsetY = 0;

                modal.addEventListener('mousedown', function (event) {
                    isDragging = true;
                    offsetX = event.clientX - modal.offsetLeft;
                    offsetY = event.clientY - modal.offsetTop;
                });

                modal.addEventListener('mousemove', function (event) {
                    if (isDragging) {
                        modal.style.left = event.clientX - offsetX + 'px';
                        modal.style.top = event.clientY - offsetY + 'px';
                    }
                });

                modal.addEventListener('mouseup', function () {
                    isDragging = false;
                });
                // Définir la largeur de la fenêtre modale
                modal.style.width = '33.33%';

                // Centrer la fenêtre modale
                modal.style.transform = 'translate(75%,55%)';
                // Appliquer les styles à la fenêtre modale
                modal.style.position = 'fixed';
                modal.style.zIndex = '9999';
                modal.style.left = '50%';
                modal.style.top = '50%';
                modal.style.transform = 'translate(-50%, -50%)';
                modal.style.backgroundColor = '#f5f5f5';
                modal.style.border = '1px solid #ccc';
                modal.style.boxShadow = '0 0 10px rgba(0, 0, 0, 0.2)';
                modal.style.borderRadius = '5px';
                modal.style.width = 'calc(100vw / 3)';
                modal.style.maxWidth = '600px';

                // Contenu de la fenêtre modale
                var modalContent = document.createElement('div');
                modalContent.classList.add('modal-content');

                // Titre de la fenêtre modale
                var modalTitle = document.createElement('h2');
                modalTitle.innerText = 'Options';
                modalContent.appendChild(modalTitle);

                // Lien vers le prochain trip
                var nextTripLink = document.createElement('a');
                nextTripLink.href = 'lien_prochain_trip';
                nextTripLink.innerText = 'Aller vers le prochain trip';
                modalContent.appendChild(nextTripLink);

                // Lien pour voir l'étape suivante
                var nextStepLink = document.createElement('a');
                nextStepLink.href = 'lien_etape_suivante';
                nextStepLink.innerText = 'Voir l\'étape suivante';
                modalContent.appendChild(nextStepLink);

                // Lien pour préparer le prochain trip
                var prepareNextTripLink = document.createElement('a');
                prepareNextTripLink.href = 'lien_preparer_prochain_trip';
                prepareNextTripLink.innerText = 'Préparer le prochain trip';
                modalContent.appendChild(prepareNextTripLink);

                // Liens A, B, C
                var linkA = document.createElement('a');
                linkA.href = 'lien_a';
                linkA.innerText = 'A';
                modalContent.appendChild(linkA);

                var linkB = document.createElement('a');
                linkB.href = 'lien_b';
                linkB.innerText = 'B';
                modalContent.appendChild(linkB);

                var linkC = document.createElement('a');
                linkC.href = 'lien_c';
                linkC.innerText = 'C';
                modalContent.appendChild(linkC);

                // Bouton OK
                var okButton = document.createElement('button');
                okButton.innerText = 'OK';
                okButton.addEventListener('click', function() {
                    // Supprimer la fenêtre modale
                    modal.remove();

                    // Soumettre le formulaire
                    document.getElementById('progression-form').submit();
                });

                // Ajouter le bouton OK à la fenêtre modale
                modalContent.appendChild(okButton);


                // Ajouter le contenu à la fenêtre modale
                modal.appendChild(modalContent);

                // Ajouter la fenêtre modale à la page
                document.body.appendChild(modal);

                // Afficher la fenêtre modale à l'aide de Bootstrap Modal
                $(modal).modal('show');

                // Soumettre le formulaire lorsque l'utilisateur clique sur un lien
                modal.addEventListener('click', function(event) {
                    if (event.target.tagName === 'A') {
                        modal.remove(); // Supprimer la fenêtre modale
                        document.getElementById('progression-form').submit(); // Soumettre le formulaire
                    }
                });
            }
        </script>

    {!! Form::close() !!}
@endsection
