'use strict';

$(document).ready(function(){
	if(curUrlTrim.lastIndexOf('tags') > -1){
        getTags();
    }

    dTableTags = $('.table-tags').DataTable({
        oLanguage: oLanguage
    });

	$('body').on('click', '.btn-editar-tag', function(event){
        event.preventDefault();
        event.stopPropagation();

        $('#modal-tags #tagId').val($(this).data('id'));
        $('#modal-tags #tagNome').val($(this).data('name'));

        $('#modal-tags').modal('show');
    });

    $('body').on('click', '.btn-delete-tag', function(event){
        event.preventDefault();
        event.stopPropagation();

        var id = $(this).data('id'),
            name = $(this).data('name');

        swal({
            type: 'warning',
            title: 'Atenção!',
            html: true,
            text: 'Deseja mesmo deletar a tag <b>'+name+'</b>?',
            confirmButtonText: 'Deletar',
            cancelButtonText: 'Cancelar',
            confirmButtonColor: '#ed5565',
            showCancelButton: true,
            showLoaderOnConfirm: true,
            closeOnConfirm: false
        }, function(){
            jQuery.ajax({
                type: 'POST',
                url: URL_TAGS.delete,
                data: {
                    id: id
                },
                success: function(resp){
                    console.log(resp);
                    if(resp.msg && resp.msg == 'deleted'){
                        swal('Sucesso!', 'Tag deletada com sucesso.', 'success');
                    }else{
                        swal('Atenção!', 'Ocorreu um erro. Por favor, tente novamente!', 'error');
                    }

                    getTags();
                },
                error: function(resp){
                    swal('Atenção!', 'Ocorreu um erro. Por favor, tente novamente!', 'error');
                }
            })
        })
    });

    $('.btn-save-tag').click(function(event){
        event.preventDefault();
        event.stopPropagation();

        $(this).addClass('disabled').html('<i class="fa fa-spinner fa-spin fa-fw"></i>');

        var dataAjax = {
            nome: $('#tagNome').val(),
            user_id: 1
        };

        if($('#tagId').val() != ''){
            dataAjax.id = $('#tagId').val()
        }

        jQuery.ajax({
            type: 'POST',
            url: URL_TAGS.save,
            data: dataAjax,
            success: function(resp){
                $('#modal-tags').modal('hide');
                var str = resp.msg && resp.msg == 'updated' ? 'A tag <b>'+dataAjax.nome+'</b> foi alterada com sucesso!' : 'A tag <b>'+dataAjax.nome+'</b> foi criada com sucesso!';

                if(resp.msg && resp.msg == 'updated' || resp.msg == 'created'){
                    swal({
                        type: 'success',
                        title: 'Sucesso',
                        text: str,
                        html: true
                    });
                }else{
                    swal({
                        type: 'error',
                        title: 'Ops...',
                        text: 'Ocorreu um erro, por favor tente novamente!',
                    });
                }

                getTags();
            },
            error: function(resp){
                $('#modal-tags').modal('hide');
                swal({
                    type: 'error',
                    title: 'Ops...',
                    text: 'Ocorreu um erro, por favor tente novamente!',
                });
            }
        });
    });

    $('#modal-tags').on('hidden.bs.modal', function(){
        $(this).find('#tagId, #tagNome').val('');
        $(this).find('.btn-save-tag').removeClass('disabled').html('Salvar');
    });

    $('#modal-tags').on('shown.bs.modal', function(){
        $(this).find('#tagNome').focus();
    });
})

function getTags(){
    jQuery.ajax({
        url: URL_TAGS.get,
        type: 'GET',
        success: function(resp){
            var conteudo = '';

            for(var i = 0, len = resp.length; i < len; i++){
                conteudo += '<tr data-id="'+resp[i].id+'">';
                    conteudo += '<td>'+resp[i].nome+'</td>';
                    conteudo += '<td>';
                        conteudo += '<a class="btn btn-success btn-editar-tag" title="Editar" data-id="'+resp[i].id+'" data-name="'+resp[i].nome+'"><i class="fa fa-edit"></i></a>&nbsp;';
                        conteudo += '&nbsp;<a class="btn btn-danger btn-delete-tag" title="Deletar" data-id="'+resp[i].id+'" data-name="'+resp[i].nome+'"><i class="fa fa-trash"></i></a>';
                    conteudo += '</td>';
                conteudo += '</tr>';
            }

            if(dTableTags != null){
                dTableTags.clear();
                dTableTags.destroy();
            }

            $('.table-tags > tbody').append(conteudo);
            dTableTags = $('.table-tags').DataTable({
                oLanguage: oLanguage
            });
        }
    })
}