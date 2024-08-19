<!DOCTYPE html>
<html>
<head>
    <title>Form Validation</title>
</head>
<body>
    <h1>Form Input</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div>
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('form.submit') }}" method="POST">
        @csrf
        <div>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}">
        </div>

        <div>
            <label for="email">Email:</label>
            <input type="text" name="email" id="email" value="{{ old('email') }}">
        </div>

        <button type="submit">Submit</button>
    </form>
</body>
</html>
