<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Print</title>

    <!-- Normalize or reset CSS with your favorite library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css">

    <!-- Load paper.css for happy printing -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Battambang&display=swap" rel="stylesheet">

    <!-- Set page size here: A5, A4 or A3 -->
    <!-- Set also "landscape" if you need -->
    <style>
        @page {
            size: A4
        }

        .khtitle {
            font-family: 'Moul', cursive;
        }
    </style>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        body {
            font-family: 'Battambang', cursive;
        }
    </style>
</head>

<!-- Set "A5", "A4" or "A3" for class name -->
<!-- Set also "landscape" if you need -->

<script>
    document.addEventListener("DOMContentLoaded", function(event) {
        window.print();
    });
</script>

<body class="A4">

    <!-- Each sheet element should have the class "sheet" -->
    <!-- "padding-**mm" is optional: you can set 10, 15, 20 or 25 -->
    <section class="sheet padding-10mm">

        <!-- Write HTML just like a web page -->
        @include('app._include.print_header')
        <div
            style="float: left; width:100%; text-align:center; padding:15px 0px 20px 0px; font-weight:bold; line-height:30px">
            តារាងទី ៥៖ ប័ណ្ណដាក់ពិន្ទុវាយតម្លៃភាពត្រៀមរួចជាស្រេចរបស់រដ្ឋបាលឃុំ សង្កាត់<br>
            @lang('dev.commune') {{ $input['commune'] }} @lang('dev.district') {{ $input['district'] }} @lang('dev.province')
            {{ $input['province'] }}
        </div>
        <div style="font-size:13px; font-weight: bold; line-height:25px">
            {{ config('me.kobo.userlevel')[$input['userlevel'] ?? ''] ?? '' }}
            ,&nbsp;{{ config('me.kobo.formtype')[$input['formtype'] ?? ''] ?? '' }}
            ,&nbsp;{{ config('me.kobo.formuse')[$input['formuse'] ?? ''] ?? '' }}
            ,&nbsp;{{ config('me.kobo.year')[$input['year'] ?? ''] ?? '' }}
            ,&nbsp;{{ config('me.kobo.round')[$input['round'] ?? ''] ?? '' }}
            ,&nbsp;{{ config('me.kobo.phase')[$input['phase'] ?? ''] ?? '' }}
        </div>
        <article style="font-size: 13px">

            <table style="width:100%">
                <tr style="height: 37px">
                    <th style="width: 40px">@lang('dev.no')</th>
                    <th>@lang('dev.criteria')</th>
                    <th style="width: 70px">@lang('dev.maximum_score')</th>
                    <th style="width: 70px">@lang('dev.actual_score')</th>
                </tr>
                @php
                    
                    $setting = [['០១', '20'], ['០២', '20'], ['០៣', '10'], ['០៤', '5'], ['០៥', '5'], ['០៦', '5'], ['០៧', '5'], ['០៨', '5'], ['០៩', '5'], ['១០', '5'], ['១១', '5'], ['១២', '10']];
                    $i = 0;
                    $score = 0;
                    $standard_score = 0;
                    $percentage = 0;
                @endphp
                @foreach ($columns as $item)
                    @if ((int) $input[$item] >= 0)
                        @php
                            $standard_score += (int) $setting[$i][1];
                            $score += (int) $input[$item];
                        @endphp
                    @endif


                    <tr>
                        <td style="text-align: center;">{{ num_in_khmer($i + 1) }}</td>

                        <td style="padding: 10px 5px">
                            {{ replaceString($question[$item]['label'] ?? '') }}
                        </td>
                        @if ((int) $input[$item] >= 0)
                            <td style="text-align: center;">{{ num_in_khmer($setting[$i][1]) }}</td>
                        @else
                            <td style="text-align: center;">N/A</td>
                        @endif

                        @if ((int) $input[$item] >= 0)
                            <td style="text-align: center;">{{ num_in_khmer($input[$item] ?? '') }}</td>
                        @else
                            <td style="text-align: center;">N/A</td>
                        @endif
                        {{-- <td style="text-align: center;">{{ num_in_khmer($input[$item] ?? '') }}</td> --}}

                    </tr>

                    @php
                        $i++;
                    @endphp
                @endforeach
                @php
                    $d_score = $standard_score == 0 ? 1 : $standard_score;
                    $percentage = ($score * 100) / $d_score;
                @endphp

                <tr style="height: 37px; text-align: center; font-weight:bold">
                    <td colspan="2">@lang('dev.total')</td>
                    <td>{{ num_in_khmer($standard_score > 0 ? $standard_score : 'N/A') }}</td>
                    @if ((int) $score >= 0)
                        <td style="text-align: center;">{{ num_in_khmer($score) }}</td>
                    @else
                        <td style="text-align: center;">N/A</td>
                    @endif
                </tr>
                <tr style="height: 37px; text-align: center; font-weight:bold">
                    <td colspan="2">@lang('dev.average')</td>
                    <td>{{ num_in_khmer(100) }} %</td>
                    @if ((int) $percentage >= 0)
                        <td style="text-align: center;">{{ num_in_khmer(intval($percentage ?? '')) }} %</td>
                    @else
                        <td style="text-align: center;">N/A</td>
                    @endif
                </tr>

            </table>
        </article>
        <div style="float: left; width:auto; text-align:center; font-size:13px; margin:20px 20px 0px 0px">
            @if (empty($input['confirmed_date']))
                កាលបរិច្ឆេទ............................<br>
            @else
                @php
                    $date_array = [];
                    $timestamp = strtotime($input['confirmed_date']);
                    $confirmed_date = date('d-m-Y', $timestamp);
                    $date_array = explode('-', $confirmed_date);
                @endphp
                កាលបរិច្ឆេទ:&nbsp;
                {!! num_in_khmer($date_array[0]) .
                    '&nbsp;' .
                    month_in_khmer($date_array[1]) .
                    '&nbsp;' .
                    num_in_khmer($date_array[2]) !!}
                <br>
            @endif

            មេឃុំ ចៅសង្កាត់ <br>

            @if (empty($input['fullname']))
                (ឈ្មោះ និងហត្ថលេខា)
            @else
                <br>
                <b>{{ $input['fullname'] ?? '' }}</b>
            @endif

        </div>


        <div style="float: right; width:auto; text-align:center; font-size:13px; margin:20px 20px 0px 0px">
            កាលបរិច្ឆេទ............................<br>
            អ្នកវាយតម្លៃនៃរដ្ឋបាលក្រុង ស្រុក<br>
            (ឈ្មោះ និងហត្ថលេខា)

        </div>

    </section>
</body>

</html>
