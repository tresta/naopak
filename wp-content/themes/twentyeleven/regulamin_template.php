<?php
/**
 * @package asd
 *
 * @author: Wery
 * @url: http://www.customweb.com

 Template Name: Regulamin Template
 
 */	
?>

<?php
function add_scripts()
{
	/*echo '
	<script language="javascript">
	jQuery(document).ready(function(){
	
	jQuery.tablesorter.defaults.widgets = [\'zebra\'];   	
	jQuery("#myTable").tablesorter();
	
	jQuery(\'.menu\').mouseover(function() {
		jQuery(this).addClass(\'over\');
	}).mouseout(function() {
		jQuery(this).removeClass(\'over\');										
	});
	
	});
	
	</script>
	';*/
}
add_action('wp_head', 'add_scripts');

get_header();

?>

<style>
.regulamin_content { 
clear: both;
color: #9E9E9E;
font-family: "Arial", "Helvetica", sans-serif;
font-size: 9px;
margin-left: auto;
margin-right: auto;
position: relative;
width: 958px;
z-index: 20;
}

.regulamin_content div{
	float:left;
}
.blue { 
color: #2BB7D9;
}
.tresc b { 
color: #010101;
}
.px12 { 
font-size: 12px;
}
.hr { 
background-image: url("http://www.decobazaar.com/img/bg-hr.gif");
background-repeat: repeat-x;
float: left;
height: 30px;
margin-left: -3px;
width: 958px;
}
.px14 { 
font-size: 14px;
}
style.css:140
.menu-black-nolink { 
color: #010101;
font-weight: 700;
}
.left-list, #leftMenu a { 
color: #202020;
float: left;
font-size: 11px;
margin-bottom: 2px;
margin-top: 10px;
}
style.css:19
a { 
color: #2BB7D9;
outline: medium none currentColor;
text-decoration: none;
}
.px11 { 
font-size: 11px;
}
</style>




<div class="hfeed content">
<div class="regulamin_content">
  <div class="px10" style="float:left; margin-top:15px; margin-bottom:15px; width:950px;">
    Jesteś tutaj: 
    <a href="naopak.com.pl" style="color:#525252">NaOpak.com.pl</a>
     > 
    <a href="naopak.com.pl/regulamin" style="color:#525252">regulamin</a>
  </div>
  <div style="width:160px; margin-right:27px; clear:both">
    <div class="hr" style="margin-top:-15px; width:140px;"></div>
    <div style=" margin-left:-1px; margin-top:-3px;" class="px14 menu-black-nolink">Regulamin:</div>
    <div class="hr" style="margin-top:-4px; margin-bottom:-14px; width:140px;"></div>
    <div style="clear:both; width:100%">
      <a class="left-list" href="#par1" title="POSTANOWIENIA OGÓLNE">
        <h3 class="px11">POSTANOWIENIA OGÓLNE</h3>
      </a>
    </div>
    <div style="clear:both; width:100%">
      <a class="left-list" href="#par2" title="ZASADY ZAKUPÓW">
        <h3 class="px11">ZASADY ZAKUPÓW</h3>
      </a>
    </div>
    <div style="clear:both; width:100%">
      <a class="left-list" href="#par3" title="ZASADY SPRZEDAŻY">
        <h3 class="px11">ZASADY SPRZEDAŻY</h3>
      </a>
    </div>
    <div style="clear:both; width:100%">
      <a class="left-list" href="#par4" title="OCHRONA PRYWATNOŚCI">
        <h3 class="px11">OCHRONA PRYWATNOŚCI</h3>
      </a>
    </div>
    <div style="clear:both; width:100%">
      <a class="left-list" href="#par5" title="POSTANOWIENIA KOŃCOWE">
        <h3 class="px11">POSTANOWIENIA KOŃCOWE</h3>
      </a>
    </div>
    <div class="hr" style="margin-top:-8px; width:140px;"></div>
    <div style=" margin-left:-1px; margin-top:-3px;">
      <a href="pomoc.html" class="px13 menu-pink">
        Zobacz
        <br>
        <span style=" line-height:12px" class="px17">POMOC</span>
      </a>
    </div>
    <div class="hr" style="margin-top:-2px; width:140px;"></div>
  </div>
  <div style="width:761px">
    <div style="margin-top:-5px; margin-bottom:15px; width:100%;">
      <a name="par1"></a>
      <h1 class="blue" style="font-size:18px; float:left">POSTANOWIENIA OGÓLNE</h1>
    </div>
    <div style="width:100%; color:#7e7d7e; line-height:17px;" class="px12 tresc">
      <b>1. Definicje</b>
      <br>
      <br>
      1.1. DecoBazaar – serwis internetowy działający pod adresem www.decobazaar.com, którego właścicielem oraz administratorem jest firma Decobazaar, 50-243 Wrocław, ul. Łokietka 6, zarejestrowana przez Przezydenta Wrocławia jako indywidualna działalność gospodarcza. pod numerem 219597. REGON: 080028039, NIP: 973-060-30-69.

      <br>
      <br>
      1.2. Produkt – towar, który może być przedmiotem sprzedaży w DecoBazaar.

      <br>
      <br>
      1.3. Użytkownik – osoba, która dokonała rejestracji w DecoBazaar, w wyniku której utworzone zostało dla niej konto użytkownika.

      <br>
      <br>
      1.4. Kupujący – użytkownik podejmujący działania zmierzające do zakupu Produktów oferowanych w DecoBazaar.

      <br>
      <br>
      1.5. Sprzedający – użytkownik, którego konto zostało rozszerzone o dodatkowe funkcje, umożliwiające mu sprzedaż Produktów w DecoBazaar.

      <br>
      <br>
      1.6. Projektant - Sprzedający, który wystawia Produkty będące autorskimi pracami.

      <br>
      <br>
      1.7. Łowca vintage - Sprzedający, który wystawia Produkty używane w dziale Vintage.

      <br>
      <br>
      1.8. Zakup - transakcja inicjowana przez Kupującego poprzez złożenie zamówienia, która prowadzi do zawarcia umowy kupna-sprzedaży pomiędzy Sprzedającym i Kupującym. Zakup dokonywany jest poprzez Internet w formie umowy zawieranej na odległość.

      <br>
      <br>
      <b>2. Warunki korzystania z serwisu DecoBazaar</b>
      <br>
      <br>
      2.1. Rejestracja w DecoBazaar jak również korzystanie z serwisu równoznaczne są z akceptacją niniejszego Regulaminu.

      <br>
      <br>
      2.2. Użytkownikiem DecoBazaar może zostać pełnoletnia osoba fizyczna, osoba prawna oraz jednostka organizacyjna nie posiadająca osobowości prawnej. Osoby niepełnoletnie mogą korzystać z serwisu pod warunkiem, że konto Użytkownika założy w ich imieniu rodzic lub prawny opiekun.

      <br>
      <br>
      2.3. Rejestracji w serwisie DecoBazaar dokonuje się poprzez wypełnienie formularza rejestracyjnego, w którym należy podać następujące dane: imię i nazwisko, adres email, adres korespondencyjny, a w przypadku osób prawnych lub jednostek organizacyjnych nie posiadających osobowości prawnej: nazwę firmy lub instytucji, imię i nazwisko osoby umocowanej do dokonania rejestracji, adres email oraz adres korespondencyjny.

      <br>
      <br>
      2.4. Dokonując rejestracji Użytkownik wyraża zgodę na przetwarzanie jego danych osobowych przez Decobazaar w celu ewidencji sprzedaży oraz realizacji zamówień, zgodnie z ustawą z dnia 29 sierpnia 1997 r. o ochronie danych osobowych (Dz. U. Nr 133, poz. 883)

      <br>
      <br>
      2.5. Dokonując rejestracji Użytkownik wyraża zgodę na otrzymywanie informacji systemowych oraz wiadomości od DecoBazaar na swój adres email.

      <br>
      <br>
      2.6. Zabrania się publikowania w DecoBazaar treści obraźliwych, wulgarnych, pornograficznych oraz niezgodnych z obowiązującymi przepisami prawa. 

      <br>
      <br>
      2.7. Zabrania się Użytkownikom przekazywania sobie nawzajem jakichkolwiek informacji, które miałyby na celu zachęcanie do bezpośredniego kontaktu, takich jak adres email, numer telefonu, adres strony internetowej.
    </div>
    <div style="margin-top:15px; margin-bottom:15px; width:100%;">
      <a name="par2"></a>
      <h1 class="blue" style="font-size:18px; float:left">ZASADY ZAKUPÓW</h1>
    </div>
    <div style="width:100%; color:#7e7d7e; line-height:17px;" class="px12 tresc">
      <b>3. Składanie zamówień</b>
      <br>
      <br>
      3.1. Po dodaniu Produktów do koszyka Użytkownik może złożyć zamówienie. Odbywa się to poprzez weryfikację adresu wysyłki, wybór formy płatności oraz potwierdzenie złożenia zamówienia.

      <br>
      <br>
      3.2. Kupujący zobowiązany jest opłacić złożone zamówienie w wyznaczonym terminie (5 dni w przypadku wpłaty na konto, 3 dni w przypadku płatności kartą lub e-przelewem)

      <br>
      <br>
      3.3. Termin płatności stanowi dzień, w którym wpłata powinna być zaksięgowana na rachunku Decobazaar. W związku z tym należy dokonać płatności z odpowiednim wyprzedzeniem w celu uniknięcia anulowania zamówienia.

      <br>
      <br>
      3.4. Zamówienie, które nie zostanie opłacone w terminie będzie anulowane. Anulowanie zbyt wielu zamówień Użytkownika będzie skutkować usunięciem konta, co szczegółowo reguluje punkt 4 niniejszego Regulaminu.

      <br>
      <br>
      3.5. Użytkownik może złożone zamówienie samodzielnie wycofać jeżeli nie dokonał jeszcze płatności. Zamówienia należy wycofywać wyłącznie w uzasadnionych okolicznościach. Wielokrotne i notoryczne wycofywanie zamówień przez Użytkownika będzie skutkować usunięciem konta, co szczegółowo reguluje punkt 4 niniejszego Regulaminu.

      <br>
      <br>
      3.6. Zabrania się Kupującemu nakłaniania Sprzedającego do sprzedaży Produktu poza DecoBazaar.

      <br>
      <br>
      <a name="kontrola"></a>
      <b>4. Kontrola transakcji</b>
      <br>
      <br>
      4.1. Ze względu na fakt, że Produkty wystawiane w DecoBazaar to pojedyncze egzemplarze, Kupujący zobowiązany jest składać zamówienia w sposób przemyślany oraz opłacać złożone zamówienia w terminie.

      <br>
      <br>
      4.2. Kupującemu, który w ciągu 30 dni nie opłaci trzech zamówień, zostanie wyłączona możliwość składania zamówień przez kolejne 14 dni, liczone od dnia anulowania trzeciego zamówienia.

      <br>
      <br>
      4.3. Kupującemu, który w ciągu 30 dni wycofa trzy zamówienia, zostanie wyłączona możliwość składania zamówień przez kolejne 14 dni, liczone od dnia wycofania trzeciego zamówienia.

      <br>
      <br>
      <b>5. Ceny produktów</b>
      <br>
      <br>
      5.1. Ceny widniejące przy Produktach na stronie DecoBazaar stanowią informację jawną, podaną do publicznej wiadomości.

      <br>
      <br>
      5.2. Ceny wyrażone są w złotych polskich i są cenami brutto.

      <br>
      <br>
      5.3. Ceny są stałe i obowiązują do momentu sprzedaży Produktu.

      <br>
      <br>
      5.4. Ceny mogą ulec obniżeniu w przypadku jeśli Sprzedający zdecyduje się dokonać przeceny. Przecena Produktu może nastąpić nie wcześniej niż 8 dni po dacie wystawienia Produktu.

      <br>
      <br>
      <b>6. Koszty wysyłki</b>
      <br>
      <br>
      6.1. Koszty wysyłki są ustalane przez Sprzedającego, oddzielnie dla każdego Produktu, w momencie jego wystawiania.

      <br>
      <br>
      6.2. Koszty wysyłki zagranicznej są ustalane przez Sprzedającego, oddzielnie dla każdego Produktu, w momencie jego wystawiania. Koszty te dotyczą wyłącznie krajów Europy.

      <br>
      <br>
      6.3. Koszty wysyłki pokrywa Kupujący

      <br>
      <br>
      6.4. Koszty wysyłki naliczane są automatycznie w momencie dodawania Produktów do koszyka, oddzielnie dla Produktów każdego Sprzedającego.

      <br>
      <br>
      6.5. Zamawiając dwa lub więcej Produktów od tego samego Sprzedającego, Kupujący płaci pełny koszt wysyłki za Produkt, dla którego został ustalony najwyższy koszt wysyłki oraz 20% kosztów wysyłki ustalonych dla pozostałych Produktów.

      <br>
      <br>
      <b>7. Formy płatności</b>
      <br>
      <br>
      7.1. Jedyną formą płatności za zamówienia złożone w DecoBazaar jest przedpłata. 

      <br>
      <br>
      7.2. Przedpłaty można dokonać przelewem na konto bankowe DecoBazaar:

      <br>
      <br>
      57 1140 2004 0000 3502 3885 2280

      <br>
      DECOBAZAAR Barbara Czerny

      <br>
      ul. Łokietka 6, 50-243 Wrocław

      <br>
      <br>
      Dane konta dla przelewów zagranicznych:

      <br>
      <br>
      IBAN: PL 57 1140 2004 0000 3502 3885 2280

      <br>
      DECOBAZAAR Barbara Czerny

      <br>
      ul. Łokietka 6, 50-243  Wrocław

      <br>
      Bank odbiorcy: BRE Bank S.A. INTERNET BANKING, al. Piłsudskiego 3, 90-368 Łódź

      <br>
      Kod BIC/SWIFT: BREXPLPWMBK

      <br>
      SORT CODE/numer rozliczeniowy: 11402004

      <br>
      <br>
      7.3. Przedpłaty można również dokonać online (kartą kredytową lub e-przelewem) za pośrednictwem platformy transakcyjnej payu.pl.

      <br>
      <br>
      7.4. Płatności e-przelewem dostępne są dla następujących banków: mBank, MultiBank, Inteligo, PKO BP, Pekao SA, BZWBK, BPH, ING, Nordea, LukasBank.

      <br>
      <br>
      7.5. Płatności można również dokonać za pośrednictwem serwisu PayPal.

      <br>
      <br>
      7.6. Kupujący, którzy chcą zapłacić e-przelewem z banku, który nie został wymieniony w punkcie 7.4. powinni wybrać opcję wpłaty na konto bankowe i zlecić przelew w swoim banku używając danych konta DecoBazaar podanych w punkcie 7.2.

      <br>
      <br>
      <b>8. Dostawa przesyłek</b>
      <br>
      <br>
      8.1. Produkty oferowane na sprzedaż są własnością Sprzedających i pozostają w ich posiadaniu do momentu wysyłki.

      <br>
      <br>
      8.2. Zamówienia zawierające Produkty od więcej niż jednego Sprzedającego będą wysyłane w kilku osobnych przesyłkach.

      <br>
      <br>
      8.3. Przesyłki z zamówionymi Produktami są wysyłane za pośrednictwem Poczty Polskiej lub firmy kurierskiej na adres podany przez Kupującego.

      <br>
      <br>
      8.4. Zmiana adresu korespondencyjnego przez Kupującego nie powoduje zmiany adresu wysyłki dla zamówień złożonych przed dokonaniem tej zmiany. Zamówienia te zostaną wysłane na adres podany w trakcie ich składania.

      <br>
      <br>
      8.5. Zmiany adresu wysyłki dla złożonych zamówień można dokonać jedynie poprzez kontakt ze Sprzedającym.

      <br>
      <br>
      8.6. Po zaksięgowaniu wpłaty za zamówienie, DecoBazaar zleca Sprzedającemu wysyłkę Produktów. Od tego momentu Sprzedający ma obowiązek wysłać zamawiane Produkty w ciągu 2 dni roboczych. 

      <br>
      <br>
      8.7. Termin wysyłki może ulec wydłużeniu jeśli Sprzedający ustalił urlop obejmujący ten okres czasu lub jeśli w opisie Produktu Sprzedający wyraźnie zaznaczył, że termin wysyłki będzie dłuższy.

      <br>
      <br>
      <b>9. System rabatowy</b>
      <br>
      <br>
      9.1. Za każdą złotówkę wydaną na zakupy w DecoBazaar (nie uwzględniając kosztów wysyłki) Kupujący otrzymuje 1 punkt.

      <br>
      <br>
      9.2. Za każde 750 punktów zebrane w ramach systemu rabatowego Kupujący otrzymuje 10% rabatu na jednorazowe, nieograniczone ilościowo ani wartościowo zakupy w DecoBazaar.

      <br>
      <br>
      9.3. Wykorzystany rabat nie podlega przywróceniu w przypadku zwrotu towaru, który został zakupiony z rabatem.

      <br>
      <br>
      9.4. Chęć skorzystania z rabatu Kupujący wyraża zaznaczając odpowiednią opcję w koszyku.

      <br>
      <br>
      9.5. System rabatowy obowiązuje od dnia 01.10.2008. Pieniądze wydane w DecoBazaar przed tą datą nie są przeliczane na punkty.

      <br>
      <br>
      <a name="pom1"></a>
      <b>10. Zwroty</b>
      <br>
      <br>
      10.1. Zgodnie z ustawą z dnia 2 marca 2000 roku o ochronie niektórych praw konsumentów oraz o odpowiedzialności za szkodę wyrządzoną przez produkt niebezpieczny (Dz. U. Nr 22, poz. 271), Kupujący ma prawo odstąpić od umowy kupna-sprzedaży tzn. 
      <b>zwrócić Produkt bez podania przyczyny</b>
      , w terminie 10 dni od daty otrzymania Produktu.

      <br>
      <br>
      10.2. Warunkiem przyjęcia zwrotu przez Sprzedającego jest odesłanie Produktu w stanie niezmienionym, w szczególności nie noszącego jakichkolwiek śladów użytkowania, wraz z paragonem (jeśli był dołączony) oraz kompletem metek (jeśli były dołączone), w oryginalnym i nienaruszonym opakowaniu (o ile było dołączone). Do odsyłanego Produktu należy również dołączyć wydrukowane i uzupełnione oświadczenie o odstąpieniu od umowy (
      <a href="dokumenty/decobazaar_oswiadczenie.pdf" target="_blank">wzór oświadczenia</a>
      ).

      <br>
      <br>
      10.3. Zgodnie z art.10 ust.3 pkt.4 ustawy z dnia 2 marca 2000 roku o ochronie niektórych praw konsumentów oraz o odpowiedzialności za szkodę wyrządzoną przez produkt niebezpieczny, zwrotowi nie podlega Produkt wykonany na indywidualne zamówienie Kupującego oraz taki, który na życzenie Kupującego został w jakikolwiek sposób zmodyfikowany (na przykład poprzez zmianę użytych materiałów, rozmiaru, kolorystyki itp.)

      <br>
      <br>
      10.4. Aby zwrócić Produkt, Kupujący musi w pierwszej kolejności zalogować się na swoje konto i wypełnić formularz zwrotu.

      <br>
      <br>
      10.5. Kupujący zobowiązany jest w terminie do 10 dni od daty otrzymania Produktu odesłać zwracany Produkt na adres Sprzedającego dostarczony mu przez DecoBazaar. Towar powinien zostać odesłany przesyłką rejestrowaną (listem poleconym lub paczką). DecoBazaar nie odpowiada za towary zaginione w trakcie przesyłki. Zwroty odesłane na adres DecoBazaar nie będą przyjmowane. Zabrania się odsyłania towaru przesyłką płatną „za pobraniem”.

      <br>
      <br>
      10.6. DecoBazaar zwraca Kupującemu pieniądze po tym jak Sprzedający potwierdzi odbiór zwrotu.

      <br>
      <br>
      10.7. W przypadku zwrotu towaru, koszt wysyłki Produktu do Kupującego oraz koszt odesłania Produktu do Sprzedającego nie podlegają zwrotowi.

      <br>
      <br>
      10.8. Zwrot pieniędzy następuje na polskie konto bankowe, którego dane Kupujący podał w formularzu zwrotu.

      <br>
      <br>
      <a name="pom2"></a>
      <b>11. Reklamacje</b>
      <br>
      <br>
      11.1. Reklamacje są rozpatrywane przez Sprzedających, jednak w przypadku sporów DecoBazaar występuje w charakterze arbitra i rozstrzyga czy reklamacja w danym wypadku jest zasadna. Na wypadek ewentualnych sporów pomiędzy Sprzedającym a Kupującym, Kupujący powinien wykonać zdjęcia dokumentujące stwierdzone wady, niezgodności lub uszkodzenia.

      <br>
      <br>
      11.2. Z uwagi na fakt, że Produkty wystawiane w dziale Vintage są używane, to reklamacje dotyczące śladów użytkowania nie będą uwzględniane.

      <br>
      <br>
      11.3. Kupujący może zgłosić 
      <b>reklamację Produktu, który okazał się wadliwy</b>
      . Reklamacja powinna zostać zgłoszona niezwłocznie po stwierdzeniu wad Produktu.

      <br>
      <br>
      11.4. Aby zgłosić reklamację wadliwego Produktu, Kupujący musi w pierwszej kolejności zalogować się na swoje konto i wypełnić formularz reklamacyjny. W formularzu należy opisać przyczynę reklamacji czyli wymienić wady Produktu.

      <br>
      <br>
      11.5. Kupujący zobowiązany jest niezwłocznie odesłać reklamowany Produkt na adres Sprzedającego dostarczony mu przez DecoBazaar. Towar powinien zostać odesłany przesyłką rejestrowaną (listem poleconym lub paczką). DecoBazaar nie odpowiada za towary zaginione w trakcie przesyłki. Zabrania się odsyłania towaru przesyłką płatną „za pobraniem”. Zwroty odesłane na adres DecoBazaar nie będą przyjmowane.

      <br>
      <br>
      11.6. Sprzedający zobowiązany jest naprawić (usunąć wadę) reklamowany Produkt, wymienić go na Produkt podobny, wolny od wad lub wymienić na inny Produkt wybrany przez Kupującego. W przypadku braku możliwości naprawy lub wymiany, Kupujący otrzymuje zwrot całości poniesionych kosztów (w tym: wartości Produktu, kosztu wysyłki do Kupującego i kosztu odesłania Produktu).

      <br>
      <br>
      11.7. Kupujący może zgłosić 
      <b>reklamację Produktu, który jest, w sposób znaczący, niezgodny z opisem lub zdjęciami</b>
       zamieszczonymi na stronie DecoBazaar. Reklamacja powinna zostać zgłoszona niezwłocznie po otrzymaniu Produktu i stwierdzeniu niezgodności.

      <br>
      <br>
      11.8. Aby zgłosić reklamację Produktu niezgodnego z opisem lub zdjęciami, Kupujący musi w pierwszej kolejności zalogować się na swoje konto i wypełnić formularz reklamacyjny. W formularzu należy opisać przyczynę reklamacji czyli stwierdzone niezgodności.

      <br>
      <br>
      11.9. Różnice wynikające z ustawień monitora (dotyczące nasycenia barw, odcieni) nie stanowią podstawy do reklamacji Produktu.

      <br>
      <br>
      11.10. Produkt wykonany na indywidualne zamówienie Kupującego oraz taki, który na życzenie Kupującego został w jakikolwiek sposób zmodyfikowany (na przykład poprzez zmianę użytych materiałów, rozmiaru, kolorystyki itp.) nie podlega reklamacji z tytułu niezgodności Produktu z opisem lub zdjęciami.

      <br>
      <br>
      11.11. Kupujący zobowiązany jest odesłać reklamowany Produkt na adres Sprzedającego dostarczony mu przez DecoBazaar. Towar powinien zostać odesłany przesyłką rejestrowaną (listem poleconym lub paczką). DecoBazaar nie odpowiada za towary zaginione w trakcie przesyłki. Zabrania się odsyłania towaru przesyłką płatną „za pobraniem”. Zwroty odesłane na adres DecoBazaar nie będą przyjmowane.

      <br>
      <br>
      11.12. Sprzedający zobowiązany jest wymienić reklamowany Produkt na właściwy, zgodny z opisem oraz zdjęciami. W przypadku braku możliwości wymiany, Kupujący otrzymuje zwrot całości poniesionych kosztów (w tym: wartości Produktu, kosztu wysyłki do Kupującego i kosztu odesłania Produktu).

      <br>
      <br>
      11.13. Kupujący może zgłosić 
      <b>reklamację Produktu wynikającą z niedostarczenia przesyłki</b>
       zawierającej zamawiany Produkt. Reklamację można zgłosić nie wcześniej niż 14 dni od daty wysłania zamówienia. Termin ten wynika z maksymalnego dopuszczalnego terminu dostarczenia przesyłki, określonego przez regulamin Poczty Polskiej.

      <br>
      <br>
      11.14. Aby zgłosić brak przesyłki, Kupujący musi w pierwszej kolejności zalogować się na swoje konto i wypełnić formularz zgłoszenia braku przesyłki. 

      <br>
      <br>
      11.15. Jeżeli przesyłka została wysłana a od wysyłki upłynął termin określony w punkcie 11.17. to Sprzedający zobowiązany jest zgłosić na Poczcie reklamację przesyłki. Postępowanie reklamacyjne prowadzone przez Pocztę może trwać do 30 dni.

      <br>
      <br>
      11.16. Jeżeli Poczta uzna zgłoszoną reklamację tzn. potwierdzi zaginięcie przesyłki, to Kupujący otrzyma zwrot całości poniesionych kosztów (w tym: wartości Produktu oraz kosztu wysyłki).
    </div>
    <div style="margin-top:15px; margin-bottom:15px; width:100%;">
      <a name="par3"></a>
      <h1 class="blue" style="font-size:18px; float:left">ZASADY SPRZEDAŻY</h1>
    </div>
    <div style="width:100%; color:#7e7d7e; line-height:17px;" class="px12 tresc">
      <b>12. Status sprzedającego</b>
      <br>
      <br>
      12.1. Status Sprzedającego przyznawany jest Użytkownikowi przez DecoBazaar po akceptacji zgłoszenia Użytkownika na Projektanta lub Łowcę vintage.

      <br>
      <br>
      12.2. O przyznaniu Użytkownikowi statusu Sprzedającego DecoBazaar decyduje w oparciu o zdjęcia Produktów dołączone przez Użytkownika do zgłoszenia. 

      <br>
      <br>
      12.3. DecoBazaar zastrzega sobie prawo do odmowy przyznania statusu Sprzedającego Użytkownikowi bez podania przyczyny.

      <br>
      <br>
      12.4. Aby wysłać zgłoszenie na Projektanta lub Łowcę vintage, Użytkownik musi zalogować się na swoje konto a następnie wypełnić formularz zgłoszeniowy w dziale Współpraca.

      <br>
      <br>
      12.5. Po przyznaniu statusu Sprzedającego, Użytkownik zobowiązany jest uzupełnić dane konta bankowego. Należy również uzupełnić dane adresowe, o ile nie zostały wcześniej zdefiniowane. Dodatkowo można wstawić baner o wymiarach 760x145 pikseli. Można to zrobić poprzez zakładkę "Ustawienia" na swoim koncie.

      <br>
      <br>
      12.6. Zabrania się Sprzedającym zamieszczania na banerze adresów innych stron www oraz wszelkich informacji mających charakter handlowy lub kontaktowy.

      <br>
      <br>
      12.7. DecoBazaar zastrzega sobie prawo do odebrania Użytkownikowi statusu Sprzedającego bez podania przyczyny, w szczególności jeżeli Produkty wystawiane przez Użytkownika mają negatywny wpływ na wizerunek serwisu.

      <br>
      <br>
      <b>13. Produkty</b>
      <br>
      <br>
      13.1. Sprzedający oświadcza, że jest w posiadaniu Produktów, które zamieszcza na DecoBazaar.

      <br>
      <br>
      13.2. Zamieszczając na DecoBazaar Produkty autorskie, Sprzedający oświadcza, że jest ich autorem.

      <br>
      <br>
      13.3. Jeżeli wystawiony Produkt jest pojedynczym egzemplarzem (Sprzedający posiada tylko 1 sztukę danego Produktu), to w tym samym czasie nie może być oferowany do sprzedaży w innych miejscach (galeriach internetowych, serwisach aukcyjnych itp.).

      <br>
      <br>
      13.4. Wystawiając Produkt na DecoBazaar, Sprzedający zobowiązany jest zamieścić dobrej jakości fotografie Produktu oraz jego szczegółowy opis (zawierający wymiary, skład surowcowy, kolory, właściwości itp.) 

      <br>
      <br>
      13.5. Zabrania się Sprzedającemu zamieszczania w opisach Produktów wszelkich informacji, które miałyby na celu zachęcanie do bezpośredniego kontaktu, takich jak adres email, adres strony internetowej, numer telefonu itp.

      <br>
      <br>
      13.6. Sprzedający deklaruje, że jest autorem lub posiada prawo do używania zdjęć oraz opisów, które publikuje w DecoBazaar.

      <br>
      <br>
      13.7. Sprzedający zobowiązany jest przypisać Produkt do odpowiedniej kategorii produktowej. Celowe i notoryczne przypisywanie Produktów do nieodpowiednich kategorii będzie skutkowało ich usunięciem.

      <br>
      <br>
      13.8. Sprzedający wyraża zgodę na wykorzystanie publikowanych przez niego treści (zdjęć, opisów oraz nazw) w celach promocyjnych na stronie DecoBazaar jak również w innych miejscach (Internet, prasa, telewizja).

      <br>
      <br>
      13.9. Wystawiając Produkt na DecoBazaar, Sprzedający ustala jego cenę końcową oraz koszt wysyłki. Szczegółowe zasady obliczania kosztów wysyłki zawiera punkt 6. 

      <br>
      <br>
      13.10. DecoBazaar zastrzega sobie prawo do usunięcia wystawionych przez Użytkownika Produktów bez podania przyczyny, w szczególności jeśli mają one negatywny wpływ na wizerunek serwisu.

      <br>
      <br>
      13.11. Sprzedający może samodzielnie usunąć wystawiony Produkt, pod warunkiem, że nie jest on w danym momencie zamówiony oraz nie znajduje się w czyimś koszyku.

      <br>
      <br>
      13.12. Selekcji Produktów wyświetlanych na stronie głównej oraz w działach Polecane Produkty i Prezenty dokonuje DecoBazaar.

      <br>
      <br>
      13.13. Selekcji Produktów prezentowanych w newsletterze dokonuje DecoBazaar.

      <br>
      <br>
      <a name="proj1"></a>
      13.14. Wystawione Produkty pozostają w DecoBazaar przez okres 24 miesięcy. Po tym okresie wszystkie niesprzedane Produkty są automatycznie usuwane. Produkty sprzedane nie są automatycznie usuwane, jednak DecoBazaar zastrzega sobie prawo do usunięcia powiększeń zdjęć sprzedanych Produktów po upływie 6 miesięcy od ich wystawienia.

      <br>
      <br>
      <b>14. Realizacja zamówień</b>
      <br>
      <br>
      14.1. Produkty oferowane na sprzedaż pozostają w posiadaniu Sprzedającego do momentu wysyłki.

      <br>
      <br>
      14.2. Po zaksięgowaniu wpłaty za zamówienie, DecoBazaar zleca Sprzedającemu wysyłkę Produktów. Od tego momentu Sprzedający ma obowiązek wysłać zamawiane Produkty w ciągu 2 dni roboczych.

      <br>
      <br>
      14.3. W przypadku zaistnienia okoliczności, które mogą opóźnić realizację zamówienia, Sprzedający zobowiązany jest poinformować o tym Kupującego oraz DecoBazaar.

      <br>
      <br>
      14.4. Sprzedający zobowiązany jest wysyłać opłacone Produkty w formie listu poleconego priorytet lub paczki priorytet (korzystając z usług Poczty Polskiej) lub w formie przesyłki kurierskiej.

      <br>
      <br>
      14.5. Sprzedający zobowiązany jest przechowywać dowody nadania przesyłek na wypadek konieczności reklamowania niedostarczonej przesyłki.

      <br>
      <br>
      14.6. Zabrania się Sprzedającemu dołączania do przesyłek wszelkich informacji, które miałyby na celu zachęcanie do bezpośredniego kontaktu, takich jak adres email, numer telefonu, adres strony internetowej.

      <br>
      <br>
      14.7. Po wysłaniu Produktów, Sprzedający zobowiązany jest potwierdzić realizację zamówienia na swoim koncie.

      <br>
      <br>
      <b>15. Komunikacja z Kupującymi</b>
      <br>
      <br>
      15.1. Sprzedający zobowiązany jest możliwie jak najszybciej odpowiadać na wiadomości otrzymane od Użytkowników. 

      <br>
      <br>
      15.2. Sprzedający może wysłać wiadomość do Kupującego gdy ten opłaci zamówienie. Dodatkowo, po wysyłce zamówienia Sprzedający może wysłać wiadomość do Kupującego przez okres 3 dni.

      <br>
      <br>
      15.3. Sprzedający powinien inicjować kontakt z Kupującym jedynie w określonych okolicznościach, takich jak niezgodność adresu wysyłki, ustalenie rozmiaru, zmiana domyślnej formy dostawy.

      <br>
      <br>
      15.4. Zabrania się Sprzedającemu nakłaniania Kupującego do zakupu Produktu poza DecoBazaar.

      <br>
      <br>
      15.5. Zabrania się Sprzedającemu umieszczania w wiadomościach do Kupującego wszelkich informacji, które miałyby na celu zachęcanie do bezpośredniego kontaktu, takich jak adres email, numer telefonu, adres strony internetowej.

      <br>
      <br>
      15.6. DecoBazaar zastrzega sobie prawo do monitorowania i moderowania korespondencji prowadzonej pomiędzy Użytkownikami.

      <br>
      <br>
      <a name="pom3"></a>
      <b>16. Zwroty</b>
      <br>
      <br>
      16.1. Zgodnie z ustawą z dnia 2 marca 2000 roku o ochronie niektórych praw konsumentów oraz o odpowiedzialności za szkodę wyrządzoną przez produkt niebezpieczny (Dz. U. Nr 22, poz. 271), Kupujący ma prawo odstąpić od umowy kupna-sprzedaży tzn. zwrócić Produkt bez podania przyczyny, w terminie 10 dni od daty otrzymania Produktu.

      <br>
      <br>
      16.2. Warunkiem przyjęcia zwrotu przez Sprzedającego jest odesłanie Produktu w stanie niezmienionym, w szczególności nie noszącego jakichkolwiek śladów użytkowania, wraz z paragonem (jeśli był dołączony) oraz kompletem metek (jeśli były dołączone). Do odsyłanego Produktu Kupujący musi dołączyć również wydrukowane i uzupełnione oświadczenie o odstąpieniu od umowy (
      <a href="dokumenty/decobazaar_oswiadczenie.pdf" target="_blank">wzór oświadczenia</a>
      ).

      <br>
      <br>
      16.3. Zgodnie z art.10 ust.3 pkt.4 ustawy z dnia 2 marca 2000 roku o ochronie niektórych praw konsumentów oraz o odpowiedzialności za szkodę wyrządzoną przez produkt niebezpieczny, zwrotowi nie podlega Produkt wykonany na indywidualne zamówienie Kupującego oraz taki, który na życzenie Kupującego został w jakikolwiek sposób zmodyfikowany (na przykład poprzez zmianę użytych materiałów, rozmiaru, kolorystyki itp.)

      <br>
      <br>
      16.4. Kupujący zobowiązany jest odesłać zwracany Produkt na adres Sprzedającego dostarczony mu przez DecoBazaar. 

      <br>
      <br>
      16.5. Sprzedający zobowiązany jest potwierdzić odbiór towaru na swoim koncie, niezwłocznie po otrzymaniu przesyłki. W przypadku gdy zwrócony Produkt nie spełnia warunków opisanych w punkcie 16.2, to Sprzedający zobowiązany jest zgłosić sprawę do rozpatrzenia przez DecoBazaar.

      <br>
      <br>
      16.6. DecoBazaar zwraca Kupującemu wartość Produktu po tym jak Sprzedający potwierdzi odbiór zwrotu na swoim koncie.

      <br>
      <br>
      16.7. W przypadku zwrotu towaru, koszt wysyłki Produktu do Kupującego oraz koszt odesłania Produktu do Sprzedającego nie podlegają zwrotowi.

      <br>
      <br>
      16.8. Z rozliczenia Sprzedającego potrącana jest kwota, która została mu naliczona za dany Produkt (koszt wysyłki nie jest potrącany).

      <br>
      <br>
      <a name="pom4"></a>
      <b>17. Reklamacje</b>
      <br>
      <br>
      17.1. Kupujący może zgłosić reklamację Produktu, który okazał się wadliwy. 

      <br>
      <br>
      17.2. Kupujący zobowiązany jest odesłać reklamowany Produkt na adres Sprzedającego dostarczony mu przez DecoBazaar. 

      <br>
      <br>
      17.3. Sprzedający zobowiązany jest naprawić (usunąć wadę) reklamowany Produkt, wymienić go na Produkt podobny, wolny od wad lub wymienić na inny Produkt wybrany przez Kupującego. W przypadku braku możliwości naprawy lub wymiany, Kupujący otrzymuje zwrot całości poniesionych kosztów (w tym: wartości Produktu, kosztu wysyłki do Kupującego i kosztu odesłania Produktu). Zwrotu pieniędzy na konto Kupującego dokonuje DecoBazaar.

      <br>
      <br>
      17.4. Sprzedający zobowiązany jest potwierdzić sposób rozpatrzenia reklamacji na swoim koncie, niezwłocznie po otrzymaniu przesyłki. Może wybrać opcję przyjęcia reklamacji lub, w przypadku braku możliwości naprawy, zwrotu pieniędzy. 

      <br>
      <br>
      17.5. Jeśli Sprzedający wybierze opcję naprawy Produktu, to po odesłaniu naprawionego Produktu do Kupującego zobowiązany jest potwierdzić wysyłkę na swoim koncie.

      <br>
      <br>
      17.6. Kupujący może zgłosić reklamację Produktu, który jest, w sposób znaczący, niezgodny z opisem lub zdjęciami zamieszczonymi na stronie DecoBazaar. 

      <br>
      <br>
      17.7. Produkt wykonany na indywidualne zamówienie Kupującego oraz taki, który na życzenie Kupującego został w jakikolwiek sposób zmodyfikowany (na przykład poprzez zmianę użytych materiałów, rozmiaru, kolorystyki itp.) nie podlega reklamacji z tytułu niezgodności Produktu z opisem lub zdjęciami.

      <br>
      <br>
      17.8. Kupujący zobowiązany jest odesłać reklamowany Produkt na adres Sprzedającego dostarczony mu przez DecoBazaar. 

      <br>
      <br>
      17.9. Sprzedający zobowiązany jest wymienić reklamowany Produkt na właściwy, zgodny z opisem oraz zdjęciami. W przypadku braku możliwości wymiany, Sprzedający otrzymuje zwrot całości poniesionych kosztów (w tym: wartości Produktu, kosztu wysyłki do Kupującego i kosztu odesłania Produktu). Zwrotu pieniędzy na konto Kupującego dokonuje DecoBazaar.

      <br>
      <br>
      17.10. Sprzedający zobowiązany jest potwierdzić sposób rozpatrzenia reklamacji na swoim koncie, niezwłocznie po otrzymaniu przesyłki. Może wybrać opcję przyjęcia reklamacji lub, w przypadku braku możliwości wymiany, zwrotu pieniędzy. 

      <br>
      <br>
      17.11. Jeśli Sprzedający wybierze opcję wymiany Produktu, to po odesłaniu właściwego Produktu do Kupującego zobowiązany jest potwierdzić wysyłkę na swoim koncie.

      <br>
      <br>
      17.12. Kupujący może zgłosić reklamację Produktu wynikającą z niedostarczenia przesyłki zawierającej zamawiany Produkt. Reklamację można zgłosić nie wcześniej niż 14 dni od daty wysłania zamówienia. Termin ten wynika z maksymalnego dopuszczalnego terminu dostarczenia przesyłki, określonego przez regulamin Poczty Polskiej.

      <br>
      <br>
      17.13. Jeżeli przesyłka została wysłana a od wysyłki upłynął termin określony w punkcie 17.16. to Sprzedający zobowiązany jest zgłosić na Poczcie reklamację przesyłki. 

      <br>
      <br>
      17.14. Jeżeli Poczta uzna zgłoszoną reklamację tzn. potwierdzi zaginięcie przesyłki, to Sprzedający zobowiązany jest niezwłocznie zaznaczyć to na swoim koncie. Ponadto zobowiązany jest informować DecoBazaar o wszelkich informacjach uzyskanych od Poczty lub firmy kurierskiej w trakcie trwania postępowania reklamacyjnego.

      <br>
      <br>
      17.15. Gdy Sprzedający potwierdzi zaginięcie przesyłki, to Kupujący otrzyma zwrot całości poniesionych kosztów (w tym: wartości Produktu oraz kosztu wysyłki). Zwrotu pieniędzy na konto Kupującego dokonuje DecoBazaar.

      <br>
      <br>
      17.16. Sprzedający zachowuje dla siebie kwotę odszkodowania przyznanego mu przez Pocztę lub firmę kurierską w związku z zaginięciem przesyłki.

      <br>
      <br>
      17.17. Reklamacje są rozpatrywane przez Sprzedających, jednak w przypadku sporów DecoBazaar występuje w charakterze arbitra i rozstrzyga czy reklamacja w danym wypadku jest zasadna. 

      <br>
      <br>
      17.18. W przypadku gdy reklamacja kończy się zwrotem pieniędzy, to z rozliczenia Sprzedającego potrącana jest kwota, która została mu naliczona za dany Produkt, koszt wysyłki do Kupującego oraz koszt odesłania Produktu (o ile został poniesiony przez Kupującego).

      <br>
      <br>
      <b>18. Prowizje i opłaty</b>
      <br>
      <br>
      18.1. Posiadanie konta Użytkownika, korzystanie ze statusu Sprzedającego jak również wystawianie Produktów w DecoBazaar są bezpłatne.

      <br>
      <br>
      18.2. DecoBazaar pobiera prowizję od sprzedaży, która wynosi 25% ceny sprzedanego Produktu.

      <br>
      <br>
      18.3. Koszty wysyłki produktów nie są brane pod uwagę przy obliczaniu prowizji.

      <br>
      <br>
      18.4. DecoBazaar nabywa prawo do prowizji od sprzedaży z chwilą gdy Kupujący dokona płatności za Produkt.

      <br>
      <br>
      18.5. Prowizja od sprzedaży pobierana jest z bieżących wpływów za Zakupy dokonywane przez Kupujących.

      <br>
      <br>
      <b>19. Rozliczenia</b>
      <br>
      <br>
      19.1. Sprzedający może na bieżąco śledzić rozliczenia, związane ze sprzedażą, na swoim koncie.

      <br>
      <br>
      19.2. Wypłata środków zgromadzonych przez Sprzedającego z tytułu sprzedaży Produktów w DecoBazaar następuje raz w miesiącu, w dniach 5-10 danego miesiąca, za miesiąc poprzedni.

      <br>
      <br>
      19.3. Wartość rozliczenia należną Sprzedającemu za poprzedni miesiąc stanowi suma cen Produktów sprzedanych w poprzednim miesiącu, pomniejszona o prowizję DecoBazaar wyliczoną zgodnie z punktem 18.2 oraz powiększona o koszty wysyłki tych Produktów.

      <br>
      <br>
      19.4. Rozliczenie podlega ewentualnym korektom z tytułu zwrotu Produktów, za które Sprzedający otrzymał już wynagrodzenie w ramach poprzednich rozliczeń.

      <br>
      <br>
      19.5. Wypłata środków następuje w formie przelewu na konto bankowe Sprzedającego, zdefiniowane przez niego.

      <br>
      <br>
      19.6. DecoBazaar zastrzega sobie prawo do wstrzymania wypłaty środków w przypadku jeśli Sprzedający zalega z wysyłką zamówień. Wypłata zostaje wstrzymana do momentu aż Sprzedający wywiąże się ze zobowiązań lub w inny sposób wyjaśni sprawę z DecoBazaar.

      <br>
      <br>
      <b>20. Faktury VAT</b>
      <br>
      <br>
      20.1. Na życzenie Sprzedającego, DecoBazaar wystawia faktury VAT na łączną prowizję pobraną w danym miesiącu od sprzedaży Produktów.

      <br>
      <br>
      20.2. Na podstawie Rozporządzenia Ministra Finansów z dnia 17 grudnia 2010r. w sprawie przesyłania faktur w formie elektronicznej, zasad ich przechowywania oraz trybu udostępniania organowi podatkowemu lub organowi kontroli skarbowej ( Dz.U nr  249 poz. 1661), faktury udostępniane są wyłącznie w formie elektronicznej, w formacie pdf, do pobrania i samodzielnego wydruku, na koncie Sprzedającego

      <br>
      <br>
      20.3. Sprzedający akceptuje opisany w punkcie 20.2 sposób przekazywania faktur. Akceptacja ta przestaje obowiązywać wyłącznie po jej pisemnym wypowiedzeniu.
    </div>
    <div style="margin-top:15px; margin-bottom:15px; width:100%;">
      <a name="par4"></a>
      <h1 class="blue" style="font-size:18px; float:left">OCHRONA PRYWATNOŚCI</h1>
    </div>
    <div style="width:100%; color:#7e7d7e; line-height:17px;" class="px12 tresc">
      <b>21. Ochrona danych osobowych</b>
      <br>
      <br>
      21.1. DecoBazaar przykłada ogromną wagę do ochrony prywatności Użytkowników i jako administrator danych chroni je i zabezpiecza przed dostępem osób nieupoważnionych.

      <br>
      <br>
      21.2. DecoBazaar sprawuje stałą kontrolę nad procesem przetwarzania danych oraz ogranicza dostęp do danych w możliwie największym stopniu. Dane osobowe przetwarzane są przez DecoBazaar zgodnie z art. 23 ust. 1 pkt 1,3 i 5 ustawy z dnia 29 sierpnia 1997 r. o ochronie danych osobowych, w celach związanych z prowadzeniem serwisu.

      <br>
      <br>
      21.3. Zbiór danych Użytkowników został zgłoszony do rejestracji Generalnemu Inspektorowi Danych Osobowych i jest wpisany do ogólnokrajowego rejestru zbiorów danych osobowych pod numerem 091074.

      <br>
      <br>
      21.4. Podanie jakichkolwiek danych osobowych jest dobrowolne. Użytkownik ma prawo dostępu do treści swoich danych oraz do ich modyfikacji.

      <br>
      <br>
      21.5. Dane podawane przez Użytkownika w trakcie rejestracji oraz składania zamówień są wykorzystywane wyłącznie do celów ewidencji sprzedaży, do kontaktowania się z Użytkownikiem oraz do realizacji zamówień złożonych przez Użytkownika. 

      <br>
      <br>
      21.6. W celu realizacji złożonych zamówień, DecoBazaar udostępnia Sprzedającemu dane osobowe Kupującego. Dane te zawierają wyłącznie informacje niezbędne do prawidłowego zaadresowania przesyłki.

      <br>
      <br>
      21.7. W celu umożliwienia Kupującemu dokonania zwrotu towaru, DecoBazaar udostępnia Kupującemu dane osobowe Sprzedającego. Dane te zawierają wyłącznie informacje niezbędne do prawidłowego zaadresowania przesyłki.

      <br>
      <br>
      21.8. Dane Użytkowników mogą być udostępniane organom państwowym uprawnionym do ich otrzymania na mocy obowiązujących przepisów prawa oraz, w przypadku nieuregulowania należności wobec DecoBazaar, podmiotom prowadzącym w jego imieniu postępowanie związane z dochodzeniem należności.

      <br>
      <br>
      21.9. DecoBazaar zapewnia Użytkownikom możliwość usunięcia danych osobowych ze zbioru danych. W celu usunięcia danych, Użytkownik powinien przesłać do DecoBazaar stosowne oświadczenie w formie elektronicznej lub na piśmie. DecoBazaar może odmówić usunięcia danych Użytkownika, jeżeli Użytkownik ten nie uregulował należności wobec DecoBazaar lub naruszył niniejszy Regulamin bądź obowiązujące przepisy prawa, a zachowanie danych jest niezbędne do wyjaśnienia tych okoliczności i ustalenia odpowiedzialności Użytkownika.

      <br>
      <br>
      <b>22. Zobowiązania Użytkowników</b>
      <br>
      <br>
      22.1. Użytkownik zobowiązany jest nie ujawniać osobom trzecim informacji dotyczących innych Użytkowników, które otrzymał od DecoBazaar w związku z realizacją czynności przewidzianych w niniejszym Regulaminie. 

      <br>
      <br>
      22.2. Użytkownik może wykorzystać otrzymane od DecoBazaar informacje wyłącznie w celach związanych z wysyłką towarów zakupionych za pośrednictwem DecoBazaar.
    </div>
    <div style="margin-top:15px; margin-bottom:15px; width:100%;">
      <a name="par5"></a>
      <h1 class="blue" style="font-size:18px; float:left">POSTANOWIENIA KOŃCOWE</h1>
    </div>
    <div style="width:100%; color:#7e7d7e; line-height:17px;" class="px12 tresc">
      <b>23. Rola DecoBazaar</b>
      <br>
      <br>
      23.1. DecoBazaar pośredniczy w transakcjach zawieranych pomiędzy Sprzedającymi i Kupującymi.

      <br>
      <br>
      23.2. DecoBazaar świadczy usługi na rzecz Sprzedających polegające na udostępnieniu powierzchni na serwerze, obsłudze płatności oraz obsłudze klienta.

      <br>
      <br>
      23.3. DecoBazaar nie ponosi odpowiedzialności za zachowania Użytkowników. W szczególności DecoBazaar nie ponosi odpowiedzialności za jakość oraz legalność Produktów wystawianych na sprzedaż przez Sprzedających, za rzetelność opisów dodawanych przez Sprzedających oraz za wypłacalność Kupujących dokonujących zakupów.   

      <br>
      <br>
      <b>24. Usunięcie konta Użytkownika</b>
      <br>
      <br>
      24.1. Użytkownik ma prawo do usunięcia konta w DecoBazaar w dowolnym momencie. W tym celu Użytkownik powinien przesłać do DecoBazaar stosowne oświadczenie w formie elektronicznej lub na piśmie.

      <br>
      <br>
      24.2. DecoBazaar może odmówić usunięcia konta Użytkownika, jeżeli Użytkownik ten nie uregulował należności wobec DecoBazaar lub naruszył niniejszy Regulamin bądź obowiązujące przepisy prawa, a zachowanie danych Użytkownika jest niezbędne do wyjaśnienia tych okoliczności i ustalenia odpowiedzialności Użytkownika.

      <br>
      <br>
      24.3. DecoBazaar zastrzega sobie prawo do usunięcia konta Użytkownika, który swoim postępowaniem narusza niniejszy Regulamin lub w jakikolwiek sposób zakłóca działanie serwisu.

      <br>
      <br>
      24.4. Usunięcie konta Użytkownika na jego żądanie może nastąpić najwcześniej w terminie 30 dni od momentu zawarcia przez Użytkownika ostatniej transakcji w DecoBazaar.

      <br>
      <br>
      24.5. Jeżeli konto Użytkownika zostało usunięte na skutek decyzji DecoBazaar, to Użytkownik nie może ponownie dokonać rejestracji w DecoBazaar bez uprzedniej zgody DecoBazaar. Jeśli Użytkownik dokona ponownej rejestracji bez uzyskania zgody to jego nowe konto zostanie usunięte.

      <br>
      <br>
      <b>25. Czynności zabronione</b>
      <br>
      <br>
      25.1. Na podstawie ustawy z dnia 4 lutego 1994 r. o prawie autorskim i prawach pokrewnych (Dz. U. Nr 24, poz. 83), zabrania się wykorzystania treści oraz plików zamieszczonych na stronie internetowej DecoBazaar bez uprzedniej zgody DecoBazaar lub osób posiadających prawo do ich wykorzystywania. 

      <br>
      <br>
      25.2. Na podstawie ustawy z dnia 30 czerwca 2000 r. Prawo własności przemysłowej (Dz. U. Nr 49, poz. 508), zabrania się wykorzystania znaku towarowego Decobazaar bez uprzedniej zgody DecoBazaar. Znak towarowy został zastrzeżony w Urzędzie Patentowym RP (prawo ochronne numer 235304) i podlega ochronie prawnej.

      <br>
      <br>
      25.3. Na podstawie ustawy z dnia 16 kwietnia 1993 r. o zwalczaniu nieuczciwej konkurencji (Dz. U. Nr 47, poz. 211 z późn. zm.), zabrania się wykorzystywania adresów www o pisowni lub fonetyce zbliżonej do słów decobazaar oraz decobloog w ramach działalności konkurencyjnej, w szczególności jeśli działanie to ma to na celu wprowadzenie klientów w błąd.

      <br>
      <br>
      25.4. Złamanie któregokolwiek z postanowień zawartych w punktach 25.1 - 25.3 niniejszego Regulaminu będzie skutkowało podjęciem kroków prawnych wobec osób, firm lub instytucji, które dopuszczą się zakazanych czynności.
    </div>
  </div>
</div> 
 
</div> <?php // closeing <div class="hfeed content"> ?>
<?php get_footer(); ?>