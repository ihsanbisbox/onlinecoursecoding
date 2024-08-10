@extends('layouts.backend.master')

@section('title', 'Create Series')

@section('content')
    <div class="container-xl">
        <div class="row">
            <div class="col-12">
                <x-card.card title="Tambahkan Kursus Baru">
                    <form action="{{ route('admin.series.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <x-form.input type="text" title="Nama Kursus" name="name" value=""
                            placeholder="Masukkan Nama Kursus" />
                        <div class="row">
                            <div class="col-6">
                                <x-form.select-advanced title="Tags" name="tags[]">
                                    @foreach ($tags as $tag)
                                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                    @endforeach
                                </x-form.select-advanced>
                            </div>
                            <div class="col-6">
                                <x-form.input type="number" title="Harga Kursus" name="price" value=""
                                    placeholder="Masukkan Harga Kursus" />
                            </div>
                        </div>
                        <x-form.input type="file" title="Gambar Kursus" name="cover" value="" placeholder="" />
                        <x-form.textarea title="Deskripsi Kursus" name="description" value=""
                            placeholder="Masukkan Deskripsi kursus" />
                        <div class="row">
                            <div class="col-6">
                                <x-form.select-group title="Level Kursus">
                                    <label class="form-selectgroup-item">
                                        <input type="radio" name="level" value="Beginner" class="form-selectgroup-input">
                                        <span class="form-selectgroup-label">
                                            Beginner
                                        </span>
                                    </label>
                                    <label class="form-selectgroup-item">
                                        <input type="radio" name="level" value="Intermediate"
                                            class="form-selectgroup-input">
                                        <span class="form-selectgroup-label">
                                            Intermediate
                                        </span>
                                    </label>
                                    <label class="form-selectgroup-item">
                                        <input type="radio" name="level" value="Advanced" class="form-selectgroup-input">
                                        <span class="form-selectgroup-label">
                                            Advanced
                                        </span>
                                    </label>
                                </x-form.select-group>
                            </div>
                            <div class="col-6">
                                <x-form.checkbox title="Status Kursus">
                                    <label class="form-check form-check-inline">
                                        <input class="form-check-input @error('status') is-invalid @enderror"
                                            type="checkbox" name="status" value="0">
                                        <span class="form-check-label">Developed</span>
                                    </label>
                                    <label class="form-check form-check-inline">
                                        <input class="form-check-input @error('status') is-invalid @enderror"
                                            type="checkbox" name="status" value="1">
                                        <span class="form-check-label">Completed</span>
                                    </label>
                                </x-form.checkbox>
                            </div>
                        </div>
                        <x-button.button-save title="Simpan" icon="save" class="btn btn-primary" />
                        <x-button.button-link class="btn btn-dark text-white" title="Go Back" icon="arrow-left"
                            url="{{ route('admin.series.index') }}">
                        </x-button.button-link>
                    </form>
                </x-card.card>
            </div>
        </div>
    </div>
@endsection
