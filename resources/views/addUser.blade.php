<div>
    <form wire:submit.prevent='addUser'>
        <div class="overflow-hidden shadow sm:rounded-md">
            <div class="px-4 py-5 bg-white sm:p-6">
                <div>
                    @if (session()->has('success'))
                        <div x-data="{open : true}">
                            <div x-show="open" class="flex p-4 bg-green-200">
                                <div class="mr-4">
                                    <div
                                        class="flex items-center justify-center w-12 h-12 text-white bg-green-600 rounded-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="flex justify-between w-full">
                                    <div class="text-green-600">
                                        <p class="mb-2 text-lg font-bold">
                                            Success
                                        </p>
                                        <p class="text-sm">
                                            {{ session('success') }}

                                        </p>
                                    </div>
                                    <button type="button" @click="open = false">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 hover:bg-green-400"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="grid grid-cols-6 gap-6 pt-4">
                    <div class="col-span-12 sm:col-span-6">
                        <label for="name" class="block text-sm font-medium text-gray-700">
                            Full Name</label>
                        <input type="text" wire:model='name' name="name" id="name" autocomplete="given-name"
                            class="block w-full h-12 px-3 py-2 mt-1 bg-white border border-gray-300 @error('name') border-red-500 @enderror rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        @error('name')
                            <span class="flex items-center mt-1 ml-1 text-xs font-bold tracking-wide text-red-500">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="col-span-12 sm:col-span-6">
                        <label for="email-address" class="block text-sm font-medium text-gray-700">Email
                            Address</label>
                        <input type="email" wire:model='email' name="email-address" id="email-address"
                            autocomplete="email"
                            class="block w-full h-12 px-3 py-2 mt-1 bg-white border border-gray-300 @error('email') border-red-500 @enderror rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        @error('email')
                            <span class="flex items-center mt-1 ml-1 text-xs font-bold tracking-wide text-red-500">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <div class="col-span-12 sm:col-span-6">
                        <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
                        <select id="role" name="role" wire:model='role'
                            class="block w-full h-18 px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md @error('role') border-red-500 @enderror shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            multiple>
                            <option>add a role to user</option>
                            @foreach ($roles as $role)
                                <option value='{{ $role->name }}'>{{ $role->name }}</option>
                            @endforeach

                        </select>
                        @error('role')
                            <span class="flex items-center mt-1 ml-1 text-xs font-bold tracking-wide text-red-500">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="col-span-12 sm:col-span-6">
                        <label for="level" class="block text-sm font-medium text-gray-700">Level</label>
                        <select id="level" name="level" wire:model='level'
                            class="block w-full h-18 px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md @error('level') border-red-500 @enderror shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option>Select Level</option>
                                <option value='100 level'>100 Level</option>
                                <option value='200 level'>200 Level</option>
                                <option value='300 level'>300 Level</option>
                                <option value='400 level'>400 Level</option>
                                <option value='500 level'>500 Level</option>
                        </select>
                        @error('level')
                            <span class="flex items-center mt-1 ml-1 text-xs font-bold tracking-wide text-red-500">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="col-span-12 sm:col-span-6">
                        <label for="deparment" class="block text-sm font-medium text-gray-700">Department</label>
                        <select id="deparment" name="department" wire:model='department'
                            class="block w-full h-18 px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md @error('department') border-red-500 @enderror shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option>Select Department</option>
                            <option value="Mathematical Sciences">Mathematical Sciences</option>
                            <option value="Biological Sciences">Biological Sciences</option>
                            <option value="Physical Sciences">Physical Sciences</option>
                            <option value="Chemical Sciences">Chemical Sciences</option>
                            <option value="Food Sciences">Food Sciences</option>
                            <option value="Agriculture Sciences">Agriculture Sciences</option>
                            <option value="Engineering">Engineering</option>
                        </select>
                        @error('department')
                            <span class="flex items-center mt-1 ml-1 text-xs font-bold tracking-wide text-red-500">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="col-span-12 sm:col-span-6">
                        <label for="programme" class="block text-sm font-medium text-gray-700">Programme</label>
                        <select id="programme" name="programme" wire:model='programme'
                            class="block w-full h-18 px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md @error('programme') border-red-500 @enderror shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option>Select Programme</option>
                            <option value="Botany">Botany</option>
                            <option value="Biochemistry">Biochemistry</option>
                            <option value="Computer Science">Computer Science</option>
                            <option value="Geophysics">Geophysics</option>
                            <option value="Industial Chemistry">Industial Chemistry</option>
                            <option value="Mathematics">Mathematics</option>
                            <option value="Microbiology">Microbiology</option>
                            <option value="Physics">Physics</option>
                            <option value="Statistics">Statistics</option>
                            <option value="Zoology">Zoology</option>
                            <option value="Agriculture Economics and Extension">Agriculture Economics and Extension</option>
                            <option value="Animal Production & Health">Animal Production & Health</option>
                            <option value="Crop, Soil and Pest Management">Crop, Soil and Pest Management</option>
                            <option value="Fisheries and Aquaculture">Fisheries and Aquaculture</option>
                            <option value="Forestory, Wildlife and Environmental Management">Forestory, Wildlife and Environmental Management</option>
                            <option value="Food Science and Technology">Food Science and Technology</option>
                            <option value="Civil Engineering">Mathematics</option>
                            <option value="Electrical / Electronic Engineering">Electrical / Electronic Engineering</option>
                            <option value="Mechanical Engineering">Mechanical Engineering</option>
                        </select>
                        @error('programme')
                            <span class="flex items-center mt-1 ml-1 text-xs font-bold tracking-wide text-red-500">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="col-span-12 sm:col-span-6">
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <input type="password" wire:model='password' name="password" id="password"
                            autocomplete="given-name"
                            class="block w-full h-12 px-3 py-2 mt-1 bg-white border border-gray-300 @error('password') border-red-500 @enderror rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        @error('password')
                            <span class="flex items-center mt-1 ml-1 text-xs font-bold tracking-wide text-red-500">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                </div>

            </div>
        </div>
        <div class="px-4 py-3 bg-gray-50 sm:px-6 sm:flex sm:flex-row-reverse">
            <button type="submit"
                class="inline-flex justify-center w-full px-4 py-2 text-base font-medium text-white bg-red-600 border border-transparent rounded-md shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                Save
            </button>
            <button @click="newUser = false" type="button"
                class="inline-flex justify-center w-full px-4 py-2 mt-3 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                Cancel
            </button>
        </div>
    </form>
</div>
