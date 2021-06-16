// funkcja samowywołując
(function(){
// koniec funkcji samowywołujacej

})();



// Funkcja skrolowania do góry

// When the user scrolls down 20px from the top of the document, show the button --> https://www.w3schools.com/howto/howto_js_scroll_to_top.asp
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 30 || document.documentElement.scrollTop > 30) {

        document.getElementById("myBtn").style.display = "block";
    } else {
        document.getElementById("myBtn").style.display = "none";
    }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {

    document.body.scrollTop = 0; // For Safari
    document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera

}


    $(document).ready(function () {
        // Propozycje - obsługa , aby wyświatlały się "Uwagi do propozycji" z odpowiednim statusem

       /* $(document).on('change', '#status_uwag', function () {
           // console.log("zmian uagi prop");


        })*/
        $("#status_uwag").change(function() {

                       //console.log("zmian uagi prop");
            $('.statusy').addClass('visually-hidden');
           // var wybrane = $(this).children("option:selected").val();
            var wybrane = $("#status_uwag" ).val();
           // console.log(wybrane);

            switch(wybrane) {
                case 'Nowa':
                   // console.log(1);
                    $("#Nowa").removeClass('visually-hidden');
                    break;
                case 'Oczekuje':
                    //console.log(2);
                    $("#Oczekuje").removeClass('visually-hidden');
                    break;
                case 'Dodane':
                   // console.log(3);
                    $("#Dodane").removeClass('visually-hidden');
                    break;
                case 'Usunięta':
                    //console.log(4);
                    $("#Usunięta").removeClass('visually-hidden');
                    break;

                default:
                    $("#Nowa").removeClass('visually-hidden');
                    break;
            }

        });

        // Procedura wyświetlania potwierdzenia i formularza IZSK dla edycji "User"

        var izsk_warunek = $('#izsk_warunek'),
            izsk_form = $('#izsk_form'),
            warunek2 = $('#warunek2');
       // console.log("aaaaaaaa");

        if(izsk_warunek.is(':checked')){
            warunek2.show();
            izsk_form.show();
            izsk_warunek.prop('value', 1);
            //console.log("zazn");
            }
            else {
            warunek2.hide();
            izsk_form.hide();
            izsk_warunek.prop('value', 0);
           // console.log("NIEzazn");
        }


        izsk_warunek.on('click', function() {
            if($(this).is(':checked')) {
                warunek2.show();
                izsk_form.show();
                $(this).prop('checked', true)
                $(this).prop('value', 1)
               // chShipBlock.find('input').attr('required', true);
            } else {
                warunek2.hide();
                izsk_form.hide();
                $(this).prop('checked', false)
                $(this).prop('value', 0)
               // chShipBlock.find('input').attr('required', false);
            }
        })

        // KONIEC procedury wyświetlania potwierdzenia i formularza IZSK dla edycji "User"

        // Pobieranie kategorii
        // Dodawanie/edycji Hasła i Zagadnienia: funkcja pobierania odpowiedznich kategorii (w zależności od wybranego działu) i wyświetlanie ich w liście rozwijanej
        //https://www.youtube.com/watch?v=N5ctY9nPt9o
        $(document).on('change', '#dzial_id', function () {
         //console.log("dzial_lista zmiana");
            var dzial_id= $(this).val();
            var select=$( "#kategoria_id" );
            var op="";
            //console.log(dzial_id);
            $.ajax({
                type:'get',
                url:'/kategorieListaRozwijana',
                    data:{'id':dzial_id},
                success:function (data) {
                   // console.log('Sukces ajax!');
                   // console.log(data);
                    op+='<option selected disabled>Wybierz kategorię:</option>';

                    for(var i=0;i<data.length;i++) {
                        op += '<option value="' + data[i].id + '">' + data[i].kategoria + '</option>';
                    }
                    select.html(" ");
                    select.append(op);
                },
                error:function () {
                }
            });
        })
        // koniec  pobierania kategorii

        // Pobieranie haseł
        // Dodawanie/edycji Zagadnienia: funkcja pobierania odpowiedznich haseł (w zależności od wybranej kategorii) i wyświetlanie ich w liście rozwijanej
        //https://www.youtube.com/watch?v=N5ctY9nPt9o
        $(document).on('change', '#kategoria_id', function () {
            //console.log("dzial_lista zmiana");
            var kategoria_id= $(this).val();
            var select=$( "#haslo_id" );
            var op="";
            console.log(kategoria_id);
            $.ajax({
                type:'get',
                url:'/haslaListaRozwijana',
                data:{'id':kategoria_id},

                success:function (data) {
                     console.log('Sukces ajax!');
                   console.log(data);
                     op+='<option selected disabled>Wybierz hasło:</option>';

                    for(var i=0;i<data.length;i++) {
                        op += '<option value="' + data[i].id + '">' + data[i].haslo + '</option>';
                    }
                    select.html(" ");
                    select.append(op);
                },
                error:function () {
                }
            });
        })
        // koniec  pobierania haseł





        // funkcja dodawania tagów do zagadnień

        $(document).on('click', '#dodajTag', function () {
            var tag_id=$("#tagi_dodaj").val();
            var zagadnienia_id=$("#zagadnienia_id").val();

            $.ajax({
                type:'get',
                url:'/tagDodaj',
                data:{'tag_id':tag_id, 'zagadnienia_id':zagadnienia_id},
                success:function (data) {
                    window.open("/zagadnieniaPoTagi/"+zagadnienia_id,"_self")
                    //console.log("Tag dodany!");

                },
                error:function () {
                }
            });


        })
        // funkcja usuwania odłączania tagu od zagadnienia
        $(document).on('click', '.usunTag', function () {
            var tag_id=this.id;
            var zagadnienia_id=$("#zagadnienia_id").val();
            //console.log("sssssssss");
            $.ajax({
                type:'get',
                url:'/tagUsun',
                data:{'tag_id':tag_id, 'zagadnienia_id':zagadnienia_id},
                success:function (data) {
                    //console.log("Tag usunięty!");
                    window.open("/zagadnieniaPoTagi/"+zagadnienia_id,"_self")
                    console.log("Tag usunięty!");


                },
                error:function () {
                }
            });


        })


            // funkcja dodawania tagów do haseła

            $(document).on('click', '#dodajTagHaslo', function () {
                var tag_id=$("#tagi_dodaj").val();
                var haslo_id=$("#haslo_id").val();
                console.log("Tag start");
                $.ajax({
                    type:'get',
                    url:'/tagDodajHaslo',
                    data:{'tag_id':tag_id, 'haslo_id':haslo_id},
                    success:function (data) {
                        window.open("/haslaPoTagi/"+haslo_id,"_self")
                        console.log("Tag dodany!");

                    },
                    error:function () {
                    }
                });


            })
        // funkcja usuwania odłączania tagu od hasła
        $(document).on('click', '.usunTagHaslo', function () {
            var tag_id=this.id;
            var haslo_id=$("#haslo_id").val();
            //console.log("sssssssss");
            $.ajax({
                type:'get',
                url:'/tagUsunHaslo',
                data:{'tag_id':tag_id, 'haslo_id':haslo_id},
                success:function (data) {
                    console.log("Tag usunięty!");
                    window.open("/haslaPoTagi/"+haslo_id,"_self")
                    console.log("Tag usunięty!");


                },
                error:function () {
                }
            });


        })


        // funkcja dodawania tagów do Przekazu dnia

        $(document).on('click', '#dodajTagPrzekaz', function () {
            var tag_id=$("#tagi_dodaj_przekaz").val();
            var przekazdnia_id=$("#przekazdnia_id").val();

            $.ajax({
                type:'get',
                url:'/tagDodajPrzekaz',
                data:{'tag_id':tag_id, 'przekazdnia_id':przekazdnia_id},
                success:function (data) {
                    window.open("/przekazPoTagi/"+przekazdnia_id,"_self")
                    //console.log("Tag dodany!");

                },
                error:function () {
                }
            });


        })


        // funkcja usuwania odłączania tagu od Przekazu dnia
        $(document).on('click', '.usunTagPrzekaz', function () {
            var tag_id=this.id;
            var przekazdnia_id=$("#przekazdnia_id").val();
            //console.log("sssssssss");
            $.ajax({
                type:'get',
                url:'/tagUsunPrzekaz',
                data:{'tag_id':tag_id, 'przekazdnia_id':przekazdnia_id},
                success:function (data) {
                    //console.log("Tag usunięty!");
                    window.open("/przekazPoTagi/"+przekazdnia_id,"_self")
                   // console.log("Tag usunięty!");


                },
                error:function () {
                }
            });


        })




        // funkcja pobierania odpowiedznich haseł (w zależności od wybranych kategorii i wyświetlanie ich w liście rozwijanej



        // funkcja pobierania odpowiedznich zagadnień (w zależności od wybranego hasła) i wyświetlanie ich w liście rozwijanej




        //
       /* $('#obrazek1').on('change',function(){
            //get the file name
           // console.log("Zmiana obrazka");
            var fileName = $(this).val();
            //replace the "Choose a file" label
            $(this).next('.custom-file-label').html(fileName);
        })*/

        /*$('input[type="file"]').change(function(e){
            var fileName = e.target.files[0].name;
            $('.custom-file-label').html(fileName);
        });*/

        // skrypt wyświetlający nazwę pobranego pliku w kontrolce dodawania zdjęc do haseł i zagadnień
        $('input[type="file"]').change(function(e){
            var fileName = e.target.files[0].name;
            $(this).next('.custom-file-label').html(fileName);
        });



        //koniec $(document).ready
    })
