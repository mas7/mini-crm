<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Employees') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="text-right">
                        <a href="{{ route('employee.create') }}"
                            class="bg-blue-500 text-white rounded px-3 py-2 mb-3 inline-block cursor-pointer">Create</a>
                    </div>
                    <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 ">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th scope="col" class="py-3 px-6">
                                        First Name
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Last Name
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Company
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Email
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Phone
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($employees as $employee)
                                    <tr class="bg-white border-b ">
                                        <th scope="row"
                                            class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap">
                                            {{ $employee->first_name }}
                                        </th>
                                        <td class="py-4 px-6">
                                            {{ $employee->last_name }}
                                        </td>
                                        <td class="py-4 px-6">
                                            {{ $employee->company ? $employee->company->name : 'N\A' }}
                                        </td>
                                        <td class="py-4 px-6">
                                            {{ $employee->email }}
                                        </td>
                                        <td class="py-4 px-6">
                                            {{ $employee->phone }}
                                        </td>
                                        <td class="py-4 px-6">
                                            <a href="{{ route('employee.edit', $employee->id) }}"
                                                class="font-medium text-blue-600  hover:underline">Edit</a>

                                            <form method="POST"
                                                action="{{ route('employee.destroy', $employee->id) }}">
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
                                            No employees available
                                        </td>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table>

                    </div>
                    <div class="mt-4">
                        @if ($employees->links())
                            {{ $employees->links() }}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
