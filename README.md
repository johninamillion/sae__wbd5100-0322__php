# WBD5100 - PHP Basics

## Inhalte
* [Einrichtung der Entwicklungsumgebung](#einrichtung-der-entwicklungsumgebung)
  * [MAMP (MacOS)](#mamp-macos)
  * [XAMPP (Windows)](#xampp-windows)
  * [Vagrant & VirtualBox](#vagrant--virtualbox)
* [Verwendung von PHP](#verwendung-von-php)
* [Do's / Don'ts](#dos--donts)
  * [Type Declarations](#type-declarations) 
  * [Type Hints](#type-hints)
  * [Return Types](#return-types)
* [Designprinzipien/Strukturen](#designprinzipien--strukturen)

---

## Einrichtung der Entwicklungsumgebung
Zur Entwicklung von PHP basierten Web Anwendung bedarf es eines AMP-Stacks oder einer alternative.
Oft ist die Sprache von einem so gennanten LAMP-Stack (Linux, Apache, MySQL, PHP), hier gibt es bspw. alternativen im Betriebssystem mit Windows, im Websever mit NGINX und in der Datenbank mit MariaDB. Diese Alternativen können zu einer Unterschiedlichen Bezeichnung führen.

Ich arbeite im Unterricht mit einem LAMP-Stack unter der Verwendung von MariaDB als alternative zu MySQL.

Die Einrichtung einer lokalen Entwicklungsumgebung sind wir im VCE durchgegangen, solltest du an diesem nicht teilgenommen haben, besorge dir die Notwendigen Information bitte über deine Mitstudierenden oder im Support.

Information über dein Setup bekommst du durch den aufruf der Funktion `phpinfo`.

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

### Kommentare in PHP
Beispiele zu Kommentaren in PHP:
```php
// Dies ist ein einzeiliger Kommentar

/*
 * Dies ist ein mehrzeiliger Kommentar
 * Dies ist ein mehrzeiliger Kommentar
 */
```

### Doc-Blocks in PHP

Doc-Blocks dienen der Dokumentation vom Code. Diese Können für Dateien, Klassen, Interfaces, Traits, Funktionen und Variablen verwendet werden.

Mit Hilfe von Doc-Blocks können automatisch Dokumentation deiner Anwendung erstellt werden, bspw. mit der Software *phpDocumentor*.

Beispiel eines Doc-Blocks anhand von einer Funktion:
```php

/**
 *  Überprüft ob ein Integer innerhalb von einem Text vorkommt.
 *
 *  @param  string  $parameter1     Ein Text welcher durchsucht werden soll
 *  @param  int     $parameter2     Der Integer nachdem im Text gesucht werden soll
 *  @return bool
 */
function myFunction( string $parameter1, int $parameter2 ) : bool {

    return strstr( $parameter2, $parameter1 );
}
```

---

## Do's & Don'ts

### Type Declarations

Gebe über die *Type Declaration* information darüber welcher Datentype für eine Klassenvariable zulässig ist.

Gültige Type Declarations sind `string`, `int`, `float`, `bool`, `array`, `callable`, `void` und `Class`/`Interface`.
Ein Type Hint wie beispielsweise `?string` gibt an das ein String oder NULL zugewiesen wird.

**DO** - Klassenvariablen mit Type Declarations schreiben

*In diesem Beispiel führt es bereits zu einem gewollten Fehler, wenn einer Klassenvariable eine Wert von einem falschen Type zugewiesen wird.*

```php
class Example {

  public string $hello = 'Hello';

}
```

**DON'T** - Klassenvariablen ohne Type Declarations schreiben

*In diesem Beispiel führt es erst zu einem ungewollten Fehler, wenn mit einem Wert, welcher einen falschen Typ entspricht, gearbeitet wird.*

```php
class Example {

  public $hello = 'Hello';

}
```

### Type Hints

Gebe über den **Type Hint** Information darüber welcher Datentyp für einen Parameter zulässig ist.

Gültige Type Hints sind `string`, `int`, `float`, `bool`, `array`, `callable`, `void` und `Class`/`Interface`.
Ein Type Hint wie beispielsweise `?string` gibt an das ein String oder NULL übergeben wird.

**DO** - Methoden und Funktionen mit Type Hints schreiben

*In diesem Beispiel führt es bereits zu einem gewollten Fehler, wenn einem der Parameter ein falscher Datentyp übergeben wird.*

```php
function removeValueByKey( string $key, array $data ) {
    if ( array_key_exists( $key, $data ) ) {
        unset( $data[ $key ] );
    } 
}
```

**DON'T** - Methoden und Funktionen ohne Type Hints schreiben

*In diese Beispiel führt es zu einem ungewollten Fehler, wenn Falsche Datentypen der Funktion array_key_exists übergeben werden, 
oder versucht wird mit einem falschen Datentypen als Index/Key auf den Array zuzugreifen.*

```php
function removeValueByKey( $key, $data ) {
    if ( array_key_exists( $key, $data ) ) {
        unset( $data[ $key ] );
    } 
}
```

### Return Types

Gebe über den **Return Type** Informationen darüber welcher Datentyp zurückgegeben wird.
Dies erhöht die Lesbarkeit von deinem Code und hilft Funktionen fokusierter zu schreiben.

Gültige Return Types sind `string`, `int`, `float`, `bool`, `array`, `callable`, `void` und `Class`/`Interface`.
Ein Return Type wie beispielsweise `?string` gibt an das ein String oder NULL zurückgegeben wird.

**DO** - Methoden und Funktionen mit Return Type schreiben.

*In diesem Beispiel führt es bereits zu einem gewollten Fehler, wenn unsere Funktionen einen anderen Datentyp als `bool` zurück gibt.*

```php
function returnTrue() : bool {

    return TRUE;
}
```

**DON'T** - Methoden und Funktionen ohne Return Type schreiben

*In diesem Beispiel führt es zu einem ungewollten Fehler, wenn wir von der Funktion einen anderen Datentypen erwahrten, als wir zurück gegeben bekommen und mit diesem weiter arbeiten.*

```php
function returnTrue() {
    
    return TRUE;
}
```

---

## Designprinzipien / Strukturen

### DRY - Don't Repeat Yourself
Solltest du in der Entwicklung deiner Anwendung merken das du eine Funktionsweise, Kontrollstrukturen oder ähnliches wiederholst und somit Code Duplikate entstehen, solltest du überlegen wie du diese abstrahierst und/oder auslagerst um eine Wiederholung zu vermeiden.

### MVC - Model, View, Controller (Muster)
Deine Anwendungen sollten nach dem MVC Muster zur Unterteilung in drei Komponenten (Model, View & Controller) strukturiert sein.

### Software > Documentation
Versuche deine Anwendung so zu schreiben, dass dein Code auch ohne eine Dokumentation verständlich ist. Nutze hierfür besonders die features der Typisierung (Type Declarations, Type Hints, Return Types) die PHP bietet.

---

′ für die Inhalte externer Links wird keine Haftung übernommen