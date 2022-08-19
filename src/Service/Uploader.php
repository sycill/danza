<?php

namespace App\Service;

use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\DependencyInjection\ContainerInterface;

class Uploader
{
    public function __construct(private ContainerInterface $container, private Filesystem $fs)
    {
    }
    // On récupère le container de services pour avoir accès à ses méthodes (getParameter() dans ce cas précis)
    // On pourra ainsi récupérer le chemin qui mène au dossier des images téléversées (image.folder.public_path)
    // Filesystem permet d'interagir avec le système de fichier

    public function uploadImage($image, $oldImage = null)
    // On récupère l'image en paramètre 
    {
        // $folder = $this->container->getParameter('image.folder');
        // // On récupère le chemin du dossier de destination des images
        // $extension = $image->guessExtension() ?? '.bin';
        // $filename = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME) . '-' . bin2hex(random_bytes(5) . '.' . $extension);
        // // Permet d'éviter les doublons dans la bdd. Ajoute des caractères d'une valeur de 10 bytes et une extension.
        // // Génère une chaîne de caractères aléatoire et unique.
        // $image->move($folder, $filename . '.' . $extension);
        // // On déplace l'image du navigateur dans son dossier de destination 
        // if ($oldImage) {
        //     $this->fs->remove($folder . '/' . pathinfo($oldImage, PATHINFO_BASENAME));
        // }
        // // Si il existe déjà une image téléversée, on supprime l'ancienne avant d'ajouter la nouvelle dans le dossier. 
        // return $this->container->getParameter('image.folder.public_path') . '/'  . $filename;
        // //Valeur de retour = chemin de l'image

        $folder = $this->container->getParameter('image.folder');
        $extension = $image->guessExtension() ?? 'bin';
        $filename = bin2hex(random_bytes(10)) . '.' . $extension;
        $image->move($folder, $filename);
        if ($oldImage) {
            $this->fs->remove($folder . '/' . pathinfo($oldImage, PATHINFO_BASENAME));
        }
        return $this->container->getParameter('image.folder.public_path' . '/' . $filename);
        
    }
}
