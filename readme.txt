To do :


modifier le nom du fichier de sortie avec setOutputFilename($filename)
ajouter un fichier de conf pour gérer dynamiquement le dossier d'upload
encryption des fichiers lors de l'upload et lors de la convertion
Gestion des cas ou on upload autre chose qu'un pdf => pre-control JS sur l'extension et la taille du fichier


Done :

supression des fichiers de ilovepdf avec task deleteFile()
supression des fichiers uploadé du serveur
Désactiver le bouton de chargement de fichier si pas de fichier
Formulaire ou bouton declenchant la fonction de convertion du fichier vers l'api (utilisation des data du tableau $result) => OK
Gestion des cas ou 2 fichiers avec le meme nom existeraient dans le dossier upload => Ok via uniqId()
Gestion des niveaux de compression : low-med-high => OK
Passer le nom du fichier depuis le formulaire vers le routeur => OK


