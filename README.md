# PhpSecInfo

Les versions de PhpSecInfo en 2019 !
https://github.com/ZerooCool/phpsecinfo
https://wiki.visionduweb.fr/index.php?title=Installer_PHP#PhpSecInfo

## PhpSecInfo
Version v0.2.1 2007

Version v0.2.2 2009

Version v2.0.1a -> v2.0.2 2016

## SecurityInfo
Alternative basée sur la v0.2.1 2007 ou v0.2.2 2009 ?

De ce fait la version de SecurityInfo est une version améliorée de PhpSecInfo v0.2.1.1 2019 ou v0.2.2.1 2019.

# Vérifier les CHANGELOG

Le lien officiel pour télécharger la version de PhpSecInfo de 2009 v0.2.2 :
https://github.com/funkatron/phpsecinfo - https://github.com/funkatron/phpsecinfo/blob/master/CHANGELOG

Le lien non officiel pour télécharger la version de PhpSecInfo de 2009 v2.0.1a -> v2.0.2 de 2016 :
https://github.com/bigdeej/PhpSecInfo - https://github.com/bigdeej/PhpSecInfo/blob/master/CHANGELOG

Le lien officiel pour télécharger la version de SecurityInfo de 2019.
Le fichier CHANGELOG n'est pas présent.
Cette mise à jour n'a pas du prendre en compte les précédentes mises à jour de la v0.2.2 ou de la v2.0.1a -> v2.0.2 de 2016.
https://github.com/matomo-org/plugin-SecurityInfo

Un fork de PhpSecInfo vers SecurityInfo.
Le CHANGELOG n'est pas présent pour suivre l'évolution de ce projet.
Cette version doit être basée sur la v0.2.1 2007 ou v0.2.2 2009 ?
Cette mise à jour n'a pas du prendre en compte les précédentes mises à jour de la v0.2.2 ou de la v2.0.1a -> v2.0.2 de 2016.
Le lien officiel pour télécharger la version de SecurityInfo de 2019 : https://github.com/matomo-org/plugin-SecurityInfo

# Installer PhpSecInfo v0.2.1 2007
1- Télécharger PhpSecInfo depuis le site officiel :
sudo wget http://phpsec.org/projects/phpsecinfo/phpsecinfo.zip

2- Renommer le dossier :
sudo mv phpsecinfo-20070406 phpsecinfo

3- Ajouter un fichier .htaccess pour ne pas rendre le rendu de PhpSecInfo public :
```
cd phpsecinfo
sudo bash -c "cat <<EOIPFW >> .htaccess
# Accès réservé à l'administrateur !
# Adresse IP de l'administrateur :
Require ip xx.xx.xxx.xx
EOIPFW"
```

4- Protéger le fichier .htaccess
sudo chmod 444 .htaccess

5- Changer le propriétaire du dossier phpsecinfo pour permettre l'affichage depuis le navigateur :
cd ..
sudo chown www-data:www-data -R phpsecinfo
