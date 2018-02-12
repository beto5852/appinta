
function cambiar_fecha_grafica(){

    var anio_sel=$("#anio_sel").val();
    var mes_sel=$("#mes_sel").val();

    cargar_grafica_barras(anio_sel,mes_sel);
    cargar_grafica_lineas(anio_sel,mes_sel);
    cargar_grafica_pie();
}



function cargar_grafica_pie() {

    var options={
        // Build the chart

        chart: {
            renderTo: 'div_grafica_pie',
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Tecnológias usadas en prácticas agricolas'
        },
        credits: {
            enabled: false
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: false
                },
                showInLegend: true
            }
        },
        credits: {
            enabled: false
        },
        series: [{
            name: 'Total',
            colorByPoint: true,
            data: []
        }]

    }

    $("#div_grafica_pie").html( $("#cargador_empresa").html() );

    var url = "grafica_publicaciones";

    navigation: {
        buttonOptions: {
            enabled: false
        }
    }
    $.get(url,function(result){
        var datos= jQuery.parseJSON(result);
        var tipos=datos.tipos;
        var totattipos=datos.totaltipos;
        var numeropublicaciones=datos.numerodepract;

        for(i=0;i<=totattipos-1;i++){
            var idTP=parseInt(tipos[i].id);
            var objeto= {name: tipos[i].nombre_tecnologia, y:numeropublicaciones[idTP] };
            options.series[0].data.push( objeto );
        }
        //options.title.text="aqui e podria cambiar el titulo dinamicamente";
        chart = new Highcharts.Chart(options);

    })
}


function cargar_grafica_lineas(anio,mes){

var options={
     chart: {
            renderTo: 'div_grafica_lineas',
           
        },
          title: {
            text: 'Numero de Registros en el Mes',
            x: -20 //center
        },
        credits: {
            enabled: false
        },
        subtitle: {
            text: 'APPINTA',
            x: -20
        },
        xAxis: {
            categories: []
        },
        yAxis: {
            title: {
                text: 'REGISTROS POR DIA'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: ' registros'
        },

        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [{
            name: 'registros',
            data: []
        }]
}

$("#div_grafica_lineas").html( $("#cargador_empresa").html() );
var url = "grafica_registros/"+anio+"/"+mes+"";
$.get(url,function(resul){
var datos= jQuery.parseJSON(resul);
var totaldias=datos.totaldias;
var registrosdia=datos.registrosdia;
var i=0;
    for(i=1;i<=totaldias;i++){
    
    options.series[0].data.push( registrosdia[i] );
    options.xAxis.categories.push(i);


    }
 //options.title.text="aqui e podria cambiar el titulo dinamicamente";
 chart = new Highcharts.Chart(options);

})


}




function cargar_grafica_pie(){

var options={
     // Build the chart
     
            chart: {
                renderTo: 'div_grafica_pie',
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Tecnológias usadas en prácticas agricolas'
            },
            credits: {
                enabled: false
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
            credits: {
                enabled: false
            },
            series: [{
                name: 'Total',
                colorByPoint: true,
                data: []
            }]
     
}

$("#div_grafica_pie").html( $("#cargador_empresa").html() );

var url = "grafica_publicaciones";

    navigation: {
        buttonOptions: {
            enabled: false
        }
    }
$.get(url,function(result){
var datos= jQuery.parseJSON(result);
var tipos=datos.tipos;
var totattipos=datos.totaltipos;
var numeropublicaciones=datos.numerodepract;

    for(i=0;i<=totattipos-1;i++){  
    var idTP=parseInt(tipos[i].id);
    var objeto= {name: tipos[i].nombre_tecnologia, y:numeropublicaciones[idTP] };
    options.series[0].data.push( objeto );  
    }
 //options.title.text="aqui e podria cambiar el titulo dinamicamente";
 chart = new Highcharts.Chart(options);

})








}