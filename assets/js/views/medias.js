'use strict';

$(document).ready(function(){
	if(curUrlTrim.lastIndexOf('medias') > -1){
        getMedias();
    }

    dTableMedias = $('.table-medias').DataTable({
        oLanguage: oLanguage
    });

    $('body').on('click', '.btn-delete-media', function(event){
        var id = $(this).data('id'),
            name = $(this).data('name');

        swal({
            type: 'warning',
            title: 'Atenção!',
            html: true,
            text: 'Deseja mesmo deletar a media <b>'+name+'</b>?',
            confirmButtonText: 'Deletar',
            cancelButtonText: 'Cancelar',
            confirmButtonColor: '#ed5565',
            showCancelButton: true,
            showLoaderOnConfirm: true,
            closeOnConfirm: false
        }, function(){
            jQuery.ajax({
                type: 'POST',
                url: URL_MEDIAS.delete,
                data: {
                    id: id
                },
                success: function(resp){
                    console.log(resp);
                    if(resp.msg && resp.msg == 'deleted'){
                        swal('Sucesso!', 'Media deletada com sucesso.', 'success');
                    }else{
                        swal('Atenção!', 'Ocorreu um erro. Por favor, tente novamente!', 'error');
                    }

                    getMedias();
                },
                error: function(resp){
                    swal('Atenção!', 'Ocorreu um erro. Por favor, tente novamente!', 'error');
                }
            })
        })
    });

    $('body').on('click', '.btn-save-media', function(event){
        event.preventDefault();
        event.stopPropagation();

        $(this).html('<i class="fa fa-spinner fa-spin fa-fw"></i>').addClass('disabled');

        var ajaxData = {
            nome: $('#form_nome').val(),
            is_twitter: $('#form_twitter').is(':checked') ? 1 : 0,
            is_instagram: $('#form_instagram').is(':checked') ? 1 : 0,
            is_mentions: $('#form_mencoes').is(':checked') ? 1 : 0,
            is_hashtags: $('#form_hashtags').is(':checked') ? 1 : 0,
        };

        if($(this).data('id') != null && $(this).data('id') != ''){
            ajaxData.id = parseInt($(this).data('id'));
        }


        if($('#form_url_twitter').val() != ''){
            ajaxData.url_twitter = $('#form_url_twitter').val();
        }
        if($('#form_url_instagram').val() != ''){
            ajaxData.url_instagram = $('#form_url_instagram').val();
        }        

        jQuery.ajax({
            type: 'POST',
            url: URL_MEDIAS.save,
            data: ajaxData,
            success: function(resp){
                var str = resp.msg && resp.msg == 'updated' ? 'A media <b>'+$('#form_nome').val()+'</b> foi alterada com sucesso!' : 'A media <b>'+$('#form_nome').val()+'</b> foi criada com sucesso!';

                if(resp.msg && resp.msg == 'updated' || resp.msg == 'created'){
                    swal({
                        type: 'success',
                        title: 'Sucesso',
                        text: str,
                        confirmButtonColor: '#19A689',
                        html: true,
                        confirmButtonText: 'Voltar para a lista de medias'
                    }, function(){
                        location.href = ULR_MEDIAS.list;
                    });
                }else{
                    swal({
                        type: 'error',
                        title: 'Ops...',
                        text: 'Ocorreu um erro, por favor tente novamente!',
                    }, function(){
                        location.reload();
                    });
                }


                $('.btn-save-media').html('Salvar').removeClass('disabled');
            },
            error: function(resp){
                swal({
                    type: 'error',
                    title: 'Ops...',
                    text: 'Ocorreu um erro, por favor tente novamente!',
                }, function(){
                    location.reload();
                });

                $('.btn-save-media').html('Salvar').removeClass('disabled');
            }
        });
    });

    $('#form_instagram').change(function(){
        if($(this).is(':checked')){
            $('#form_url_instagram').removeClass('disabled');
        }else{
            $('#form_url_instagram').addClass('disabled');
        }
    })

    $('#form_twitter').change(function(){
        if($(this).is(':checked')){
            $('#form_url_twitter').removeClass('disabled');
        }else{
            $('#form_url_twitter').addClass('disabled');
        }
    });
})