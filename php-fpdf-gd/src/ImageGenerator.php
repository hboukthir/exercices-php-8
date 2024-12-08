<?php

namespace App;

class ImageGenerator
{
    public function generateImage(): string
    {
        // Créer une image vide
        $image = imagecreatetruecolor(400, 200);

        // Définir des couleurs
        $bgColor = imagecolorallocate($image, 255, 255, 255); // Blanc
        $textColor = imagecolorallocate($image, 0, 0, 0); // Noir

        // Remplir l'image avec la couleur de fond
        imagefill($image, 0, 0, $bgColor);

        // Ajouter du texte à l'image
        $fontPath = __DIR__ . '/../assets/arial.ttf'; // Assurez-vous d'avoir un fichier de police
        $text = 'Genere avec GD !';
        imagettftext($image, 20, 0, 10, 50, $textColor, $fontPath, $text);

        // Enregistrer l'image dans un fichier temporaire
        $imagePath = __DIR__ . '/../public/temp_image.png';
        imagepng($image, $imagePath);
        imagedestroy($image);

        return $imagePath;
    }
}
