<?php


use App\Http\Controllers\AuthClientController;
use App\Http\Controllers\ColisController;
use Illuminate\Support\Facades\Route;
 
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DestinataireController;
use App\Http\Controllers\ExpediteurController;

use App\Http\Controllers\Rendez_vousController;
use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PaiementController;
use App\Models\Client;
use App\Http\Controllers\ExpeditionController;
use Illuminate\Http\Request;
use App\Http\Controllers\PaymentControllerDevis;
//mes routes
use App\Http\Controllers\Controller;
use App\Http\Controllers\DashboardClientController;
use App\Http\Controllers\inscriptionClientController;
use App\Http\Controllers\RendezVousController;
use App\Http\Controllers\AccueilController;
use App\Http\Controllers\ParametreController;
use App\Http\Controllers\FideliteController;
use App\Http\Controllers\ContactController;

use App\Http\Controllers\PromotionController;

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login'); // Page de connexion
Route::post('/login', [LoginController::class, 'login'])->name('login.submit'); // Soumission du formulaire
// Route::post('/logout', [LoginController::class, 'logout'])->name('logout'); // Déconnexion

Route::middleware(['auth:logisticien'])->group(function () {
    Route::get('index', [DashboardController::class, 'index'])->name('index');
    Route::post('/add-user', [DashboardController::class, 'addUser'])->name('dashboard.addUser');
    Route::get('show', [DashboardController::class, 'show'])->name('show');
    Route::post('/reset-attempts', [LoginController::class, 'resetAttempts'])->name('resetAttempts');
    Route::post('/get-user-info', [DashboardController::class, 'getUserInfo'])->name('getUserInfo');
    Route::get('comptable', [DashboardController::class, 'comptable'])->name('comptable');
    Route::get('/contact-admin', [LoginController::class, 'contactAdmin'])->name('contactAdmin');

});
// Route::get('/rendez-vous', [Rendez_vousController::class, 'create'])->name('rendez_vous.create');
// Route::post('/rendez_vous', [Rendez_vousController::class, 'store'])->name('rendez_vous.store');

// Route pour afficher le formulaire de paiement (GET)
//Route::get('/', [PaiementController::class, 'create'])->name('paiements.create');

// Route pour traiter la soumission du formulaire (POST)
//Route::post('/paiements', [PaiementController::class, 'store'])->name('paiements.store');
Route::get('/', [AccueilController::class, 'index1'])->name('index1');

Route::get('/home', function () {
    return redirect()->route('index1');
})->name('home');
// Route::get('/header', [AccueilController::class, 'header'])->name('header');

Route::get('/apropos', [AccueilController::class, 'apropos'])->name('apropos');
Route::get('/contact', [AccueilController::class, 'contact'])->name('contact');
Route::get('/blog', [AccueilController::class, 'blog'])->name('blog');
Route::match(['get', 'post'], '/suivi_colis', [AccueilController::class, 'suiviColis'])->name('suiviColis');
// Route::get('/fidelite', [DashboardClientController::class, 'fidelite'])->name('fidelite');

Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

Route::get('suivi', [DashboardController::class, 'suivi'])->name('suivi');
Route::post('suivi', [DashboardController::class, 'suiviStore'])->name('suivi.store');
Route::get('/colis/details/{id}', [DashboardController::class, 'getColisDetails'])->name('colis.details');

Route::get('/inscription', [InscriptionController::class, 'create'])->name('inscription.form');
Route::post('/inscription', [InscriptionController::class, 'store'])->name('inscription.store');
Route::get('/connexion', [InscriptionController::class, 'showLoginForm'])->name('connexion.form');
Route::post('/connexion', [InscriptionController::class, 'connexion'])->name('connexion.submit');
Route::get('/logout', [InscriptionController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function(){
    Route::get('/dashboard-client', [DashboardController::class, 'profilClient'])->name('profilClient');
    Route::get('/profil', [InscriptionController::class, 'profil'])->name('profil');
    Route::put('/profile/update', [InscriptionController::class, 'updateProfile'])->name('update.profile');
    Route::get('/fidelite', [FideliteController::class, 'ProgrammeFidelite'])->name('ProgrammeFidelite');

     Route::post('/logout', [AuthClientController::class, 'logout'])->name('logout');
});


Route::middleware(['auth'])->group(function() {
    Route::get('/historique_envois', [DashboardController::class, 'Historique_envois'])->name('historique_envois');
    Route::get('/historique_colis', [DashboardController::class, 'historiqueColis'])->name('historique_colis');
    Route::get('/historique_paiements', [DashboardController::class, 'historiquePaiements'])->name('paiements.clients');
    Route::get('dashboard/parametres', [ParametreController::class, 'parametres'])->name('dashboard.parametres');
    Route::post('dashboard/parametres', [ParametreController::class, 'update'])->name('client.update');
});


Route::get('/colis', [ColisController::class, 'index'])->name('colis.index');

Route::get('/details-devis', [ColisController::class, 'detailsDevis'])->name('details.devis');
Route::post('/details-devis/store', [ColisController::class, 'storeColis'])->name('details-devis.store');
Route::post('/calculer-devis', [ColisController::class, 'calculate'])->name('colis.calculate');

// Route::get('/index12', [ColisController::class, 'index12'])->name('index12');

Route::get('/colis/types', [ColisController::class, 'getTypesColis'])->name('colis.types');
Route::post('/colis', [ColisController::class, 'store'])->name('colis.store');
Route::get('/colis/cities', [ColisController::class, 'getCities'])->name('colis.cities');


// Route pour la page d'authentification
Route::get('/authentification', [ColisController::class, 'authentification'])->name('authentification')->middleware('guest');Route::get('/envoie', [DashboardController::class, 'envoie'])->name('envoie');
Route::post('/envoie', [InscriptionController::class, 'store'])->name('envoie.store');

// Route::post('/search-client', [Rendez_vousController::class, 'searchClient']);

Route::get('/colis-data', [ColisController::class, 'getColisData']);


//mes route

//Page de devis
Route::get('/colis', [ColisController::class, 'index'])->name('colis.index');
Route::post('/colis', [ColisController::class, 'storeColis'])->name('colis.store');
Route::post('/colis/get-prix-unitaire', [ColisController::class, 'getPrixUnitaire'])->name('get.prix.unitaire');

Route::get('/details-devis', [ColisController::class, 'detailsDevis'])->name('details.devis');
Route::get('/envoi-colis', [ColisController::class, 'index12'])->name('index12');

Route::get('/colis/types', [ColisController::class, 'getTypesColis'])->name('colis.types');

// Route pour la page d'authentification
Route::get('/authentification', [ColisController::class, 'authentification'])->name('authentification');

//Rendez vous
Route::get('/rendezvous',[RendezVousController::class, 'showForm'])->name('rendezvous.index');
Route::post('/rendezvous', [RendezVousController::class, 'storeRendezVous'])->name('rendezvous.store');

// pas demander
Route::get('/rendezvousliste', [RendezVousController::class, 'liste'])->name('rendezvous.liste');


Route::middleware('guest')->group(function () {
    Route::get('/inscription-client', [AuthClientController::class, 'create'])->name('inscription.client.form');
    Route::post('/inscription-client', [AuthClientController::class, 'store'])->name('inscription.client.store');
    Route::get('/connexion-client', [AuthClientController::class, 'showLoginForm'])->name('connexion.client.form');
    Route::post('/connexion-client', [AuthClientController::class, 'connexion'])->name('login.client.submit');
});

//moyen de paiement

Route::get('/devis/order/{tarifTotal}', [PaymentControllerDevis::class, 'index'])->name('payment.index');
Route::post('/envoie/paiement', [PaymentControllerDevis::class, 'initPaiement'])->name('envoie.paiement');
Route::get('/cinetpay/paiement', [PaymentControllerDevis::class, 'index'])->name('cinetpay.paiement');
Route::match(['get', 'post'], '/payment/return', [PaymentControllerDevis::class, 'return'])->name('payment.return');
Route::post('/payment/notify', [PaymentControllerDevis::class, 'notify'])->name('payment.notify');
Route::get('/payment/success', [PaymentControllerDevis::class, 'success'])->name('payment.success');
Route::get('/paiement/message', [DashboardController::class, 'message'])->name('paiement.message');


Route::get('/suivi/{numero_suivi}', [ColisController::class, 'suivi'])->name('suivi.colis');

// code de reduction
Route::post('/code-reduction', [PromotionController::class, 'appliquerCodeReduction'])->name('code.reduction');
// testNotification
Route::post('/colis/update-date-lot', [ColisController::class, 'updateStatut'])->name('colis.updateStatut');
Route::get('/lot-test', [ColisController::class, 'lotTest'])->name('lot.test');

Route::get('/dashboard', [DashboardClientController::class, 'index'])->name('dashboard');

Route::get('/conditions-generales', [AccueilController::class, 'conditionsGenerales'])->name('conditions.generales');

