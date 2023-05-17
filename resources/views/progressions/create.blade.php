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
                modal.style.textAlign = 'center'; // Centrer le contenu horizontalement

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
                modal.style.transform = 'translat8e(75%,55%)';
                // Appliquer les styles à la fenêtre modale
                modal.style.position = 'fixed';
                modal.style.zIndex = '9999';
                modal.style.left = '50%';
                modal.style.top = '50%';
                modal.style.transform = 'translate(-50%, -50%)';
                modal.style.backgroundColor = '#f5f5f5';
                modal.style.border = '1px solid #ccc';
                modal.style.boxShadow = '0 0 10px rgba(0, 0, 0, 0.2)';
                modal.style.borderRadius = '5px'
                // Définition de la largeur de la fenêtre modale
                modal.style.width = 'calc(100vw / 3)';
                modal.style.maxWidth = '600px';
                // Définition de la longueur de la fenêtre modale
                modal.style.height = 'calc(100vw / 3)';
                modal.style.maxHeight = '600px';

                // Ajout de l'image en arrière-plan
                modal.style.backgroundImage = 'url("https://as1.ftcdn.net/v2/jpg/00/05/05/92/1000_F_5059201_qkuwu6zJlAa2ZexKhgLSayIIy6AjooKV.jpg")';
                modal.style.backgroundSize = 'cover';
                modal.style.backgroundPosition = 'center';

                // Contenu de la fenêtre modale
                var modalContent = document.createElement('div');
                modalContent.classList.add('modal-content');

                // Titre de la fenêtre modale
                var modalTitle = document.createElement('h2');
                modalTitle.innerText = 'Qu\'envisagez vous de faire avant de valider votre progression;'
                modalTitle.style.color = '#1F355F';
                modalTitle.style.fontWeight = 'bold';
                modalTitle.style.textDecoration = 'none';
                modalTitle.style.transition = 'color 0.3s';
                modalContent.appendChild(modalTitle);

                // Lien vers le prochain trip
                var nextTripLink = document.createElement('a');
                nextTripLink.href = 'https://github.com/jeanJonathan/cahier_progression_web';
                nextTripLink.innerText = '-Aller vers le prochain trip-';
                nextTripLink.target = '_blank'; // Ouverture dans une nouvelle page
                nextTripLink.style.display = 'block';
                nextTripLink.style.color = '#1F355F';
                nextTripLink.style.fontWeight = 'bold';
                nextTripLink.style.textDecoration = 'none';
                nextTripLink.style.transition = 'color 0.3s';
                modalContent.appendChild(nextTripLink);

                // Lien pour voir l'étape suivante
                var nextStepLink = document.createElement('a');
                nextStepLink.href = 'https://github.com/jeanJonathan/cahier_progression_web';
                nextStepLink.innerText = '-Voir l\'étape suivante-';
                nextStepLink.target = '_blank'; // Ouverture dans une nouvelle page
                nextStepLink.style.display = 'block';
                nextStepLink.style.color = '#1F355F';
                nextStepLink.style.fontWeight = 'bold';
                nextStepLink.style.textDecoration = 'none';
                nextStepLink.style.transition = 'color 0.3s';
                modalContent.appendChild(nextStepLink);

                // Lien pour préparer le prochain trip
                var prepareNextTripLink = document.createElement('a');
                prepareNextTripLink.href = 'lien_preparer_prochain_trip';
                prepareNextTripLink.innerText = '-Préparer le prochain trip-';
                prepareNextTripLink.target = '_blank'; // Ouverture dans une nouvelle page
                prepareNextTripLink.style.display = 'block';
                prepareNextTripLink.style.color = '#1F355F';
                prepareNextTripLink.style.fontWeight = 'bold';
                prepareNextTripLink.style.textDecoration = 'none';
                prepareNextTripLink.style.transition = 'color 0.3s';
                modalContent.appendChild(prepareNextTripLink);

                // Liens A, B, C
                var linkA = document.createElement('a');
                linkA.href = 'lien_a';
                linkA.innerText = 'A';
                linkA.target = '_blank';
                linkA.style.display = 'block';
                linkA.style.color = '#1F355F';
                linkA.style.fontWeight = 'bold';
                linkA.style.textDecoration = 'none';
                linkA.style.transition = 'color 0.3s';
                modalContent.appendChild(linkA);

                var linkB = document.createElement('a');
                linkB.href = 'lien_b';
                linkB.innerText = 'B';
                linkB.target = '_blank';
                linkB.style.display = 'block';
                linkB.style.color = '#1F355F';
                linkB.style.fontWeight = 'bold';
                linkB.style.textDecoration = 'none';
                linkB.style.transition = 'color 0.3s';
                modalContent.appendChild(linkB);

                var linkC = document.createElement('a');
                linkC.href = 'lien_c';
                linkC.innerText = 'C';
                linkC.target = '_blank';
                linkC.style.display = 'block';
                linkC.style.color = '#1F355F';
                linkC.style.fontWeight = 'bold';
                linkC.style.textDecoration = 'none';
                linkC.style.transition = 'color 0.3s';
                modalContent.appendChild(linkC);

                // Bouton de fermeture (X)
                var closeButton = document.createElement('button');
                closeButton.innerHTML = '&times;'; // Utilise le caractère "x" en tant que contenu du bouton
                closeButton.style.position = 'absolute';
                closeButton.style.top = '10px';
                closeButton.style.right = '10px';
                closeButton.style.border = 'none';
                closeButton.style.backgroundColor = 'transparent';
                closeButton.style.fontSize = '20px';
                closeButton.style.color = '#1F355F';
                closeButton.style.cursor = 'pointer';
                modalContent.appendChild(closeButton);

                // Gestionnaire d'événement pour le bouton de fermeture
                closeButton.addEventListener('click', function() {
                    modal.remove(); // Supprime la fenêtre modale
                    // Soumission du formulaire
                    document.getElementById('progression-form').submit();
                });

                // Bouton qui poursuit le processus de la validation du formulaire
                var submitButton = document.createElement('button');
                submitButton.innerText = 'NON MERCI';
                submitButton.style.backgroundColor = '#1E3461';
                submitButton.style.color = '#FFFFFF';
                submitButton.style.border = 'none';
                submitButton.style.padding = '10px 20px';
                submitButton.style.fontFamily = 'Arial, sans-serif';
                submitButton.style.fontSize = '16px';
                submitButton.style.borderRadius = '5px';
                submitButton.style.cursor = 'pointer';
                submitButton.style.transition = 'background-color 0.3s';
                submitButton.classList.add('vibration-effect');

                modalContent.appendChild(submitButton);
                // CSS pour l'effet de vibration
                var css = `.vibration-effect:hover {
                            transform: translateX(-2px);
                            }
                            .vibration-effect:active {
                            transform: translateY(2px);
                            }
                            `;

                var style = document.createElement('style');
                style.appendChild(document.createTextNode(css));
                document.head.appendChild(style);


                submitButton.addEventListener('click', function() {
                    // Suppression de la fenêtre modale
                    modal.remove();

                    // Soumission du formulaire
                    document.getElementById('progression-form').submit();
                });

                // Ajout du bouton de soumission à la fenêtre modale
                modalContent.appendChild(submitButton);
                // Ajout du contenu à la fenêtre modale
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
