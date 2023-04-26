$(document).ready(function() {
    $('#button_navbar').click(()=> {

        var formData = {
            partenza: $('#partenza').val(),
            destinazione: $('#destinazione').val(),
            dt_viaggio: $('#dt_viaggio').val(),
            n_posti: $('#n_posti').val(),
        };

        $.ajax({
            type: 'POST',
            url: '../viaggi/php/get.php',
            data: formData,
            dataType: 'json',

            success: (data)=> {
                //console.log(data);
                data.forEach(element => {
                    console.log(element);
                        $('#cards_to_add').append('<div class="row"><div class="col-8"><div class="card m-2"><div class="card-header">Viaggio</div><ul class="list-group list-group-flush"><li class="list-group-item"><div class="row"><div class="col">Partenza: '+element['partenza']+'</div><div class="col">Destinazione: '+element['destinazione']+'</div></div></li><li class="list-group-item">Ora: '+element['dt_viaggio']+'</li><li class="list-group-item">Durata: '+element['durata']+'<li class="list-group-item">Numero di posti: '+element['n_posti']+'<li class="list-group-item">Costo: '+element['importo']+' €<li class="list-group-item">Autista: '+element['nominativo']+'</ul><div class="card-footer"><button class="btn btn-primary" style="width: 100%;">Prenota</button></div></div></div></div>'); 
                });
                },
            error: (data)=> {
                console.log('Error: '+data);
            }
        });
    });
});