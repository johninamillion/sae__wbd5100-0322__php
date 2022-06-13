# WBD5100 - PHP Basics

## Einrichtung der Entwicklungsumgebung
Zur Entwicklung von PHP basierten Web Anwendung bedarf es eines AMP-Stacks oder einer alternative.
Oft ist die Sprache von einem so gennanten LAMP-Stack (Linux, Apache, MySQL, PHP), hier gibt es bspw. alternativen im Betriebssystem mit Windows, im Websever mit NGINX und in der Datenbank mit MariaDB. Diese Alternativen können zu einer Unterschiedlichen Bezeichnung führen.

Ich arbeite im Unterricht mit einem LAMP-Stack unter der Verwendung von MariaDB als alternative zu MySQL.

Die Einrichtung einer lokalen Entwicklungsumgebung sind wir im VCE durchgegangen, solltest du an diesem nicht teilgenommen haben, besorge dir die Notwendigen Information bitte über deine Mitstudierenden oder im Support.

### MAMP (MacOS)
Zur schnellen und einfachen Einrichtung eines AMP-Stacks auf MacOS empfiehlt sich MAMP.   
[Zu MAMP download′](https://www.mamp.info/)

**Wichtig**: Das Stammverzeichnis (DocumentRoot) sollte auf den Ordner deines aktuellen Projektes zeigen, so dass du die *index.php* deines Projektes per *localhost:8080* (der Port kann variieren) erreichst.
Dies lässt sich in der jeweiligen Software einstellen. [Zur Anleitung′](https://documentation-5.mamp.info/en/MAMP-Mac/Preferences/Web-Server/index.html)

### XAMPP (Windows)
Zur schnellen und einfachen Einrichtung eines AMP-Stacks auf Windows empfiehlt sich XAMPP.   
[Zu XAMPP download′](https://www.mamp.info/)

**Wichtig**: Das Stammverzeichnis (DocumentRoot) sollte auf den Ordner deines aktuellen Projektes zeigen, so dass du die *index.php* deines Projektes per *localhost:8080* (der Port kann variieren) erreichst.
Dies lässt sich in der jeweiligen Software einstellen. [Zur Anleitung′](https://stackoverflow.com/questions/10157333/xampp-change-document-root)


### Vagrant & VirtualBox
Möchtest du dich darüber hinaus mehr mit der Intallation und dem Aufbau von Servern beschäftigen setze die gerne mit VirtualBox & Vagrant auseinander.

---

## Verwendung von PHP

### PHP als Skript
Um ein Skript mit der Dateiendung *.php* in PHP zu schreiben bedarf es eines öffnenden Tags am Anfang der Datei.
Dies sollte in der ersten Zeile der jeweiligen Datei stehen. Ein schließendes Tag bedarf es bei einem Skript nicht zwanghaft.
```php
<?php

echo "Hallo Welt";
```

### PHP innerhalb von HTML Strukturen
PHP lässt sich auch innerhalb von HTML Sturkturen oder ähnlichem verwenden. 
Die Dateiendung muss dennoch *.php* sein, damit die Datei vom Server als PHP Skript erkannt wird.
```php
<body>
<?php echo "Hallo Welt" ?>
</body>
```

Zusätzlich erlaubt ist `<?=` als eine alternative Kurzschreibeweise zu `<?php echo`.
```php
<body>
<?= "Hallo Welt" ?>
</body>
```
Die Verwendung von PHP in HTML Strukturen sollte nur in Templates stattfinden. 
Hier sollten keine Variablen, Funktionen oder ähnliches definiert werden.

---

## Prinzipien / Do's & Don'ts

### DRY - Don't Repeat Yourself
Solltest du in der Entwicklung deiner Anwendung merken das du eine Funktionsweise, Kontrollstrukturen oder ähnliches wiederholst und somit Code Duplikate entstehen, solltest du überlegen wie du diese abstrahierst und/oder auslagerst um eine Wiederholung zu vermeiden.

### MVC - Model, View, Controller (Muster)
Deine Anwendungen sollten nach dem MVC Muster zur Unterteilung in drei Komponenten (Model, View & Controller) strukturiert sein.

---

′ für die Inhalte externer Links wird keine Haftung übernommen