<div>
    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="p-4">
                    <div class="flex items-center">
                        <input id="checkbox-all-search" type="checkbox"
                               class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="checkbox-all-search" class="sr-only">checkbox</label>
                    </div>
                </th>
                <th scope="col" class="px-6 py-3">
                    Nome
                </th>
                <th scope="col" class="px-6 py-3">
                    E-mail
                </th>
                <th scope="col" class="px-6 py-3">
                    Ativo
                </th>
                <th scope="col" class="px-6 py-3">
                    Tipo
                </th>
                <th scope="col" class="px-6 py-3">
                    <a type="button" class="cursor-pointer text-red-600" x-data=""
                       x-on:click.prevent="$dispatch('open-modal', 'confirm-lead-deletion')">Excluir</a>

                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($leads as $lead)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="col" class="p-4">
                        <div class="flex items-center">
                            <input id="lead-{{$lead->id}}" type="checkbox" wire:model.live="delete_list" name="lead[]"
                                   value="{{$lead->id}}"
                                   class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"/>
                            <label for="lead-{{$lead->id}}" class="sr-only">checkbox</label>
                        </div>
                    </th>
                    <td class="px-6 py-4">
                        {{$lead->name}}
                    </td>
                    <td class="px-6 py-4">
                        {{$lead->email}}
                    </td>
                    <td class="px-6 py-4">
                        {{$lead->active === 1 ? 'Sim' : 'Não'}}
                    </td>
                    <td class="px-6 py-4">
                        {{$lead->leadType->name}}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>


    <x-modal name="confirm-lead-deletion">
        <div>
            <form wire:submit="deleteLeads" class="p-6">

                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                    {{ __('Tem certeza que deseja excluir estes leads?') }}
                </h2>

                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    {{ __('Uma vez excluídos o usuário deverá preencher o formulário novamente no site.') }}
                </p>

                <div class="mt-6 flex justify-end">
                    <x-secondary-button x-on:click="$dispatch('close')">
                        {{ __('Cancel') }}
                    </x-secondary-button>

                    <x-danger-button class="ms-3">
                        {{ __('Excluir') }}
                    </x-danger-button>
                </div>
            </form>
        </div>
    </x-modal>

</div>
