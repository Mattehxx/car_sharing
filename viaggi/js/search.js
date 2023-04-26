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
                        $('#cards_to_add').append('<div class="card m-2" style="width: 18rem;"> <div class="card-header">Viaggio</div><ul class="list-group list-group-flush"><li class="list-group-item">Partenza: '+element['partenza']+'</li><li class="list-group-item">Destinazione: '+element['destinazione']+'</li><li class="list-group-item">Ora: '+element['dt_viaggio']+'</li><li class="list-group-item">Durata: '+element['durata']+'<li class="list-group-item">Numero di posti: '+element['n_posti']+'<li class="list-group-item">Costo: '+element['importo']+' €</ul><div class="card-footer row"><div class="col"><button class="btn btn-primary">Prenota</button></div></div></div>'); 
                });
                },
            error: (data)=> {
                console.log('Error: '+data);
            }
        });
    });
});