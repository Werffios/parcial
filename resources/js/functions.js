
var municipio = [];
var cantidad = [];
let url2 = 'https://www.datos.gov.co/resource/gt2j-8ykr.json';
fetch(url2)

.then(respuestas=>respuestas.json())

.then(function transformarq(respuestas)
{

    var occurences = respuestas.reduce(function (r, row) {
        r[row.departamento_nom] = ++r[row.departamento_nom] || 1;
        return r;
    }, {});

    var result = Object.keys(occurences).map(function (key) {
        return { key: key, value: occurences[key] };
    });
    result.forEach(function agregar(result) {
        cantidad.push(result.key);
        municipio.push(result.value)
    });

    var graf1=
    {
        y: municipio,
        x: cantidad,
        type: 'scatter',
        marker: {
        color: 'rgb(255,0,0)',
            line: {
            color: 'rgb(255,0,0)',
            width: 0.1
            }
        }
    };
    var datosGraficas = [graf1];

    var layout =
    {
        title: 'Contagiados',
        xaxis:
        {
            title: 'Municipio'
        },
        yaxis:
        {
            title: 'Cantidad de contagiados'
        },
        font: {
    family: 'Courier New, monospace',
    size: 18,
    color: '#7f7f7f'
  }
    };
    Plotly.newPlot('coviddatos', datosGraficas, layout);
});
