#Codeowl Framework Foundation

### Maindeveloper
 
 Monique Hahnefeld <info@monique-hahnefeld.de>

###Requirements
PHP:">=5.3.2",
Contao: 3.4.6 - 4.0.0

##Changelog 2.0.1

###New
Zurbs Foundation Version 6.2.3

###Improved

###Fixed

### Advices
PHP-Plugin verarbeitet die Verschachtelungstiefe der Dateistruktur des Frameworks nicht
-> wurde mittels eigener Routine gelöst
Die Datei breadcrumbs.scss wurde angepasst:
$slash: if($global-text-direction == 'ltr', '/', '\\'); macht Probleme
L60 geändert in   $slash:  '/';



