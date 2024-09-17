<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mandor Assignment Details</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @media print {
            .print-footer {
                display: none;
            }
        }
    </style>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <div class="container mx-auto my-10 max-w-lg bg-white shadow-lg rounded-lg overflow-hidden">
        <div class="px-6 py-8">
            <h1 class="text-2xl font-bold text-gray-800 mb-4 text-center">Tugasan Mandor dan Pemandu</h1>
            <h6 class="text-md font-semibold text-blue-600 mb-4 text-center">SCAN HERE</h6>

            <div class="space-y-2 text-center">
                <p class="text-lg text-gray-700"><strong>Peringkat:</strong> {{ $metadataMandor->peringkat }}</p>
                <p class="text-lg text-gray-700"><strong>Blok:</strong> {{ $metadataMandor->blok }}</p>
                <p class="text-lg text-gray-700"><strong>No Lot:</strong> {{ $metadataMandor->n_lot }}</p>
            </div>

            <div class="qr-code mt-6 flex justify-center">
                {!!$qrCode!!}
            </div>

            <p class="text-gray-600 text-center mt-4 italic">Scan the QR code above to update fruit details.</p>

            <div class="footer text-gray-500 text-sm text-center mt-8 print-footer">
                Generated on {{ \Carbon\Carbon::now()->format('d/m/Y') }}
            </div>
        </div>
    </div>
</body>
</html>
