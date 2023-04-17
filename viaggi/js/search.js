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
                console.log(data);
                $('#cards_to_add').html('<div class="card" style="width: 18rem;"> <div class="card-header">Viaggio</div><ul class="list-group list-group-flush"><li class="list-group-item">Partenza: '+data['partenza']+'</li><li class="list-group-item">Destinazione: '+data['destinazione']+'</li><li class="list-group-item">Data: '+data['dt_viaggio']+'</li><li class="list-group-item">Durata: '+data['durata']+'<li class="list-group-item">Numero di posti: '+data['n_posti']+'<li class="list-group-item">Costo: '+data['importo']+' €</ul><div class="card-footer row"><div class="col"><input class="form-control" type="number" placeholder="Passeggeri" min="1" max="10" step="1"></div><div class="col"><button class="btn btn-primary">Prenota</button></div></div></div>');
            },
            error: (data)=> {
                console.log(data);
                
            }
        });
    });
});