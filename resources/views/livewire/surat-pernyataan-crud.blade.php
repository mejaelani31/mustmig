<div>
    <x-secondary-button wire:click="create">
        {{ __('Tambah Data') }}
    </x-secondary-button>

    <table class="min-w-full divide-y divide-gray-200 mt-4">
        <thead class="bg-gray-50 dark:bg-gray-700">
            <tr>
                <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-300">ID Pelanggan</th>
                <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-300">Nama Pelanggan</th>
                <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-300">Tarif</th>
                <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-300">Daya</th>
                <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-300">Tanggal</th>
                <th class="px-3 py-2 text-left text-xs font-medium text-gray-500 dark:text-gray-300">Aksi</th>
            </tr>
        </thead>
        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200">
            @foreach($items as $item)
                <tr>
                    <td class="px-3 py-2 text-sm text-gray-900 dark:text-gray-100">{{ $item->id_pelanggan }}</td>
                    <td class="px-3 py-2 text-sm text-gray-900 dark:text-gray-100">{{ $item->nama_pelanggan }}</td>
                    <td class="px-3 py-2 text-sm text-gray-900 dark:text-gray-100">{{ $item->tarif_pelanggan }}</td>
                    <td class="px-3 py-2 text-sm text-gray-900 dark:text-gray-100">{{ $item->daya_pelanggan }}</td>
                    <td class="px-3 py-2 text-sm text-gray-900 dark:text-gray-100">{{ $item->tanggal_ttd }}</td>
                    <td class="px-3 py-2 text-sm text-gray-900 dark:text-gray-100">
                        <x-secondary-button wire:click="edit({{ $item->id }})" class="mr-2">Edit</x-secondary-button>
                        <x-danger-button wire:click="confirmDelete({{ $item->id }})">Delete</x-danger-button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <form wire:submit.prevent="save">
        <x-dialog-modal wire:model.live="showingModal">
            <x-slot name="title">
                {{ $suratId ? __('Edit Surat Pernyataan') : __('Tambah Surat Pernyataan') }}
            </x-slot>

            <x-slot name="content">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <x-label for="id_pelanggan" value="ID Pelanggan" />
                        <x-input id="id_pelanggan" type="number" class="mt-1 block w-full" wire:model.defer="id_pelanggan" />
                        <x-input-error for="id_pelanggan" class="mt-2" />
                    </div>
                    <div>
                        <x-label for="nama_pelanggan" value="Nama Pelanggan" />
                        <x-input id="nama_pelanggan" type="text" class="mt-1 block w-full" wire:model.defer="nama_pelanggan" />
                        <x-input-error for="nama_pelanggan" class="mt-2" />
                    </div>
                    <div class="md:col-span-2">
                        <x-label for="alamat_pelanggan" value="Alamat Pelanggan" />
                        <textarea id="alamat_pelanggan" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md" wire:model.defer="alamat_pelanggan"></textarea>
                        <x-input-error for="alamat_pelanggan" class="mt-2" />
                    </div>
                    <div>
                        <x-label for="tarif_pelanggan" value="Tarif" />
                        <select id="tarif_pelanggan" wire:model.defer="tarif_pelanggan" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md">
                            <option value="R">R</option>
                            <option value="B">B</option>
                            <option value="S">S</option>
                            <option value="I">I</option>
                            <option value="P">P</option>
                        </select>
                        <x-input-error for="tarif_pelanggan" class="mt-2" />
                    </div>
                    <div>
                        <x-label for="daya_pelanggan" value="Daya" />
                        <select id="daya_pelanggan" wire:model.defer="daya_pelanggan" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md">
                            <option value="900">900</option>
                            <option value="1300">1300</option>
                            <option value="2200">2200</option>
                            <option value="3500">3500</option>
                        </select>
                        <x-input-error for="daya_pelanggan" class="mt-2" />
                    </div>
                    <div>
                        <x-label for="tanggal_ttd" value="Tanggal" />
                        <x-input id="tanggal_ttd" type="date" class="mt-1 block w-full" wire:model.defer="tanggal_ttd" />
                        <x-input-error for="tanggal_ttd" class="mt-2" />
                    </div>
                    <div>
                        <x-label for="nama_ttd" value="Nama Penanda Tangan" />
                        <x-input id="nama_ttd" type="text" class="mt-1 block w-full" wire:model.defer="nama_ttd" />
                        <x-input-error for="nama_ttd" class="mt-2" />
                    </div>
                    <div class="md:col-span-2">
                        <x-label for="alamat_ttd" value="Alamat Penanda Tangan" />
                        <textarea id="alamat_ttd" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md" wire:model.defer="alamat_ttd"></textarea>
                        <x-input-error for="alamat_ttd" class="mt-2" />
                    </div>
                    <div>
                        <x-label for="nik_ttd" value="NIK" />
                        <x-input id="nik_ttd" type="text" class="mt-1 block w-full" wire:model.defer="nik_ttd" />
                        <x-input-error for="nik_ttd" class="mt-2" />
                    </div>
                    <div>
                        <x-label for="nohp_ttd" value="No HP" />
                        <x-input id="nohp_ttd" type="text" class="mt-1 block w-full" wire:model.defer="nohp_ttd" />
                        <x-input-error for="nohp_ttd" class="mt-2" />
                    </div>
                    <div class="md:col-span-2">
                        <x-label for="file_ttd" value="File TTD (PDF)" />
                        <input id="file_ttd" type="file" wire:model="file_ttd" class="mt-1 block w-full text-gray-900 dark:text-gray-300" accept="application/pdf" />
                        <x-input-error for="file_ttd" class="mt-2" />
                    </div>
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-secondary-button wire:click="$set('showingModal', false)">
                    {{ __('Cancel') }}
                </x-secondary-button>
                <x-primary-button class="ms-2" wire:click="save" wire:loading.attr="disabled">
                    {{ __('Save') }}
                </x-primary-button>
            </x-slot>
        </x-dialog-modal>
    </form>

    <x-confirmation-modal wire:model.live="confirmingDeletion">
        <x-slot name="title">{{ __('Delete Data') }}</x-slot>
        <x-slot name="content">{{ __('Are you sure you want to delete this item?') }}</x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="$set('confirmingDeletion', false)">
                {{ __('Cancel') }}
            </x-secondary-button>
            <x-danger-button class="ms-2" wire:click="delete" wire:loading.attr="disabled">
                {{ __('Delete') }}
            </x-danger-button>
        </x-slot>
    </x-confirmation-modal>
</div>
