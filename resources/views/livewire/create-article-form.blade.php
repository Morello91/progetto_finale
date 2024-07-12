<div>
    @if (session()->has('success'))
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="alert alert-success text-center">
                    {{ session('success') }}
                </div>
            </div>
        </div>
    @endif

    <form class="container-custom container form shadow rounded p-5 my-5" wire:submit="store">

        <div class="mb-3">
            <label for="title" class="text">{{ __('create-article.title') }} :</label>
            <input type="text" class="input @error('title') is-invalid @enderror" id="title"
                wire:model.blur="title">
        </div>
        @error('title')
            <p class="fst-italic text-danger">
                {{ $message }}
            </p>
        @enderror

        <div class="mb-3">
            <label for="description" class="text">{{ __('create-article.description') }} :</label>
            <textarea id="description" cols="30" rows="10" class="input @error('title') is-invalid @enderror"
                wire:model.blur="description"></textarea>
        </div>
        @error('description')
            <p class="fst-italic text-danger">
                {{ $message }}
            </p>
        @enderror

        <div class="mb-3">
            <label for="price" class="text">{{ __('create-article.price_in') }} :</label>
            <input type="text" class="input @error('title') is-invalid @enderror" id="price"
                wire:model.blur="price">
        </div>
        @error('price')
            <p class="fst-italic text-danger">
                {{ $message }}
            </p>
        @enderror

        <div class="mb-3">
            <label for="category" class="text">{{ __('create-article.select_cat') }} :</label>
            <select id="category" wire:model.blur="category" class="input @error('title') is-invalid @enderror">
                <option label> --{{ __('create-article.select_cat') }}-- </option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        @error('category')
            <p class="fst-italic text-danger">
                {{ $message }}
            </p>
        @enderror

        <div class=" d-flex justify-content-center align-items-center">
            <label class="thertiry-button mb-3 " for="file">
                <span class="input-group"><i class="bi bi-images">
                    {{__('create-article.selezione')}}</i></span>
                <input type="file" id="file" wire:model.live="temporary_images" multiple
                    class=" @error('temporary_images.*') is-invalid @enderror" placeholder="Img/">
                @error('temporary_images.*')
                    <p class="fst-italic text-danger">{{ $message }}</p>
                @enderror
                @error('temporary_images')
                    <p class="fst-italic text-danger">{{ $message }}</p>
                @enderror
            </label>
        </div>



        @if (!empty($images))
            <div class="row mb-3">
                <div class="col-12">
                    <p class="text">{{ __('create-article.prev-photo') }}: </p>
                    <div class="row rounded shadow py-4 bg-custom">
                        @foreach ($images as $key => $image)
                            <div class="col d-flex flex-column align-items-center my-3">
                                <div class="img-preview mx-auto rounded"
                                    style="background-image: url({{ $image->temporaryUrl() }});"></div>
                                <button type="button" class="btn mt-1 delate-button"
                                    wire:click="removeImage({{ $key }})"><i class="bi bi-x-lg"></i></button>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        @endif

        <div class="d-flex justify-content-center">
            <button type="submit" class="btn primary-button">{{ __('create-article.btn_create') }}</button>
        </div>
    </form>
</div>
