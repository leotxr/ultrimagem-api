<div class="space-y-4">
    <form wire:submit="save">
        <div class="grid grid-cols-4 gap-2">
            <div class="max-w-xl py-2 col-span-2">
                <x-input-label>Titulo</x-input-label>
                <x-text-input type="text" name="title" wire:model="title" class="w-full"/>
            </div>
            <div class="max-w-xl py-2 col-span-2">
                <label for="types">Tipo</label>
                <select name="types" id="types" wire:model="type_id">
                    <option value="3">Selecione</option>
                    @foreach($types as $type)
                        <option value="{{$type->id}}">{{$type->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="max-w-xl py-2 col-span-4"
                 x-data="{ isUploading: false, progress: 0 }"
                 x-on:livewire-upload-start="isUploading = true"
                 x-on:livewire-upload-finish="isUploading = false"
                 x-on:livewire-upload-error="isUploading = false"
                 x-on:livewire-upload-progress="progress = $event.detail.progress">
                <label for="file">Adicionar arquivo</label>
                <input type="file" name="file" id="file" wire:model="file" class="w-full"/>
                <div x-show="isUploading">
                    <progress max="100" x-bind:value="progress"></progress>
                </div>
            </div>
            <div class="py-4 col-span-4">
                <x-primary-button type="submit">Salvar</x-primary-button>
            </div>
        </div>
    </form>
</div>
