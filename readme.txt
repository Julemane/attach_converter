To do :

masquer en js des action non realisable après l'upload
ajouter un fichier de conf pour gérer dynamiquement le dossier d'upload
supression des fichiers uploadé
encryption des fichiers lors de l'upload et lors de la convertion
supression des fichiers de ilovepdf avec task deleteFile()
modifier le nom du fichier de sortie avec setOutputFilename($filename)
Gestion des cas ou on upload autre chose qu'un pdf => pre-control JS sur l'extension et la taille du fichier


Done :

Formulaire ou bouton declenchant la fonction de convertion du fichier vers l'api (utilisation des data du tableau $result) => OK
Gestion des cas ou 2 fichiers avec le meme nom existeraient dans le dossier upload => Ok via uniqId()
Gestion des niveaux de compression : low-med-high => OK
Passer le nom du fichier depuis le formulaire vers le routeur => OK


