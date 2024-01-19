<x-app-layout>
    graph
    <div>
        <canvas id="myChart"></canvas>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const records = @json($records);
        console.log(records);
        const prices = records.map((record)=>(record.price));
        console.log(prices);
        const calories = records.map((record)=>(record.calorie));
        const data = {
            labels: records.map((record)=>(record.created_at)),
            datasets: [{
                label: '合計金額',
                data: prices
            },
            {
                label: '合計カロリー',
                data: calories   
            }]
        }
        const ctx = document.getElementById("myChart");
        const myChart = new Chart(ctx, {
            type: "line",
            data: data
        })
    </script>
</x-app-layout>