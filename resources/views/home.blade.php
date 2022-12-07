@extends('layouts.admin')
@section('title','SINIK - Dashboard')
@section('content')
<div class="breadcrumb">
	<h1 class="mr-2">Version 1</h1>
	<ul>
		<li><a href="">Dashboard</a></li>
		<li>Version 1</li>
	</ul>
</div>

<div class="separator-breadcrumb border-top"></div>

<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="card mb-4">
            <div class="card-body">
                <div class="card-title">Laporan Pemeriksaan Pasien Tahun : {{ date('Y') }} </div>
                <div id="echartBar" style="height: 300px;"></div>
            </div>
        </div>
    </div>
    
</div>

@endsection
@push('echartBar')
<script>
$(document).ready(function() {
    // Chart in Dashboard version 1
    let echartElemBar = document.getElementById('echartBar');
    if (echartElemBar) {
        let echartBar = echarts.init(echartElemBar);
        echartBar.setOption({
            legend: {
                borderRadius: 0,
                orient: 'horizontal',
                x: 'right',
                data: ['Online', 'Offline']
            },
            grid: {
                left: '8px',
                right: '8px',
                bottom: '0',
                containLabel: true
            },
            tooltip: {
                show: true,
                backgroundColor: 'rgba(0, 0, 0, .8)'
            },
            xAxis: [{
                type: 'category',
                data: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'],
                axisTick: {
                    alignWithLabel: true
                },
                splitLine: {
                    show: false
                },
                axisLine: {
                    show: true
                }
            }],
            yAxis: [{
                    type: 'value',
                    axisLabel: {
                        formatter: '{value}'
                    },
                    min: 0,
                    max: 100,
                    interval: 20,
                    axisLine: {
                        show: false
                    },
                    splitLine: {
                        show: true,
                        interval: 'auto'
                    }
                }

            ],

            series: [{
                    name: 'Data Pemeriksaan',
                    data: [{{$str_month  }}],
                    label: { show: false, color: '#639' },
                    type: 'bar',
                    barGap: 0,
                    color: '#7569b3',
                    smooth: true,
                    itemStyle: {
                        emphasis: {
                            shadowBlur: 10,
                            shadowOffsetX: 0,
                            shadowOffsetY: -2,
                            shadowColor: 'rgba(0, 0, 0, 0.3)'
                        }
                    }
                },
            ]
        });
        $(window).on('resize', function() {
            setTimeout(() => {
                echartBar.resize();
            }, 500);
        });
    }
})
</script>
@endpush
