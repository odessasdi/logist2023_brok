<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Admin Roles') }}
    </h2>
</x-slot>

<div class="mt-8 flow-root">
    <div class="p-5">
        <button wire:click="create" type="button"
            class="rounded bg-indigo-600 px-2 py-1 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Create
            New Role</button>
    </div>


    <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
        <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg">
            <table class="min-w-full divide-y divide-gray-300">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col"
                            class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                            NAME
                        </th>

                        <th scope="col"
                            class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                            Permissions
                        </th>

                        <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                            <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 bg-white">

                    @forelse ($roles as $role)
                        <tr>
                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                {{ $role->name }}
                            </td>

                            <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                @forelse ($role->permissions as $permission)
                                    <span class="badge badge-success">{{ $permission->name }}</span><br>
                                @empty
                                    <span class="badge badge-success"></span><br>
                                @endforelse

                            </td>

                            <td
                                class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">

                                <a href="#" class="text-indigo-600 hover:text-indigo-900"
                                    wire:click.prevent="edit({{ $role->id }})">Edit
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3">НЕТ ТАКИХ ЗАПИСЕЙ</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>




    @if ($isOpen)


        <div class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true">

            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
            <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
                <div class="flex min-h-full items-end justify-center p-4  sm:items-center sm:p-0">
                    <div
                        class="relative transform overflow-hidden rounded-lg bg-white px-4 pb-4 pt-5 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg sm:p-6">
                        <div>
                            <div class="mt-3 text-left sm:mt-5">
                                <h3 class="text-base font-semibold text-center leading-6 text-gray-900"
                                    id="modal-title">
                                    {{ $role_id ? 'Edit Permission' : 'Create Permission' }}
                                </h3>

                                <div class="mt-2">

                                    <form>
                                        <div class="form-group">
                                            <label for="roleName">Role Name</label>
                                            <input type="text" class="form-control" id="roleName"
                                                placeholder="Enter Role Name" wire:model="roleName">
                                        </div>
                                        <div class="form-group">
                                            <label for="permissions">Permissions</label>
                                            @foreach ($permissions as $permission)
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox"
                                                        value="{{ $permission->name }}" wire:model="selectedPermissions">
                                                    <label class="form-check-label" for="permissions">
                                                        {{ $permission->name }}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="mt-5 sm:mt-6 sm:grid sm:grid-flow-row-dense sm:grid-cols-2 sm:gap-3">
                            <button wire:click="{{ $role_id ? 'update' : 'store' }}" type="submit"
                                class="inline-flex w-full justify-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 sm:col-start-2">
                                {{ $role_id ? 'Update' : 'Create' }}</button>
                            <button wire:click="closeModal" type="button"
                                class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:col-start-1 sm:mt-0">Cancel</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>




    @endif

</div>
