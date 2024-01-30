<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<style>
    h4 {
        margin: 0;
    }

    .w-full {
        width: 100%;
    }

    .w-half {
        width: 50%;
    }

    .margin-top {
        margin-top: 1.25rem;
    }

    .footer {
        font-size: 0.875rem;
        padding: 1rem;
        background-color: rgb(241 245 249);
    }

    table {
        width: 100%;
        border-spacing: 0;
    }

    table.products {
        font-size: 0.875rem;
    }

    table.products tr {
        background-color: rgb(96 165 250);
    }

    table.products th {
        color: #ffffff;
        padding: 0.5rem;
    }

    table tr.items {
        background-color: rgb(241 245 249);
    }

    table tr.items td {
        padding: 0.5rem;
    }

    .total {
        text-align: right;
        margin-top: 1rem;
        font-size: 0.875rem;
    }

    .test {
        vertical-align: top;
    }
</style>

<body>

    <div class="container">
        <div class="margin-top">
            <table class="w-full">
                <tr>
                    <td class="w-half">
                        <div>
                            <h4>Riasec Test Result</h4>
                        </div>
                        <div>{{ $data['name'] }}</div>
                    </td>
                </tr>
            </table>
        </div>

        <div class="margin-top">
            <table class="products">
                <tr>
                    <th>Category</th>
                    <th>Total</th>
                </tr>
                @foreach (json_decode($data['score'], true) as $category => $total)
                    <tr class="items">
                        <td>{{ $category }}</td>
                        <td>{{ $total }}</td>
                    </tr>
                @endforeach
            </table>
        </div>


        <!-- Konten dari $mergeArray -->

        <div class="margin-top">
            <table class="products">
                <tr>
                    <th>Category</th>
                    <th>Description</th>
                    <th>Jobs</th>
                </tr>
                @foreach ($mergetArray as $top)
                    <tr class="items">
                        <td>{{ $top['category']['category_text'] }}</td>
                        <td>{{ $top['category']['description'] }}</td>
                        <td>
                        <ul class="job-list">
                            @foreach ($top['jobs'] as $job)
                                <li>{{ $job }}</li>
                            @endforeach
                        </ul>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        <div class="footer margin-top">
            <div>Thank you</div>
            <div>Copyright &copy;
                <script>
                    document.write(new Date().getFullYear())
                </script> – Psikologi UKRIDA
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>
</body>

</html>
