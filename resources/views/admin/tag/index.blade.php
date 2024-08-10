@extends('layouts.backend.master')

@section('title', 'Tags')

@section('content')
    <div class="container-xl">
        <div class="row">
            <div class="col-12 col-lg-8">
                <x-card.card-action title="List Tags" url="{{ route('admin.tags.index') }}">
                    <x-table.table-responsive>
                        <thead>
                            <tr>
                                <th class="col-1">#</th>
                                <th>Nama</th>
                                <th class="col-3">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tags as $i => $tag)
                                <tr>
                                    <td>{{ $i + $tags->firstItem() }}</td>
                                    <td>{{ $tag->name }}</td>
                                    <td>
                                        <x-button.button-edit id="{{ $tag->id }}" title="Edit" />
                                        <x-modal.modal title="Edit Tag" id="{{ $tag->id }}">
                                            <form action="{{ route('admin.tags.update', $tag->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <x-form.input type="text" title="Nama Tag" name="name"
                                                    placeholder="Edit nama tag" value="{{ $tag->name }}" />
                                                <x-button.button-save title="Simpan" icon="save" class="btn-primary" />
                                            </form>
                                        </x-modal.modal>
                                        <x-button.button-delete id="{{ $tag->id }}"
                                            url="{{ route('admin.tags.destroy', $tag->id) }}" title="Delete" />
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </x-table.table-responsive>
                </x-card.card-action>
            </div>
            <div class="col-12 col-lg-4">
                <x-card.card title="Buat Tag Baru">
                    <form action="{{ route('admin.tags.store') }}" method="POST">
                        @csrf
                        <x-form.input type="text" title="Nama Tag" name="name" placeholder="Masukkan Tag Baru" value="" />
                        <x-button.button-save icon="save" title="Simpan" class="btn-primary" />
                    </form>
                </x-card.card>
            </div>
        </div>
    </div>
@endsection