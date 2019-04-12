# Esit\ComposerToolbox

by [e@sy Solution IT](https://easySolutionsIT.de)


## Beschreibung

Bei der ComposerToolbox handelt es sich um eine Erweiterung für das Open Source CMs Contao, mit der es möglich ist 
geschützte Repsoitories in die composer.json einzutragen, ohne diese direkt bearbeiten zu müssen.


## Installation

Die Erweiterung kann einfach über den Manager installiert werden, einfach nach `esit/composertoolbox` suchen.


## Benutzung (für Nutzer)

Nach der Installation erscheint im Backend ein neuer Menüpunkt. Über diesen können andere Erweiterungen in die 
`composer.json` eingetragen werden. Es wird einfach eine `composer.json` hoch geladen und der SHA512-Hash des 
Inhalts eingegeben. Diesen sollte der Entwickler der zu installierenden Erweiterung mitliefern. 

Nach der Eintragung, können die Pakete im Manager aktualisiert werden, dabei werden auch die neuen Pakete installiert.


## Aufbau der composer.json (für Entwickler)

Die Daten können in der `composer.json` der Erweiterung hinterlegt werden. Es kann die ganze Datei eingelesen werden, 
da alle nicht benötigten Einträge ignoriert werden. Es muss im Abschnitt `extras` der Abschnitt `composertoolbox` 
erstellt werden. Dort können die nötigen Eintragungen für die Abschnitte `require`, `require-dev` und `repositories` 
eingegeben werden. 

__Die Respoitiries muss benannt sein!__ Sie können sonst nicht mehr gelöscht werden!
(Siehe im Beispiel unter `repositories`)

Beispiel:

```yaml
"extra": {
        "composertoolbox": {
            "require": {
                "esit/testtoolbox": "^1.0"
            },
            "repositories": {
                "esit/testtoolbox": {
                    "type": "vcs",
                    "url": "https://gitlab+deploy-token-xx:xqxkXWXYx503XyxD0QXq@total-kreativ.de/pfroch/esit_testtoolbox_dev4.git"
                }
            }
        }
    }
```

Der Hash kann z.B. mit PHP wie folgt erzeugt werden:

```php
echo hash_file('sha512', 'composer.json');
```

Ber Befehl im Verzeichnis mit der `composer.json` ausgeführt, für die der Hash erzeugt werden soll.


## Autor

__e@sy Solution IT__  
Patrick Froch

* https://easySolutionsIT.de
* info@easySolutionsIT.de


## Lizenz

Distributed under the [LGPLv3](https://spdx.org/licenses/GPL-3.0-or-later.html#licenseText) license. 
See `LICENSE` for more information.