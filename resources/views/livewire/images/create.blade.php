<div class="space-y-4">
    <form wire:submit.prevent="salvar">
        <div class="grid grid-cols-4 gap-2">
            <div class="max-w-xl col-span-2 py-2">
                <x-input-label>Titulo</x-input-label>
                <x-text-input type="text" name="title" wire:model="title" class="w-full"/>
            </div>
            <div class="max-w-xl col-span-2 py-2">
                <label for="types" class="block text-sm text-gray-700 dark:text-gray-300">Mobile</label>
                <select name="types" id="types" wire:model="mobile" class="border-gray-300 rounded-md shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600">
                    <option>Selecione</option>
                    <option value="1">Sim</option>
                    <option value="0">Não</option>
                </select>
            </div>

            <div class="max-w-xl col-span-4 py-2"
                 x-data="{ isUploading: false, progress: 0 }"
                 x-on:livewire-upload-start="isUploading = true"
                 x-on:livewire-upload-finish="isUploading = false"
                 x-on:livewire-upload-error="isUploading = false"
                 x-on:livewire-upload-progress="progress = $event.detail.progress">
                <label for="image">Adicionar arquivo</label>
                <input type="file" name="image" id="image" wire:model="file" class="w-full"/>
                <div x-show="isUploading">
                    <progress max="100" x-bind:value="progress"></progress>
                </div>
            </div>
            <div class="col-span-4 py-4">
                <x-primary-button type="submit">Salvar</x-primary-button>
            </div>
        </div>
    </form>
</div>
