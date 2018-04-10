<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <!-- 最新版本的 Bootstrap 核心 CSS 文件 -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>

<div class="container">
<div class="row" style="margin-top: 30px;">
    <a href="{{ route('data',['type' => 2]) }}" class="btn btn-primary" role="button">标普500</a>
    <a href="{{ route('data',['type' => 3]) }}" class="btn btn-primary" role="button">创业板指</a>
    <a href="{{ route('data',['type' => 4]) }}" class="btn btn-primary" role="button">中证500</a>
    <a href="{{ route('data',['type' => 5]) }}" class="btn btn-primary" role="button">上证50</a>
    <a href="{{ route('data',['type' => 6]) }}" class="btn btn-primary" role="button">中小板指</a>
    <a href="{{ route('data',['type' => 7]) }}" class="btn btn-primary" role="button">深证100</a>
    <a href="{{ route('data',['type' => 8]) }}" class="btn btn-primary" role="button">沪深300</a>
    <a href="{{ route('data',['type' => 9]) }}" class="btn btn-primary" role="button">上证中盘</a>
</div>
<div class="row" style="margin-top: 20px">
<table class="table table-bordered">
    <thead>
        <tr>
            <td></td>
            <td>日</td>
            <td>周</td>
            <td>月</td>
            <td>季度</td>
            <td>半年</td>
            <td>全年</td>
            <td>两年</td>
            <td>三年</td>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td></td>
            <td>{{ $send_data['day'] }}</td>
            <td>{{ $send_data['week'] }}</td>
            <td>{{ $send_data['month'] }}</td>
            <td>{{ $send_data['quarter'] }}</td>
            <td>{{ $send_data['half_a_year'] }}</td>
            <td>{{ $send_data['year'] }}</td>
            <td>{{ $send_data['two_year'] }}</td>
            <td>{{ $send_data['three_year'] }}</td>
        </tr>
        <tr>
            <td>70分位</td>
            <td></td>
            <td></td>
            <td>{{ $send_data['70_month'] }}</td>
            <td>{{ $send_data['70_quarter'] }}</td>
            <td>{{ $send_data['70_half_a_year'] }}</td>
            <td>{{ $send_data['70_year'] }}</td>
            <td>{{ $send_data['70_two_year'] }}</td>
            <td>{{ $send_data['70_three_year'] }}</td>
        </tr>
        <tr>
            <td>30分位</td>
            <td></td>
            <td></td>
            <td>{{ $send_data['30_month'] }}</td>
            <td>{{ $send_data['30_quarter'] }}</td>
            <td>{{ $send_data['30_half_a_year'] }}</td>
            <td>{{ $send_data['30_year'] }}</td>
            <td>{{ $send_data['30_two_year'] }}</td>
            <td>{{ $send_data['30_three_year'] }}</td>
        </tr>
        <tr>
            <td>偏离率</td>
            <td></td>
            <td>{{ round(($send_data['day'] - $send_data['week'])/$send_data['week'] * 100, 2) }}%</td>
            <td>{{ round(($send_data['day'] - $send_data['month'])/$send_data['month'] * 100, 2) }}%</td>
            <td>{{ round(($send_data['day'] - $send_data['quarter'])/$send_data['quarter'] * 100, 2) }}%</td>
            <td>{{ round(($send_data['day'] - $send_data['half_a_year'])/$send_data['half_a_year'] * 100, 2) }}%</td>
            <td>{{ round(($send_data['day'] - $send_data['year'])/$send_data['year'] * 100, 2) }}%</td>
            <td>{{ round(($send_data['day'] - $send_data['two_year'])/$send_data['two_year'] * 100, 2) }}%</td>
            <td>{{ round(($send_data['day'] - $send_data['three_year'])/$send_data['three_year'] * 100, 2) }}%</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td>{{ round(($send_data['week'] - $send_data['month'])/$send_data['month'] * 100, 2) }}%</td>
            <td>{{ round(($send_data['week'] - $send_data['quarter'])/$send_data['quarter'] * 100, 2) }}%</td>
            <td>{{ round(($send_data['week'] - $send_data['half_a_year'])/$send_data['half_a_year'] * 100, 2) }}%</td>
            <td>{{ round(($send_data['week'] - $send_data['year'])/$send_data['year'] * 100, 2) }}%</td>
            <td>{{ round(($send_data['week'] - $send_data['two_year'])/$send_data['two_year'] * 100, 2) }}%</td>
            <td>{{ round(($send_data['week'] - $send_data['three_year'])/$send_data['three_year'] * 100, 2) }}%</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>{{ round(($send_data['month'] - $send_data['quarter'])/$send_data['quarter'] * 100, 2) }}%</td>
            <td>{{ round(($send_data['month'] - $send_data['half_a_year'])/$send_data['half_a_year'] * 100, 2) }}%</td>
            <td>{{ round(($send_data['month'] - $send_data['year'])/$send_data['year'] * 100, 2) }}%</td>
            <td>{{ round(($send_data['month'] - $send_data['two_year'])/$send_data['two_year'] * 100, 2) }}%</td>
            <td>{{ round(($send_data['month'] - $send_data['three_year'])/$send_data['three_year'] * 100, 2) }}%</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>{{ round(($send_data['quarter'] - $send_data['half_a_year'])/$send_data['half_a_year'] * 100, 2) }}%</td>
            <td>{{ round(($send_data['quarter'] - $send_data['year'])/$send_data['year'] * 100, 2) }}%</td>
            <td>{{ round(($send_data['quarter'] - $send_data['two_year'])/$send_data['two_year'] * 100, 2) }}%</td>
            <td>{{ round(($send_data['quarter'] - $send_data['three_year'])/$send_data['three_year'] * 100, 2) }}%</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>{{ round(($send_data['half_a_year'] - $send_data['year'])/$send_data['year'] * 100, 2) }}%</td>
            <td>{{ round(($send_data['half_a_year'] - $send_data['two_year'])/$send_data['two_year'] * 100, 2) }}%</td>
            <td>{{ round(($send_data['half_a_year'] - $send_data['three_year'])/$send_data['three_year'] * 100, 2) }}%</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>{{ round(($send_data['year'] - $send_data['two_year'])/$send_data['two_year'] * 100, 2) }}%</td>
            <td>{{ round(($send_data['year'] - $send_data['three_year'])/$send_data['three_year'] * 100, 2) }}%</td>
        </tr>
    </tbody>
</table>
</div>
</div>
</body>
</html>