<!-- Mainly scripts -->
<script src="<?= base_url("assets/js/jquery-3.1.1.min.js")?>"></script>
<script src="<?= base_url("assets/js/bootstrap.min.js")?>"></script>
<script src="<?= base_url("assets/js/plugins/metisMenu/jquery.metisMenu.js")?>"></script>
<script src="<?= base_url("assets/js/plugins/slimscroll/jquery.slimscroll.min.js")?>"></script>
<script src="<?= base_url("assets/js/plugins/dataTables/datatables.min.js")?>"></script>
<script src="<?= base_url("assets/js/plugins/sweetalert/sweetalert.min.js")?>"></script>
<script src="<?= base_url("assets/js/plugins/toastr/toastr.min.js")?>"></script>

<script>
var curUrl = $(location).attr('href'),
    curUrlTrim = curUrl.substr(curUrl.lastIndexOf('/') + 1),
    oLanguage =  {
        "sProcessing":   "Carregando...",
        "sLengthMenu":   "Mostrar _MENU_ registros",
        "sZeroRecords":  "Não foram encontrados resultados",
        "sInfo":         "Mostrando de _START_ até _END_ de _TOTAL_ registros",
        "sInfoEmpty":    "Mostrando de 0 até 0 de 0 registros",
        "sInfoFiltered": "",
        "sInfoPostFix":  "",
        "sSearch":       "Buscar:",
        "sUrl":          "",
        "oPaginate": {
            "sFirst":    "Primeiro",
            "sPrevious": "Anterior",
            "sNext":     "Seguinte",
            "sLast":     "Último"
        }
    },

    URL_MEDIAS = {
        get: '<?= base_url("index.php/medias/getMedias")?>',
        save: '<?= base_url("index.php/medias/saveMedia")?>',
        delete: '<?= base_url("index.php/medias/deleteMedia")?>',
        list: '<?= base_url("index.php/medias")?>'
    },
    dTableMedias = null,

    URL_TAGS = {
        get: '<?= base_url("index.php/tags/getTags")?>',
        save: '<?= base_url("index.php/tags/saveTag")?>',
        delete: '<?= base_url("index.php/tags/deleteTag")?>'
    },
    dTableTags = null;

function footer(){
    var date = new Date(),
        month = date.toLocaleString('pt-br', { month: 'long' }),
        year = date.getFullYear();

    $('.footer > div').html('<strong>&copy; Copyright TrackSocial.io '+year+'</strong>');
    $('.month-year').html(month + '/' + year);
}


$(document).ready(function(){
    footer();

    $('.navbar-static-side #side-menu').find('a').each(function(idx, elm){
        var href = $(elm).attr('href');

        if($(location).attr('href').lastIndexOf(href) > -1){
            $(elm).parent('li').addClass('active');
        }else{
            $(elm).parent('li').removeClass('active');
        }
    });
});

function getMedias(){
    jQuery.ajax({
        url: URL_MEDIAS.get,
        type: 'GET',
        success: function(resp){
            var conteudo = '';
            for(var i = 0, len = resp.length; i < len; i++){
                var media = resp[i];
                conteudo += '<tr data-id="'+media.id+'">';
                    conteudo += '<td>'+media.nome+'</td>';
                    conteudo += '<td>';
                        if(media.url_twitter != null && media.url_twitter != ''){
                            conteudo += '<a title="Ver Twitter">Twitter - '+media.url_twitter+'</a><br />';
                        }
                        if(media.url_instagram != null && media.url_instagram != ''){
                            conteudo += '<a title="Ver Instagram">Instagram - '+media.url_instagram+'</a>';
                        }
                    conteudo += '</td>';
                    conteudo += '<td>';
                        if(parseInt(media.is_mentions)){
                            conteudo += '&nbsp;<span class="label label-success">Menções</span>&nbsp;';
                        }

                        if(parseInt(media.is_hashtags)){
                            conteudo += '&nbsp;<span class="label label-info">Hashtags</span>&nbsp;';
                        }
                    conteudo += '</td>';

                    conteudo += '<td>';
                        conteudo += '<a href="<?= base_url('index.php/welcome/register')?>/'+media.id+'" class="btn btn-success" title="Editar"><i class="fa fa-edit"></i></a>&nbsp;';
                        conteudo += '&nbsp;<a class="btn btn-danger btn-delete-media" title="Deletar" data-id="'+media.id+'" data-name="'+media.nome+'"><i class="fa fa-trash"></i></a>';
                    conteudo += '</td>'
                conteudo += '</tr>';
            }

            if(dTableMedias != null){
                dTableMedias.clear();
                dTableMedias.destroy();
            }

            $('.table-medias > tbody').append(conteudo);
            dTableMedias = $('.table-medias').DataTable({
                oLanguage: oLanguage
            });

        }
    });
}
</script>

<script src="<?= base_url("assets/js/views/medias.js")?>"></script>
<script src="<?= base_url("assets/js/views/tags.js")?>"></script>

<!-- Flot -->
<script src="<?= base_url("assets/js/plugins/flot/jquery.flot.js")?>"></script>
<script src="<?= base_url("assets/js/plugins/flot/jquery.flot.tooltip.min.js")?>"></script>
<script src="<?= base_url("assets/js/plugins/flot/jquery.flot.spline.js")?>"></script>
<script src="<?= base_url("assets/js/plugins/flot/jquery.flot.resize.js")?>"></script>
<script src="<?= base_url("assets/js/plugins/flot/jquery.flot.pie.js")?>"></script>

<!-- Peity -->
<script src="<?= base_url("assets/js/plugins/peity/jquery.peity.min.js")?>"></script>
<script src="<?= base_url("assets/js/demo/peity-demo.js")?>"></script>

<!-- Custom and plugin javascript -->
<script src="<?= base_url("assets/js/inspinia.js")?>"></script>
<script src="<?= base_url("assets/js/plugins/pace/pace.min.js")?>"></script>

<!-- jQuery UI -->
<script src="<?= base_url("assets/js/plugins/jquery-ui/jquery-ui.min.js")?>"></script>

<!-- GRITTER -->
<script src="<?= base_url("assets/js/plugins/gritter/jquery.gritter.min.js")?>"></script>

<!-- Sparkline -->
<script src="<?= base_url("assets/js/plugins/sparkline/jquery.sparkline.min.js")?>"></script>

<!-- Sparkline demo data  -->
<script src="<?= base_url("assets/js/demo/sparkline-demo.js")?>"></script>

<!-- ChartJS-->
<script src="<?= base_url("assets/js/plugins/chartJs/Chart.min.js")?>"></script>


<script>
    $(document).ready(function() {
        setTimeout(function() {
            toastr.options = {
                closeButton: true,
                progressBar: true,
                showMethod: 'slideDown',
                timeOut: 4000
            };

        }, 1300);


        var data1 = [
            [0,4],[1,8],[2,5],[3,10],[4,4],[5,16],[6,5],[7,11],[8,6],[9,11],[10,30],[11,10],[12,13],[13,4],[14,3],[15,3],[16,6]
        ];
        var data2 = [
            [0,1],[1,0],[2,2],[3,0],[4,1],[5,3],[6,1],[7,5],[8,2],[9,3],[10,2],[11,1],[12,0],[13,2],[14,8],[15,0],[16,0]
        ];
        $("#flot-dashboard-chart").length && $.plot($("#flot-dashboard-chart"), [
            data1, data2
        ],
                {
                    series: {
                        lines: {
                            show: false,
                            fill: true
                        },
                        splines: {
                            show: true,
                            tension: 0.4,
                            lineWidth: 1,
                            fill: 0.4
                        },
                        points: {
                            radius: 0,
                            show: true
                        },
                        shadowSize: 2
                    },
                    grid: {
                        hoverable: true,
                        clickable: true,
                        tickColor: "#d5d5d5",
                        borderWidth: 1,
                        color: '#d5d5d5'
                    },
                    colors: ["#1ab394", "#1C84C6"],
                    xaxis:{
                    },
                    yaxis: {
                        ticks: 4
                    },
                    tooltip: false
                }
        );

        var doughnutData = {
            labels: ["App","Software","Laptop" ],
            datasets: [{
                data: [300,50,100],
                backgroundColor: ["#a3e1d4","#dedede","#9CC3DA"]
            }]
        } ;


        var doughnutOptions = {
            responsive: false,
            legend: {
                display: false
            }
        };


        var ctx4 = document.getElementById("doughnutChart").getContext("2d");
        new Chart(ctx4, {type: 'doughnut', data: doughnutData, options:doughnutOptions});

        var doughnutData = {
            labels: ["App","Software","Laptop" ],
            datasets: [{
                data: [70,27,85],
                backgroundColor: ["#a3e1d4","#dedede","#9CC3DA"]
            }]
        } ;


        var doughnutOptions = {
            responsive: false,
            legend: {
                display: false
            }
        };


        var ctx4 = document.getElementById("doughnutChart2").getContext("2d");
        new Chart(ctx4, {type: 'doughnut', data: doughnutData, options:doughnutOptions});

    });
</script>

</body>
</html>