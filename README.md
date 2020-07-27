# PhpSecInfo

PhpSecInfo est un projet datant de 2007 et sponsorisé en partie par CERIAS à l'Université de Purdue.
Noter que Purdue est l’Université de Ian Murdock fondateur du projet Debian.

PhpSecInfo fournit un équivalent de la fonction phpinfo() qui rapporte des informations de sécurité sur l'environnement PHP et offre des suggestions d'amélioration.
Il ne remplace pas les techniques de développement sécurisées et ne fait aucun type d'audit de code ou d'application.
Néamoins, PhpSecInfo est un outil indispensable dans une approche de sécurité multicouche.

## Branche master

La branche master rassemble les mises à jour de 2012 2015 et 2018 pour obtenir une version v3.x 2019 fonctionnelle et optimisée.

## Consulter la branche actuellement en développement v3.0.3 version 2020

- Le dépôt Github pour PhpSecInfo en 2020 : https://github.com/ZerooCool/phpsecinfo
- La branche en développement : https://github.com/ZerooCool/phpsecinfo/tree/phpsecinfo-zeroocool-v3.0.3

- Le Wiki de Visionduweb : https://wiki.visionduweb.fr/index.php?title=Installer_PHP#PhpSecInfo
- Le Wiki de Github : https://github.com/ZerooCool/phpsecinfo/wiki

- Voir ci-dessous pour l'installation de la version v3.0.3 sur son serveur web.

## Soutenir le développement de PhpSecInfo
- Faire remonter les erreurs.
- Participer à la résolution des erreurs.
- Soutenir le développeur avec des Ğ1 : https://github.com/ZerooCool/phpsecinfo/issues/18

# Les différentes versions de PhpSecInfo

La branche master met à disposition les 4 versions de PhpSecInfo identifiées sur Github en 2019 :
- Télécharger la version officielle de 2007 depuis le site du projet : http://phpsec.org/projects/phpsecinfo/
- Les 3 autres projets partagés ont contribués à l'évolution de PhpSecInfo, en 2012, 2015 et 2018.

## PhpSecInfo
```
Version officielle v0.2.1 2007
Version officielle améliorée par le développeur ayant participé au développement précédent v0.2.2 2009
Version non officielle v2.0.1a -> v2.0.2 2016
```

## SecurityInfo
```
Intègre la version v0.2.2 2009 dans son projet.
La version de SecurityInfo est une version améliorée de PhpSecInfo v0.2.2 en 2018.
```

## Vérification des CHANGELOG
Le lien officiel pour télécharger la version de PhpSecInfo de 2007 v0.2.1 :
http://phpsec.org/projects/phpsecinfo/phpsecinfo.zip

Le lien officiel pour télécharger la version de PhpSecInfo de 2009 v0.2.2 :
https://github.com/funkatron/phpsecinfo - https://github.com/funkatron/phpsecinfo/blob/master/CHANGELOG

Le lien non officiel pour télécharger la version de PhpSecInfo de 2009 v2.0.1a -> v2.0.2 de 2016 :
https://github.com/bigdeej/PhpSecInfo - https://github.com/bigdeej/PhpSecInfo/blob/master/CHANGELOG

Un fork de PhpSecInfo vers SecurityInfo basé sur la v0.2.2 de 2009
Le CHANGELOG n'est plus présent pour suivre l'évolution des correctifs de ce projet.
Cette mise à jour ne prend pas en compte les mises à jour de la v2.0.1a -> v2.0.2 de 2016.
Le lien officiel pour télécharger la version de SecurityInfo de 2019 : https://github.com/matomo-org/plugin-SecurityInfo - https://github.com/matomo-org/plugin-SecurityInfo/blob/master/PhpSecInfo/PhpSecInfo.php#L20

Consulter le CHANGELOG de la version v3.0.1 2019 pour consulter les améliorations de la version stable.

# Installer PhpSecInfo en développement v3.0.3 2020

## Sur un hébergement mutualisé avec un client FTP

- Télécharger PhpSecInfo : https://github.com/ZerooCool/phpsecinfo/archive/phpsecinfo-zeroocool-v3.0.3.zip
- Décompresser l'archive phpsecinfo-zeroocool-v3.0.3.zip
- Transférer les fichiers par FTP vers son hébergement mutualisé.

## Sur un serveur GNU/Linux Debian - Ubuntu
1- Télécharger PhpSecInfo depuis le dépôt de Zer00CooL :
```
sudo wget https://github.com/ZerooCool/phpsecinfo/archive/phpsecinfo-zeroocool-v3.0.3.zip
```

2- Décompresser l'archive puis la suprimer :
```
sudo unzip phpsecinfo-zeroocool-v3.0.3.zip
sudo rm phpsecinfo-zeroocool-v3.0.3.zip
```

3- Renommer le dossier :
```
sudo mv phpsecinfo-zeroocool-v3.0.3 phpsecinfo
```

4- Ajouter un fichier .htaccess pour ne pas rendre le rendu de PhpSecInfo public :
```
cd phpsecinfo
sudo bash -c "cat <<EOIPFW >> .htaccess
# Accès réservé à l'administrateur !
# Adresse IP de l'administrateur :
Require ip xx.xx.xxx.xx
EOIPFW"
```

5- Protéger le fichier .htaccess :
```
sudo chmod 444 .htaccess
```

6- Changer le propriétaire du dossier phpsecinfo pour permettre l'affichage depuis le navigateur :
```
cd ..
sudo chown www-data:www-data -R phpsecinfo/
```

# Utiliser PhpSecInfo
```
http://localhost/phpsecinfo
http://domaine.ext/phpsecinfo
```
