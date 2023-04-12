@extends("layouts.admin")

@section("title")
    Kategori Listeleme
@endsection

@section("css")
    <style>
        .table-hover>tbody>tr:hover {
            --bs-table-hover-bg: transparent;
            background: #b3dafb;
        }
    </style>
@endsection

@section("content")

    <x-bootstrap.card>

        <x-slot:header>
            <h3>Kategori Listesi</h3>
        </x-slot:header>

        <x-slot:body>
            <x-bootstrap.table
            :class="'table-striped table-hover'"
            :is-responsive="1"
            >
                <x-slot:columns>
                    <th scope="col">Name</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Status</th>
                    <th scope="col">Feature Status</th>
                    <th scope="col">Description</th>
                    <th scope="col">Order</th>
                    <th scope="col">Parent Category</th>
                    <th scope="col">User</th>
                    <th scope="col">Actions</th>
                </x-slot:columns>

                <x-slot:rows>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td colspan="2">Larry the Bird</td>
                        <td>@twitter</td>
                    </tr>
                </x-slot:rows>
            </x-bootstrap.table>
        </x-slot:body>

    </x-bootstrap.card>

@endsection

@section("js")
@endsection
