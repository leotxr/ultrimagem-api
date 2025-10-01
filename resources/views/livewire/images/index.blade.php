<div>
    <div>
        <a href="{{ route('images.create') }}" wire:navigate>
            <x-primary-button type="button">+ Novo</x-primary-button>
        </a>
    </div>
    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Titulo
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Caminho
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Mobile
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Ativa
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
                @foreach ($imagens as $file)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4">
                            {{ $file->id }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $file->title }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $file->path }}
                        </td>
                        <td class="px-6 py-4">
                            {{ !$file->mobile ? 'Não' : 'Sim' }}
                        </td>
                        <td class="px-6 py-4">
                            {{ !$file->active ? 'Não' : 'Sim' }}
                        </td>
                        <td class="px-6 py-4">
                            <a type="button" class="text-blue-800 cursor-pointer"
                                wire:click="download({{ $file->id }})">Baixar</a>
                        </td>
                        <td class="px-6 py-4">
                            <a type="button" class="text-red-600 cursor-pointer"
                                wire:click="delete({{ $file->id }})">Excluir</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
