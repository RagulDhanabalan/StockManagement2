<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pie Chart</title>
    <link rel = "icon" href = "https://img.freepik.com/free-vector/checking-boxes-concept-illustration_114360-2429.jpg?size=626&ext=jpg&ga=GA1.2.597311726.1689829677&semt=ais" type = "image/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="w-full h-full">
    <div style="width: 40%; margin: auto;" class="grid h-screen mx-auto justify-items-center align-middle">
        <h3 class="text-green-500 font-bold">Products - Bar Chart</h3><br>
        <canvas id="productChart"></canvas>
      </div>
<div class="w-full h-full ">
    <script>
        var ctx = document.getElementById('productChart').getContext('2d');
        var data = @json($data);

        var labels = data.map(item => item.name);
        var values = data.map(item => item.stock);

        var productChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Product Quantity',
                    data: values,
                    backgroundColor: ['red', '#800080', 'yellow', '#0000FF', 'orange', 'gray', '#008080',
                        'pink', 'lightgray', '#800000', 'green', '#FF00FF'
                    ],
                    borderColor: '#000000',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</div>
</body>
</html>
