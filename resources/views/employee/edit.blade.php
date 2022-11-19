<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Employee') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('employee.update', $employee->id) }}">
                        @csrf
                        @method('PUT')

                        <!-- First Name -->
                        <div>
                            <x-input-label for="first_name" :value="__('First Name')" />

                            <x-text-input id="first_name" class="block mt-1 w-full" type="text" name="first_name"
                                value="{{ $employee->first_name }}" required autofocus />

                            <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
                        </div>

                        <!-- Last Name -->
                        <div class="mt-4">
                            <x-input-label for="last_name" :value="__('Last Name')" required />

                            <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name"
                                value="{{ $employee->last_name }}" />

                            <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
                        </div>

                        <!-- Company -->
                        <div class="mt-4">
                            <x-input-label for="company_id" :value="__('Company')" required />

                            <select name="company_id" id="company_id"
                                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full">
                                @forelse ($companies as $company)
                                    <option value="{{ $company->id }}"
                                        {{ $employee->company != null && $employee->company->id == $company->id ? 'selected' : '' }}>
                                        {{ $company->name }}</option>
                                @empty
                                    <option value="null">N\A</option>
                                @endforelse

                            </select>

                            <x-input-error :messages="$errors->get('company_id')" class="mt-2" />
                        </div>

                        <!-- Email -->
                        <div class="mt-4">
                            <x-input-label for="email" :value="__('Email')" />

                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                                value="{{ $employee->email }}" />

                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Phone -->
                        <div class="mt-4">
                            <x-input-label for="phone" :value="__('Phone')" />

                            <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone"
                                value="{{ $employee->phone }}" />

                            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">

                            <button
                                class="w-full text-center bg-indigo-500 py-2 rounded text-white border-b-[0.3rem] border-b-200 border-b-indigo-700 font-bold active:border-b-0">
                                {{ __('Update') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
