<div>
    <form wire:submit.prevent='advisory' class="mb-6 border-0 rounded-lg shadow-xl card">
        <div>
            @if (session()->has('failed'))
                <div x-data="{open : true}">
                    <div x-show="open" class="flex p-4 bg-red-200">
                        <div class="mr-4">
                            <div class="flex items-center justify-center w-12 h-12 text-white bg-red-600 rounded-full">
                                {{-- <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7" />
                                </svg> --}}
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </div>
                        </div>
                        <div class="flex justify-between w-full">
                            <div class="text-red-600">
                                <p class="mb-2 text-lg font-bold">
                                    Failed
                                </p>
                                <p class="text-sm">
                                    {{ session('failed') }}

                                </p>
                            </div>
                            <button type="button" @click="open = false">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 hover:bg-red-400" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            @endif
        </div>
        <div class="px-6 py-8 space-y-4 border-b border-gray-200">
            <div class="mx-auto my-3 text-center">
                <h2 class="text-2xl font-bold leading-tight text-gray-900">@guest
                    Sign Up
                @endguest
                @auth
                    Connect Advisor
                @endauth
             </h2>
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
                    <input type="email" wire:model='email' name="email-address" id="email-address" autocomplete="email"
                        class="block w-full h-12 px-3 py-2 mt-1 bg-white border border-gray-300 @error('email') border-red-500 @enderror rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    @error('email')
                        <span class="flex items-center mt-1 ml-1 text-xs font-bold tracking-wide text-red-500">
                            {{ $message }}
                        </span>
                    @enderror
                </div>


                <div class="col-span-12 sm:col-span-6">
                    <label for="level" class="block text-sm font-medium text-gray-700">Level</label>
                    <select id="level" name="level" wire:model='level'
                        class="block w-full h-12 px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md @error('level') border-red-500 @enderror shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
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
                        class="block w-full h-12 px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md @error('department') border-red-500 @enderror shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
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
                        class="block w-full h-12 px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md @error('programme') border-red-500 @enderror shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option>Select Programme</option>
                        @foreach ($dprogramme as $programme)
                        <option value="{{$programme}}">{{$programme}}</option>
                        @endforeach
                    </select>
                    @error('programme')
                        <span class="flex items-center mt-1 ml-1 text-xs font-bold tracking-wide text-red-500">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                @if ($open)
                    <div class="col-span-12 sm:col-span-6">
                        <label for="adviser" class="block text-sm font-medium text-gray-700">Course Advisor</label>
                        <select id="adviser" name="adviser" wire:model='adviser'
                            class="block w-full h-12 px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md @error('adviser') border-red-500 @enderror shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            <option>Select your Course Advisor</option>
                            @foreach ($advisor as $advisor)
                                <option value='{{ $advisor->name }}'>{{ $advisor->name }}</option>
                            @endforeach

                        </select>
                        @error('adviser')
                            <span class="flex items-center mt-1 ml-1 text-xs font-bold tracking-wide text-red-500">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                @endif

                @guest
                    <div class="col-span-12 sm:col-span-6">
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <input type="password" wire:model='password' name="password" id="password" autocomplete="given-name"
                            class="block w-full h-12 px-3 py-2 mt-1 bg-white border border-gray-300 @error('password') border-red-500 @enderror rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        @error('password')
                            <span class="flex items-center mt-1 ml-1 text-xs font-bold tracking-wide text-red-500">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                @endguest


            </div>
            <!-- <button type="submit" class="px-6 py-3 mt-3 font-bold text-white transition duration-300 ease-in-out bg-gray-800 rounded-lg md:w-32 hover:bg-blue-dark hover:bg-gray-600">Submit</button> -->
            {{-- <button type="submit"
                class="inline-flex justify-center w-full px-4 py-2 text-base font-medium text-white bg-gray-600 border border-transparent rounded-md shadow-sm hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 sm:ml-3 sm:w-auto sm:text-sm">
                Save
            </button> --}}
            <button type="submit"
                class="w-full px-16 py-2 mr-2 text-base font-medium text-white transition duration-500 ease-in-out transform bg-gray-600 border-gray-600 rounded-md focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2 hover:bg-gray-800 ">
                Get Advisory </button>
        </div>
        <!-- <div class="px-6 py-4 card-body">

        </div> -->
    </form>
</div>
