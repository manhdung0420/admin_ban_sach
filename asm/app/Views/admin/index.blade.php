@extends('admin.dashboard')

@section('title', 'Admin Dashboard')
<style>
    .stat-box {
        border-radius: 10px;
        padding: 20px;
        color: white;
    }


</style>
@section('content')
<div class="container mt-5">
    <h2 class="mb-4 text-center">Thống kê tổng quan</h2>

    <div class="row text-center">
        <div class="col-md-3">
            <div class="stat-box bg-primary">
                <h4><i class="bi bi-cart-check"></i> Tổng đơn hàng</h4>
                <p class="fs-3">1,245</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stat-box bg-success">
                <h4><i class="bi bi-cash"></i> Doanh thu</h4>
                <p class="fs-3">$50,300</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stat-box bg-warning">
                <h4><i class="bi bi-person"></i> Khách hàng</h4>
                <p class="fs-3">785</p>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stat-box bg-danger">
                <h4><i class="bi bi-box-seam"></i> Sản phẩm bán</h4>
                <p class="fs-3">2,310</p>
            </div>
        </div>
    </div>

    <div class="mt-5">
        <h4 class="text-center">Doanh thu theo tháng</h4>
        <canvas id="revenueChart"></canvas>
    </div>
</div>

<script>
    const ctx = document.getElementById('revenueChart').getContext('2d');
    const revenueChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            datasets: [{
                label: 'Doanh thu ($)',
                data: [5000, 7000, 8000, 6000, 9000, 11000, 9500, 12000, 10000, 15000, 14000, 16000],
                backgroundColor: 'rgba(54, 162, 235, 0.6)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endsection