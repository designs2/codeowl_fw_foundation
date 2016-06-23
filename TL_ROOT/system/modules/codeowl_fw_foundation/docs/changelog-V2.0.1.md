#Codeowl Framework Foundation

### Maindeveloper
 
 Monique Hahnefeld <info@monique-hahnefeld.de>

###Requirements
PHP:">=5.3.2",
Contao: 3.4.6 - 4.0.0

##Changelog 2.0.1

###New
Zurbs Foundation Version 6.2.3
####Accordion 
active-class is now named 'is-active', not 'active'. You can set the active state into the accordion inner element with the CSS-Class field 
####Tabs 
active-class is now named 'is-active', not 'active'.
####Orbit
navigationselemente werden nicht mehr mit javascript generiert und werden daher mit in die Templates generiert

###Improved

###Fixed

### Advices
PHP-Plugin verarbeitet die Verschachtelungstiefe der Dateistruktur des Frameworks nicht
-> wurde mittels eigener Routine gelöst
Die Datei breadcrumbs.scss wurde angepasst:
$slash: if($global-text-direction == 'ltr', '/', '\\'); macht Probleme
L60 geändert in   $slash:  '/';


#### not ready at all !!! please recognize

geht:
grid
typography, auch breakpoints
accordion
tabs
(orbit)

flex video
youtube
vimeo
video ownsource
placeholder



-----------
geht noch nicht:
breakpoints settings
vcard
orbit prev and next navigation don't work, markup stimmt aber so weit

clearing lightbox


---
template vars checken

auflistungen
pricebox
Dropdown, Buttons und Buttonbars
Hinweise und PopUps
V-Card
Blockquote


-----------
todos:

javascript aufrufe nochmal prüfen und optimieren (tooltip)
orbit picture captions nochmal prüfen
orbit role="region" aria-label="Favorite Space Pictures" optimieren
orbit bullets mit php generieren, macht das js nicht mehr
templates an evtl neues markup anpassen

dringend:
auflistungen
breakpoints einstellen




