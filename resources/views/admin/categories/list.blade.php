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
                    @foreach($list as $category)
                        <tr>
                            <th scope="row">{{ $category->name }}</th>
                            <td>{{ $category->slug }}</td>
                            <td>
                                @if($category->status)
                                    Aktif
                                @else
                                    Pasif
                                @endif
                            </td>
                            <td>
                                @if($category->status)
                                    Aktif
                                @else
                                    Pasif
                                @endif
                            </td>
                            <td>{{ substr($category->description, 0, 20) }}</td>
                            <td>{{ $category->order }}</td>
                            <td>{{ $category->parentCategory?->name }}</td>
                            <td>{{ $category->user->name }}</td>
                            <td>
                                <a href="#" class="btn btn-warning"><i class="material-icons">edit</i></a>
                                <a href="#" class="btn btn-danger"><i class="material-icons">delete</i></a>
                            </td>
                        </tr>
                    @endforeach
                </x-slot:rows>
            </x-bootstrap.table>
        </x-slot:body>

    </x-bootstrap.card>

@endsection

@section("js")
@endsection
