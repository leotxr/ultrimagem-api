<div>
    <div class="grid sm:grid-cols-6 gap-3 grid-cols-2">
        <div class="sm:col-span-4 col-span-1 mt-4">
            <x-input-label for="types" >Lista</x-input-label>
            <select name="types" id="types" wire:model.live="type_id" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                <option value="3">Selecione</option>
                @foreach($types as $type)
                    <option value="{{$type->id}}">{{$type->name}}</option>
                @endforeach
            </select>
            <p>{{$count_leads}} endereços de e-mail selecionados.</p>
        </div>
        <div class="sm:col-span-4 col-span-1 mt-4">
            <x-input-label for="subject" >Assunto</x-input-label>
            <x-text-input name="subject" wire:model="subject" class="w-full"></x-text-input>
        </div>
        <div class="sm:col-span-4 col-span-1 mt-4">
            <x-input-label for="message" >Mensagem</x-input-label>
            <x-text-area name="message" wire:model="message" rows="5" class="w-full"></x-text-area>
        </div>
        <div class="sm:col-span-6 col-span-1 mt-4">
            <label for="attachment" class="block text-sm text-gray-700 dark:text-gray-300">Anexo</label>
            <select name="attachment" id="attachment" wire:model="attachment" class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                <option value="3">Selecione</option>
                @foreach($files as $file)
                    <option value="{{$file->path}}">{{$file->title}}</option>
                @endforeach
            </select>
        </div>
        <x-primary-button type="button" wire:click="fire()">Enviar</x-primary-button>
    </div>
</div>
