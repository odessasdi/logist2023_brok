<div>

    <form  wire:submit="store" class="px-6 pb-24 pt-20 sm:pb-32 lg:px-8 lg:py-48">
        <div class="mx-auto max-w-xl lg:mr-0 lg:max-w-lg">
            <div class="grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2">
                <div>
                    <label for="first-name" class="block text-sm font-semibold leading-6 text-white">First
                        name</label>
                    <div class="mt-2.5">
                        <input wire:model="form.firstName" type="text" 
                            class="block w-full rounded-md border-0 bg-white/5 px-3.5 py-2 text-white shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:text-sm sm:leading-6">
                    </div>
                    <p class="mt-1 text-sm text-gray-500" id="email-description">
                        @error('form.firstName') <span class="error">{{ $message }}</span> @enderror 
                    </p>
                </div>
                <div>
                    <label for="last-name" class="block text-sm font-semibold leading-6 text-white">Last
                        name</label>
                    <div class="mt-2.5">
                        <input wire:model="form.lastName" type="text" name="last-name" id="last-name" autocomplete="family-name"
                            class="block w-full rounded-md border-0 bg-white/5 px-3.5 py-2 text-white shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:text-sm sm:leading-6">
                    </div>
                    <p class="mt-1 text-sm text-gray-500" id="email-description">
                        @error('form.lastName') <span class="error">{{ $message }}</span> @enderror 
                    </p>
                </div>
                <div class="sm:col-span-2">
                    <label for="email"
                        class="block text-sm font-semibold leading-6 text-white">Email</label>
                    <div class="mt-2.5">
                        <input wire:model="form.email"   name="email" id="email" autocomplete="email"
                            class="block w-full rounded-md border-0 bg-white/5 px-3.5 py-2 text-white shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:text-sm sm:leading-6">
                    </div>
                    <p class="mt-1 text-sm text-gray-500" id="email-description">
                        @error('form.email') <span class="error">{{ $message }}</span> @enderror 
                    </p>
                </div>
                <div class="sm:col-span-2">
                    <label for="phone-number" class="block text-sm font-semibold leading-6 text-white">Phone
                        number</label>
                    <div class="mt-2.5">
                        <input wire:model="form.phoneNumber"  type="tel" name="phone-number" id="phone-number" autocomplete="tel"
                            class="block w-full rounded-md border-0 bg-white/5 px-3.5 py-2 text-white shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:text-sm sm:leading-6">
                    </div>
                    <p class="mt-1 text-sm text-gray-500" id="email-description">
                        @error('form.phoneNumber') <span class="error">{{ $message }}</span> @enderror 
                    </p>
                </div>
                <div class="sm:col-span-2">
                    <label for="message"
                        class="block text-sm font-semibold leading-6 text-white">Message</label>
                    <div class="mt-2.5">
                        <textarea wire:model="form.message"  name="message" id="message" rows="4"
                            class="block w-full rounded-md border-0 bg-white/5 px-3.5 py-2 text-white shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:text-sm sm:leading-6"></textarea>
                    </div>
                    <p class="mt-1 text-sm text-gray-500" id="email-description">
                        @error('form.message') <span class="error">{{ $message }}</span> @enderror 
                    </p>
                </div>
            </div>
            <div class="mt-8 flex justify-end">
                <button type="submit"
                    class="rounded-md bg-indigo-500 px-3.5 py-2.5 text-center text-sm font-semibold text-white shadow-sm hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Send
                    message</button>
            </div>
        </div>
    </form>
</div>
