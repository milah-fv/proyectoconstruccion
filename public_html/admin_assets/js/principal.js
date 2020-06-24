$(document).ready(function(){

            $(".btn-detalle-categoria").on('click', function(e){
                e.preventDefault();
                var id_categoria = $(this).data('id');
                var path = $(this).data('path');
                var token = $(this).data('token');
                var modal_title = $(".modal_title");
                var data = {'_token' : token, 'categoria_id' : id_categoria}

                modal_title.html('asdasd' + id_categoria);

                $.post(
                    path,
                    data, 
                    function(response){
                        console.log(response)
                    }, 
                    'json');

            });
        });


