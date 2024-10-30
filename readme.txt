=== CMP-Sourcepoint Plugin ===
Contributors: Peter Wingen, Florian Maisey
Tags: cmp, gdpr, dsgvo, consent
Requires at least: 4.0
Tested up to: 4.8
Requires PHP: 5.6
Stable tag: 1.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Das Ziel der CMP Software ist es die Einwilligung von Nutzern einzuholen, um damit die Einhaltung der Datenschutz-Grundverordnung (DSGVO) zu gewährleisten.
Der Dienstleister Sourcepoint.com stellt den optischen Layer zur Verfügung und verwaltet die Einwilligungen der User.


== Description ==
Das Ziel der CMP Software ist es die Einwilligung von Nutzern einzuholen,
um damit die Einhaltung der Datenschutz-Grundverordnung (DSGVO) zu gewährleisten.
Der Dienstleister Sourcepoint.com stellt den optischen Layer zur Verfügung und verwaltet die Einwilligungen der User.

Das CMP Javascript wird im Head der Seite eingebunden.

*Blacklist:*
In der Blacklist muss der Name der Datei stehen, die nicht geladen werden darf.
Es reicht der Dateiname und es muss nicht der komplette Pfad eingetragen werden,
damit auch unterschiedliche Versionierungen berücksichtigt werden.

Die Blacklist ist ein Teil des CMP Objects und kann auch von anderen Javascript Funktionen abgerufen werden:
CMP.blacklist bzw. z.B. CMP.blacklist.facebook

blacklist: {
    'iam.js': true,
    'facebook': true,
    'fbcdn': true,
    'nastyScript': true,
    'nastyText': true
}

*Vendornamen:*
Der Vendorname sollte nicht die komplette URL des zu blockenden Scriptes enthalten,
um flexibel bei Änderungen zu sein.


Negativbeispiel: vendor = ga
In diesem Beispiel wurden auch alle Elemente mit dem Sub-String "ga" im "data-src" Attribute gescannt.
Es gibt viele Bilder mit diesem Sub-String (Zwinkern)

Negativbeispiel 2: vendor = facebook

Der Begriff Facebook kommt in Artikeln und Überschriften über eben dieses Social-Network vor und wird von einigen Tools
deshalb in URL Parametern aufgeführt. Besser ist es deshalb facebook.com zu verwenden.
Dies führt zwar nicht zu Fehlern, aber es werden unnötig viele Elemente überprüft.

*Whitelist:*
Die Whitelist ist ebenfalls ein Teil des CMP Objects und wird nicht manuell gepflegt,
sondern durch Sourcepoint nach dem der User seinen Consent gegeben hat.

*Feature Flag / Consent einfordern / Script starten:*
Im CMP Object kann die Funktion aktiviert bzw. deaktiviert werden.

var CMP = {
    featureEnabled: true
};

*Consent einfordern / Script starten*
Für das Szenario das der Consent *automatisch* gesetzt wird und nur auf Wunsch des Users abgelehnt werden kann,
kann dies im CMP Object definiert werden:

var CMP = {
    autoconsent: true
};


*Platzhalter für geblockten Content*
Ohne Consent werden iFrames von URLs die auf der Blacklist stehen geblockt.
Statt dem iFrame wird ein Platzhalter ausgespielt. Der Platzhalter kann über die CSS Klasse "c-cmp-blockedContent"
gelayoutet werden.

Der Text kann im CMP Object editiert werden:

var CMP = {
    placeholder: 'Aufgrund ihrer Datenschutzfreigaben können sie diesen Inhalt nicht sehen. Wenn sie die Einstellungen ändern möchten, klicken Sie bitte hier.'
};


== Installation ==
1. Upload von "cmp-sourcepoint.zip" in Wordpress.
1. Plugin über das "Plugin"-Menü in Wordpress aktivieren.
1. Plugin über Einstellungen -> cmp-sourcepoint konfigurieren

== Frequently Asked Questions ==

== Screenshots ==

== Changelog ==
= 1.0 =
* Initial release.
