<!DOCTYPE html>
<html>
<head>
    <style>
        /* Incluye el CSS generado aquí */
        {!! file_get_contents(public_path('css/email.css')) !!}
    </style>
</head>
<body class="bg-gray-100">
    <div class="max-w-xl p-4 mx-auto bg-white rounded-lg shadow-md">
        <h1 class="mb-4 text-2xl font-bold">Welcome to Our App</h1>
        <p class="mb-4">Thank you for registering with us. Please click the button below to verify your email address.</p>
        <a href="{{ $url }}" class="px-4 py-2 bg-blue-500 rounded">Verify Email</a>
    </div>
</body>
</html>
