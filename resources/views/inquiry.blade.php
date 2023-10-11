<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Inquiries</title>
    </head>
    <body>
        <div class="inquiry-table">
            <div class="t-cell t-header">Inquiry ID</div>
            <div class="t-cell t-header">Currency Type</div>
            <div class="t-cell t-header">Currency Value</div>
            <div class="t-cell t-header">Created At</div>
    
            @foreach ($inquiryData as $inquiry)
                <div class="t-cell t-row">{{ $inquiry['InquiryId'] }}</div>
                <div class="t-cell t-row">{{ $inquiry['CurrencyType'] }}</div>
                <div class="t-cell t-row">{{ $inquiry['CurrencyValue'] }}</div>
                <div class="t-cell t-row">{{ $inquiry['created_at'] ? \Carbon\Carbon::parse($inquiry['created_at'])->format('m/d/Y h:i A') : '' }}</div>
            @endforeach
        </div>
    </body>
</html>


<style>
    .inquiry-table {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr 1fr;
        grid-gap: 10px;
    }

    .t-header {
        font-weight: bold;
        border-bottom: 1px solid #000;
    }

    .t-cell {
        padding: 5px;
        border: 1px solid #ddd;
    }

    .t-row:nth-child(even) {
        background-color: #f2f2f2;
    }
</style>
