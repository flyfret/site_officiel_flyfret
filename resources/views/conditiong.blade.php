@extends('layouts.app')
@section('title', 'FlyFret - Conditions Générales')
@section('ChildContent')
    <link rel="icon" type="image/x-icon" href="/static/favicon.ico">
   
    <style>
        :root {
            --primary-color: #8022F4;
            --primary-light: #8022F4;
            --secondary-color: #8022F4;
            --dark-color: #2d3748;
            --light-color: #f7fafc;
            --white: #ffffff;
            --gray-light: #edf2f7;
            --gray: #e2e8f0;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: var(--dark-color);
            background-color: var(--light-color);
            font-size: 16px;
        }

        .hero-section {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: var(--white);
            padding: 100px 0;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('/assets/images/pattern.svg') repeat;
            opacity: 0.1;
        }

        .hero-content {
            position: relative;
            z-index: 1;
        }

        .title-divider {
            width: 80px;
            height: 4px;
            background: linear-gradient(to right, var(--primary-color), var(--secondary-color));
            margin: 20px auto;
            border-radius: 2px;
        }
        li{
            list-style: none;
        }
        .conditiong{
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 10px;
        }
        .conditiongP{
            font-size: 1.2rem;
            margin-bottom: 0;
            color: var(--white);
        }
        .content-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 50px 20px;
        }

        .section-card {
            background: var(--white);
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            padding: 30px;
            margin-bottom: 30px;
            border: 1px solid var(--gray);
        }

        .section-title {
            color: var(--primary-color);
            font-weight: 700;
            margin-bottom: 20px;
            font-size: 1.5rem;
        }

        .list-item {
            margin-bottom: 15px;
            position: relative;
            padding-left: 25px;
        }

        .list-item::before {
            content: '';
            position: absolute;
            left: 0;
            top: 8px;
            width: 8px;
            height: 8px;
            background-color: var(--primary-light);
            border-radius: 50%;
        }

        .highlight-box {
            background-color: rgba(123, 1, 247, 0.05);
            border-left: 4px solid var(--primary-color);
            padding: 20px;
            margin: 25px 0;
            border-radius: 0 8px 8px 0;
        }

        @media (max-width: 768px) {
            .hero-section {
                padding: 70px 0;
            }
            
            .content-container {
                padding: 30px 15px;
            }
            
            .section-card {
                padding: 20px;
            }
        }
    </style>

    <!-- Hero Section -->
    <section class="hero-section" >
        <div class="hero-content">
            <h1 class="conditiong">Conditions Générales d'Utilisation</h1>
            <p class="conditiongP">Les règles et engagements qui régissent nos services</p>
        </div>
    </section>

    <!-- Main Content -->
    <div class="content-container">
        <div class="section-card" >
            <h2 class="section-title">1. Objet du contrat</h2>
            <p>Le présent contrat a pour objet de définir les conditions dans lesquelles la société FLYFRET INTERNATIONAL GROUP, ci-après dénommée "le Transporteur", s'engage à acheminer les colis confiés par le Client entre la Côte d'Ivoire et la France, dans les deux sens.</p>
        </div>

        <div class="section-card" >
            <h2 class="section-title">2. Services proposés</h2>
            <p>Le Transporteur propose des services de transit de colis entre la France et la Côte d'Ivoire, incluant :</p>
            
            <ul class="mt-4">
                <li class="list-item">La collecte des colis en France ou en Côte d'Ivoire</li>
                <li class="list-item">Le transport international</li>
                <li class="list-item">Les formalités douanières</li>
                <li class="list-item">La livraison au destinataire final</li>
            </ul>
        </div>

        <div class="section-card" >
            <h2 class="section-title">3. Obligations du Client</h2>
            <p>Le Client s'engage à :</p>
            
            <ul class="mt-4">
                <li class="list-item">Fournir des informations exactes et complètes sur le contenu, la valeur et la destination des colis</li>
                <li class="list-item">Emballer correctement les colis pour assurer leur protection durant le transport</li>
                <li class="list-item">Respecter les restrictions sur les marchandises interdites ou dangereuses</li>
            </ul>
        </div>

        <div class="section-card" >
            <h2 class="section-title">6. Délais de livraison</h2>
            <p>Les délais de livraison sont donnés à titre indicatif. Le Transporteur ne peut être tenu responsable des retards dus à des événements indépendants de sa volonté (grèves, intempéries, contrôles douaniers, etc.).</p>
        </div>

        <div class="section-card" >
            <h2 class="section-title">7. Assurance et responsabilité</h2>
            <p>En cas de perte, de détérioration ou de vol, vos envois bénéficient d'une assurance de base permettant une indemnisation de 15€/kg sans pouvoir dépasser 200€ par expédition de colis. Le Client peut souscrire une assurance complémentaire pour une couverture plus étendue.</p>
            
            <div class="highlight-box mt-6">
                <p><strong>Important :</strong> La responsabilité du transporteur est exemptée pour les colis interdits et/ou ayant fait l'objet d'une fausse déclaration auprès de nos services.</p>
            </div>
        </div>

        <div class="section-card" >
            <h2 class="section-title">8. Réclamations</h2>
            <p>Toute réclamation doit être adressée au Transporteur par écrit dans un délai de 14 jours suivant la livraison du colis.</p>
        </div>

        <div class="section-card" >
            <h2 class="section-title">9. Protection des données personnelles</h2>
            <p>Le Transporteur s'engage à respecter la confidentialité des données personnelles du Client conformément au Règlement Général sur la Protection des Données (RGPD).</p>
        </div>

        <div class="section-card" >
            <h2 class="section-title">10. Droit applicable et juridiction compétente</h2>
            <p>Le présent contrat est soumis au droit français et ivoirien. En cas de litige, les tribunaux de la ville concernée seront seuls compétents.</p>
        </div>

        <div class="section-card" >
            <h2 class="section-title">11. Modification des conditions générales</h2>
            <p>Le Transporteur se réserve le droit de modifier les présentes conditions générales. Toute modification sera notifiée au Client avant son entrée en vigueur.</p>
            
            <p class="mt-6">Pour toute question concernant nos conditions générales, vous pouvez nous contacter :</p>
            <ul class="mt-2">
                <li class="list-item">Par email : contact@flyfret.com</li>
                <li class="list-item">Par téléphone : +33 1 23 45 67 89</li>
                <li class="list-item">Via notre formulaire de contact en ligne</li>
            </ul>
        </div>
    </div>

    <script>
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true
        });
        feather.replace();
    </script>
@endsection