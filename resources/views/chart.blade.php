<!DOCTYPE html>

<html>

<head>

    <title>Laravel 10 ChartJS Chart Example - ItSolutionStuff.com</title><title>Laravel 10 ChartJS Chart Example - ItSolutionStuff.com</title>

</head>

    

<body>

    <h1>Laravel 10 ChartJS Chart Example - ItSolutionStuff.com</h1><h1>Laravel 10 ChartJS Chart Example - ItSolutionStuff.com</h1>

    <canvas id="myChart" height="100px"></canvas><canvas id="myChart" height="100px"></canvas>

</body>

  

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script> src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script> src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  

<script type="text/javascript"> type="text/javascript">

  

      var labels =  {{ Js::from($labels) }};var labels =  {{ Js::from($labels) }};

      var users =  {{ Js::from($data) }};var users =  {{ Js::from($data) }};

  

      const data = {const data = {

        labels: labels,: labels,

        datasets: [{: [{

          label: 'My First dataset',: 'My First dataset',

          backgroundColor: 'rgb(255, 99, 132)',: 'rgb(255, 99, 132)',

          borderColor: 'rgb(255, 99, 132)',: 'rgb(255, 99, 132)',

          data: users,: users,

        }]}]

      };};

  

      const config = {const config = {

        type: 'line',: 'line',

        data: data,: data,

        options: {}: {}

      };};

  

      const myChart = new Chart(const myChart = new Chart(

        document.getElementById('myChart'),.getElementById('myChart'),

        config

      ););

  

</script>

</html>