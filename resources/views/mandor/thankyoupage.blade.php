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
            <h1 class="text-2xl font-bold text-gray-800 mb-4 text-center">Terima Kasih!</h1>
            <div class="footer text-gray-500 text-sm text-center mt-8 print-footer">
                Generated on {{ \Carbon\Carbon::now()->format('d/m/Y') }}
            </div>
        </div>
    </div>
</body>
</html>
