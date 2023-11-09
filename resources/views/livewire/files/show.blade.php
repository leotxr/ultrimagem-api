<div>
    <div>
        <a href="{{route('files.create')}}" wire:navigate>
            <x-primary-button type="button">+ Novo</x-primary-button>
        </a>
    </div>
    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Titulo
                </th>
                <th scope="col" class="px-6 py-3">
                    Path
                </th>
                <th scope="col" class="px-6 py-3">
                    Tipo
                </th>
                <th scope="col" class="px-6 py-3">
                    Baixar
                </th>
                <th scope="col" class="px-6 py-3">
                    Excluir
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($files as $file)
                @php
                    $type_name = $file->find($file->id)->type;
                    @endphp
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="px-6 py-4">
                        {{$file->title}}
                    </td>
                    <td class="px-6 py-4">
                        {{$file->path}}
                    </td>
                    <td class="px-6 py-4">
                        {{$file->type->name}}
                    </td>
                    <td class="px-6 py-4">
                        <a type="button" class="cursor-pointer text-blue-800"
                           wire:click="download({{$file}})">Baixar</a>
                    </td>
                    <td class="px-6 py-4">
                        <a type="button" class="cursor-pointer text-red-600" wire:click="delete({{$file}})">Excluir</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
