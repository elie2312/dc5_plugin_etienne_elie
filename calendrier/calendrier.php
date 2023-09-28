<?php
/**
 * Plugin Name: Calendar
 * Description: Tp Calendrier
 * Version: 1.0
 * Author: DC5
 */

// Sécurité pour empêcher l'accès direct au fichier
if (!defined('ABSPATH')) {
    exit;
}

// Fonction pour afficher le formulaire de réservation
function mon_plugin_affichage_formulaire() {
    ob_start(); // Démarre la mise en mémoire tampon de sortie

    // Votre formulaire HTML va ici
    ?>
        <label for="email">Adresse e-mail :</label>
        <input type="email" id="email" name="email" required>

        <form id="reservation-form" method="post">
        <label for="date">Sélectionnez une date :</label>
        <input type="date" id="date" name="date" required>

        <input type="submit" value="Réserver">
    </form>
    <?php

    return ob_get_clean(); // Récupère le contenu du tampon de sortie et le nettoie
}

// Enregistrez le shortcode
function mon_plugin_register_shortcode() {
    add_shortcode('mon_plugin_reservation', 'mon_plugin_affichage_formulaire');
}
add_action('init', 'mon_plugin_register_shortcode');


// Fonction pour gérer la soumission du formulaire
function mon_plugin_traitement_formulaire() {
    if (isset($_POST['nom']) && isset($_POST['email'])) {
        // Récupérez les données du formulaire
        $nom = sanitize_text_field($_POST['nom']);
        $email = sanitize_email($_POST['email']);

        // Enregistrez les données dans la base de données ou effectuez toute autre action requise
        // Par exemple, vous pouvez enregistrer les réservations dans une table personnalisée de la base de données.

        // Pour cet exemple, nous allons simplement afficher un message de confirmation.
        echo 'Réservation effectuée avec succès pour ' . esc_html($nom) . ' à l\'adresse ' . esc_html($email);
    }
}

// Action WordPress pour gérer la soumission du formulaire
add_action('init', 'mon_plugin_traitement_formulaire');
?>
?>
