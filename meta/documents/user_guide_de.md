# plentymarkets Plugin zur Bereitstellung und Umbenennung der plentyPOS Standardzahlungsarten

Dieses Plugin stellt alle erforderlichen Standardzahlungsarten für die Verwendung von plentyPOS in deinem plentymarkets Backend bereit:

* Barzahlung (ID 4)
* Kartenzahlung (ID 11)
* Gutscheine (ID 1700)

Zusätzlich kannst du auf Wunsch individuelle Namen für die oben genannten plentyPOS Standardzahlungsarten vergeben.

<div class="alert alert-warning" role="alert">
   Das vorliegende Plugin muss in dem Plugin-Set installiert und aktiviert werden, das mit dem Hauptmandanten verknüpft ist.
</div>

<div class="alert alert-warning" role="alert">
   Verwendest du bereits das Plugin <a href="https://marketplace.plentymarkets.com/payuponpickup_4757" target="_blank">Barzahlung</a> für Ceres? Dann achte darauf, für das vorliegende Plugin eine niedrigere Position als für das Plugin Barzahlung zu vergeben, falls beide im selben Plugin-Set installiert sind.
</div>

## Standardzahlungsarten umbenennen

Möchtest du individuelle Namen für die Standardzahlungsarten im vergeben? Der geänderte Name wird im plentymarkets Backend, auf plentyPOS Belegen, im Tagesabschluss, im Zwischenbericht und in über plentyPOS generierten Exporten angezeigt. 

Die Umbenennung der plentyPOS Standardzahlungsarten nimmst du mithilfe eines Assistenten im plentymarkets Backend vor. Dieser führt dich durch die notwendigen Einstellungen. Gehe dazu wie unten beschrieben vor.

#### Standardzahlungsarten umbenennen:

1. Öffne das Menü **Einrichtung » Assistenten » Plugins**.
2. Wähle das Plugin-Set, in dem du das Plugin installiert hast.
3. Öffne den Assistenten **plentyPOS Zahlungsarten**.
4. Schließe den Assistenten vollständig ab.

## Standardzahlungsarten bereitstellen

Nachdem du den Assistenten durchlaufen hast, sind die für plentyPOS benötigten Standardzahlungsarten automatisch in deinem plentymarkets Backend verfügbar und aktiviert. Du kannst diese Standardzahlungsarten dann im Menü **Einrichtung » Aufträge » Zahlung » Zahlungsarten** einsehen.

## Lizenz

Das gesamte Projekt unterliegt der GNU AFFERO GENERAL PUBLIC LICENSE  – weitere Informationen findest du in der [LICENSE.md](https://github.com/plentymarkets/plugin-pos-payment-method-renaming/blob/master/LICENSE.md).