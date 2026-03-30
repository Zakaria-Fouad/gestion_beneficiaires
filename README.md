# 📊 gestion_beneficiaires

Application web pour le **pôle appui** permettant de collecter, gérer et exporter les données des bénéficiaires (micro-entrepreneurs) lors des événements.

---

## 🎯 Objectif

Fournir un outil simple et sécurisé pour :

- S’authentifier (accès réservé au pôle appui)
- Saisir les données des bénéficiaires via un formulaire
- Gérer la liste des bénéficiaires (afficher / modifier / supprimer)
- Télécharger un fichier **Excel** contenant les données des bénéficiaires

---

## 👥 Utilisateurs Ciblés

- **Pôle appui** / Animateurs d’événements :
  - Collectent les données des bénéficiaires sur le terrain
  - Gèrent la base de données des bénéficiaires
  - Exportent les données pour analyse et reporting

---

## 📌 Use Case Principal

1. L’utilisateur (pôle appui) **se connecte** à l’application.
2. Il **remplit les données des bénéficiaires** via un formulaire.
3. Il **gère la liste** des bénéficiaires :
   - Afficher tous les bénéficiaires
   - Modifier un bénéficiaire
   - Supprimer un bénéficiaire
4. Il **télécharge un fichier Excel** contenant les données des bénéficiaires.

---

## 📝 Données à Collecter

Données principales (traitées dans le fichier Excel) :

- `ID_beneficiaire`
- `Nom et Prénom`
- `Genre`
- `Date de Naissance`
- `Niveau scolaire`
- `Situation maritale`
- `CIN`
- `IMF`
- `Région`
- `Statut juridique`
- `Secteur`
- `Date de première participation`

⚠️ **Remarque :**  
D’autres données pourront être collectées et stockées dans la base de données, mais **ne seront pas forcément incluses** dans le fichier Excel exporté.

---

## 🗄️ Schéma de Base de Données (simplifié)

### Table `users`

- `id` (PK)
- `nom_prenom`
- `email`
- `password`
- `created_at`
- `updated_at`

### Table `entrepreneurs` (bénéficiaires)

- `id` (PK)
- `nom_prenom`
- `date_naissance`
- `cin`
- `genre`
- `ville`
- `situation_maritale`
- `activite`
- `niveau_scolaire`
- `telephone`
- `statut_juridique`
- `secteur`
- `imf`
- `date_premiere_participation`
- `user_id` (FK vers `users.id`)
- `user_name` (nom de l’utilisateur qui a saisi les données)
- `created_at`
- `updated_at`

> Les champs ci-dessus couvrent les besoins actuels et pourront être étendus (autres données non exportées dans Excel).

---

## 🛠️ Stack Technologique

**Backend :**
- Laravel 11
- PHP 8.2
- MySQL

**Frontend :**
- Blade (templates Laravel)
- Tailwind CSS

**Export :**
- Laravel Excel (`maatwebsite/excel`)

**Tests (manuels / API) :**
- Postman

**Versionning :**
- Git & GitHub

---

## 📦 Dépendances à Installer

Dans le projet Laravel :

1. **Authentification – Laravel Breeze**
   ```bash
   composer require laravel/breeze --dev
   php artisan breeze:install blade
   npm install
   npm run dev
   ```

2. **Export Excel – Laravel Excel**
   ```bash
   composer require maatwebsite/excel
   ```

3. **Tailwind CSS**  
   (inclus avec Breeze en mode Blade, à compiler avec npm)
   ```bash
   npm install
   npm run dev
   ```

---

## 🚀 Étapes de Base pour Démarrer le Projet

1. Créer le projet Laravel :
   ```bash
   laravel new gestion_beneficiaires
   cd gestion_beneficiaires
   ```

2. Configurer `.env` (connexion à MySQL, nom de la base, etc.)

3. Installer les dépendances listées ci-dessus.

4. Créer les **migrations** pour les tables `users` et `entrepreneurs`.

5. Mettre en place :
   - Authentification (via Breeze)
   - Routes et contrôleurs pour :
     - CRUD des bénéficiaires
     - Export Excel des bénéficiaires

6. Tester les fonctionnalités principales :
   - Connexion / déconnexion
   - Création d’un bénéficiaire
   - Affichage / modification / suppression
   - Téléchargement du fichier Excel

---

## ✅ Résumé des Fonctionnalités à Implémenter

- [ ] Authentification (login / logout)
- [ ] Formulaire de saisie des bénéficiaires
- [ ] Liste des bénéficiaires (tableau)
- [ ] Modification d’un bénéficiaire
- [ ] Suppression d’un bénéficiaire
- [ ] Export Excel des bénéficiaires (avec les champs principaux)
- [ ] Interface simple et responsive (Tailwind CSS)

---

Ce projet **gestion_beneficiaires** sert aussi de **projet d’entraînement** pour :

- Pratiquer Laravel (backend + Blade)
- Appliquer une approche structurée (documentation → schéma → code)
- Gérer un petit projet complet (auth, CRUD, export, DB, Git/GitHub)
