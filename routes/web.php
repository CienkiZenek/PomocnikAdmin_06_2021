<?php

/*Route::get('/livewire', function () {
    return view('livewire.przypisy');
})->name('livewire');*/
Route::get('/livewire', 'MenuController@livewire')->name('livewire');

Route::get('/', 'MenuController@index')->name('menuGlowne');
Route::get('/listy_do', 'MenuController@listy_do')->name('listy_do');

//Route::get('/', function () {
   // return view('tresc.menu-glowne');});

/*Route::get('/listaUzytkownikow', function () {
    return view('tresc.users-lista');
});*/



/*Lista użytkowników*/
Route::get('/listaUzytkownikow', 'UsersController@index')->name('listaUzytkownikow');
// Pojedyńczy - edycja
Route::get('/user/{user}', 'UsersController@edit')->name('edycjaUzytkownika');
// Pojedyńczy - edycja - zapis
Route::post('/userUpdate/{user}', 'UsersController@update')->name('uzytkownikAktualizacja');
// Usuwanie usera
Route::delete('/usunUsera/{id}', 'UsersController@destroy')->name('usunUsera');
// Szukanie na liście
Route::get('/searchUsers', 'UsersController@search')->name('searchUsers');
// Znalezione Usera
Route::get('/znalezioneUsera/{user}', 'UsersController@znalezione')->name('znalezioneUsera');
// Miejsca Usera
Route::get('/miejscaUsera/{user}', 'UsersController@miejsca')->name('miejscaUsera');
// Propozycje Usera
Route::get('/propozycjeUsera/{user}', 'UsersController@propozycje')->name('propozycjeUsera');
// Uwagi Usera do zagadnień lub propozycji innych userów
Route::get('/uwagiUsera/{user}', 'UsersController@uwagi')->name('uwagiUsera');

/*Lista użytkowników - koniec*/

/* Członkowie */

/*Lista wszystkich*/
Route::get('/listaCzlonkowie', 'CzlonkowieController@index')->name('listaCzlonkowie');

// dodawanie nowych - formularz
Route::get('/czlonkowieNowe', function () {
    return view('tresc.dodawanie.czlonkowie-dodawanie');
})->name('czlonkowieNowe');

// dodawanie nowych - zapis
Route::post('/czlonkowieZapisNowe', 'CzlonkowieController@create')->name('czlonkowieZapisNowe');

// Pojedyńczy - edycja
Route::get('/czlonkowie/{id}', 'CzlonkowieController@edit')->name('edycjaCzlonkowie');

// Aktualizacja - zapis
Route::post('/czlonkowieUpdate/{id}', 'CzlonkowieController@update')->name('czlonkowieUpdate');

// Szukanie na liście
Route::get('/searchCzlonkowie', 'CzlonkowieController@search')->name('searchCzlonkowie');

// Usuwanie
Route::delete('/usunCzlonkowie/{id}', 'CzlonkowieController@destroy')->name('usunCzlonkowie');

/* Członkowie - koniec*/


/* Komunikaty*/

/*Lista komunikatów*/
Route::get('/listaKomunikaty', 'KomunikatyController@index')->name('listaKomunikaty');

// dodawanie nowych - formularz
Route::get('/komunikatyNowe', function () {
    return view('tresc.dodawanie.komunikaty-dodawanie');
})->name('komunikatyNowe');

// dodawanie nowych - zapis
Route::post('/komunikatyZapisNowe', 'KomunikatyController@create')->name('komunikatyZapisNowe');

// Pojedyńczy - edycja
Route::get('/komunikaty/{id}', 'KomunikatyController@edit')->name('edycjaKomunikaty');

// Aktualizacja - zapis
Route::post('/komunikatyUpdate/{id}', 'KomunikatyController@update')->name('komunikatyUpdate');

// Szukanie na liście
Route::get('/searchKomunikaty', 'KomunikatyController@search')->name('searchKomunikaty');

// Usuwanie
Route::delete('/usunKomunikaty/{id}', 'KomunikatyController@destroy')->name('usunKomunikaty');


/* Komunikaty - koniec*/

/* Info */

/*Lista Info*/
Route::get('/listaInfo', 'InfoController@index')->name('listaInfo');

// dodawanie nowych - formularz
Route::get('/infoNowe', function () {
    return view('tresc.dodawanie.info-dodawanie');
})->name('infoNowe');

// dodawanie nowych - zapis
Route::post('/infoZapisNowe', 'InfoController@create')->name('infoZapisNowe');

// Pojedyńczy - edycja
Route::get('/info/{id}', 'InfoController@edit')->name('edycjaInfo');

// Aktualizacja - zapis
Route::post('/infoUpdate/{id}', 'InfoController@update')->name('infoUpdate');

// Szukanie na liście
Route::get('/searchInfo', 'InfoController@search')->name('searchInfo');

// Usuwanie
Route::delete('/usunInfo/{id}', 'InfoController@destroy')->name('usunInfo');


/* Info - koniec*/

/* Znalezione w sieci */

/*Lista znalezionych w sieci*/
Route::get('/listaZnalezione', 'ZnalezioneController@index')->name('listaZnalezione');

// dodawanie nowych - formularz
Route::get('/znalezioneNowe', 'ZnalezioneController@formularzNowe'

   /* function () {
    return view('tresc.dodawanie.znalezione-dodawanie');
}*/

)->name('znalezioneNowe');

// dodawanie nowych - zapis
Route::post('/znalezioneZapisNowe', 'ZnalezioneController@create')->name('znalezioneZapisNowe');

// Pojedyńczy - edycja
Route::get('/znalezione/{id}', 'ZnalezioneController@edit')->name('edycjaZnalezione');

// Aktualizacja - zapis
Route::post('/znalezioneUpdate/{id}', 'ZnalezioneController@update')->name('znalezioneUpdate');

// Szukanie na liście
Route::get('/searchZnalezione', 'ZnalezioneController@search')->name('searchZnalezione');

// Usuwanie
Route::delete('/usunZnalezione/{id}', 'ZnalezioneController@destroy')->name('usunZnalezione');


/* Znalezione w sieci - koniec*/

/* Miejsca do dyskusji */

/*Lista wszystkich*/
Route::get('/listaMiejsca', 'MiejscaController@index')->name('listaMiejsca');

// dodawanie nowych - formularz
Route::get('/miejscaNowe', 'MiejscaController@formularzNowe')->name('miejscaNowe');


/*function () {
return view('tresc.dodawanie.miejsca-dodawanie');
}*/


// dodawanie nowych - zapis
Route::post('/miejscaZapisNowe', 'MiejscaController@create')->name('miejscaZapisNowe');

// Pojedyńczy - edycja
Route::get('/miejsce/{id}', 'MiejscaController@edit')->name('edycjaMiejsca');

// Aktualizacja - zapis
Route::post('/miejscaUpdate/{id}', 'MiejscaController@update')->name('miejscaUpdate');

// Szukanie na liście
Route::get('/searchMiejsca', 'MiejscaController@search')->name('searchMiejsca');

// Usuwanie
Route::delete('/usunMiejsce/{id}', 'MiejscaController@destroy')->name('usunMiejsce');


/* Miejsca do dyskusji - koniec*/

/* Propozycje */

/*Lista propozycji*/
Route::get('/listaPropozycje/{list}', 'PropozycjeController@index')->name('listaPropozycje');

/*// dodawanie nowych - formularz
Route::get('/propozycjeNowe', function () {
    return view('tresc.dodawanie.propozycje-dodawanie');
})->name('propozycjeNowe');

// dodawanie nowych - zapis
Route::post('/propozycjeZapisNowe', 'PropozycjeController@create')->name('propozycjeZapisNowe');
*/
// Pojedyńczy - edycja
Route::get('/propozycje/{id}', 'PropozycjeController@edit')->name('edycjaPropozycje');

// Aktualizacja - zapis
Route::post('/propozycjeUpdate/{id}', 'PropozycjeController@update')->name('propozycjeUpdate');

// Szukanie na liście
Route::get('/searchPropozycje', 'PropozycjeController@search')->name('searchPropozycje');

// Usuwanie
Route::delete('/usunPropozycje/{id}', 'PropozycjeController@destroy')->name('usunPropozycje');


/* Propozycje - koniec*/


/* Propozycje_uwagi*/

/*Lista Propozycje_uwagi*/
Route::get('/listaPropozycjeUwagi/{lista}', 'PropozycjeUwagiController@index')->name('listaPropozycjeUwagi');


// Pojedyńczy - edycja
Route::get('/edycjaPropozycjeUwagi/{id}', 'PropozycjeUwagiController@edit')->name('edycjaPropozycjeUwagi');

// Aktualizacja - zapis
Route::post('/propozycjeUwagiUpdate/{id}', 'PropozycjeUwagiController@update')->name('propozycjeUwagiUpdate');

// Szukanie na liście
Route::get('/searchPropozycjeUwagi', 'PropozycjeUwagiController@search')->name('searchPropozycjeUwagi');

// Usuwanie
Route::delete('/usunPropozycjeUwagi/{id}', 'PropozycjeUwagiController@destroy')->name('usunPropozycjeUwagi');

/* Propozycje_uwagi - koniec*/

/* Zagadnienia_uwagi*/

/*Lista Zagadnienia_uwagi*/
Route::get('/listaZagadnieniaUwagi/{lista}', 'ZagadnieniaUwagiController@index')->name('listaZagadnieniaUwagi');

// Pojedyńczy - edycja
Route::get('/zagadnieniaUwagi/{id}', 'ZagadnieniaUwagiController@edit')->name('edycjaZagadnieniaUwagi');

// Aktualizacja - zapis
Route::post('/ZagadnieniaUwagiUpdate/{id}', 'ZagadnieniaUwagiController@update')->name('zagadnieniaUwagiUpdate');

// Szukanie na liście
Route::get('/searchZagadnieniaUwagi', 'ZagadnieniaUwagiController@search')->name('searchZagadnieniaUwagi');

// Usuwanie
Route::delete('/usunZagadnieniaUwagi/{id}', 'ZagadnieniaUwagiController@destroy')->name('usunZagadnieniaUwagi');



/* Zagadnienia_uwagi - koniec*/




/* Memy */

/*Lista memów*/
Route::get('/listaMemy', 'MemyController@index')->name('listaMemy');

// dodawanie nowych - formularz
Route::get('/memyNowe', function () {
    return view('tresc.dodawanie.memy-dodawanie');
})->name('memyNowe');

// dodawanie nowych - zapis
Route::post('/memyZapisNowe', 'MemyController@create')->name('memyZapisNowe');

// Pojedyńczy - edycja
Route::get('/memy/{id}', 'MemyController@edit')->name('edycjaMemy');

// Aktualizacja - zapis
Route::post('/memyUpdate/{id}', 'MemyController@update')->name('memyUpdate');

// Szukanie na liście
Route::get('/searchMemy', 'MemyController@search')->name('searchMemy');

// Usuwanie
Route::delete('/usunMemy/{id}', 'MemyController@destroy')->name('usunMemy');


/*  Memy - koniec*/

/* Tagi  */

/*Lista tagów*/
Route::get('/listaTagi', 'TagiController@index')->name('listaTagi');

// dodawanie nowych - formularz
Route::get('/tagiNowe', function () {
    return view('tresc.dodawanie.tagi-dodawanie');
})->name('tagiNowe');


// dodawanie nowych - zapis
Route::post('/tagiZapisNowe', 'TagiController@create')->name('tagiZapisNowe');

// Pojedyńczy - edycja
Route::get('/tagi/{id}', 'TagiController@edit')->name('edycjaTagi');

// Aktualizacja - zapis
Route::post('/tagiUpdate/{id}', 'TagiController@update')->name('tagiUpdate');

// Szukanie na liście
Route::get('/searchTagi', 'TagiController@search')->name('searchTagi');

// Usuwanie
Route::delete('/usunTagi/{id}', 'TagiController@destroy')->name('usunTagi');


/* Tagi - koniec*/


/* Media*/

/*Lista mediów*/
Route::get('/listaMedia', 'MediaController@index')->name('listaMedia');

// dodawanie nowych - formularz
Route::get('/mediaNowe', function () {
    return view('tresc.dodawanie.media-dodawanie');
})->name('mediaNowe');

// dodawanie nowych - zapis
Route::post('/mediaZapisNowe', 'MediaController@create')->name('mediaZapisNowe');

// Pojedyńczy - edycja
Route::get('/media/{id}', 'MediaController@edit')->name('edycjaMedia');

// Aktualizacja - zapis
Route::post('/mediaUpdate/{id}', 'MediaController@update')->name('mediaUpdate');

// Szukanie na liście
Route::get('/searchMedia', 'MediaController@search')->name('searchMedia');

// Usuwanie
Route::delete('/usunMedia/{id}', 'MediaController@destroy')->name('usunMedia');

/* Media - koniec*/


/* Działy */

/*Lista działów*/
Route::get('/listaDzialy', 'DzialyController@index')->name('listaDzialy');

// dodawanie nowych - formularz
Route::get('/dzialyNowe', function () {
    return view('tresc.dodawanie.dzialy-dodawanie');
})->name('dzialyNowe');

// dodawanie nowych - zapis
Route::post('/dzialyZapisNowe', 'DzialyController@create')->name('dzialyZapisNowe');

// Pojedyńczy - edycja
Route::get('/dzialy/{slug}', 'DzialyController@edit')->name('edycjaDzialy');

// Aktualizacja - zapis
Route::post('/dzialyUpdate/{id}', 'DzialyController@update')->name('dzialyUpdate');

// Szukanie na liście
Route::get('/searchDzialy', 'DzialyController@search')->name('searchDzialy');

// Usuwanie
Route::delete('/usunDzialy/{id}', 'DzialyController@destroy')->name('usunDzialy');


/* Działy - koniec*/

/* Kategorie */

/*Lista Kategorie*/
Route::get('/listaKategorie', 'KategorieController@index')->name('listaKategorie');

// dodawanie nowych - formularz
/*Route::get('/kategorieNowe', function () {
    return view('tresc.dodawanie.kategorie-dodawanie');
})->name('kategorieNowe');*/

Route::get('/kategorieNowe', 'KategorieController@nowaFormularz')->name('kategorieNowe');

// dodawanie nowych - zapis
Route::post('/kategorieZapisNowe', 'KategorieController@create')->name('kategorieZapisNowe');

// Pojedyńczy - edycja
Route::get('/kategorie/{id}', 'KategorieController@edit')->name('edycjaKategorie');

// Aktualizacja - zapis
Route::post('/kategorieUpdate/{id}', 'KategorieController@update')->name('kategorieUpdate');

// Szukanie na liście
Route::get('/searchKategorie', 'KategorieController@search')->name('searchKategorie');

// Usuwanie
Route::delete('/usunKategorie/{id}', 'KategorieController@destroy')->name('usunKategorie');

// wybieranie kategorii dla listy rozwijanej w formularzu dla dodawania/edycji hasła i zagadnienia
Route::get('/kategorieListaRozwijana', 'KategorieController@listaRozwijana')->name('kategorieListaRozwijana');

/* Kategorie - koniec*/

/* Hasła */

/*Lista */
Route::get('/listaHasla', 'HaslaController@index')->name('listaHasla');

// dodawanie nowych - formularz
Route::get('/hasloNowe', 'HaslaController@noweFormularz')->name('hasloNowe');

// dodawanie nowych - zapis
Route::post('/haslaZapisNowe', 'HaslaController@create')->name('haslaZapisNowe');

// Pojedyńczy - edycja
Route::get('/hasla/{id}', 'HaslaController@edit')->name('edycjaHasla');

// Aktualizacja - zapis
Route::post('/haslaUpdate/{id}', 'HaslaController@update')->name('haslaUpdate');

// Szukanie na liście
Route::get('/searchHasla', 'HaslaController@search')->name('searchHasla');

// Usuwanie
Route::delete('/usunHaslo/{id}', 'HaslaController@destroy')->name('usunHaslo');

// wybieranie haseł dla listy rozwijanej w formularzu dla dodawania/edycji zagadnienia
Route::get('/haslaListaRozwijana', 'HaslaController@listaRozwijana')->name('haslaListaRozwijana');


/* Hasła - koniec*/

/* Zagadnienia */

/*Lista zagadnień*/
Route::get('/listaZagadnienia', 'ZagadnieniaController@index')->name('listaZagadnienia');

// dodawanie nowych - formularz
Route::get('/zagadnienieNowe', 'ZagadnieniaController@nowyFormularz')->name('zagadnienieNowe');


// dodawanie nowych - zapis
Route::post('/zagadnieniaZapisNowe', 'ZagadnieniaController@create')->name('zagadnieniaZapisNowe');

// Pojedyńczy - edycja
Route::get('/zagadnienia/{id}', 'ZagadnieniaController@edit')->name('edycjaZagadnienia');

// Aktualizacja - zapis
Route::post('/zagadnieniaUpdate/{id}', 'ZagadnieniaController@update')->name('zagadnieniaUpdate');

// Szukanie na liście
Route::get('/searchZagadnienia', 'ZagadnieniaController@search')->name('searchZagadnienia');

// Usuwanie
Route::delete('/usunZagadnienia/{id}', 'ZagadnieniaController@destroy')->name('usunZagadnienia');

/*Zagadnienia - koniec*/


/* przypisy*/

// dodawanie nowych - zapis
Route::post('/przypisyZapisNowe/', 'PrzypisyController@create')->name('PrzypisyZapisNowe');
Route::delete('/usunPrzypisy/{id}', 'PrzypisyController@destroy')->name('usunPrzypisy');

/* przypisy - koniec*/

/* bibliografia*/

// dodawanie nowych - zapis
Route::post('/bibliografiaZapisNowe/{dzial}', 'BibliografiaController@create')->name('bibliografiaZapisNowe');
Route::delete('/usunBibliografia/{id}/{dzial}', 'BibliografiaController@destroy')->name('usunBibl');

/* bibliografia - koniec*/

/* linki*/

// dodawanie nowych - zapis
Route::post('/linkZapisNowe/{dzial}', 'LinkiController@create')->name('linkZapisNowe');
Route::delete('/usunLink/{id}/{dzial}', 'LinkiController@destroy')->name('usunLink');

/* linki - koniec*/


/* pliki*/

// dodawanie nowych - zapis
Route::post('/plikZapisNowe/{dzial}', 'PlikiController@create')->name('plikZapisNowe');
Route::delete('/usunPlik/{id}/{dzial}', 'PlikiController@destroy')->name('usunPlik');

/* pliki - koniec*/


// Tagi - dodawanie do zagadnienia/hasła
Route::get('/tagDodaj', 'ZagadnieniaController@tagDodaj');

// Tagi - usuwanie z zagadnienia
Route::get('/tagUsun', 'ZagadnieniaController@tagUsun');

// Tagi - dodawanie do hasła
Route::get('/tagDodajHaslo', 'HaslaController@tagDodaj');

// Tagi - usuwanie hasła
Route::get('/tagUsunHaslo', 'HaslaController@tagUsun');

// Ścieżka do otwierania zagadnienia/hasła po dodaniu/usunięciu tagu - przesuwa widok do miejsca z tagami
Route::get('/zagadnieniaPoTagi/{id}', 'ZagadnieniaController@zagadnieniaPoTagi')->name('zagadnieniaPoTagi');
Route::get('/haslaPoTagi/{id}', 'HaslaController@haslaPoTagi')->name('haslaPoTagi');

// Koniec Tagi - dodawanie/usuwanie do zagadnienia/hasła



// Tagi - dodawanie/usuwanie do Przekazu Dnia
Route::get('/tagDodajPrzekaz', 'PrzekazdniaController@tagDodaj')->name('tagDodajPrzekaz');

// Tagi - usuwanie do zagadnienia zagadnieniaPoTagi
Route::get('/tagUsunPrzekaz', 'PrzekazdniaController@tagUsun')->name('tagUsunPrzekaz');

// Ścieżka do otwierania hasła po dodaniu/usunięciu tagu - przesuwa widok do miejsca z tagami
Route::get('/przekazPoTagi/{id}', 'PrzekazdniaController@zagadnieniaPoTagi')->name('przekazPoTagi');
// Koniec Tagi - dodawanie/usuwanie do Przekazu Dnia


/*Karuzela */

Route::get('/karuzela', 'ZagadnieniaController@karuzela')->name('karuzela');
/*Koniec karuzela */


/*Przekaz dnia*/
Route::get('/listaPrzekazDnia', 'PrzekazdniaController@index')->name('listaPrzekazDnia');

Route::get('/PrzekazDniaNowe', 'PrzekazdniaController@nowyFormularz')->name('PrzekazDniaNowe');

// dodawanie nowych - zapis
Route::post('/PrzekazDniaZapisNowe', 'PrzekazdniaController@create')->name('PrzekazDniaZapisNowe');

// Pojedyńczy - edycja
Route::get('/PrzekazDnia/{id}', 'PrzekazdniaController@edit')->name('przekazDniaEdycja');

// Aktualizacja - zapis
Route::post('/PrzekazDniaUpdate/{id}', 'PrzekazdniaController@update')->name('PrzekazDniaUpdate');

// Szukanie na liście
Route::get('/searchPrzekazDnia', 'PrzekazdniaController@search')->name('searchPrzekazDnia');

// Usuwanie
Route::delete('/usunPrzekazDnia/{id}', 'PrzekazdniaController@destroy')->name('usunPrzekazDnia');


/*Koniec przekaz dnia*/

/* Listy */
/*Formularz*/
Route::get('/ListWszyscy', 'Mail\WyslijlistController@wyslijWszystkimForm')->name('ListWszyscy');
Route::get('/WyslijIZSK', 'Mail\WyslijlistController@wyslijIZSKForm')->name('WyslijIZSK');
Route::get('/WyslijUser/{id}', 'Mail\WyslijlistController@wyslijUserForm')->name('WyslijUser');

/*Wysyłka*/

Route::post('/ListWszyscy', 'Mail\WyslijlistController@wyslijWszystkim')->name('ListWszyscyWy');
Route::post('/WyslijIZSK', 'Mail\WyslijlistController@wyslijIZSK')->name('WyslijIZSKWy');
Route::post('/WyslijUser/{user}', 'Mail\WyslijlistController@wyslijUser')->name('WyslijUserWy');


/*  Listy - koniec*/

/*  */

/*  - koniec*/

/*  */

/*  - koniec*/

/*  */

/*  - koniec*/
