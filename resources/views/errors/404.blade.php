<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" name="viewport">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-touch-fullscreen" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="default">
        <meta name="author" content="Ibraci Links">
        <title>Page Introuvable - Erreur 404 - {{ config('app.name') }}</title>
        <link rel="icon" type="image/x-icon" href="assets/img/logo.jpg"/>
        <link rel="icon" href="assets/img/logo.jpg" type="image/png" sizes="16x16">
        <link rel='stylesheet' href='https://d33wubrfki0l68.cloudfront.net/css/478ccdc1892151837f9e7163badb055b8a1833a5/crisp/assets/vendor/pace/pace.css'/>
        <script src='https://d33wubrfki0l68.cloudfront.net/js/3d1965f9e8e63c62b671967aafcad6603deec90c/js/pace.min.js'></script>
        <!--vendors-->
        <link rel='stylesheet' type='text/css' href='https://d33wubrfki0l68.cloudfront.net/bundles/291bbeead57f19651f311362abe809b67adc3fb5.css'/>

        <link rel='stylesheet' href='https://d33wubrfki0l68.cloudfront.net/bundles/30bc673ce76f73ecf02568498f6b139269f6e4c7.css'/>

        <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,600" rel="stylesheet">
        <!--Material Icons-->
        <link rel='stylesheet' type='text/css' href='https://d33wubrfki0l68.cloudfront.net/css/548117a22d5d22545a0ab2dddf8940a2e32c04ed/default/assets/fonts/materialdesignicons/materialdesignicons.min.css'/>
        <!--Material Icons-->
        <link rel='stylesheet' type='text/css' href='https://d33wubrfki0l68.cloudfront.net/css/0940f25997c8e50e65e95510b30245d116f639f0/light/assets/fonts/feather/feather-icons.css'/>
        <!--Bootstrap + atmos Admin CSS-->
        <link rel='stylesheet' type='text/css' href='https://d33wubrfki0l68.cloudfront.net/css/16e33a95bb46f814f87079394f72ef62972bd197/light/assets/css/atmos.min.css'/>
        <!-- Additional library for page -->

    </head>
    <body class="jumbo-page">

        <main class="admin-main  bg-pattern">
            <div class="container">
                <div class="row m-h-100 ">
                    <div class="col-md-8 col-lg-4  m-auto">
                        <div class="card shadow-lg p-t-20 p-b-20">
                            <div class="card-body text-center">
                                <img width="200" alt="image" src="assets/img/404.svg">
                                <h1 class="display-1 fw-600 font-secondary">404</h1>
                                <h5>
                                    Oops, la page que vous cherchez n'existe pas.
                                </h5>
                                <p class="opacity-75">
                                    Vous pouvez retourner à la page d'accueil.
                                    Si vous pensez que quelque chose est cassé, signaler un problème.
                                </p>
                                <div class="p-t-10">
                                    <a href="{{ route('home') }}" class='btn btn-lg btn-primary'>Retourner au tableau de bord</a>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <script src='https://d33wubrfki0l68.cloudfront.net/bundles/9556cd6744b0b19628598270bd385082cda6a269.js'></script>
    </body>
</html>

<!-- Powered by Ibraci Links -->
