
<div>
    @if(session()->has('success'))
    <div class="alert alert-success">
       {{ session()->get('success') }}
    </div>
@endif
    <div class="mt-8 flow-root">
        <div>
            <button wire:click="create" class="btn btn-primary mb-2">Create Post</button>
        </div>
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">

            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-300">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                    title</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    content</th>
                                <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">

                            @forelse ($posts as $post)
                                <tr>
                                    <td
                                        class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                        {{ $post->title }}</td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        {{ $post->content }} </td>

                                    <td
                                        class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                                        <a href="#" class="text-indigo-600 hover:text-indigo-900"
                                            wire:click.prevent="edit({{ $post->id }})" {{-- @click="$dispatch('edit',{id:{{ $post->id }}}) --}} "
                                            
                                            
                                            >Edit<span
                                                class="sr-only"></a>
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
                            <div class="mt-3 text-center sm:mt-5">
                                <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">
                                    {{ $postId ? 'Edit Post' : 'Create Post' }}
                                </h3>

                                <div class="mt-2">

                                    <form wire:submit.prevent="{{ $postId ? 'update' : 'store' }}">
        
                          
                                        <div>
                                            <label for="title" class="block text-sm font-medium leading-6 text-gray-900 text-left">title</label>
                                            <div class="mt-2">
                                              <input type="text" wire:model="form.title" name="title" id="title" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" >
                                            </div>
                                            <p class="mt-2 text-sm text-gray-500" id="title-description">  
                                             @error('form.title')
                                                {{ $message }}
                                            @enderror
                                        </p>
                                          </div>


                                        <div>
                                            <label for="content" class="block text-sm font-medium leading-6 text-gray-900 text-left">content</label>
                                            <div class="mt-2">
                                              <input type="text" wire:model="form.content" name="content" id="content" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" >
                                            </div>
                                            <p class="mt-2 text-sm text-gray-500" id="content-description">  
                                             @error('form.content')
                                                {{ $message }}
                                            @enderror
                                        </p>
                                          </div>

                                   
                                    
                              




                                </div>
                            </div>
                        </div>
                        <div class="mt-5 sm:mt-6 sm:grid sm:grid-flow-row-dense sm:grid-cols-2 sm:gap-3">
                            <button  wire:click="{{ $postId ? 'update' : 'store' }}" type="submit"
                                class="inline-flex w-full justify-center rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 sm:col-start-2">
                                {{ $postId ? 'Update' : 'Create' }}</button>
                            <button wire:click="closeModal" type="button"
                                class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:col-start-1 sm:mt-0">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif


</div>
