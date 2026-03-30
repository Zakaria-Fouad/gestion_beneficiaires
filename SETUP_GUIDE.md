# 📋 Guide d'Initialisation du Projet - gestion_beneficiaires

## Status Actuel ✅❌

- ✅ Laravel créé et configuré
- ✅ PHP 8.2 & Composer disponibles
- ❌ **Problème SSL avec Avast** : Bloque le téléchargement de dépendances Composer

---

## 🔧 Solution pour le Problème SSL/Avast

### Option 1 : Désactiver temporairement Avast
1. Ouvrez Avast
2. Menu → Paramètres → Composants actifs
3. Désactivez **"Web Shield"** temporairement (5-10 min)
4. Réexécutez `composer install`
5. Réactivez Avast une fois terminé

### Option 2 : Configurer Avast pour Composer
1. Allez dans Avast → Paramètres → Exclusions
2. Ajoutez C:\Users\Admin\AppData\Roaming\Composer à la liste d'exclusion
3. Ajoutez PHP (XAMPP) à la liste d'exclusion

### Option 3 : Utiliser le certificat CA Bundle
```bash
composer config -g cafile "C:\xampp\php\extras\ssl\cacert.pem"
```

### Option 4 : Utiliser HTTP au lieu de HTTPS
```bash
composer config -g repositories.packagist composer "http://packagist.org"
```

---

## 📝 Prochaines Étapes (après résolution SSL)

### 1️⃣ Installer les Dépendances
```bash
cd c:\Users\Admin\OneDrive\Desktop\gestion_beneficiaires
composer require laravel/breeze --dev
composer require maatwebsite/excel
```

### 2️⃣ Installer Laravel Breeze
```bash
php artisan breeze:install blade
npm install
npm run dev
```

### 3️⃣ Créer la Base de Données
```bash
mysql -u root -p
CREATE DATABASE gestion_beneficiaires CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
EXIT;
```

Modifiez `.env` :
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=gestion_beneficiaires
DB_USERNAME=root
DB_PASSWORD=  (laisser vide si pas de mot de passe)
```

### 4️⃣ Exécuter les Migrations
```bash
php artisan migrate
```

### 5️⃣ Démarrer le Serveur
```bash
php artisan serve
```

---

## 📂 Structure du Projet Après Breeze

```
gestion_beneficiaires/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       ├── AuthController.php
│   │       └── BeneficiaryController.php
│   ├── Models/
│   │   ├── User.php
│   │   └── Beneficiary.php
├── database/
│   └── migrations/
│       ├── *_create_users_table.php
│       ├── *_create_password_resets_table.php
│       ├── *_create_entrepreneurs_table.php
├── resources/
│   └── views/
│       ├── auth/
│       ├── components/
│       └── beneficiaries/
├── routes/
│   ├── web.php
│   └── api.php
└── ...
```

---

## 📝 Notes

- Le projet utilise **Blade** pour les templates
- **Tailwind CSS** sera installé avec Breeze
- La table `entrepreneurs` sera créée dans la migration personnalisée
- Les exports Excel utiliseront `maatwebsite/excel`

