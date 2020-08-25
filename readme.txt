To do :

regler le responsive sur mobile
rediriger vers l'accueil après téléchargement du fichier compressé
Gestion des cas ou on upload autre chose qu'un pdf => pre-control JS sur l'extension et la taille du fichier
ne pas afficher la section upload lorsque la section de selection du niveau de compression est affiché
modifier le nom du fichier de sortie avec setOutputFilename($filename)
ajouter un fichier de conf pour gérer dynamiquement le dossier d'upload
encryption des fichiers lors de l'upload et lors de la convertion



Done :

supression des fichiers du serveur ilovepdf avec task deleteFile()=>OK
supression des fichiers uploadé du serveur => OK
Désactiver le bouton de chargement de fichier si pas de fichier => OK
Formulaire ou bouton declenchant la fonction de convertion du fichier vers l'api (utilisation des data du tableau $result) => OK
Gestion des cas ou 2 fichiers avec le meme nom existeraient dans le dossier upload => Ok via uniqId()
Gestion des niveaux de compression : low-med-high => OK
Passer le nom du fichier depuis le formulaire vers le routeur => OK


