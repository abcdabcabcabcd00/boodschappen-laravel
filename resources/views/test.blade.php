<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@next-5/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
</head>
<body class="bg-indigo-600" style="font-family: Roboto;">
    <?php
$offset = request('offset', 0);
$limit = min(request('limit', 10), 100);


$highlight = array();

$input = request("highlight", "");

// Split the input by ";" but ignore any occurrences that are escaped with "\"
$parts = preg_split("/(?<!\\\\);/", $input);

foreach ($parts as $part) {
    // Unescape escaped colons and semicolons
    $part = preg_replace("/\\\\([:;])/", "$1", $part);

    // Extract key-value pairs separated by unescaped colon
    if (preg_match("/^(.*?[^\\\\]):(.*+)$/", $part, $highlightes)) {
        $key = preg_replace("/\\\\([:;])/", "$1", $highlightes[1]);
        $value = preg_replace("/\\\\([:;])/", "$1", $highlightes[2]);
        $highlight[$key] = $value;
    }
}

$users = DB::table('users')
    ->offset($offset)
    ->limit($limit)
    ->get();
    ?>
    <div class="container">
        <div class="row">
            <form class="my-4" method="get" action="{{ url('/test') }}">
                <div class="form-group my-2 mr-4">
                    <label class="mr-2" for="name">Search by name:</label>
                    <input class="form-control" type="text" id="name" name="highlight[name]" value="{{ old('highlight.name') }}">
                </div>
                <div class="form-group my-2 mr-4">
                    <label class="mr-2" for="email">Search by email:</label>
                    <input class="form-control" type="text" id="email" name="highlight[email]" value="{{ old('highlight.email') }}">
                </div>
                <button class="btn btn-primary my-2" type="submit">Search</button>
            </form>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table mx-auto">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody class="table-light">
                        @foreach(DB::table('users')->offset($offset)->limit($limit)->get() as $user)
                        <tr>
                            <td class="table-dark">{{ $user->id }}</td>
                            <td class=@if (isset ( $highlight["name"]  ) && stripos ( $user->name,  $highlight["name"])  !== false) "table-warning" @else "" @endif>{{ $user->name }}</td>
                            <td class=@if (isset ( $highlight["email"] ) && stripos ( $user->email, $highlight["email"]) !== false) "table-warning" @else "" @endif>{{ $user->email }}</td>
                        </tr>
                        <!-- <?php echo var_export( isset ( $highlight["name"] ) && strpos ( $user->name, $highlight["name"] ) !== false ) ?> -->
                        <!-- <?php echo var_export (isset ( $highlight["name"]  ) && stripos ( $highlight["name"],  $user->name )  !== false) ?> -->
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@next-5/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>