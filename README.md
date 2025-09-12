# 🌍 FlyFret – Site Officiel
  
*Votre partenaire de confiance pour l’import-export international*

---

## 📖 À propos

**FlyFret** est une entreprise spécialisée dans l’**import-export** et la **logistique internationale**.  
D’abord centrée sur le **fret aérien entre Abidjan et Paris**, nous avons connu une expansion rapide avec l’ouverture d’antennes à **Lyon**, **Nancy**, et aux **États-Unis** grâce à notre service maritime.

Afin de mieux accompagner nos clients, nous proposons également des **services complémentaires** :  
- 🎫 **Assistance visa**  
- 🛒 **Formation à la commande en ligne**  
- 🚚 **Livraison à domicile**

Notre mission est simple : **offrir une logistique fluide, transparente et centrée sur le client** grâce à une équipe jeune et dynamique.

---

## ✨ Fonctionnalités principales

- 📦 Suivi de colis en temps réel  
- 💳 Paiement en ligne sécurisé (CFA & EUR via CinetPay)  
- 📊 Gestion complète des expéditions (expéditeur, destinataire, historique)  
- 🛫 Choix du mode d’expédition (aérien, maritime, express)  
- 📑 Génération de devis et factures automatisées  
- 🔒 Espace client avec authentification sécurisée  

---

## 🛠️ Technologies utilisées

- **Backend** : Laravel 8 (PHP)  
- **Frontend** : Blade / TailwindCSS  
- **Base de données** : MySQL  
- **Paiement** : [CinetPay](https://www.cinetpay.com)  
- **Serveur** : Hébergement mutualisé O2Switch (PHP/MySQL)  
- **Contrôle de version** : Git & GitHub  

---

## 🚀 Installation & Déploiement

### Prérequis
- PHP >= 8.0  
- Composer  
- MySQL >= 5.7  
- Git  

### Étapes d’installation

```bash
# 1. Cloner le dépôt
git clone https://github.com/votre-compte/flyfret.git
cd flyfret

# 2. Installer les dépendances PHP
composer install

# 3. Copier le fichier d’environnement
cp .env.example .env

# 4. Générer la clé d’application
php artisan key:generate

# 5. Configurer la base de données dans .env puis exécuter les migrations
php artisan migrate --seed

# 6. Lancer le serveur local
php artisan serve
