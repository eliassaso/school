/**
 * Created by elias on 30/09/15.
 */


function getTemas(id){

    var main = document.getElementById('main');
    main.innerHTML = "<div class='row'>"+
                    "<div class='container'>"+
                    "<h1 class='text-center'>Seleccione la asignatura</h1>"+
                        "<div class='list-group' id='select_item'>"+

                        "</div></div></div>";

    $.ajax({url: '/front/' + id })
    .done(function(data) {

                    //JSON.stringify({data: data});
                    //alert(data[1].nombre_materia);
                    //alert(data[0].degree)
                    //cont = data.length;
                    var injection = document.getElementById('select_item');
                    injection.innerHTML = "";

                    for (var i = data.length - 1; i >= 0; i--) {
                        temp = data[i].nombre_materia;
                        id = data[i].id;

                    //injection.innerHTML += '<h1>'+ temp +'</h1>';

                    /*injection.innerHTML += "<a class='list-group-item' id="+ id +" onclick='getContenidoTemas(id)'>" +
                        "<div class='col-md-9'>" +
                            "<h2 class='list-group-item-heading'>"+temp+"</h2>" +
                        "</div>" +
                        "<div class='col-md-3 text-center' style='display:block;' value= 'titulo" + id + "' id = 'titulo" + id + "'>" +
                        "</div>" +
                    "</a>";*/

                    var contenidoTemas = getContenidoTemas(id);

                    injection.innerHTML += "<div class='panel-heading'>"+
                          "<br>"+
                            "<a class='dropdown-button btn' href='#!' data-activates='drop"+id+"'>"+
                            "<strong>"+ temp +"</strong></a>"+



                        //"<div id='drop"+id+"' class='dropdown-content'>"+
                        "<ul id='drop"+id+"' class='dropdown-content' role='menu'>"+
                        /*"<ul class='list-group'>"+
                            "<li class='list-group-item'><a>"+id+"</a></li>"+
                        "</ul>"+*/
                        "</ul>"+
                        //"</div>"+
                        "</div>"+
                    "</div>";
                    }

                })
                .fail(function() {
                    alert('error');
                });



    function getContenidoTemas(id){
        $.ajax({
                    url: '/titulos/' + id
                })
                    .done(function(data) {

                        var injection2 = document.getElementById('drop'+id);
                        injection2.innerHTML = "";

                        for (var i = data.length - 1; i >= 0; i--) {
                            var title = data[i].title;
                            id2 = data[i].id;
                            //id2 = data[i].link;


                        injection2.innerHTML += "<li class=''><a href='/finalshow/"+id2+"'>"+title+"</a></li>";

                        }


                    })
                    .fail(function() {
                        alert('error');
                    });

    }
}

function respuestaCorrecta(id){

    $('.page-alert .close').closest('.page-alert').slideUp();//se limpian los mensajes

    var respuesta = id.value;
    var id_p = document.getElementById(id);
    var bandera_check = false;
    var count = 0;

    var rates = document.getElementsByName('options'+id.id);
    var notificacion = document.getElementById('notificacion'+id.id).value;
    var correcta = document.getElementById('correcta'+id.id).value;
    var link = document.getElementById('link'+id.id).value;

    var rate_value;
    for(var i = 0; i < rates.length; i++){
        if(rates[i].checked){
            //rate_value = rates[i].value;
            rate_value = rates[i].id;
            rate_value = rate_value.split('_');
            if(respuesta == rate_value[1]){
                //alert('correcta');
                bandera_check = true;
                createNoty('Respuesta correcta, opcion '+ correcta + '  !!, '+ notificacion +', referencias: <a href="//'+ link +'">'+link+'</a>', 'card-panel green accent-2', id);
                $('.page-alert .close').click(function(e) {
                    e.preventDefault();
                    $(this).closest('.page-alert').slideUp();
                });
            }else{
                //alert('in');
                bandera_check = true;
                createNoty('Opcion incorrecta, intentalo de nuevo!!', 'card-panel purple lighten-5', id);
                $('.page-alert .close').click(function(e) {
                    e.preventDefault();
                    $(this).closest('.page-alert').slideUp();
                });
            }
        }else{
            count++;
        }
        if ((bandera_check == false)&&(count == 4)) {
            alert('debe seleccionar una opcion');
        }
    }
}

$(document).ready(function () {

    $("a[data-title=delete]").click(function () {

        var id = idDelete;

        $('#form'+id).submit();
    });



        $('#solo-numero').keyup(function (){
            this.value = (this.value + '').replace(/[^0-9]/g, '');
        });



    $('textarea#content').characterCounter();




  var options = [

    {selector: '#scrollFire1', offset: 150, callback: function() {
        $("#scrollFire1").velocity({ backgroundColor: "#fff", color: "#181907" }, {duration: 500});
        $("#scrollFire2").velocity({ backgroundColor: "#fff", color: "#181907" }, {duration: 500});
        $("#scrollFire3").velocity({ backgroundColor: "#fff", color: "#181907" }, {duration: 500});
    } },
    {selector: '#scrollFire4', offset: 250, callback: function() {
        $("#scrollFire4").velocity({ backgroundColor: "#fff", color: "#181907" }, {duration: 500});
    } }
  ];
  Materialize.scrollFire(options);

  $('.carousel').carousel();

});

function createNoty(message, type, id) {
    var html = '<div style="margin-top:1%;" class="' + type + ' alert-dismissable page-alert">';
    html += '<button type="button" class="btn-flat close"><span aria-hidden="true">×</span><span class="sr-only"></span></button>';
    html += message;
    html += '</div>';
    $(html).hide().prependTo("#noty-holder"+id.id).slideDown();
};



/*$(function(){
    createNoty('Hi! This is my message', 'info');
    createNoty('success', 'success');
    createNoty('warning', 'warning');
    createNoty('danger', 'danger');
    createNoty('info', 'info');
    $('.page-alert .close').click(function(e) {
        e.preventDefault();
        $(this).closest('.page-alert').slideUp();
    });
});*/
