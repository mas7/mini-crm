<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Companies') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="text-right">
                        <a href="{{ route('company.create') }}"
                            class="bg-blue-500 text-white rounded px-3 py-2 mb-3 inline-block cursor-pointer">Create</a>
                    </div>
                    <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 ">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th scope="col" class="py-3 px-6">
                                        Name
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Email
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Logo
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Website
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($companies as $company)
                                    <tr class="bg-white border-b ">
                                        <th scope="row"
                                            class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap">
                                            {{ $company->name }}
                                        </th>
                                        <td class="py-4 px-6">
                                            {{ $company->email }}
                                        </td>
                                        <td class="py-4 px-6">
                                            @if ($company->logo != null)
                                                <img src="{{ $company->logo }}" alt="{{ $company->name . '_logo' }}"
                                                    height="100" width="100">
                                            @else
                                                N\A
                                            @endif

                                        </td>
                                        <td class="py-4 px-6">
                                            {{ $company->website }}
                                        </td>
                                        <td class="py-4 px-6">
                                            <a href="{{ route('company.edit', $company->id) }}"
                                                class="font-medium text-blue-600  hover:underline">Edit</a>

                                            <form method="POST" action="{{ route('company.destroy', $company->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="font-medium text-red-600  hover:underline">Delete</button>
                                            </form>

                                        </td>
                                    </tr>
                                @empty
                                    <tr class="bg-white border-b ">
                                        <td>
                                            No companies available
                                        </td>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table>

                    </div>
                    <div class="mt-4">
                        @if ($companies->links())
                            {{ $companies->links() }}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
