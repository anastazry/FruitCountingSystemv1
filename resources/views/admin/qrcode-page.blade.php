<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            padding: 20px;
            text-align: center;
        }

        h1 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        h6 {
            font-size: 16px;
            margin-bottom: 10px;
        }

        p {
            font-size: 16px;
            margin-bottom: 20px;
        }

        .qr-code {
            margin: 0 auto;
            width: 300px;
            height: 300px;
        }

        .footer {
            margin-top: 20px;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Mandor Assignment Details</h1>
        <h6>SCAN HERE</h6>

        <p>Assignment ID: {{ $metadataMandor->id }}</p>

        <div class="qr-code">
            {!!$qrCode!!}
            {{-- <img src="data:image/png;base64,{{  }}"> --}}
        </div>

        <h6>Scan the QR code above to update fruit details.</p>

        <div class="footer">
            Generated on {{ \Carbon\Carbon::now()->format('d/m/Y') }}
        </div>
    </div>
</body>
</html>
