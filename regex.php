<?php

$password = 'azerty1234';

$length = strlen($password) > 8;

$regexMajuscule = "/^[A-Z]$/"; // Regex pour avoir au moins une majuscule

$isMajOk = preg_match("/^[A-Z]{1,}$/", $password);

$isSpecialChars = preg_match("/[\W]/", $password); // vérifier qu'il y a des car spéciaux

$isNumber = preg_match("/[0-9]/", $password); // Au moins un chiffre

$isMin = preg_match("/[a-z]/", $password); // au moins une minuscule

if ($length && $isMajOk) {
    echo 'Mot de passe valide';
} else {
    echo 'Mot de passe "<strong>INVALIDE</strong>"';
}


/* 
Made by @Vitallyx

Veuillez lire les notes pour mieux comprendre la structure du mémento 

 Note : 
► Pour rechercher un élément en particulier : ctrl + f et écrire # + le Métacaractère voulu ex : #^
► Dans les exemples les () viennent indiquer ce qui est sélectionné

 Site utile : 
► https://regex101.com - Testeur de regex en ligne

 Structure :
"/^ REGEX $/"


 ^ Début du regex
 $ Fin du regex
 [] Établit une correspondance avec tout ce qui se trouve à l’intérieur des crochets.
 {} Permettent de regrouper un ensemble de commandes et de les exécuter dans le "shell courant"
 () Permettent de regrouper un ensemble de commandes et de les exécuter dans un "shell fils".



 Les Métacaractère & Ancres :


► Tag : #^

Inséré dans une classe, le caractère ^ indique une exception pour la recherche 
   [^n]  tout caractère, sauf n  ←−→ (fzaff)n(gez)n(fez)

En dehors d'une classe elle établit une correspondance avec des caractères au début d’une chaîne de caractères 
   ^https  commence par https ←−→ (https):test.com ; (https)fzafaz ; www.test.com

Remarque : 
► Seulement ^ est actifs dans une classe, les autres métacaractères ne sont considérés que comme simples caractères


► Tag : #$

Établit une correspondance avec des caractères à la fin d’une chaîne de caractères
   val$  termine par val ←−→ fzaf(val) ; fzafabh
   [xyz]$  termine par x, y ou z ←−→ faghex(z) ; fafzae(y) ; gezgzh 


► Tag : #\S, #\s 

\S	Correspond à tous les caractères qui ne sont pas des caractères d’espacement
   Va\Slwyns  Va suivi de tous caractères hors caractères d’espacement ←−→ (VaXlwyns)fz ; fza(Va1lwyns)s ; Va lwyns

\s Correspond à tout caractère d’espacement (espace, tabulation, saut de ligne ou saut de page)
   Valwyns\sdev  Valwyns suivi d'un caractère d’espacement puis dev ←−→ Valwyns dev ; (Valwyns[tab]dev)dz ; Valwyns<2 espaces>dev ; Valwynsdev ; Valwzyns dev


► Tag : #\w, #\W

\w Correspond à n’importe quel caractère alphanumérique
   \w\w\w  sélectionne par bloc de 3 caractères alphanumérique ←−→ (daz) ; (gez)(gze) ; (Ffz)1D ici Ffz est sélectionné mais pas 1D car il n'y a que 2 caractères
   ab\w\w\w  ab suivi de 3 caractères alphanumérique ←−→ faf(abfzd)htr

\W	Correspond à n’importe quel caractère non alphanumérique
   valwyns\W  valwyns suivi de n’importe quel caractère non alphanumérique ←−→ (valwyns!) ; (valwyns?)


► Tag : #\D, #\d

\d	Correspond à tout chiffre
   val\d\d  val suivi de 2 chiffres ←−→ (val80) ; (val90) ; val4z ; aev52

\D	Correspond à tout caractère qui n’est pas un chiffre
   val\D  val suivi d'un caractère qui n’est pas un chiffre ←−→ (val!) ; (val-). ; (vale). ; abfaval1e


► Tag : #\b, #\B

\b	Définit une limite de mot
   \bval  aucun caractère avant val ←−→ (val) ; (val)he ; ndzawval.

\B	Définit une non-limite de mot
   \Bval  au moins 1 caractère avant val ←−→ ktyew(val)fza ; dzad(val)kty ; valgzeg ; f(val)fez


► Tag : #\a

\a	Correspond à tout caractère alphabétique, majuscule ou minuscule
   v\aal  v suivi d'un caractère alphabétique puis de al ←−→ (vWal)dz ; (vfal)fs ; (vaal).


► Tag : #\f

\f	Correspond à un caractère saut de page

► Tag : #\n

\n	Correspond à un caractère de retour à la ligne

► Tag : #\s, #\S

\s	Correspond à tout blanc incluant des espaces, des onglets, des caractères avance page, etc
   val\sd  val suivi d'un caractère "blanc" puis de d ←−→ (val d) ; fa(val[tab]d)afa

\S	Correspond à tout caractère espace autre qu'un blanc
   val\sd  val suivi d'un caractère hors "blanc" puis de d ←−→ (valdd) ; fa(val1d)afa

► Tag : #\t

\t	Correspond à un caractère de tabulation

► Tag : #\v, #\V

\v	Corresponds à tout blanc vertical

\V Corresponds à tous les caractères qui ne sont pas des blancs verticaux

► Tag : #\h, #\H

\h Corresponds à tout blanc honrizontal

\H Corresponds à tous les caractères qui ne sont pas des blanc honrizontaux

► Tag : #\

Annihile la signification du métacaractère qui suit

► Tag : #.

. Désigne un caractère quelconque / Correspond à tout caractère unique

► Tag : #*

* Facultative peut apparaître 0 ou plusieurs fois - * revient à écrire {0,}
   Va*  Va suivi de 0 a ou de plusieurs a ←−→ (Vaaaaaaaaa) ; faz(Vaa)ffza(Vaaaaa) ; (Va)fafahe

► Tag : #?

? Facultative peut apparaître 0 ou 1 fois - ? revient à écrire {0,1}
   Va?l  Va suivi de 0 a ou 1 a puis de l ←−→ (Val)gagh ; faz(Val)ffza(Vl)fza ; Vaalfafahe

► Tag : #+

+ Obligatoire peut apparaître 1 ou plusieurs fois - + revient à écrire {1,}
   Va+  Va suivi obligatoirement de 1 a ou de plusieurs a ←−→ (Vaaaaaaaaa) ; faz(Vaa)ffza(Vaaaaa) ; Vafafahe

► Tag : #|

| Corresponds à ou

► Tag : #-

- Correspond à tout caractère compris dans la plage spécifiée.
   [a-z]  correspond à tout caractère alphabétique en minuscule de l'alphabet




 Exemple de Regex :

 [net$] Correspond à n’importe lequel des caractères n, e, t ou $ ($ est un métacaractère, mais dans une classe de caractères, il ne correspond qu’à $).

 [A-Z]$ Doit se terminer par une Majuscule

 [^test]$ Tous caractères sauf t,e,s,t a la fin

 [test]$ Correspond à n’importe lequel des caractères t, e, s, t a la fin

 net[wrx] Correspond à netw, netr et netx, mais pas à netz

 net[a-z] correspond à neta, netw et netf etc, mais pas à net1

 [val].$ termine par a, b ou c suivi de n'importe quels caractères ←−→ fzafb1, fzafbh, jjytcg

 ^Val.*Dev$ commence par Val, peut avoir 0 ou plusieurs caractères (n'importe lesquels), doit se terminer par Dev ←−→ Valfza44fas5Dev

 [^a]$ Ne doit pas se terminer par a ←−→ fzafb(1) ; feD1 zan

\b[0-9A-Z]{3}([^ 0-9A-Z]|\s)?[0-9]{4}\b



 : if 
  Suivi d'un...

 ! not 
  Pas suivi d'un...

 | ou


 ?! Not

 ?: Précedent

 ?= Créer un nouveau ensemble


 */