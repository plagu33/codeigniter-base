$(function() {
/*
    Morris.Donut({
        element: 'morris-donut-chart',
        data: [{
            label: "Download Sales",
            value: 12
        }, {
            label: "In-Store Sales",
            value: 30
        }, {
            label: "Mail-Order Sales",
            value: 20
        }],
        resize: true,
        colors : [ 
                '#337AB7',
                '#5CB85C',
                '#F0AD4E', 
                ]            
    });
*/
  if( $("#votaciones").length>0 )
  {

    Morris.Bar({
      element: 'votaciones',
      data: [
        {x: 'votación 1', y: 3, z: 2, a: 3},
        {x: 'votación 2', y: 2, z: 0, a: 1},
        {x: 'votación 3', y: 3, z: 2, a: 4},
        {x: 'votación 4', y: 1, z: 2, a: 4},
        {x: 'votación 5', y: 10, z: 2, a: 4},
        {x: 'votación 6', y: 2, z: 4, a: 3}
      ],
      xkey: 'x',
      ykeys: ['y', 'z', 'a'],
      labels: ['opción 1', 'opción 2 dwqd dqwd', 'opción 3'],
      stacked: true,
      resize: true
    });    
  }

});
