<x-layouts.app title="Category">

    <div class="mb-4 flex justify-between items-center">

        <flux:breadcrumbs>
            {{-- <flux:breadcrumbs.item href="{{ route('dashboard') }}">Dashboard</flux:breadcrumbs.item> --}}
            <flux:breadcrumbs.item :href="route('dashboard')">
                Dashboard
            </flux:breadcrumbs.item>
            <flux:breadcrumbs.item>
                Categories
            </flux:breadcrumbs.item>
        </flux:breadcrumbs>

        <flux:button :href="route('admin.categories.create')" icon-trailing="plus-circle">
            Add category
        </flux:button>

    </div>

    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Edit
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$category->id}}
                    </th>
                    <td class="px-6 py-4">
                        {{$category->name}}
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex space-x-2">

                            <flux:button
                                :href="route('admin.categories.edit', $category->id)"
                                icon-trailing="pencil-square"
                                size="sm">
                                Edit
                            </flux:button>

                            <form class="delete-form" action="{{ route('admin.categories.destroy', $category) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <flux:button
                                    type="submit"
                                    variant="danger"
                                    icon-trailing="trash"
                                    size="sm">
                                </flux:button>
                            </form>
                        </div>

                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>

    @push('js')

        <script>
            forms = document.querySelectorAll('.delete-form');

            forms.forEach(form => {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();

                    Swal.fire({
                        title: "Are you sure?",
                        text: "You won't be able to revert this!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Yes, delete it!"
                        }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                        });
                });
            });
        </script>

    @endpush
</x-layauts.app>
