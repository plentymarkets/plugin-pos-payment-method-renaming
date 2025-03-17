# PlentyONE Plugin zur Bereitstellung und Umbenennung der POS Standardzahlungsarten

Dieses Plugin stellt alle erforderlichen Standardzahlungsarten für die Verwendung von POS in deinem PlentyONE Backend bereit:

* Barzahlung (ID 4)
* Kartenzahlung (ID 11)
* Gutscheine (ID 1700)

Zusätzlich kannst du auf Wunsch individuelle Namen für die oben genannten POS Standardzahlungsarten vergeben.

<div class="alert alert-success" role="alert">
   Das vorliegende Plugin muss in dem Plugin-Set installiert und aktiviert werden, das mit dem Hauptmandanten verknüpft ist.
</div>

<div class="alert alert-warning" role="alert">
   Verwendest du bereits das Plugin <a href="https://marketplace.plentymarkets.com/payuponpickup_4757" target="_blank">Barzahlung</a> für Ceres? Dann achte darauf, für das vorliegende Plugin eine niedrigere Position als für das Plugin Barzahlung zu vergeben, falls beide im selben Plugin-Set installiert sind.
</div>

## Standardzahlungsarten umbenennen

Möchtest du individuelle Namen für die Standardzahlungsarten im vergeben? Der geänderte Name wird im PlentyONE Backend, auf POS Belegen, im Tagesabschluss, im Zwischenbericht und in über POS generierten Exporten angezeigt. 

Die Umbenennung der POS Standardzahlungsarten nimmst du mithilfe eines Assistenten im PlentyONE Backend vor. Dieser führt dich durch die notwendigen Einstellungen. Gehe dazu wie unten beschrieben vor.

#### Standardzahlungsarten umbenennen:

1. Öffne das Menü **Einrichtung » Assistenten » Plugins**.
2. Wähle das Plugin-Set, in dem du das Plugin installiert hast.
3. Öffne den Assistenten **POS Zahlungsarten**.
4. Schließe den Assistenten vollständig ab.

## Standardzahlungsarten bereitstellen

Nachdem du den Assistenten durchlaufen hast, sind die für POS benötigten Standardzahlungsarten automatisch in deinem PlentyONE Backend verfügbar und aktiviert. Du kannst diese Standardzahlungsarten dann im Menü **Einrichtung » Aufträge » Zahlung » Zahlungsarten** einsehen.

## Lizenz

Das gesamte Projekt unterliegt der GNU AFFERO GENERAL PUBLIC LICENSE – weitere Informationen findest du in der [LICENSE.md](https://github.com/plentymarkets/plugin-pos-payment-method-renaming/blob/master/LICENSE.md).